<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Actions\Fortify\PasswordValidationRules;
use Symfony\Contracts\Service\Attribute\Required;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        try {
            $input = $request->validate([
                'po_no' => ['required'],
                'category_id' => ['required'],
                'product_name' => ['required', 'string', 'max:255', 'unique:products'],
                'user_id_hidden' => ['required'],
            ]);
            return DB::transaction(function () use ($input) {
                Product::create([
                    'po_no' => $input['po_no'],
                    'category_id' => $input['category_id'],
                    'product_name' => $input['product_name'],
                    'created_by' => $input['user_id_hidden'],
                ]);

                // Return the success response after the user is created
                return response()->json(['message' => 'New product created successfully.','pono' => $input['po_no'], 'status' => 200]);
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
