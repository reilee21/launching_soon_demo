<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatsController extends Controller
{
    /**
     * Get overall statistics
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            // Get total unique contacts
            $uniqueContacts = DB::table('contacts')->count();

            // Get total signups
            $totalSignups = DB::table('signup_logs')->count();

            // Calculate growth percentage this week
            $lastWeekSignups = DB::table('signup_logs')
                ->whereBetween('submitted_at', [
                    Carbon::now()->subWeek(),
                    Carbon::now()
                ])->count();

            $previousWeekSignups = DB::table('signup_logs')
                ->whereBetween('submitted_at', [
                    Carbon::now()->subWeeks(2),
                    Carbon::now()->subWeek()
                ])->count();

            $growthWeek = $previousWeekSignups > 0 
                ? (($lastWeekSignups - $previousWeekSignups) / $previousWeekSignups) * 100 
                : 0;

            return response()->json([
                'uniqueContacts' => $uniqueContacts,
                'totalSignups' => $totalSignups,
                'growthWeek' => round($growthWeek, 2)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch statistics',
                '_e' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get trend data for charts
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function trends(Request $request)
    {
        $period = $request->get('period', 'weekly');
        
        try {
              $query = match($period) {
                'yearly' => "
                    SELECT EXTRACT(YEAR FROM submitted_at) as label,
                           COUNT(*) as count
                    FROM signup_logs
                    GROUP BY EXTRACT(YEAR FROM submitted_at)
                    ORDER BY label",
                'monthly' => "
                    SELECT TO_CHAR(submitted_at, 'YYYY-MM') as label,
                           COUNT(*) as count
                    FROM signup_logs
                    GROUP BY TO_CHAR(submitted_at, 'YYYY-MM')
                    ORDER BY label",
                default => "
                    SELECT TO_CHAR(submitted_at, 'YYYY-WW') as label,
                           COUNT(*) as count
                    FROM signup_logs
                    GROUP BY TO_CHAR(submitted_at, 'YYYY-WW')
                    ORDER BY label"
            }; 
            $trends = DB::select($query);
            return response()->json([
                'labels' => collect($trends)->pluck('label'),
                'data' => collect($trends)->pluck('count')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch trend data',
                '_e' => $e->getMessage(),
            ], 500);
        }
    }
}