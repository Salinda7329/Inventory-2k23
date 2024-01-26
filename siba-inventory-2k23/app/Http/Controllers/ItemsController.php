<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Validation\ValidationException;

class ItemsController extends Controller
{
    public function create(Request $request)
    {
        try {
            $input = $request->validate([
                'user_id_hidden' => ['required'],
                'po_no' => ['required'],
                'product_name' => ['required', 'string', 'max:255', 'unique:products'],
                'brand_name' => ['required', 'string', 'max:255', 'unique:products'],
                'item_name' => ['required', 'string', 'max:255', 'unique:products'],
                'condition' => ['required'],
                'items_remaining' => ['required', 'string', 'max:255'],
                'lower_limit' => ['required', 'string', 'max:255'],

            ]);
            return DB::transaction(function () use ($input) {
                Item::create([
                    'created_by' => $input['user_id_hidden'],
                    'po_no' => $input['po_no'],
                    'product_id' => $input['product_name'],
                    'brand_id' => $input['brand_name'],
                    'item_name' => $input['item_name'],
                    'condition' => $input['condition'],
                    'condition_updated_by' => $input['user_id_hidden'],
                    'conditon_updated_timestamp' => $input['conditon_updated_timestamp'],
                    'items_remaining' => $input['items_remaining'],
                    'lower_limit' => $input['lower_limit'],

                ]);

                // Return the success response after the user is created
                return response()->json(['message' => 'New product created successfully.','status' => 200]);
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
