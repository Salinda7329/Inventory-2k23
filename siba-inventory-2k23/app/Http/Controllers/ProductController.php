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
                'category_id' => ['required'],
                'product_name' => ['required', 'string', 'max:255', 'unique:products'],
                'user_id_hidden' => ['required'],
            ]);
            return DB::transaction(function () use ($input) {
                Product::create([
                    'category_id' => $input['category_id'],
                    'product_name' => $input['product_name'],
                    'created_by' => $input['user_id_hidden'],
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

    public function fetchAllProductData()
    {

        $products = Product::all();

        //returning data inside the table
        $response = '';

        if ($products->count() > 0) {

            $response .=
                "<table id='all_user_data' class='display'>
                    <thead>
                        <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Input Date</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";

            foreach ($products as $product) {
                $response .=
                    "<tr>
                            <td>" . $product->id . "</td>
                            <td>" . $product->product_name . "</td>
                            <td>" . $product->categoryData->category_name . "</td>
                            <td>" . $product->created_at . "</td>
                            <td>" . $product->createdByUser->name . "</td>
                            <td>" . $product->getIsActiveProductAttribute() . "</td>
                            <td><a href='#' id='" . $product->id . "'  data-bs-toggle='modal'
                            data-bs-target='#modaleditproduct' class='editProductButton'>Edit</a>
                            </td>
                        </tr>";
            }

            $response .=
                "</tbody>
                </table>";

            echo $response;
        } else {
            echo "<h3 align='center'>No Records in Database</h3>";
        }
    }

    public function edit(Request $request){
        $product_Id = $request->product_Id;
        //find data of id using Student model
        $product = Product::find($product_Id);
        return response()->json($product);
    }

    public function update(Request $request)
    {
        $product = Product::find($request->product_Id_hidden);

        $product->update([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'isActive' => $request->isActive,
        ]);

        return response()->json([
            'status' => 200,
        ]);
    }

    public function fetchProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }

}
