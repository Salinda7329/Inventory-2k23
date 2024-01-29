<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Product;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Validation\ValidationException;

class RequestsController extends Controller
{
    public function create(Request $request)
    {
        try {
            $input = $request->validate([
                'request_by' => ['required'],
                'quantity_user' => ['required'],
                'user_remark' => ['required'],
            ]);
            return DB::transaction(function () use ($input) {
                 // Use Carbon to get the current timestamp
                 $currentTimestamp = now();
                Request::create([
                    'item_id_user' => $input['item_id_user'],
                    'quantity_user' => $input['quantity_user'],
                    'user_remark' => $input['user_remark'],
                    'request_by' => $input['request_by'],
                    'requested_timestamp' => $currentTimestamp,
                    'type' => $input['type'],
                    'status' => $input['status'],
                ]);
                // Return the success response after the request is created
                return response()->json(['message' => 'New product request created successfully.', 'status' => 200]);
            });
        } catch (ValidationException $e) {
            // Handle validation errors
            return response()->json(['errors' => $e->errors(), 'status' => 422]);
        } catch (QueryException $e) {
            // Log the error if needed: \Log::error($e);

            return response()->json(['error' => 'Failed to create product.', 'status' => 500]);
        }
    }
}
