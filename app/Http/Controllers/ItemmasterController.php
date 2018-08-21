<?php

namespace App\Http\Controllers;

use App\Categorymaster;
use App\ItemCategorymaster;
use App\ItemImages;
use App\ItemMaster;
use App\itemMetamodel;
use App\ItemPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Image;
use File;

session_start();

class ItemmasterController extends Controller
{
    public function items()
    {

        if ($_SESSION['admin_master'] != null) {
            $alldata = Categorymaster::where(['is_active' => 1])->paginate(10);
            $allcat = Categorymaster::where(['is_active' => 1])->get();
            $alldata1 = Categorymaster::where(['is_active' => 1])->get();
            $all_items = ItemMaster::orderBy('id','DESC')->paginate(10);
            return view('adminview.item_new', ['alldata' => $alldata, 'alldata1' => $alldata1, 'allcat' => $allcat, 'all_items' => $all_items])->with('no', 1);
        } else {
            return redirect('/adminlogin');
        }

    }

    public function send_cat_price()
    {

        $max_id = DB::select(" SELECT  max(id) as id FROM item_master");


        $getunit1 = request('getcid');
        $getqty1 = request('getqty');
        $getprice1 = request('getprice');
        $getspcl1 = request('getspcl');

        for ($i = 0; $i < sizeof($getprice1); $i++) {
            $item_price = new ItemPrice();
            $item_price->unit = $getunit1[$i];
            $item_price->qty = $getqty1[$i];
            $item_price->price = $getprice1[$i];
            $item_price->spl_price = $getspcl1[$i];
            $item_price->item_master_id = $max_id[0]->id;
            $item_price->save();
        }
        return 'success';


    }

    public function update_item()
    {

        $max_id = DB::select(" SELECT  max(id) as id FROM item_master");
        /*return $max_id[0]->id;*/

        $getunit11 = request('getcidone');
        $getqty11 = request('getqtyone');
        $getprice11 = request('getpriceone');
        $getspcl11 = request('getspclone');

        for ($i = 0; $i < sizeof($getprice11); $i++) {
            $item_price = new ItemPrice();
            $item_price->unit = $getunit11[$i];
            $item_price->qty = $getqty11[$i];
            $item_price->price = $getprice11[$i];
            $item_price->spl_price = $getspcl11[$i];
            $item_price->item_master_id = $max_id[0]->id;
            $item_price->save();
        }

        $delete_id = request('delet_id');
        ItemMaster::where('id', $delete_id)
            ->delete();
        ItemCategorymaster::where('item_master_id', $delete_id)
            ->delete();
        ItemPrice::where('item_master_id', $delete_id)
            ->delete();
        ItemImages::where('item_master_id', $delete_id)
            ->delete();
        $directory = 'p_img' . '/' . $delete_id;
        $success = File::deleteDirectory($directory);
        return 'success';

    }

    public function itemsadd(Request $request)
    {
        $item = new ItemMaster();
        $item->name = request('item_name');
        $item->description = request('temp');;
        $item->usage = request('item_usage');
        $item->specifcation = request('item_specification');
        $item->ingredients = request('item_ingredients');
        $item->nutrients = request('item_nutrients');
        $item->delivery = request('item_delivery');
        $item->meta_tag = request('item_metatag');
        $item->meta_keyword = request('item_metakeyword');
        $item->meta_description = request('item_metadescription');
        $item->save();

        $destinationPath = 'p_img/' . $item->id . '/';
        if (request('file') != null) {
            foreach (request('file') as $file) {
                $item_img = new ItemImages();
                $temp = time() . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $temp);
                $item_img->image = $temp;
                $item_img->item_master_id = $item->id;
                $item_img->save();
            }
        }

        $finalcat = request('category');
        if (request('category') != null) {
            for ($i = 0; $i < sizeof($finalcat); $i++) {
                $item_category = new ItemCategorymaster();
                $item_category->category_id = $finalcat[$i];
                $item_category->item_master_id = $item->id;
                $item_category->save();
            }
        }

        $count = count(request('unit')) / 6;
        $item_unit = request('unit');
        $u = 0;
        $k = 1;
        $p = 2;
        $s = 3;
        $q = 4;
        $pr = 5;
        for ($i = 0; $i < $count; $i++) {
            $price = new ItemPrice();
            $price->item_master_id = $item->id;
            $price->unit = $item_unit[$u].$item_unit[$k];
            $price->price = $item_unit[$p];
            $price->spl_price = $item_unit[$s];
            $price->qty = $item_unit[$q];
            $price->product_id = $item_unit[$pr];
            $price->save();
            $u = $pr+ 1;
            $k = $pr + 2;
            $p = $pr + 3;
            $s = $pr + 4;
            $q = $pr + 5;
            $pr = $pr + 6;
        }

        return redirect('items')->with('message', 'Product has been added');


        /* $directory='p_img/1';
         $success = File::deleteDirectory($directory);
         return 'success';*/


    }

    public function itemshow($id)
    {
        $findthis = $id;
        $all_items = ItemMaster::find($id);
        $all_items_price = ItemPrice::where(['item_master_id' => $findthis])->get();
        $all_items_cat = ItemCategorymaster::where(['item_master_id' => $findthis])->get();
        $all_items_image = ItemImages::where(['item_master_id' => $findthis])->get();
        return view('adminview.view_item', ['all_items' => $all_items, 'all_items_price' => $all_items_price, 'all_items_cat' => $all_items_cat, 'all_items_image' => $all_items_image]);

    }

    public function edit_item_show($id)
    {
        $findthis = $id;
        $allcat = Categorymaster::where(['is_active' => 1])->get();
        $all_items = ItemMaster::find($id);
        $all_items_price = ItemPrice::where(['item_master_id' => $findthis])->get();
        $all_items_cat = ItemCategorymaster::where(['item_master_id' => $findthis])->get();
        $all_items_image = ItemImages::where(['item_master_id' => $findthis])->get();
        $all_items_meta = itemMetamodel::where(['item_master_id' => $findthis])->get();
        return view('adminview.edit_item', ['all_items' => $all_items, 'all_items_price' => $all_items_price, 'all_items_cat' => $all_items_cat, 'all_items_image' => $all_items_image, 'allcat' => $allcat, 'all_items_meta' => $all_items_meta]);

    }

    public function deactivate_item()
    {
        /*  $reqidd=request('IDD');*/
        $data = array(
            'is_active' => '0'
        );
        ItemMaster::where('id', request('IDD'))
            ->update($data);
        return 1;

    }

    public function itemeditpost(Request $request)
    {


        $item_id = request('p_id');
        $item = ItemMaster::find($item_id);
        $item->name = request('p_name');
        $item->description = request('p_des');
        $item->usage = request('p_usage');
        $item->specifcation = request('p_spec');
        $item->ingredients = request('p_ingredent');
        $item->nutrients = request('p_nutrients');
        $item->delivery = request('p_delivery');
        $item->meta_tag = request('meta_tag');
        $item->meta_keyword = request('meta_key');
        $item->meta_description = request('meta_des');
        $item->save();
        /******************Unit/Qty/Price/Special Price********************/

        $item_unitoo = request('item_unit');
        if ($item_unitoo[0] != null) {
            ItemPrice::where('item_master_id', $item_id)->delete();
            $count = count(request('item_unit')) / 4;
            $item_unit = request('item_unit');
            $u = 0;
            $p = 1;
            $s = 2;
            $q = 3;
            for ($i = 0; $i < $count; $i++) {
                $price = new ItemPrice();
                $price->item_master_id = $item->id;
                $price->unit = $item_unit[$u];
                $price->price = $item_unit[$p];
                $price->spl_price = $item_unit[$s];
                $price->qty = $item_unit[$q];
                $price->save();
                $u = $q + 1;
                $p = $q + 2;
                $s = $q + 3;
                $q = $q + 4;
            }
        }

        /******************Unit/Qty/Price/Special Price********************/

        /******************Item Images********************/
        $destinationPath = 'p_img/' . $item->id . '/';
        if (request('images') != null) {
            ItemImages::where('item_master_id', $item_id)->delete();
            foreach (request('images') as $file) {
                $item_img = new ItemImages();
                $temp = time() . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $temp);
                $item_img->image = $temp;
                $item_img->item_master_id = $item->id;
                $item_img->save();
            }
        }
        /******************Item Images********************/


        /******************Category********************/
        $finalcat = request('category');
        if (request('category') != null) {
            ItemCategorymaster::where('item_master_id', $item_id)->delete();
            for ($i = 0; $i < sizeof($finalcat); $i++) {
                $item_category = new ItemCategorymaster();
                $item_category->category_id = $finalcat[$i];
                $item_category->item_master_id = $item->id;
                $item_category->save();
            }
        }


        /******************Category********************/

        return redirect('items')->with('message', 'Product has been updated');
    }
}