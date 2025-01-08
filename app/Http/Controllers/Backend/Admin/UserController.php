<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json([
            'status' => 200,
            'message' => 'User list',
            'data' => $user
        ]);
    }
    public function detail($id)
    {
        $user = User::find($id);
        return response()->json([
            'status' => 200,
            'message' => 'User detail',
            'data' => $user
        ]);
    }
}
