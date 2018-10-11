@extends('web.layouts.e_master')

@section('title', 'Organic Dolchi : My Wishlist')

@section('head')
    <style type="text/css">

    </style>
@stop
@section('content')
    <section class="product_section">
        <div class="container-fluid res_pad0" id="profile_section">
            <div class="col-sm-12 col-md-3" >
                <div class="order_listbox wishlist_profile" id="profile_container">
                    <div class="carousal_head">
                        <span class="filter_head_txt slider_headtxt">My Profile</span>
                    </div>
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
                        {{--  <div class="menu_popup_settingrow">
                              <a class="menu_setting_row" onclick="ShowAddress();">
                                  <i class="mdi mdi-map-marker"></i>
                                  Manage Address
                              </a>
                          </div>--}}
                        <div class="menu_popup_settingrow">
                            <a href="{{url('myrecipe?type=list')}}" class="menu_setting_row">
                                <i class="mdi mdi-view-list"></i>
                                My Recipe List
                            </a>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a href="{{url('myrecipe?type=new')}}" class="menu_setting_row">
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
                        {{--<div onclick="ChangePasswordShow();" class="menu_popup_settingrow"--}}
                        {{--data-target="#myModal_UpdatePassword" data-toggle="modal">--}}
                        {{--<a class="menu_setting_row" href="#">--}}
                        {{--<i class="mdi mdi-lock-open-outline"></i>--}}
                        {{--Change Password--}}
                        {{--</a>--}}
                        {{--</div>--}}
                        <div class="menu_popup_settingrow border_none">
                            <a href="{{url('logout')}}" class="menu_setting_row">
                                <i class="mdi mdi-logout"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 res_ml_pad0">
                <div class="view_headbox">
                    <div class="responsive_show" onclick="Showres_search();"><i class="mdi mdi-magnify"></i>
                    </div>
                    <div class="responsive_show" onclick="ShowMenu();"><i class="mdi mdi-menu"></i>
                    </div>
                    <div class="product_searchbox" id="product_wise_search">
                        {{--<div class="search_filter">--}}
                        {{--<input type="text" class="main_filter_search" id="Search_by_product"--}}
                        {{--placeholder="Search by product">--}}
                        {{--<div class="filter_search_icon">--}}
                        {{--<i class="mdi mdi-magnify"></i>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <div class="back_search_btn" onclick="Hideres_search();"><i class="mdi mdi-arrow-left"></i>
                        </div>
                        <div class="product_search_box">
                            <input type="text" class="header_search" autocomplete="off" onautocomplete="false"
                                   placeholder="Search by product" onkeyup="HeaderSearchFilter(this);">
                            <input type="hidden" name="search" id="search_user_id">
                            <i class="product_search_icon mdi mdi-magnify"></i>
                            <div class="search_filter_box scale0">
                                <div class="no_record_found hidden" id="no_record">
                                    &lt; No Friend Found &gt;
                                </div>
                                <ul class="filter_search_ul style-scroll" id="filter_friend_ul">
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/p_img/269/1535028253_chyawanprash.jpg"
                                                 class="head_filter_img">
                                            <div class="name_filter">Chyawanprash</div>
                                        </a>
                                    </li>
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/p_img/181/1535026492_91nXnlS3HQL._AC_UL320_SR256,320_.jpg"
                                                 class="head_filter_img">
                                            <div class="name_filter">Risa dhosa mix</div>
                                        </a>
                                    </li>
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/p_img/183/1535026181_rava idli mix.jpg"
                                                 class="head_filter_img">
                                            <div class="name_filter">Rava idli mix</div>
                                        </a>
                                    </li>
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/p_img/184/1535027762_coffee powder smooth.jpg"
                                                 class="head_filter_img">
                                            <div class="name_filter">Coffee powder smooth</div>
                                        </a>
                                    </li>
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/p_img/242/1535027510_sunab soft black hair color.jpg"
                                                 class="head_filter_img">
                                            <div class="name_filter">sunab soft black hair color</div>
                                        </a>
                                    </li>
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/p_img/243/1535027128_sunab-natural-dark-brown-500x500.jpg"
                                                 class="head_filter_img">
                                            <div class="name_filter">Sunab Natural Dark brown</div>
                                        </a>
                                    </li>
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/p_img/252/1535026878_organic henna powder.jpg"
                                                 class="head_filter_img">
                                            <div class="name_filter">organic henna powder</div>
                                        </a>
                                    </li>
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/images/default.png"
                                                 class="head_filter_img">
                                            <div class="name_filter">Indego Lief Powder</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="viewtype_block pull-right">
                        <div class="viewtype_txt">View</div>
                        <div class="type_brics brics_selected" onclick="show_view(this , 'grid');" data-toggle="tooltip"
                             data-placement="top" title="Grid View"><i
                                    class="mdi mdi-view-grid"></i></div>
                        <div class="type_brics" onclick="show_view(this, 'list');" data-toggle="tooltip"
                             data-placement="top" title="List View"><i class="mdi mdi-view-list"></i>
                        </div>
                    </div>
                </div>
                <div class="wishlist_container" id="wishlist_all">
                    <div class="product_block">
                        <div class="product_name"><a class="product_details_link" href="http://localhost:8000/view_product/eyJpdiI6IlwvYTdab1ZQSzBoWTg5cTRLeUtGSCtnPT0iLCJ2YWx1ZSI6IjV5cEFcL3NicVBUa3F0NGdqdWpFbzR3PT0iLCJtYWMiOiI2ODI5NmIzMjVjOTUzNDNhMDhiMjFjNDY2NDMyMDFjMzAyNjBmMDkxYTdlNDdkODU0OTk1YTljMWIwNjJhZTk3In0=">Chicken Masala</a>
                        </div>
                        <div class="product_wish" onclick="removewishlist(this);" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <div class="long_product_img">
                            <img src="http://localhost:8000/images/default.png">
                            <div class="hover_center_block" id="281" onclick="getItemDetails(this);" data-toggle="modal" data-target="#Modal_ViewProductDetails">
                                <div class="product_hover_block">
                                    <div class="mdi mdi-magnify"></div>
                                </div>
                            </div>
                        </div>
                        <div class="long_spinner_withbtn">
                            <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_281" data-content="339">100 Gms
                            - 159</span>
                                <input type="number" class="form-control text-center qty_edittxt" min="1" max="1" value="1" id="qty_load_281">
                            </div>
                            <button class="spinner_addcardbtn btn-primary" id="281" type="button" data-content="339" onclick="AddTOcart_load(this);">
                                <i class="mdi mdi-basket"></i> <span class="button-group_text">Add</span>
                            </button>
                        </div>

                        <div class="basic_description  line_4">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                            type
                            and scrambled it to make a type specimen book.
                        </div>

                    </div>
                    <div class="product_block">
                        <div class="product_name"><a class="product_details_link" href="http://localhost:8000/view_product/eyJpdiI6IlwvYTdab1ZQSzBoWTg5cTRLeUtGSCtnPT0iLCJ2YWx1ZSI6IjV5cEFcL3NicVBUa3F0NGdqdWpFbzR3PT0iLCJtYWMiOiI2ODI5NmIzMjVjOTUzNDNhMDhiMjFjNDY2NDMyMDFjMzAyNjBmMDkxYTdlNDdkODU0OTk1YTljMWIwNjJhZTk3In0=">Chicken Masala</a>
                        </div>
                        <div class="product_wish" onclick="AddtoWishlist(this);" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <div class="long_product_img">
                            <img src="http://localhost:8000/images/default.png">
                            <div class="hover_center_block" id="281" onclick="getItemDetails(this);" data-toggle="modal" data-target="#Modal_ViewProductDetails">
                                <div class="product_hover_block">
                                    <div class="mdi mdi-magnify"></div>
                                </div>
                            </div>
                        </div>

                        <div class="long_spinner_withbtn">
                            <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_281" data-content="339">100 Gms
                            - 159</span>
                                <input type="number" class="form-control text-center qty_edittxt" min="1" max="1" value="1" id="qty_load_281">
                            </div>
                            <button class="spinner_addcardbtn btn-primary" id="281" type="button" data-content="339" onclick="AddTOcart_load(this);">
                                <i class="mdi mdi-basket"></i> <span class="button-group_text">Add</span>
                            </button>
                        </div>
                        <div class="long_spinner_withbtn">
                            <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_281" data-content="339">100 Gms
                            - 159</span>
                                <input type="number" class="form-control text-center qty_edittxt" min="1" max="1" value="1" id="qty_load_281">
                            </div>
                            <button class="spinner_addcardbtn btn-primary" id="281" type="button" data-content="339" onclick="AddTOcart_load(this);">
                                <i class="mdi mdi-basket"></i> <span class="button-group_text">Add</span>
                            </button>
                        </div><div class="long_spinner_withbtn">
                            <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_281" data-content="339">100 Gms
                            - 159</span>
                                <input type="number" class="form-control text-center qty_edittxt" min="1" max="1" value="1" id="qty_load_281">
                            </div>
                            <button class="spinner_addcardbtn btn-primary" id="281" type="button" data-content="339" onclick="AddTOcart_load(this);">
                                <i class="mdi mdi-basket"></i> <span class="button-group_text">Add</span>
                            </button>
                        </div>

                        <div class="basic_description  line_1">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                            type
                            and scrambled it to make a type specimen book.
                        </div>

                    </div>
                    <div class="product_block">
                        <div class="product_name"><a class="product_details_link" href="http://localhost:8000/view_product/eyJpdiI6IlwvYTdab1ZQSzBoWTg5cTRLeUtGSCtnPT0iLCJ2YWx1ZSI6IjV5cEFcL3NicVBUa3F0NGdqdWpFbzR3PT0iLCJtYWMiOiI2ODI5NmIzMjVjOTUzNDNhMDhiMjFjNDY2NDMyMDFjMzAyNjBmMDkxYTdlNDdkODU0OTk1YTljMWIwNjJhZTk3In0=">Chicken Masala</a>
                        </div>
                        <div class="product_wish" onclick="AddtoWishlist(this);" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <div class="long_product_img">
                            <img src="http://localhost:8000/images/default.png">
                            <div class="hover_center_block" id="281" onclick="getItemDetails(this);" data-toggle="modal" data-target="#Modal_ViewProductDetails">
                                <div class="product_hover_block">
                                    <div class="mdi mdi-magnify"></div>
                                </div>
                            </div>
                        </div>
                        <div class="long_spinner_withbtn">
                            <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_281" data-content="339">100 Gms
                            - 159</span>
                                <input type="number" class="form-control text-center qty_edittxt" min="1" max="1" value="1" id="qty_load_281">
                            </div>
                            <button class="spinner_addcardbtn btn-primary" id="281" type="button" data-content="339" onclick="AddTOcart_load(this);">
                                <i class="mdi mdi-basket"></i> <span class="button-group_text">Add</span>
                            </button>
                        </div>
                        <div class="long_spinner_withbtn">
                            <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_281" data-content="339">100 Gms
                            - 159</span>
                                <input type="number" class="form-control text-center qty_edittxt" min="1" max="1" value="1" id="qty_load_281">
                            </div>
                            <button class="spinner_addcardbtn btn-primary" id="281" type="button" data-content="339" onclick="AddTOcart_load(this);">
                                <i class="mdi mdi-basket"></i> <span class="button-group_text">Add</span>
                            </button>
                        </div>


                        <div class="basic_description  line_3">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                            type
                            and scrambled it to make a type specimen book.
                        </div>

                    </div>
                    <div class="product_block">
                        <div class="product_name"><a class="product_details_link" href="http://localhost:8000/view_product/eyJpdiI6IlwvYTdab1ZQSzBoWTg5cTRLeUtGSCtnPT0iLCJ2YWx1ZSI6IjV5cEFcL3NicVBUa3F0NGdqdWpFbzR3PT0iLCJtYWMiOiI2ODI5NmIzMjVjOTUzNDNhMDhiMjFjNDY2NDMyMDFjMzAyNjBmMDkxYTdlNDdkODU0OTk1YTljMWIwNjJhZTk3In0=">Chicken Masala</a>
                        </div>
                        <div class="product_wish" onclick="AddtoWishlist(this);" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <div class="long_product_img">
                            <img src="http://localhost:8000/images/default.png">
                            <div class="hover_center_block" id="281" onclick="getItemDetails(this);" data-toggle="modal" data-target="#Modal_ViewProductDetails">
                                <div class="product_hover_block">
                                    <div class="mdi mdi-magnify"></div>
                                </div>
                            </div>
                        </div>
                        <div class="long_spinner_withbtn">
                            <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_281" data-content="339">100 Gms
                            - 159</span>
                                <input type="number" class="form-control text-center qty_edittxt" min="1" max="1" value="1" id="qty_load_281">
                            </div>
                            <button class="spinner_addcardbtn btn-primary" id="281" type="button" data-content="339" onclick="AddTOcart_load(this);">
                                <i class="mdi mdi-basket"></i> <span class="button-group_text">Add</span>
                            </button>
                        </div>
                        <div class="long_spinner_withbtn">
                            <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_281" data-content="339">100 Gms
                            - 159</span>
                                <input type="number" class="form-control text-center qty_edittxt" min="1" max="1" value="1" id="qty_load_281">
                            </div>
                            <button class="spinner_addcardbtn btn-primary" id="281" type="button" data-content="339" onclick="AddTOcart_load(this);">
                                <i class="mdi mdi-basket"></i> <span class="button-group_text">Add</span>
                            </button>
                        </div>


                        <div class="long_spinner_withbtn">
                            <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_281" data-content="339">100 Gms
                            - 159</span>
                                <input type="number" class="form-control text-center qty_edittxt" min="1" max="1" value="1" id="qty_load_281">
                            </div>
                            <button class="spinner_addcardbtn btn-primary" id="281" type="button" data-content="339" onclick="AddTOcart_load(this);">
                                <i class="mdi mdi-basket"></i> <span class="button-group_text">Add</span>
                            </button>
                        </div>
                        <div class="long_spinner_withbtn">
                            <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_281" data-content="339">100 Gms
                            - 159</span>
                                <input type="number" class="form-control text-center qty_edittxt" min="1" max="1" value="1" id="qty_load_281">
                            </div>
                            <button class="spinner_addcardbtn btn-primary" id="281" type="button" data-content="339" onclick="AddTOcart_load(this);">
                                <i class="mdi mdi-basket"></i> <span class="button-group_text">Add</span>
                            </button>
                        </div>

                    </div>
                    <div class="product_block">
                        <div class="product_name"><a class="product_details_link" href="http://localhost:8000/view_product/eyJpdiI6IlwvYTdab1ZQSzBoWTg5cTRLeUtGSCtnPT0iLCJ2YWx1ZSI6IjV5cEFcL3NicVBUa3F0NGdqdWpFbzR3PT0iLCJtYWMiOiI2ODI5NmIzMjVjOTUzNDNhMDhiMjFjNDY2NDMyMDFjMzAyNjBmMDkxYTdlNDdkODU0OTk1YTljMWIwNjJhZTk3In0=">Chicken Masala</a>
                        </div>
                        <div class="product_wish" onclick="AddtoWishlist(this);" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <div class="long_product_img">
                            <img src="http://localhost:8000/images/default.png">
                            <div class="hover_center_block" id="281" onclick="getItemDetails(this);" data-toggle="modal" data-target="#Modal_ViewProductDetails">
                                <div class="product_hover_block">
                                    <div class="mdi mdi-magnify"></div>
                                </div>
                            </div>
                        </div>
                        <div class="long_spinner_withbtn">
                            <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_281" data-content="339">100 Gms
                            - 159</span>
                                <input type="number" class="form-control text-center qty_edittxt" min="1" max="1" value="1" id="qty_load_281">
                            </div>
                            <button class="spinner_addcardbtn btn-primary" id="281" type="button" data-content="339" onclick="AddTOcart_load(this);">
                                <i class="mdi mdi-basket"></i> <span class="button-group_text">Add</span>
                            </button>
                        </div>



                        <div class="basic_description  line_4">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                            type
                            and scrambled it to make a type specimen book.
                        </div>

                    </div>
                    <div class="product_block">
                        <div class="product_name"><a class="product_details_link" href="http://localhost:8000/view_product/eyJpdiI6IlwvYTdab1ZQSzBoWTg5cTRLeUtGSCtnPT0iLCJ2YWx1ZSI6IjV5cEFcL3NicVBUa3F0NGdqdWpFbzR3PT0iLCJtYWMiOiI2ODI5NmIzMjVjOTUzNDNhMDhiMjFjNDY2NDMyMDFjMzAyNjBmMDkxYTdlNDdkODU0OTk1YTljMWIwNjJhZTk3In0=">Chicken Masala</a>
                        </div>
                        <div class="product_wish" onclick="AddtoWishlist(this);" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="mdi mdi-delete"></i>
                        </div>
                        <div class="long_product_img">
                            <img src="http://localhost:8000/images/default.png">
                            <div class="hover_center_block" id="281" onclick="getItemDetails(this);" data-toggle="modal" data-target="#Modal_ViewProductDetails">
                                <div class="product_hover_block">
                                    <div class="mdi mdi-magnify"></div>
                                </div>
                            </div>
                        </div>
                        <div class="long_spinner_withbtn">
                            <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_281" data-content="339">100 Gms
                            - 159</span>
                                <input type="number" class="form-control text-center qty_edittxt" min="1" max="1" value="1" id="qty_load_281">
                            </div>
                            <button class="spinner_addcardbtn btn-primary" id="281" type="button" data-content="339" onclick="AddTOcart_load(this);">
                                <i class="mdi mdi-basket"></i> <span class="button-group_text">Add</span>
                            </button>
                        </div>
                        <div class="long_spinner_withbtn">
                            <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_281" data-content="339">100 Gms
                            - 159</span>
                                <input type="number" class="form-control text-center qty_edittxt" min="1" max="1" value="1" id="qty_load_281">
                            </div>
                            <button class="spinner_addcardbtn btn-primary" id="281" type="button" data-content="339" onclick="AddTOcart_load(this);">
                                <i class="mdi mdi-basket"></i> <span class="button-group_text">Add</span>
                            </button>
                        </div>


                        <div class="basic_description  line_3">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                            type
                            and scrambled it to make a type specimen book.
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <p id="err1"></p>
    </section>
    <div class="filter_overlay" id="overlay_div" onclick="HideMenu()"></div>
    @include('web.layouts.footer')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.header_search').keydown(function (e) {
                if ($(this).parent().find('.header_filter_row').length > 0) {
                    var po = $(this).parent().find('#filter_friend_ul').scrollTop();
                    var key = Number(e.keyCode);
                    //var count = 0;
                    var lenPress = Number($(this).parent().find('.P_pressed').length);
                    var lenCoun = Number($(this).parent().find('.header_filter_row:visible').length);
                    switch (key) {
                        case 13:
                            $('.search_filter_box').addClass('scale0');
                            $('#onpage_loader').show();
                            window.location = $(this).parent().find('.P_pressed a').attr('href');
                            return false;
                            break;
                        case 38:
                            if (lenPress == 0) {
                                $(this).parent().find('.header_filter_row:visible').last().attr('class', 'P_pressed');
                                $(this).parent().find('#filter_friend_ul').scrollTop($(this).parent().find('#filter_friend_ul').prop('scrollHeight'));
                            } else {
                                var PrevNum = Number($(this).parent().find('.P_pressed').prev('.header_filter_row:visible').length);
                                if (PrevNum == 0) {
                                    $(this).parent().find('.header_filter_row:visible').last().attr('class', 'P_pressed');
                                    $(this).parent().find('.P_pressed').first().attr('class', 'header_filter_row');
                                    $(this).parent().find('#filter_friend_ul').scrollTop($(this).parent().find('#filter_friend_ul').prop('scrollHeight'));
                                } else {
                                    $(this).parent().find('.P_pressed').prev().attr('class', 'P_pressed');
                                    $(this).parent().find('.P_pressed').last().attr('class', 'header_filter_row');
                                    $(this).parent().find('#filter_friend_ul').scrollTop(po - 40);
                                }
                            }
                            var v38 = $(this).parent().find('.P_pressed').text();
                            //$(this).val(v38);
                            break;
                        case 40:
                            var len40 = Number($(this).parent().find('.P_pressed').length);
                            if (len40 == 0) {
                                $(this).parent().find('.header_filter_row:visible').first().attr('class', 'P_pressed');
                            } else {
                                var inLen40 = Number($(this).parent().find('.P_pressed').first().next().length);
                                if (inLen40 == 0) {
                                    var coulen40 = Number($(this).parent().find('.header_filter_row:visible').length);
                                    if (coulen40 != 0) {
                                        $(this).parent().find('.P_pressed').attr('class', 'header_filter_row');
                                        $(this).parent().find('.header_filter_row:visible').first().attr('class', 'P_pressed');
                                        $(this).parent().find('#filter_friend_ul').scrollTop(0);
                                    }
                                } else {
                                    var outLen40 = Number($(this).parent().find('.P_pressed').first().next('.header_filter_row:visible').length);
                                    if (outLen40 == 0) {
                                        $(this).parent().find('.P_pressed').attr('class', 'header_filter_row');
                                        $(this).parent().find('.header_filter_row:visible').first().attr('class', 'P_pressed');
                                        $(this).parent().find('#filter_friend_ul').scrollTop(0);
                                    } else {
                                        $(this).parent().find('.P_pressed').first().next().attr('class', 'P_pressed');
                                        $(this).parent().find('.P_pressed').first().attr('class', 'header_filter_row');
                                        $(this).parent().find('#filter_friend_ul').scrollTop(po + 40);
                                    }
                                }
                            }
                            var v40 = $(this).parent().find('.P_pressed').text();
                            //$(this).val(v40);
                            break;
                    }
                }
            });
        });
        function HeaderSearchFilter(dis) {
            var ser_val = $(dis).val().length;
            var text = $(dis).val();
            if (ser_val > 0) {
                $(dis).parent().find('.search_filter_box').removeClass('scale0');
            } else {
                $(dis).parent().find('.search_filter_box').addClass('scale0');
            }
        }
        function show_view(dis, view_type) {
            $('.type_brics').removeClass('brics_selected');
            if (view_type == 'list') {
                $('#wishlist_all').addClass('view_by_list');
                $(dis).addClass('brics_selected');
            } else {
                $('#wishlist_all').removeClass('view_by_list');
                $(dis).addClass('brics_selected');
            }
        }
        function Showres_search() {
            $('#product_wise_search').addClass('product_searchbox_resshow');
        }
        function Hideres_search() {
            $('#product_wise_search').removeClass('product_searchbox_resshow');
        }
        function ShowMenu() {
            $('#overlay_div').show();
            $('#profile_container').addClass('wishlist_profile_show');
        }
        function HideMenu() {
            $('#overlay_div').hide();
            $('#profile_container').removeClass('wishlist_profile_show');
        }
    </script>
    {{--<div class="col-sm-12 col-md-9" style="display: none">--}}
    {{--<div class="order_listbox">--}}
    {{--<div class="carousal_head">--}}
    {{--<span class="filter_head_txt slider_headtxt">My Wishlist 03</span>--}}
    {{--</div>--}}
    {{--<div class="order_list_container">--}}
    {{--<div class="order_row border-none">--}}

    {{--<div class="order_details_box">--}}
    {{--<div class="col-sm-8 res_pad0">--}}
    {{--<div class="productdetails_order_row">--}}
    {{--<div class="order_product_imgbox">--}}
    {{--<img src="http://localhost:8000/images/default.png" alt="Organic product">--}}

    {{--</div>--}}
    {{--<div class="product_name">--}}
    {{--<a class="cart_product_name" title="Chicken Masala" href="http://localhost:8000/view_product/eyJpdiI6ImxHWXNRa0p6bDNpUHpuenZIN2R6SGc9PSIsInZhbHVlIjoiVURXc0hVZHk2b0JWZFwvaWM4MWtwOEE9PSIsIm1hYyI6ImIyMTcxNjdiMWNiNTMyODc0NmRmZDQ5YzMzNzUxNzk4NGU4ZjY3MjdjNmY2MWU2YzY5ZmM2ZTRhNGEyOTEyNjAifQ==">Chicken--}}
    {{--Masala</a>--}}
    {{--</div>--}}
    {{--<div class="option_availability">--}}
    {{--<div class="option_txt">Special Price :</div>--}}
    {{--<div class="product_right_txt">--}}
    {{-----}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="option_availability">--}}
    {{--<div class="option_txt">Quantity :</div>--}}
    {{--<div class="product_right_txt">--}}
    {{--1--}}
    {{--</div>--}}
    {{--</div>--}}


    {{--<div class="wishlist_row">--}}
    {{--<div class="rating_box">--}}
    {{--<div class="star_with_txt">--}}
    {{--<i class="mdi mdi-star"></i>0.0--}}
    {{--</div>--}}
    {{--0 Ratings--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-4 res_pad0">--}}
    {{--<div class="wish_rightcontainer">--}}
    {{--<div class="order_amt"><i class="mdi mdi-currency-inr"></i> 159.00--}}
    {{--</div>--}}
    {{--<div class="wishlist_row">--}}
    {{--<a class="btn btn-success btn-sm" href="http://localhost:8000/product_list"><i class="mdi mdi-basket basic_icon_margin"></i>Add to card</a>--}}
    {{--<a class="btn btn-danger pull-right btn-sm" href="http://localhost:8000/checkout"><i class="mdi mdi-delete basic_icon_margin"></i>Remove</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="order_details_box">--}}
    {{--<div class="col-sm-8 res_pad0">--}}
    {{--<div class="productdetails_order_row">--}}
    {{--<div class="order_product_imgbox">--}}
    {{--<img src="http://localhost:8000/images/default.png" alt="Organic product">--}}

    {{--</div>--}}
    {{--<div class="product_name">--}}
    {{--<a class="cart_product_name" title="Chicken Masala" href="http://localhost:8000/view_product/eyJpdiI6ImxHWXNRa0p6bDNpUHpuenZIN2R6SGc9PSIsInZhbHVlIjoiVURXc0hVZHk2b0JWZFwvaWM4MWtwOEE9PSIsIm1hYyI6ImIyMTcxNjdiMWNiNTMyODc0NmRmZDQ5YzMzNzUxNzk4NGU4ZjY3MjdjNmY2MWU2YzY5ZmM2ZTRhNGEyOTEyNjAifQ==">Chicken--}}
    {{--Masala</a>--}}
    {{--</div>--}}
    {{--<div class="option_availability">--}}
    {{--<div class="option_txt">Special Price :</div>--}}
    {{--<div class="product_right_txt">--}}
    {{-----}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="option_availability">--}}
    {{--<div class="option_txt">Quantity :</div>--}}
    {{--<div class="product_right_txt">--}}
    {{--1--}}
    {{--</div>--}}
    {{--</div>--}}


    {{--<div class="wishlist_row">--}}
    {{--<div class="rating_box">--}}
    {{--<div class="star_with_txt">--}}
    {{--<i class="mdi mdi-star"></i>0.0--}}
    {{--</div>--}}
    {{--0 Ratings--}}
    {{--</div>--}}
    {{--<div class="out_of_stock wish_out">Out Of Stock</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-4 res_pad0">--}}
    {{--<div class="wish_rightcontainer">--}}
    {{--<div class="order_amt"><i class="mdi mdi-currency-inr"></i> 159.00--}}
    {{--</div>--}}
    {{--<div class="wishlist_row">--}}
    {{--<a class="btn btn-success btn-sm" href="http://localhost:8000/product_list"><i class="mdi mdi-basket basic_icon_margin"></i>Add to card</a>--}}
    {{--<a class="btn btn-danger pull-right btn-sm" href="http://localhost:8000/checkout"><i class="mdi mdi-delete basic_icon_margin"></i>Remove</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="order_details_box">--}}
    {{--<div class="col-sm-8 res_pad0">--}}
    {{--<div class="productdetails_order_row">--}}
    {{--<div class="order_product_imgbox">--}}
    {{--<img src="http://localhost:8000/images/default.png" alt="Organic product">--}}

    {{--</div>--}}
    {{--<div class="product_name">--}}
    {{--<a class="cart_product_name" title="Chicken Masala" href="http://localhost:8000/view_product/eyJpdiI6ImxHWXNRa0p6bDNpUHpuenZIN2R6SGc9PSIsInZhbHVlIjoiVURXc0hVZHk2b0JWZFwvaWM4MWtwOEE9PSIsIm1hYyI6ImIyMTcxNjdiMWNiNTMyODc0NmRmZDQ5YzMzNzUxNzk4NGU4ZjY3MjdjNmY2MWU2YzY5ZmM2ZTRhNGEyOTEyNjAifQ==">Chicken--}}
    {{--Masala</a>--}}
    {{--</div>--}}
    {{--<div class="option_availability">--}}
    {{--<div class="option_txt">Special Price :</div>--}}
    {{--<div class="product_right_txt">--}}
    {{-----}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="option_availability">--}}
    {{--<div class="option_txt">Quantity :</div>--}}
    {{--<div class="product_right_txt">--}}
    {{--1--}}
    {{--</div>--}}
    {{--</div>--}}


    {{--<div class="wishlist_row">--}}
    {{--<div class="rating_box">--}}
    {{--<div class="star_with_txt">--}}
    {{--<i class="mdi mdi-star"></i>0.0--}}
    {{--</div>--}}
    {{--0 Ratings--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-4 res_pad0">--}}
    {{--<div class="wish_rightcontainer">--}}
    {{--<div class="order_amt"><i class="mdi mdi-currency-inr"></i> 159.00--}}
    {{--</div>--}}
    {{--<div class="wishlist_row">--}}
    {{--<a class="btn btn-success btn-sm" href="http://localhost:8000/product_list"><i class="mdi mdi-basket basic_icon_margin"></i>Add to card</a>--}}
    {{--<a class="btn btn-danger pull-right btn-sm" href="http://localhost:8000/checkout"><i class="mdi mdi-delete basic_icon_margin"></i>Remove</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@stop