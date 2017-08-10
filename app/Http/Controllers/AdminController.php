<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  /**
   * Показать профиль данного пользователя.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    return view('admin.profile', ['user' => User::findOrFail($id)]);
  }

  public function view()
  {
    //echo "HEY!!!";
  }

  public function authorization(Request $request)
  {
    if ($request->isMethod('post')) {
      echo "check here";
    }
    return view('admin.authorization');
  }
}
