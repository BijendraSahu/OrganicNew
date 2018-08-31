<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
session_start();

class RecipeController extends Controller
{
    public function my_recipe_list()
    {
        return view('web.myrecipe');
    }

    public function recipe_list()
    {
        return view('web.recipelist');
    }

    public function allreciepe()
    {
        return view('adminview.reciepe');
    }
}
