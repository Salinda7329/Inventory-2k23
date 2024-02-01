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
                                        <td id='requestButtonContainer'><a data-status='" . $request->status . "' href='#' id='" . $request->item_user . "' class='processRequestButton btn-sm requestButtons' >" . $request->getRequestProcessAttribute() . "</a><a href='#' id='" . $request->id . "'  data-bs-toggle='modal' data-bs-target='#actionModal' class='actionRequestButton btn-sm btn-outline-primary requestActionButton requestButtons'>Action</a>
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
    //fetch request data for reqeust action model
    public function dataForProcessModal(Request $request)
    {
        $request_id = $request->input('request_id');

        // Find the request by item_user
        $requestData = ModelsRequest::where('id', $request_id)->first();


        return response()->json($requestData);
    }

    public function processRequest(Request $request)
    {
        $store_manager = $request->store_manager;
        $quantity = $request->quantity;
        $sm_remark = $request->sm_remark;
        $currentTimestamp = now();
        $item_id = $request->item_id;
        $status = $request->request_status;
        $type = $request->request_type_hidden;
        //request type return or request
        $request_id = $request->request_id_hidden;

        if ($type == 1 && $status == 2) {
            // Update the availability column to 0
            $updated = Item::where('id', $item_id)->update(['availability' => 0]);

            // if ($updated) {
            //     return response()->json(['message' => 'Availability updated successfully.']);
            // } else {
            //     return response()->json(['message' => 'Item not found.'], 404);
            // }
        } else if ($type == 2 && $status == 2) {
            // Update the availability column to 1
            $updated = Item::where('id', $item_id)->update(['availability' => 1]);
        }



        // Find the request by id
        $RequestRow = ModelsRequest::where('id', $request_id)->update([
            'status' => $status,
            'item_id' => $item_id,
            'quantity' => $quantity,
            'sm_remark' => $sm_remark,
            'store_manager' => $store_manager,
            'store_manager_timestamp' => $currentTimestamp,
        ]);

        if ($RequestRow) {
            // update the status
            return response()->json(['status' => 200, 'message' => "Request status done"]);
        }
    }

    public function fetchMyRequestData(Request $request)
    {

        $user_id = $request->user_id;
        // Retrieve only active items
        $requests = ModelsRequest::where('isActive', 1)->where('request_by', $user_id)->get();


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
}
