<?php

namespace App\Http\Controllers;

use App\Notify;
use App\RecipeIngredient;
use App\RecipeInstruction;
use App\RecipeMaster;
use App\UserMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();

class RecipeController extends Controller
{
    public function my_recipe_list(Request $request)
    {
//        echo $_REQUEST;
//        echo request('type');
        if (isset($_SESSION['user_master'])) {
            $user_ses = $_SESSION['user_master'];
            $user = UserMaster::find($user_ses->id);
            $recipes = RecipeMaster::where(['created_by' => $user->id])->orderBy('id', 'desc')->get();
            return view('web.myrecipe')->with(['user' => $user, 'recipes' => $recipes, 'type' => request('type')]);
        } else {
            return Redirect::back()->withInput()->withErrors(array('message' => 'Please login first'));
        }
    }

    public function recipe_list()
    {
        return view('web.recipelist');
    }

    public function recipe_store(Request $request)
    {
        $rec = new RecipeMaster();
        $rec->title = request('recipe_title');
        $rec->desciption = request('benefits');
//        $rec->preparation_time = request('preparation_time');
        $rec->cooking_time = request('cooking_time');
        $rec->difficulty_level = request('difficulty_level');
        $rec->serve_count = request('serve_count');
//        $rec->recipe_category_id = request('recipe_category_id');
        $rec->created_by = $_SESSION['user_master']->id;

//        $destinationPath = 'recipe';
        $file = $request->file('image');
        if ($request->file('image') != null) {
            $destination_path = 'recipe/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $rec->image = $destination_path . $filename;
        }

        $rec->save();

        if (request('ingredient') != null) {
            foreach (array_combine(request('ingredient'), request('quantity')) as $ing => $qty) {
                $ctgry = new RecipeIngredient();
                $ctgry->rec_id = $rec->id;
                $ctgry->ingrediant = null;
                $ctgry->product_id = $ing;
                $ctgry->qty = $qty;
                $ctgry->save();
            }
        }
        if (request('otr_ingredient') != null) {
            foreach (array_combine(request('otr_ingredient'), request('otr_ingredient_qty')) as $ing => $qty) {
                $ctgry = new RecipeIngredient();
                $ctgry->rec_id = $rec->id;
                $ctgry->ingrediant = $ing;
                $ctgry->product_id = null;
                $ctgry->qty = $qty;
                $ctgry->save();
            }
        }

        if (request('instruction') != null) {
            foreach (request('instruction') as $instruction) {
                $ctgry = new RecipeInstruction();
                $ctgry->rec_id = $rec->id;
                $ctgry->instruction = $instruction;
                $ctgry->save();
            }
        }
        return redirect('myrecipe?type=list')->with('message', 'Your recipe has been submitted...');
    }



}
