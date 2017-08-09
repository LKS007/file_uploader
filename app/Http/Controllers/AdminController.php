<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

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

  public function authorization()
  {
    //echo "Authorization";
  }
}
