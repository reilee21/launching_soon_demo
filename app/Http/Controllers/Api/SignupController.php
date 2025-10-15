<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\LocationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SignupController extends Controller
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function storeContact(Request $request)
    {
        // Create validator instance
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'email' => 'required_without:phone|nullable|email|max:255',
            'phone' => 'required_without:email|nullable|string|max:20',
        ], [
            'required'         => 'The :attribute field is required.',
            'required_without' => 'Either email or phone number is required.',
            'email'            => 'Please enter a valid email address.',
            'max'              => 'The :attribute may not be greater than :max characters.'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Get validated data
        $validated = $validator->validated();

        try {
            DB::beginTransaction();

            // 1. Log signup attempt
            $signupLogId = DB::table('signup_logs')->insertGetId([
                'contact_id'  => '-1',
                'ip_address'   => $request->ip(),
                'submitted_at' => now()
            ]);

            // 2. Check for duplicates
           $existingContact = DB::table('contacts')
                ->where(function ($query) use ($validated) {
                    if (!empty($validated['email'])) {
                        $query->where('email', $validated['email']);
                    }
                    if (!empty($validated['phone'])) {
                        $query->orWhere('phone_number', $validated['phone']);
                    }
                })
                ->first();

            if ($existingContact) {
                DB::table('signup_logs')
                    ->where('id', $signupLogId)
                    ->update(['contact_id' => $existingContact->id]);

                DB::commit();
                
                return response()->json([
                    'success' => true,
                    'message' => 'Contact already registered'
                ]);
            }

            // 3. Get location data
            $location = $this->locationService->getLocationFromIp($request->ip());
            $locationData = $location->toArray();

            // 4. Insert new contact
            $newContactId = DB::table('contacts')->insertGetId([
                'name'         => $validated['name'],
                'email'        => $validated['email'] ?? null,
                'phone_number' => $validated['phone'] ?? null,
                'ip_address'   => $request->ip(),
                'country'      => $locationData['country'],
                'region'       => $locationData['region'],
                'city'         => $locationData['city'],
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
            DB::table('signup_logs')
                ->where('id', $signupLogId)
                ->update(['contact_id' => $newContactId]);

            // Commit transaction
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Contact registered successfully'
            ]);

        } catch (\Exception $e) {
            // Rollback transaction on error
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request.'
            ], 500);
        }
    }
}
