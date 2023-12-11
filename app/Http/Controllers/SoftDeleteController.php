<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SoftDeleteController extends Controller
{
    public function softDeleteNumbers(Request $request)
    {
        // Get email and password from the request
        $credentials = $request->only('email', 'password');

        // Check the user's credentials
        if (Auth::once($credentials)) {
            $phoneNumbers = $request->input('phone_numbers', []);

            // Use the 'gcb_app' connection for the soft delete
            DB::connection('gcb_app')->table('phone_numbers')->whereIn('number', $phoneNumbers)->update(['deleted_at' => now()]);

            return response()->json(['message' => 'Records soft deleted successfully']);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
