@extends('web.layouts.e_master')

@section('title', 'Organic Food : My Profile')

@section('head')
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })
        function checkIngredient(dis) {
            var curr_val = $(dis).find('option:selected').text();
            if (curr_val == 'Other') {
                $(dis).parent().hide();
                $(dis).parent().parent().find('.other_ingredientsbox').show();
            }
        }

        function showIngredient_dropdown(dis) {
            $(dis).parent().hide();
            $(dis).parent().parent().find('.ingredian_select_box').show();
            $(dis).parent().parent().find('.ingre_select').val("Select Ingredients");
        }

        function addmore_instruction(dis) {
            var append_moreinst = '<div class="instrutiondeli_row">\n' +
                '                                                    <textarea class="form-control instruction_area" id="txt_recp_banifits" name="address" placeholder="Instruction / Each Steps"></textarea>\n' +
                '                                        <div class="addmore close_more" onclick="closemore_more(this);">\n' +
                '                                            <i class="mdi mdi-close"></i>\n' +
                '                                        </div>\n' +
                '                                        </div>';
            $('#instruction_container').prepend(append_moreinst);//
        }

        function addmore_ingredient(dis) {
            var append_moreingredient = '  <div class="instrutiondeli_row">\n' +
                '                                                <div class="ingredian_select_box">\n' +
                '                                                    <select class="list-unstyled form-control ingre_select" onchange="checkIngredient(this);">\n' +
                '                                                        <option selected="" value="Select Ingredients">Select Ingredients</option>\n' +
                '                                                        <option value="1">Daal</option>\n' +
                '                                                        <option value="2">Chana</option>\n' +
                '                                                        <option value="3">Daliya</option>\n' +
                '                                                        <option value="4">Rice</option>\n' +
                '                                                        <option value="5">Flakes</option>\n' +
                '                                                        <option value="6">Honey</option>\n' +
                '                                                        <option value="7">Oil</option>\n' +
                '                                                        <option value="8">Other</option>\n' +
                '                                                    </select>\n' +
                '                                                    <input type="text" placeholder="Quantitiy" class="form-control ingre_qty_select">\n' +
                '                                                </div>\n' +
                '                                                <div class="other_ingredientsbox">\n' +
                '                                                    <input type="text" placeholder="Enter Ingredients" name="" id="txt_otr_ingredient" class="form-control">\n' +
                '                                                    <input type="text" placeholder="Quantitiy" name="" id="txt_otr_ingredient_qty" class="form-control ingre_qty">\n' +
                '                                                    <div class="close_ingradian_otr" onclick="showIngredient_dropdown(this);">\n' +
                '                                                        <i class="mdi mdi-close"></i>\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="addmore close_more" onclick="closemore_more(this);">\n' +
                '                                                    <i class="mdi mdi-close"></i>\n' +
                '                                                </div>\n' +
                '                                            </div>';
            $('#ingredients_container').prepend(append_moreingredient);
        }

        function closemore_more(dis) {
            $(dis).parent().remove();
        }

        function Recipe(form_req) {
            if (form_req == "new") {
                $('#Recipe_submit_box').slideDown();
                $('#my_Recipe').slideUp();
            } else {
                $('#Recipe_submit_box').slideUp();
                $('#my_Recipe').slideDown();
            }
        }
    </script>
@stop
@section('content')
    <section class="product_section">
        <div class="container res_pad0">
            <div class="col-sm-12 col-md-3">
                <div class="order_listbox">
                    {{-- <div class="carousal_head">
                         <span class="filter_head_txt slider_headtxt">My Profile</span>
                     </div>--}}
                    <div class="order_list_container">
                        <div class="my_profile_picshow">
                            <img src="http://localhost:8000/u_img/16/JkithH_prihul_mainlogo.png" id="_UserProfile"
                                 alt="UserProfile">
                            <div class="my_profile_name">Bijendra Sahu</div>
                        </div>
                        <hr>
                        <div class="menu_popup_settingrow">
                            <a class="menu_setting_row" href="{{url('my_profile')}}">
                                <i class="mdi mdi-account-edit"></i>
                                Edit Profile
                            </a>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a class="menu_setting_row" onclick="Recipe('list');">
                                <i class="mdi mdi-view-list"></i>
                                My Recipe List
                            </a>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a class="menu_setting_row" onclick="Recipe('new');">
                                <i class="mdi mdi-tooltip-edit"></i>
                                Add Recipe
                            </a>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a href="{{url('order_list')}}" class="menu_setting_row">
                                <i class="mdi mdi-format-list-checks"></i>
                                Order List
                            </a>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a href="{{url('product_feedback')}}" class="menu_setting_row">
                                <i class="mdi mdi-message-draw"></i>
                                Review &amp; Rating
                            </a>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a href="{{url('logout')}}" class="menu_setting_row">
                                <i class="mdi mdi-logout"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9">
                <div class="order_listbox">
                    <div id="Recipe_submit_box" style="display:block;">
                        <div class="carousal_head">
                            <span class="filter_head_txt slider_headtxt">Recipe Details</span>
                        </div>
                        <div class="order_list_container">
                            <form enctype="multipart/form-data" id="userpostForm" class="margin_bottom0">
                                <div class="order_details_box">
                                    <div class="deli_row">
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Recipe Title" name="title"
                                                   id="txt_recp_title"
                                                   class="form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Cooking Time" name="pincode"
                                                   id="txt_recp_time"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="deli_row">
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Serves how many people?" name="title"
                                                   class="form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-control">
                                                <option selected value="0">Difficult Level</option>
                                                <option value="1">Easy</option>
                                                <option value="2">Medium</option>
                                                <option value="3">Difficult</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="deli_row">
                                        <div class="col-sm-12">
                                            <textarea class="form-control glo_txtarea" name="address"
                                                      placeholder="Benefits"></textarea>
                                        </div>
                                    </div>
                                    <div class="instruction_container" id="ingredients_container">
                                        <div class="instrutiondeli_row">
                                            <div class="ingredian_select_box">
                                                <select class="list-unstyled form-control ingre_select"
                                                        onchange="checkIngredient(this);">
                                                    <option selected="" value="Select Ingredients">Select Ingredients
                                                    </option>
                                                    <option value="1">Daal</option>
                                                    <option value="2">Chana</option>
                                                    <option value="3">Daliya</option>
                                                    <option value="4">Rice</option>
                                                    <option value="5">Flakes</option>
                                                    <option value="6">Honey</option>
                                                    <option value="7">Oil</option>
                                                    <option value="8">Other</option>
                                                </select>
                                                <input type="text" placeholder="Quantitiy"
                                                       class="form-control ingre_qty_select">
                                            </div>
                                            <div class="other_ingredientsbox">
                                                <input type="text" placeholder="Enter Ingredients" name=""
                                                       id="txt_otr_ingredient" class="form-control">
                                                <input type="text" placeholder="Quantitiy" name=""
                                                       id="txt_otr_ingredient_qty" class="form-control ingre_qty">
                                                <div class="close_ingradian_otr"
                                                     onclick="showIngredient_dropdown(this);">
                                                    <i class="mdi mdi-close"></i>
                                                </div>
                                            </div>
                                            <div class="addmore" onclick="addmore_ingredient(this);">
                                                <i class="mdi mdi-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="instruction_container" id="instruction_container">
                                        <div class="instrutiondeli_row">
                                            <textarea class="form-control instruction_area" id="txt_recp_banifits"
                                                      name="address" placeholder="Instruction / Each Steps"></textarea>
                                            <div class="addmore" onclick="addmore_instruction(this);">
                                                <i class="mdi mdi-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="deli_row">
                                        <div class="col-sm-12">
                                            <label>Upload Recipe Image</label>
                                            <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" accept=".png,.jpg, .jpeg, .gif, media_type" id="imgInp" />
                </span>
            </span>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="address_btnbox">
                                    <button id="btn_add_new" type="button" class="btn btn-success pull-right"><i
                                                class="mdi mdi-tooltip-edit basic_icon_margin"></i>Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="my_Recipe" style="display: none">
                        <div class="carousal_head">
                            <span class="filter_head_txt slider_headtxt">My Recipe</span>
                        </div>
                        <div class="order_list_container" id="my_recipe_list">
                            <div class="my_recipe_row">
                                <div class="my_recipe_imgbox">
                                    <img class="my_rec_img" src="images/product_09.jpg">
                                </div>
                                <div class="my_recipe_details">
                                    <div class="product_name"><a>Paprika pork &amp; mushroom tagliatelle</a></div>
                                    <ul class="list-unstyled recipe_ul">
                                        <li>
                                            <div class="recipe_title">Cooking Time :</div>
                                            <div class="recipe_icon_txt">
                                                <i class="mdi mdi-watch basic_icon_margin"></i>12 Min
                                            </div>
                                        </li>
                                        <li>
                                            <div class="recipe_title">Serving :</div>
                                            <div class="recipe_icon_txt">
                                                <i class="mdi mdi-account basic_icon_margin"></i>05 People
                                            </div>
                                        </li>
                                        <li>
                                            <div class="recipe_title">Status :</div>
                                               <div class="status pending">Pending</div>
                                        </li>
                                        <li>
                                            <div class="recipe_title">Difficult Lavel :</div>
                                            <div class="recipe_icon_txt">
                                                <i class="mdi mdi-star-outline basic_icon_margin"></i>Easy
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="des_details">
                                        Nothing brings back childhood memories like frozen chocolate-covered bananas!
                                        Not only are these delicious but they are simple to make and they are on the
                                        healthier end of the dessert spectrum. Remember to consider the environment when
                                        making these and choose organic bananas.
                                    </div>
                                    <div class="myrecipe_btnbox">
                                        <button type="button" class="btn btn-default btn-sm pull-right"><i
                                                    class="mdi mdi-tooltip-edit basic_icon_margin"></i>View More
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm pull-right"><i
                                                    class="mdi mdi-delete basic_icon_margin"></i>Delete
                                        </button>
                                        <button onclick="Recipe('new');" type="button"
                                                class="btn btn-warning btn-sm pull-right"><i
                                                    class="mdi mdi-pencil basic_icon_margin"></i>Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="my_recipe_row">
                                <div class="my_recipe_imgbox">
                                    <img class="my_rec_img" src="images/product_10.jpg">
                                </div>
                                <div class="my_recipe_details">
                                    <div class="product_name"><a>Paprika pork &amp; mushroom tagliatelle</a></div>
                                    <ul class="list-unstyled recipe_ul">
                                        <li>
                                            <div class="recipe_title">Cooking Time :</div>
                                            <div class="recipe_icon_txt">
                                                <i class="mdi mdi-watch basic_icon_margin"></i>12 Min
                                            </div>
                                        </li>
                                        <li>
                                            <div class="recipe_title">Serving :</div>
                                            <div class="recipe_icon_txt">
                                                <i class="mdi mdi-account basic_icon_margin"></i>05 People
                                            </div>
                                        </li>
                                        <li>
                                            <div class="recipe_title">Status :</div>
                                                <div class="status approved">Approved</div>
                                        </li>
                                        <li>
                                            <div class="recipe_title">Difficult Lavel :</div>
                                            <div class="recipe_icon_txt">
                                                <i class="mdi mdi-star-outline basic_icon_margin"></i>Easy
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="des_details">
                                        Nothing brings back childhood memories like frozen chocolate-covered bananas!
                                        Not only are these delicious but they are simple to make and they are on the
                                        healthier end of the dessert spectrum. Remember to consider the environment when
                                        making these and choose organic bananas.
                                    </div>
                                    <div class="myrecipe_btnbox">
                                        <button type="button" class="btn btn-default btn-sm pull-right"><i
                                                    class="mdi mdi-tooltip-edit basic_icon_margin"></i>View More
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm pull-right"><i
                                                    class="mdi mdi-delete basic_icon_margin"></i>Delete
                                        </button>
                                        <button onclick="Recipe('new');" type="button"
                                                class="btn btn-warning btn-sm pull-right"><i
                                                    class="mdi mdi-pencil basic_icon_margin"></i>Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="my_recipe_row">
                                <div class="my_recipe_imgbox">
                                    <img class="my_rec_img" src="images/product_11.jpg">
                                </div>
                                <div class="my_recipe_details">
                                    <div class="product_name"><a>Paprika pork &amp; mushroom tagliatelle</a></div>
                                    <ul class="list-unstyled recipe_ul">
                                        <li>
                                            <div class="recipe_title">Cooking Time :</div>
                                            <div class="recipe_icon_txt">
                                                <i class="mdi mdi-watch basic_icon_margin"></i>12 Min
                                            </div>
                                        </li>
                                        <li>
                                            <div class="recipe_title">Serving :</div>
                                            <div class="recipe_icon_txt">
                                                <i class="mdi mdi-account basic_icon_margin"></i>05 People
                                            </div>
                                        </li>
                                        <li>
                                            <div class="recipe_title">Status :</div>
                                                <div class="status rejected">Rejected</div>
                                                <div class="mdi mdi-help-circle reason_help" data-toggle="tooltip" data-placement="bottom" title="Please enter relivent content for recipe Please enter relivent content for recipe Please enter relivent content for recipe."></div>
                                        </li>
                                        <li>
                                            <div class="recipe_title">Difficult Lavel :</div>
                                            <div class="recipe_icon_txt">
                                                <i class="mdi mdi-star-outline basic_icon_margin"></i>Easy
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="des_details">
                                        Nothing brings back childhood memories like frozen chocolate-covered bananas!
                                        Not only are these delicious but they are simple to make and they are on the
                                        healthier end of the dessert spectrum. Remember to consider the environment when
                                        making these and choose organic bananas.
                                    </div>
                                    <div class="myrecipe_btnbox">
                                        <button type="button" class="btn btn-default btn-sm pull-right"><i
                                                    class="mdi mdi-tooltip-edit basic_icon_margin"></i>View More
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm pull-right"><i
                                                    class="mdi mdi-delete basic_icon_margin"></i>Delete
                                        </button>
                                        <button onclick="Recipe('new');" type="button"
                                                class="btn btn-warning btn-sm pull-right"><i
                                                    class="mdi mdi-pencil basic_icon_margin"></i>Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="my_recipe_norecord">No recipe added by you.</br>
                                <div class="address_btnbox margin_top15">
                                    <button onclick="Recipe('new');" type="button" class="btn btn-success"><i class="mdi mdi-tooltip-edit basic_icon_margin"></i>Add Recipe
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('web.layouts.footer')
@stop