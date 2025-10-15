<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogsController extends Controller
{
    /**
     * Get recent logs
     * @return \Illuminate\Http\JsonResponse
     */
    public function recent()
    {
        try {
             $recentLogs = DB::select("
                SELECT c.name, c.email, c.phone_number, s.submitted_at
                FROM signup_logs s
                JOIN contacts c ON s.contact_id = c.id
                ORDER BY s.submitted_at DESC
                LIMIT 5
            ");

            return response()->json($recentLogs);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch recent logs',
                '_e' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all logs with pagination and search
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->get('perPage', 10);
            $search = $request->get('search');

            $query = DB::table('signup_logs')
                ->join('contacts', 'signup_logs.contact_id', '=', 'contacts.id')
                ->select(
                    'contacts.name',
                    'contacts.email',
                    'contacts.phone_number',
                    'signup_logs.submitted_at'
                );

            if ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('contacts.name', 'ILIKE', "%{$search}%")
                      ->orWhere('contacts.email', 'ILIKE', "%{$search}%");
                });
            }

            $total = $query->count();
            $logs = $query->orderBy('signup_logs.submitted_at', 'desc')
                         ->paginate($perPage);

            return response()->json([
                'total' => $total,
                'data' => $logs->items()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch logs',
                '_e' => $e->getMessage(),
            ], 500);
        }
    }
}