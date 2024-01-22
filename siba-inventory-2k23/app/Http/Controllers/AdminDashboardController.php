<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('systemAdmin.system-admin-home');
    }

    public function fetchAllUserData()
    {

        $users = User::all();

        // return response()->json([
        //     'status' => $students,
        // ]);

        //returning data inside the table
        $response = '';

        if ($users->count() > 0) {

            $response .=
                "<table id='all_user_data' class='display'>
                    <thead>
                        <tr>
                        <th>User_ID</th>
                        <th>Email</th>
                        <th>Epf</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";

            foreach ($users as $student) {
                $response .=
                    "<tr>
                            <td>" . $student->id . "</td>
                            <td>" . $student->email . "</td>
                            <td>" . $student->epf . "</td>
                            <td>" . $student->name . "</td>
                            <td>" . $student->role . "</td>
                            <td>" . $student->dept_id . "</td>
                            <td>" . $student->isActive . "</td>
                            <td>Empty</td>
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
