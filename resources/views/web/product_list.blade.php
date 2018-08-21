@extends('web.layouts.e_master')

@section('title', 'Organic Food : Product List')

@section('head')
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <style type="text/css">
        .owl-carousel {
            width: 100%;
            -webkit-tap-highlight-color: transparent;
            /* position relative and z-index fix webkit rendering fonts issue */
            position: relative;
            z-index: 1;
            margin: 5px 0px 15px 0px;
        }

        .owl-dots {
            display: none;
        }

        .owl-carousel .product_block {
            width: 100%;
            text-align: left;
        }

        .owl-carousel .owl-stage {
            position: relative;
            -ms-touch-action: pan-Y;
            touch-action: manipulation;
            -moz-backface-visibility: hidden;
            /* fix firefox animation glitch */
        }

        .owl-carousel .owl-stage:after {
            content: ".";
            display: block;
            clear: both;
            visibility: hidden;
            line-height: 0;
            height: 0;
        }

        .owl-carousel .owl-stage-outer {
            position: relative;
            overflow: hidden;
            /* fix for flashing background */
            -webkit-transform: translate3d(0px, 0px, 0px);
        }

        .owl-carousel .owl-wrapper,
        .owl-carousel .owl-item {
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
        }

        .owl-carousel .owl-item {
            position: relative;
            min-height: 1px;
            float: left;
            -webkit-backface-visibility: hidden;
            -webkit-tap-highlight-color: transparent;
            -webkit-touch-callout: none;
        }

        .owl-carousel .owl-item img {

        }

        .owl-carousel .owl-dots.disabled {
            display: none;
        }

        .owl-carousel .owl-nav .owl-prev,
        .owl-carousel .owl-nav .owl-next,
        .owl-carousel .owl-dot {
            cursor: pointer;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .owl-carousel button.owl-dot {
            color: inherit;
            padding: 0 !important;
            font: inherit;
        }

        .owl-carousel.owl-loaded {
            display: block;
        }

        .owl-carousel.owl-loading {
            opacity: 0;
            display: block;
        }

        .owl-carousel.owl-hidden {
            opacity: 0;
        }

        .owl-carousel.owl-refresh .owl-item {
            visibility: hidden;
        }

        .owl-carousel.owl-drag .owl-item {
            -ms-touch-action: pan-y;
            touch-action: pan-y;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .owl-carousel.owl-grab {
            cursor: move;
            cursor: grab;
        }

        .owl-carousel.owl-rtl {
            direction: rtl;
        }

        .owl-carousel.owl-rtl .owl-item {
            float: right;
        }

        .no-js .owl-carousel {
            display: block;
        }

        .owl-carousel .animated {
            animation-duration: 1000ms;
            animation-fill-mode: both;
        }

        .owl-carousel .owl-animated-in {
            z-index: 0;
        }

        .owl-carousel .owl-animated-out {
            z-index: 1;
        }

        .owl-carousel .fadeOut {
            animation-name: fadeOut;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

        /*
         * 	Owl Carousel - Auto Height Plugin
         */
        .owl-height {
            transition: height 500ms ease-in-out;
        }

        .owl-carousel .owl-item .owl-lazy {
            opacity: 0;
            transition: opacity 400ms ease;
        }

        .owl-carousel .owl-item .owl-lazy[src^=""], .owl-carousel .owl-item .owl-lazy:not([src]) {
            max-height: 0;
        }

        .owl-carousel .owl-item img.owl-lazy {
            transform-style: preserve-3d;
        }


    </style>
    <script type="text/javascript" src="js/owl.carousel.js"></script>
    <style type="text/css">

        /* .vertical .carousel-inner {
             height: 100%;
         }
 */
        .carousel.vertical .item {
            -webkit-transition: 0.6s ease-in-out top;
            -moz-transition: 0.6s ease-in-out top;
            -ms-transition: 0.6s ease-in-out top;
            -o-transition: 0.6s ease-in-out top;
            transition: 0.6s ease-in-out top;
        }

        .carousel.vertical .active {
            top: 0;
        }

        .carousel.vertical .next {
            top: 400px;
        }

        .carousel.vertical .prev {
            top: -400px;
        }

        .carousel.vertical .next.left,
        .carousel.vertical .prev.right {
            top: 0;
        }

        .carousel.vertical .active.left {
            top: -400px;
        }

        .carousel.vertical .active.right {
            top: 400px;
        }

        .carousel.vertical .item {
            left: 0;
        }

        .slider_nav {
            position: absolute;
            right: 0px;
            top: -45px;
        }

        .glo_sliderarrow_btn {
            width: 25px;
            height: 25px;
            background: #ffffff !important;
            display: inline-block;
            margin-left: 5px;
            line-height: 22px !important;
            color: #c3c0c0;
            transition: .5s all;
            outline: none;
            text-align: center;
            border: solid thin #e4d8d8;
            background-image: none !important;
            padding: 0px;
        }

        .glo_sliderarrow_btn i {
            font-size: 18px;
        }

        .glo_sliderarrow_btn:active {
            text-decoration: none;
        }

        .glo_sliderarrow_btn:hover {
            background: #86bc43 !important;
            color: #ffffff !important;
            border-color: #86bc43 !important;
            text-decoration: none;
        }

        .slide_up_carousel .product_block {
            width: 100%;
            margin-top: 5px;
            box-shadow: none;
            border: solid thin #e1e1e1;
        }
    </style>
    <script type="text/javascript">
        function appendimages(dis) {
            var src_no = $(dis).attr('src');
            $('#view_images').attr('src', src_no);
            $('#view_large_bg').css('background-image', 'url("' + src_no + '")');
            Initialize_ProductDetails();
        }

        function Initialize_ProductDetails() {
            var native_width = 0;
            var native_height = 0;
            $(".large").css("background", "url('" + $(".small").attr("src") + "') no-repeat");
            //Now the mousemove function
            $(".magnify").mousemove(function (e) {
                if (!native_width && !native_height) {
                    var image_object = new Image();
                    image_object.src = $(".small").attr("src");
                    native_width = image_object.width;
                    native_height = image_object.height;
                }
                else {
                    var magnify_offset = $(this).offset();
                    var mx = e.pageX - magnify_offset.left;
                    var my = e.pageY - magnify_offset.top;
                    if (mx < $(this).width() && my < $(this).height() && mx > 0 && my > 0) {
                        $(".large").fadeIn(100);
                    }
                    else {
                        $(".large").fadeOut(100);
                    }
                    if ($(".large").is(":visible")) {
                        var rx = Math.round(mx / $(".small").width() * native_width - $(".large").width() / 2) * -1;
                        var ry = Math.round(my / $(".small").height() * native_height - $(".large").height() / 2) * -1;
                        var bgp = rx + "px " + ry + "px";
                        var px = mx - $(".large").width() / 2;
                        var py = my - $(".large").height() / 2;
                        $(".large").css({left: px, top: py, backgroundPosition: bgp});
                    }
                }
            });
        }

        function AddTOcart(dis) {
            var cart = $('#baskit_block');
//            var cart_counter = $('#baskit_counter');
//            var cart_value = Number($(cart_counter).text());
//            cart_value++;
            var imgtodrag = $(dis).parent().parent().find("img").eq(0);
            if (imgtodrag) {
                var imgclone = imgtodrag.clone()
                    .offset({
                        top: imgtodrag.offset().top,
                        left: imgtodrag.offset().left
                    })
                    .css({
                        'opacity': '0.5',
                        'position': 'absolute',
                        'height': '150px',
                        'width': '150px',
                        'z-index': '100'
                    })
                    .appendTo($('body'))
                    .animate({
                        'top': cart.offset().top + 10,
                        'left': cart.offset().left + 10,
                        'width': 50,
                        'height': 50
                    }, 1000, 'easeInOutExpo');

                setTimeout(function () {
                    cart.effect("shake", {
                        times: 1
                    }, 100);
//                    cart_counter.text(cart_value);
                }, 1500);

                imgclone.animate({
                    'width': 0,
                    'height': 0
                }, function () {
                    $(this).detach()
                });
            }

            var itemid = $(dis).attr('id');
            var rateid = $(dis).attr('data-content');
            var qty = $('#qty_' + itemid).val();
            var carturl = "{{url('addtocart')}}";
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: carturl,
                data: {itemid: itemid, rateid: rateid, quantity: qty},
                success: function (data) {
                    $("#cartload").html(data);
//                    ShowSuccessPopupMsg('Product has been added to cart');
                },
                error: function (xhr, status, error) {
                    $("#cartload").html(xhr.responseText);
//                    alert('Technical Error Occured!');
                }
            });

        }

        function checkOffset() {
            if ($('#product_filter_container').offset().top + $('#product_filter_container').height()
                >= $('#footer').offset().top - 30) {
                $('#product_filter_container').addClass('filter_removefixed');
            }
            if ($(document).scrollTop() + window.innerHeight < $('#footer').offset().top) {
                $('#product_filter_container').removeClass('filter_removefixed');
            }
        }

        $(document).scroll(function () {
            checkOffset();
        });
        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 3000
            });
            var owl = $('.brics_5');
            owl.owlCarousel({
                type: 'slidey-up',
                items: 1,
                loop: true,
                margin: 15,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                /*  slidey-up: 'bottom to top',*/
                navigation: true
            });
            $('#filter_data li').click(function () {
                $('#filter_data li').removeClass('selected');
                $(this).addClass('selected');
                var gettext = $(this).text();
                if (gettext == "Products Category") {
                    $('#product_category').show();
                    $('#product_all').hide();
                } else {
                    $('#product_all').show();
                    $('#product_category').hide();
                }
            });
        });

        function getBuyItem() {
            var input = document.getElementById("Search");
            var filter = input.value.toLowerCase();
            var nodes = document.getElementsByClassName('product_list_ul');

            for (i = 0; i < nodes.length; i++) {
                if (nodes[i].innerText.toLowerCase().includes(filter)) {
                    nodes[i].style.display = "block";
                } else {
                    nodes[i].style.display = "none";
                }
            }
        }

    </script>
@stop
@section('content')
    <section class="product_section">
        <div class="container-fluid">
            <div class="product_all_container" id="product_all_container">
                <div class="product_filter_container" id="product_filter_container">
                    <div class="product_filter_head">
                        Product Category
                    </div>
                    <div class="search_filter">
                        <input type="text" class="main_filter_search" id="Search" onkeyup="getBuyItem()"
                               placeholder="search"/>
                        <div class="filter_search_icon">
                            <i class="mdi mdi-magnify"></i>
                        </div>
                    </div>
                    <div class="filter_category">
                        <ul class="product_list_ul style-scroll" id="filter_data">
                            <li class="selected">Products Category</li>
                            <li onclick="get_items(this);" id="0">All Products</li>
                            @foreach($categories as $category)
                                <li onclick="get_items(this);" id="{{$category->id}}">{{$category->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="product_container" id="product_category">
                    <div class="slider_row">
                        @php
                            $categories = DB::select("select * from category_master ic where ic.id in (select DISTINCT category_id from item_category where is_active = 1)");
                        @endphp

                        @foreach($categories as $category)
                            @php
                                $items = DB::select("SELECT im.* FROM item_master im, item_category ic where im.id=ic.item_master_id and ic.category_id=$category->id");
                            @endphp
                            <div class="col-md-3 col-sm-6">
                                <div class="product_carousal_box">
                                    <div class="carousal_head">
                                        <span class="filter_head_txt slider_headtxt">{{$category->name}}</span>
                                    </div>

                                    <div id="myCarousel" class="carousel slide vertical">
                                        <div class="carousel-inner slide_up_carousel">
                                            <?php $counter = 0; ?>
                                            @foreach($items as $item)
                                                @if($counter == 0)
                                                    <div class="item active">
                                                        <div class="product_block">
                                                            <div class="product_name"><a class="product_details_link"
                                                                                         href="{{url('view_product').'/'.(encrypt($item->id))}}">{{$item->name}}</a>
                                                            </div>
                                                            <div class="long_product_img">
                                                                <?php $image = \App\ItemImages::where(['item_master_id' => $item->id])->first(); ?>
                                                                @if(isset($image->image) && file_exists("p_img/$item->id/".$image->image))
                                                                    <img src="{{url('p_img').'/'.$item->id.'/'.$image->image}}">
                                                                @else
                                                                    <img src="{{url('images/default.png')}}">
                                                                @endif
                                                                <div class="hover_center_block" id="{{$item->id}}"
                                                                     onclick="getItemDetails(this);"
                                                                     data-toggle="modal"
                                                                     data-target="#Modal_ViewProductDetails">
                                                                    <div class="product_hover_block">
                                                                        <div class="mdi mdi-magnify"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @php $prices = \App\ItemPrice::where(['item_master_id' => $item->id])->get(); @endphp
                                                            @foreach($prices as $price)
                                                                <div class="long_spinner_withbtn">
                                                                    <div class="input-group long_qty_box">
                                                            <span class="long_qty_txt" id="price_{{$item->id}}"
                                                                  data-content="{{$price->id}}">{{$price->unit}}
                                                                - {{$price->price}}</span>
                                                                        <input type="number"
                                                                               class="form-control text-center qty_edittxt"
                                                                               min="0"
                                                                               max="{{$price->qty}}"
                                                                               value="0" id="qty_{{$item->id}}">
                                                                    </div>
                                                                    <button class="spinner_addcardbtn btn-primary"
                                                                            id="{{$item->id}}"
                                                                            type="button" data-content="{{$price->id}}"
                                                                            onclick="AddTOcart(this);">
                                                                        <i class="mdi mdi-basket"></i> <span
                                                                                class="button-group_text">Add</span>
                                                                    </button>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="item">
                                                        <div class="product_block">
                                                            <div class="product_name"><a class="product_details_link"
                                                                                         href="{{url('view_product').'/'.(encrypt($item->id))}}">{{$item->name}}</a>
                                                            </div>
                                                            <div class="long_product_img">
                                                                <?php $image = \App\ItemImages::where(['item_master_id' => $item->id])->first(); ?>
                                                                @if(isset($image->image) && file_exists("p_img/$item->id/".$image->image))
                                                                    <img src="{{url('p_img').'/'.$item->id.'/'.$image->image}}">
                                                                @else
                                                                    <img src="{{url('images/default.png')}}">
                                                                @endif
                                                                <div class="hover_center_block" id="{{$item->id}}"
                                                                     onclick="getItemDetails(this);"
                                                                     data-toggle="modal"
                                                                     data-target="#Modal_ViewProductDetails">
                                                                    <div class="product_hover_block">
                                                                        <div class="mdi mdi-magnify"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php $prices = \App\ItemPrice::where(['item_master_id' => $item->id])->get(); ?>
                                                            @foreach($prices as $price)
                                                                @if($price->qty > 0)
                                                                    <div class="long_spinner_withbtn">
                                                                        <div class="input-group long_qty_box">
                                                            <span class="long_qty_txt" id="price_{{$item->id}}"
                                                            >{{$price->unit}}
                                                                - {{$price->price}}</span>
                                                                            <input type="number"
                                                                                   class="form-control text-center qty_edittxt"
                                                                                   min="0" max="{{$price->qty}}"
                                                                                   value="0" id="qty_{{$item->id}}">
                                                                        </div>
                                                                        <button class="spinner_addcardbtn btn-primary"
                                                                                id="{{$item->id}}"
                                                                                type="button"
                                                                                data-content="{{$price->id}}"
                                                                                onclick="AddTOcart(this);">
                                                                            <i class="mdi mdi-basket"></i> <span
                                                                                    class="button-group_text">Add</span>
                                                                        </button>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                                <?php $counter++; ?>
                                            @endforeach
                                        </div>
                                        <div class="slider_nav ">
                                            <a class="left glo_sliderarrow_btn" href="#myCarousel"
                                               data-slide="prev">‹</a>
                                            <a class="right glo_sliderarrow_btn" href="#myCarousel"
                                               data-slide="next">›</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="product_container" id="product_all" style="display: none">


                </div>
            </div>
        </div>
    </section>
    <input type="hidden" id="see_id" value="1"/>
    <input type="hidden" id="category_id" value="">
    @include('web.layouts.footer')

    <div id="Modal_ViewProductDetails" class="modal fade-scale" tabindex="-1" aria-labelledby="myModalLabel"
         role="dialog">
        <div class="modal-dialog product_details_model">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="modal_title" class="modal-title">Product Details</h4>
                </div>
                <div id="modal_body" class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="Modal_NotifyMe" class="modal fade-scale" tabindex="-1" aria-labelledby="myModalLabel" role="dialog">
        <div class="modal-dialog notifyme_model">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Notify Me for Product</h4>
                </div>
                <div class="modal-body">
                    <div class="all_data_view">
                        <div class="model_row">
                            <input type="text" class="form-control" placeholder="Email Id"/>
                        </div>
                        <div class="model_row">
                            <input type="text" class="form-control" placeholder="Mobile No."/>
                        </div>
                        <div class="model_row">
                            <input type="text" class="form-control" placeholder="city"/>
                        </div>
                        <div class="model_row">
                            <textarea class="form-control glo_txtarea" placeholder="Massage for product"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <script>

        var append_loading_img = '<div class="feed_loadimg_block" id="load_img">' + '<img height="50px" class="center-block" src="{{ url('images/loading.gif') }}"/></div>';
        var append_div = '<div class="product_block loading_block" id="load_item"><div class="single_line"><div class="load_waves"></div></div><div class="img_load"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div></div>';

        function get_items(dis) {
            var category_id = $(dis).attr('id');
            var limit = Number($('#see_id').val());
            alert(category_id);
            $('#category_id').val(category_id);

            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('getmoreproducts') }}",
                data: {currentpage: limit, category_id: category_id},
                beforeSend: function () {
                    $('#product_all').html('');
                    $('#product_all').append(append_div);
                },
                success: function (data) {
                    $("#load_item").remove();

                    $("#product_all").append(data);
                },
                error: function (xhr, status, error) {
                    $('#product_all').html(xhr.responseText);
//                    ShowErrorPopupMsg('Error in uploading...');
                }
            });
        }

//        $(document).ready(function () {
//            $(window).scroll(function (event) {
//                if ($(window).scrollTop() + $(window).height() == $(document).height()) {
//                    if (parseFloat($('#see_id').val()) < parseFloat($('#products_count').val())) {
//                        getmoreItems();
//                    }
//                }
//            });
//        });

        $(window).scroll(function (event) {
//            var chk_scroll = $(window).scrollTop();
//            if (chk_scroll > 70) {
//                $('.top_manubar').addClass('top_manubar_fixed');
////                    $('.overall_containner').addClass('overall_margin');
//                $('.profile_basic_menu_block').addClass('left_menu_fixed');
//                $('.all_right_block').addClass('right_menu_fixed');
//            }
            if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                if (parseFloat($('#see_id').val()) < parseFloat($('#products_count').val())) {
                    getmoreItems();
                }
            }


        });

        function getmoreItems() {
            cp = 1;
            cp += parseFloat($('#see_id').val());
            $('#see_id').val(cp);
            var category_id = $('#category_id').val();
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('getmoreproducts') }}",
                data: {currentpage: cp, category_id: category_id},
                beforeSend: function () {
                    $('#product_all').append(append_div);
                },
                success: function (data) {
                    $("#load_item").remove();
                    $("#product_all").append(data);
                },
                error: function (xhr, status, error) {
                    $('#product_all').html(xhr.responseText);
                }
            });
        }


        function getItemDetails(dis) {
            $('#modal_body').html('<img height="50px" class="center-block" src="{{url('images/loading.gif')}}"/>');
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('view_item') }}",
                data: {item_id: $(dis).attr('id')},
                success: function (data) {
                    $('#modal_body').html(data);
                    Initialize_ProductDetails();
                },
                error: function (xhr, status, error) {
                    $('#modal_body').html(xhr.responseText);
                }
            });


        }
    </script>
@stop