<input type="hidden" id="products_count" value="{{$items_count}}"/>
@if (count($items) > 0)
    @foreach ($items as $item)
        <div class="product_block">
            <div class="product_name"><a class="product_details_link" href="{{url('view_product').'/'.(encrypt($item->id))}}">{{$item->name}}</a></div>
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
                <div class="long_spinner_withbtn">
                    <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_{{$item->id}}"
                                                                data-content="{{$price->id}}">{{$price->unit}}
                            -{{$price->price}}</span>
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
                        <i id="{{$item->id}}" class="mdi mdi-basket"></i> <span
                                class="button-group_text">Add</span>
                    </button>
                </div>
            @endforeach
        </div>
    @endforeach
@else
    {{--<div class="alert-danger">No Items Available</div>--}}
@endif

