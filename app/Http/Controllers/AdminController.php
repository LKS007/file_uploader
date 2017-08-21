<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  /**
   * Показать профиль данного пользователя.
   *
   * @param  int  $id
   * @return Response
   */

  public function __construct()
  {
    $this->middleware('my_auth');
  }

  public function show($id)
  {
    return view('admin.profile', ['user' => User::findOrFail($id)]);
  }

  public function dashboard()
  {
    $user = User::find(Auth::id());
    //print_r($user);
    return view('admin.dashboard', ['user' => $user]);
  }
}
