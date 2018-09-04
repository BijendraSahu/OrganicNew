<?php

namespace App\Http\Controllers;

use App\LoginModel;
use App\Menurolemodel;
use Illuminate\Http\Request;
session_start();

class RollmasterController extends Controller
{
  public function view($id)
  {$tee = decrypt($id);
      if ($tee == 1) {
          return view('adminview.rollmaster');
      }
  }

  public function postrollmaster()
  {
      $userdata= new LoginModel();
      $userdata->username = request('username');
      $userdata->password = request('password1');
      $userdata->password = request('password1');
      $userdata->rollmaster_id =2;
      $userdata->save();


      $finalcat = request('menuid');
        if (request('menuid') != null) {
            for ($i = 0; $i < sizeof($finalcat); $i++) {
                $item_category = new Menurolemodel();
                $item_category->user_id = $userdata->id;
                $item_category->menu_id = $finalcat[$i];
                $item_category->save();
            }
        }
      return redirect('/rollmastermenu');
  }
}

