@extends('web.layouts.e_master')

@section('title', 'Organic Food : My Recipe')

@section('head')

    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            checkRecipeTab();
        });
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
                '                                                    <select class="list-unstyled form-control ingre_select" onchange="checkIngredient(this);" name="ingredient[]">\n' +
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
                '                                                    <input type="text" placeholder="Quantity" class="form-control ingre_qty_select"  name="quantity[]">\n' +
                '                                                </div>\n' +
                '                                                <div class="other_ingredientsbox">\n' +
                '                                                    <input type="text" placeholder="Enter Ingredients" name="" id="txt_otr_ingredient" class="form-control" name="otr_ingredient[]" >\n' +
                '                                                    <input type="text" placeholder="Quantity" name="" id="txt_otr_ingredient_qty" class="form-control ingre_qty" name="otr_ingredient_qty[]" >\n' +
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
            debugger;
            if (form_req == "new") {
//                alert('this new');
                $('#Recipe_submit_box').slideDown();
                $('#my_Recipe').slideUp();
            } else {
//                alert('this list');

                $('#Recipe_submit_box').slideUp();
                $('#my_Recipe').slideDown();
            }
        }
        function checkRecipeTab() {
            var tabname = $('#recipe_type').val();
            Recipe(tabname);
        }

    </script>
@stop
@section('content')
    <input type="text" id="recipe_type" value="{{$type}}"/>
    <section class="product_section">
        <div class="container res_pad0">
            <div class="col-sm-12 col-md-3">
                <div class="order_listbox">
                    {{-- <div class="carousal_head">
                         <span class="filter_head_txt slider_headtxt">My Profile</span>
                     </div>--}}
                    <div class="order_list_container">
                        <div class="my_profile_picshow">
                            @if($user->profile_img != 'images/Male_default.png')
                                <img src="{{url('u_img').'/'.$user->id.'/'.$user->profile_img}}" id="_UserProfile"
                                     alt="UserProfile">
                            @else
                                <img src="{{url('images/Male_default.png')}}" id="_UserProfile" alt="UserProfile">
                            @endif
                            <div class="my_profile_name">{{$user->name}}</div>
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
                            <form enctype="multipart/form-data" action="{{url('recipe_store')}}" id="userpostForm" method="post"
                                  class="margin_bottom0">
                                <div class="order_details_box">
                                    <div class="deli_row">
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Recipe Title*" name="recipe_title"
                                                   id="txt_recp_title"
                                                   class="form-control required">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="number" placeholder="Cooking Time* Eg. 30:00 Min / 1:30 Min"
                                                   name="cooking_time" id="txt_recp_time" class="form-control required">
                                        </div>
                                    </div>
                                    <div class="deli_row">
                                        <div class="col-sm-6">
                                            <input type="text" minlength="1" maxlength="3"
                                                   placeholder="Serves how many people?*" name="serve_count"
                                                   class="form-control numberOnly required">
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-control requiredDD" name="difficulty_level">
                                                <option selected value="0" >Difficulty Level*</option>
                                                <option value="Easy">Easy</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Difficult">Difficult</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="deli_row">
                                        <div class="col-sm-12">
                                            <textarea class="form-control glo_txtarea required" name="benefits"
                                                      placeholder="Benefits*"></textarea>
                                        </div>
                                    </div>
                                    <div class="instruction_container" id="ingredients_container">
                                        <div class="instrutiondeli_row">
                                            <div class="ingredian_select_box">
                                                <select class="list-unstyled form-control requiredDD ingre_select"
                                                        name="ingredient[]"
                                                        onchange="checkIngredient(this);">
                                                    <option selected="" value="0">Select Ingredients*
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
                                                <input type="text" placeholder="Quantity*" name="quantity[]"
                                                       class="form-control required ingre_qty_select">
                                            </div>
                                            <div class="other_ingredientsbox">
                                                <input type="text" placeholder="Enter Ingredients" name="otr_ingredient[]"
                                                       id="txt_otr_ingredient" class="form-control">
                                                <input type="text" placeholder="Quantity" name="otr_ingredient_qty[]"
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
                                            <textarea class="form-control instruction_area required"
                                                      id="txt_recp_banifits"
                                                      name="instruction[]"
                                                      placeholder="Instruction / Each Steps*"></textarea>
                                            <div class="addmore" onclick="addmore_instruction(this);">
                                                <i class="mdi mdi-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="deli_row">
                                        <div class="col-sm-12">
                                            <label>Upload Recipe Image*</label>
                                            <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" name="image" accept=".png,.jpg, .jpeg, .gif, media_type" id="imgInp"/>
                </span>
            </span>
                                                <input type="text" class="form-control margin_bottom0" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="address_btnbox">
                                    <button id="btn_add_new" type="submit" class="btn btn-success pull-right"><i
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
                            @if(count($recipes)>0)
                                @foreach($recipes as $recipe)
                                    <div class="my_recipe_row">
                                        <div class="my_recipe_imgbox">
                                            <img class="my_rec_img" src="{{url('').'/'.$recipe->image}}">
                                        </div>
                                        <div class="my_recipe_details">
                                            <div class="product_name"><a>{{$recipe->title}}</a>
                                            </div>
                                            <ul class="list-unstyled recipe_ul">
                                                <li>
                                                    <div class="recipe_title">Cooking Time :</div>
                                                    <div class="recipe_icon_txt">
                                                        <i class="mdi mdi-watch basic_icon_margin"></i>{{$recipe->cooking_time}} Min
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="recipe_title">Serving :</div>
                                                    <div class="recipe_icon_txt">
                                                        <i class="mdi mdi-account basic_icon_margin"></i>{{$recipe->serve_count}}
                                                        People
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="recipe_title">Status :</div>
                                                    @if($recipe->is_approved == 'pending')
                                                        <div class="status pending">Pending</div>
                                                    @elseif($recipe->is_approved == 'approved')
                                                        <div class="status approved">Approved</div>
                                                    @else
                                                        <div class="status rejected">Rejected</div>
                                                        <div class="mdi mdi-help-circle reason_help"
                                                             data-toggle="tooltip"
                                                             data-placement="bottom"
                                                             title="{{$recipe->reject_reason}}"></div>
                                                    @endif
                                                </li>
                                                <li>
                                                    <div class="recipe_title">Difficult Level :</div>
                                                    <div class="recipe_icon_txt">
                                                        <i class="mdi mdi-star-outline basic_icon_margin"></i>{{$recipe->difficulty_level}}</div>
                                                </li>

                                            </ul>
                                            <div class="des_details">
                                                {{$recipe->desciption}}
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
                                @endforeach

                            @else
                                <div class="my_recipe_norecord">No recipe added by you.</br>
                                    <div class="address_btnbox margin_top15">
                                        <button onclick="Recipe('new');" type="button" class="btn btn-success"><i
                                                    class="mdi mdi-tooltip-edit basic_icon_margin"></i>Add Recipe
                                        </button>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('web.layouts.footer')
@stop