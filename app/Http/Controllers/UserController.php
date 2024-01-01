<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $title = 'User';
        $user = Users::paginate(10);

        return view('backend.user.index', compact('title', 'user'));
    }

    public function approve($id, $type){
        $user = Users::find($id);

        if($type == "Approving"){
            $approve_status = true;
        }else{
            $approve_status = false;
        }

        $user->update([
            'approve_status' => $approve_status
        ]);

        return response()->json([
            'status' => 'Success',
            'message' => 'User successfully approved!',
            'data' => $user
        ], 200);
    }
}
