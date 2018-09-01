<?php

namespace App\Http\Controllers;

use App\LoginModel;
use Illuminate\Http\Request;
session_start();

class RollmasterController extends Controller
{
  public function view()
  {
      return view('adminview.rollmaster');
  }

  public function postrollmaster()
  {
      $userdata= new LoginModel();
      $userdata->username = request('username');
      $userdata->password = request('password1');
      $userdata->password = request('password1');
      $userdata->rollmaster_id =2;
      $userdata->save();
      return redirect('/rollmastermenu');
  }
}

