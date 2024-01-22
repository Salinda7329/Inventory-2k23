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
                            <td>" . $student->getRoleNameAttribute() . "</td>
                            <td>" . $student->getDepartmentNameAttribute() . "</td>
                            <td>" . $student->getIsActiveNameAttribute() . "</td>
                            <td><a href='#' id='" . $student->id . "'  data-bs-toggle='modal'
                            data-bs-target='#editUserDataModal' class='editUserButton'>Edit</a>
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
        $user_Id = $request->user_Id;
        //find data of id using Student model
        $user = User::find($user_Id);
        return response()->json($user);
    }

    public function update(Request $request)
    {
        $user = User::find($request->user_Id_hidden);
        //   return response()->json($student);

        $user->update([
            'dept_id' => $request->dept_id,
            'role' => $request->role,
            'isActive' => $request->status,
        ]);

        return response()->json([
            'status' => 200,
        ]);
    }
}
