<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function aboutus()
    {
        return view('web.otherpages.aboutus');
    }
    public function faq()
    {
        return view('web.otherpages.faq');
    }
    public function terms()
    {
        return view('web.otherpages.terms');
    }
    public function payments()
    {
        return view('web.otherpages.payments');
    }
    public function returnpolicy()
    {
        return view('web.otherpages.returnpolicy');
    }
    public function blog()
    {
        return view('web.otherpages.blog');
    }
    public function blogdetail()
    {
        return view('web.otherpages.blogdetail');
    }
    public function contactus()
    {
        return view('web.otherpages.contactus');
    }
}
