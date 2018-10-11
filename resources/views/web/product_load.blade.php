<input type="hidden" id="products_count" value="{{$items_count}}"/>
@foreach ($items as $item)
    <div class="product_block">
        <div class="product_name"><a class="product_details_link"
                                     href="{{url('view_product').'/'.(encrypt($item->id))}}">{{$item->name}}</a>
        </div>
        <div class="product_wish" onclick="AddtoWishlist(this);" data-toggle="tooltip" title="Wishlist">
            <i class="mdi mdi-heart"></i>
        </div>
        <div class="long_product_img">
            <?php $image = \App\ItemImages::where(['item_master_id' => $item->id])->first(); ?>
            @if(isset($image->image) && file_exists("p_img/$item->id/".$image->image))
                <img src="{{url('p_img').'/'.$item->id.'/'.$image->image}}"/>
            @else
                <img src="{{url('images/default.png')}}"/>
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
        <?php
        $prices = \App\ItemPrice::where('item_master_id', '=', $item->id)->where('qty', '>', '0')->get();

        ?>
        @if(count($prices)>0)
            @foreach($prices as $price)
                <div class="long_spinner_withbtn">
                    <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_{{$item->id}}"
                                                                data-content="{{$price->id}}">{{$price->unit.' '.$price->weight}}
                            - {{$price->price}}</span>
                        <input type="number"
                               class="form-control text-center qty_edittxt"
                               min="1"
                               max="{{$price->qty}}"
                               value="1" id="qty_load_{{$item->id}}">
                    </div>
                    <button class="spinner_addcardbtn btn-primary"
                            id="{{$item->id}}"
                            type="button" data-content="{{$price->id}}"
                            onclick="AddTOcart_load(this);">
                        <i class="mdi mdi-basket"></i> <span
                                class="button-group_text">Add</span>
                    </button>
                </div>

            @endforeach
            @if(count($prices)!=4)
                <div class="basic_description @if(count($prices) == 1) {{"line_4"}}@elseif(count($prices)==2) {{"line_3"}}@elseif(count($prices)==3) {{"line_1"}} @endif">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                    type
                    and scrambled it to make a type specimen book.
                </div>
            @endif
        @else

            <div class="notify_block long_notifyblock">
                <div class="out_of_stock">Out Of Stock</div>
                <div class="notify_me_btn" data-toggle="modal" onclick="getItemid({{$item->id}})"
                     data-target="#Modal_NotifyMe">Notify Me
                </div>
            </div>
            <div class="basic_description line_2">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                type
                and scrambled it to make a type specimen book.
            </div>
        @endif

    </div>
@endforeach
{{--@else--}}
{{--<div class="product_block">No Items Available</div>--}}
{{--@endif--}}

