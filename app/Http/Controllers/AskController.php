<?php

namespace App\Http\Controllers;

use App\AskModel;
use Illuminate\Http\Request;
session_start();

class AskController extends Controller
{
  public function ask($id)
  {
      $tee = decrypt($id);
      if ($tee == 1) {
          $data = AskModel::get();
          return view('adminview.ask', ['data' => $data]);
      }
  }
}
