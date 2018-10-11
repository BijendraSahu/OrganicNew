<?php $total = 0; $itemcount = 0; $gtotal = 0; $counter = 0; ?>
@if(count($cart) > 0)
    @foreach($cart as $row)
        {{--    @if($row->options->remark == 'grocery')--}}
        <?php $total += $row->price * $row->qty;
        $counter++;
        $itemcount++;
        ?>
        {{--@endif--}}
    @endforeach
@endif

<span class="baskit_counter" id="wishlist_counter">{{$counter}}</span>
<i class="mdi mdi-heart wish_icon" id="wishlist_block"></i>
<div class="menu_basic_popup cart_popbox scale0">
    <div class="header_popup">
        <div class="total_item_count">
            <span class="basic_icon mdi mdi-basket-fill"></span>
            {{$itemcount}} Item
        </div>
    </div>
    <div class="menu_popup_containner style-scroll">
        <table class="table table-striped table_addcard">
            <tbody>
            <?php $total = 0; $gst = 0; $gtotal = 0; $sp = 0; ?>
            @if(count($cart)>0)
                @foreach($cart as $row)
                    <tr>
                        <td class="text-left"><a class="cart_product_name"
                                                 title="{{$row->name}}"
                                                 href="{{url('view_product').'/'.(encrypt($row->id))}}">{{ str_limit($row->name, 30) }}</a></td>
                        {{--<td class="text-center"> x{{$row->qty}}</td>--}}
                        {{--<td class="text-center"><i class="fa fa-inr"></i>{{$row->price}}</td>--}}
                        <td class="text-right">
                            <a onclick="remove_item('{{$row->rowId}}')" class="mdi mdi-close-circle cart-delete"
                               data-toggle="tooltip"
                               title="Remove"></a>
                        </td>
                    </tr>
                    <?php $total += $row->price * $row->qty;
                    ?>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="cart_btn_box">
        {{--<a class="btn btn-warning btn-sm" href="{{url('mycart')}}">--}}
            {{--<span class="mdi mdi-basket basic_icon_margin"></span>View Cart--}}
        {{--</a>--}}
        <a class="btn btn-success btn-sm pull-right" href="{{url('wishlist')}}">
            <span class="mdi mdi-heart basic_icon_margin"></span>View wishlist
        </a>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    function remove_item(cart_item_id) {
        $.ajax({
            type: 'get',
            url: "{{ url('cart_delete') }}",
            data: {cart_item_id: cart_item_id},
            success: function (data) {
                $("#cartload").html(data);
                $('.cart_popbox').removeClass('scale0');
            },
            error: function (xhr, status, error) {
                $('#cartload').html(xhr.responseText);
            }
        });
        // promo_code

    }
</script>