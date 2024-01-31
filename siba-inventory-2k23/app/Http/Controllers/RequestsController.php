<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                'item_user' => ['required'],
                'type' => ['required'],
                'status' => ['required'],
            ]);
            return DB::transaction(function () use ($input) {
                // Use Carbon to get the current timestamp
                $currentTimestamp = now();
                ModelsRequest::create([
                    'item_user' => $input['item_user'],
                    'quantity_user' => $input['quantity_user'],
                    'user_remark' => $input['user_remark'],
                    'request_by' => $input['request_by'],
                    'requested_timestamp' => $currentTimestamp,
                    'type' => $input['type'],
                    'status' => $input['status'],
                ]);

                // Return the success response after the user is created
                return response()->json(['message' => 'New request created successfully.', 'status' => 200]);
            });
        } catch (ValidationException $e) {
            // Handle validation errors
            return response()->json(['errors' => $e->errors(), 'status' => 422]);
        } catch (QueryException $e) {
            // Log the error if needed: \Log::error($e);

            return response()->json(['error' => 'Failed to create request.', 'status' => 500]);
        }
    }

    public function fetchAllRequestData()
    {

        // $items = Item::all();
        // Retrieve only active items
        $requests = ModelsRequest::where('isActive', 1)->get();


        //returning data inside the table
        $response = '';

        if ($requests->count() > 0) {

            $response .=
                "<table id='all_request_data' class='display'>
                    <thead>
                        <tr>
                        <th>Request ID</th>
                        <th>Type</th>
                        <th>Item_Id</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Remark</th>
                        <th>Requested_by</th>
                        <th>Requested_at</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";

            foreach ($requests as $request) {
                $itemName = $request->getItemById ? $request->getItemById->item_name : 'N/A';

                $response .= "<tr>
                                        <td>" . $request->id . "</td>
                                        <td>" . $request->getTypeRequestAttribute() . "</td>
                                        <td>" . $request->item_user . "</td>
                                        <td>" . $itemName . "</td>
                                        <td>" . $request->quantity_user . "</td>
                                        <td>" . $request->user_remark . "</td>
                                        <td>" . $request->requestedByUser->name . "</td>
                                        <td>" . $request->requested_timestamp . "</td>
                                        <td>" . $request->getStatusRequestAttribute() . "</td>
                                        <td id='requestButtonContainer'><a data-status='" . $request->status . "' href='#' id='". $request->item_user."' class='processRequestButton btn-sm ' >".$request->getRequestProcessAttribute()."</a><a href='#' id='" . $request->item_user . "'  data-bs-toggle='modal' data-bs-target='#actionModal' class='actionRequestButton btn-sm btn-outline-primary requestActionButton'>Action</a>
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




    public function RequestAction(Request $request)
    {
        $itemUser = $request->input('itemUser');

        // Find the request by item_user
        $itemRequest = ModelsRequest::where('item_user', $itemUser)->first();

        if ($itemRequest) {
            // Toggle the status between 0 and 1
            $itemRequest->status = $itemRequest->status == 0 ? 1 : 0;
            $itemRequest->save();

            $newStatus = $itemRequest->status;

            return response()->json(['success' => true, 'message' => $newStatus]);
        } else {
            return response()->json(['success' => false, 'message' => 'Request not found']);
        }
    }
}
