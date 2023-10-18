<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
     /**
     * All message
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function allUsers(Request $request)
    {
      $authUser = auth()->user()->email;
      $users = User::select('users.*', 'users.name')
     // ->join('users', 'users.id', '=', 'messages.user_id')
      ->where('id','<>',auth()->user()->id)
      ->get();
     

      return view('user_list',compact("users","authUser"));
    }
}
