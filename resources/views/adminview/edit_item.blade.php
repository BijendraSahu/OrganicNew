<style>
    .myf {
        margin-right: 441px;
    }

    .edit_item_container label {
        font-size: 12px;
        width: 100%;
        margin-top: 10px;
    }
</style>

{!! Form::open(['url' => 'itemeditpost', 'class' => 'form-horizontal', 'id'=>'Unit', 'method'=>'POST', 'files'=>true]) !!}
<div class="container-fluid">
    <div class="col-sm-12">
        <div class="col-sm-6">
            <input type="hidden" class="form-control" id="p_id" name="p_id" placeholder="Product Name"
                   value="{{$all_items->id}}">
            <label>Product Name</label><input type="text" class="form-control" id="p_name" name="p_name"
                                              placeholder="Product Name"
                                              value="{{$all_items->name}}">
            <label>Description</label><input type="text" class="form-control" id="p_des" name="p_des"
                                             placeholder="Product Description"
                                             value="{{$all_items->description}}">
            <label>Usage</label><input type="text" class="form-control" id="p_usage" name="p_usage"
                                       placeholder="Product Usage"
                                       value="{{$all_items->usage}}">
            <label>Specification</label><input type="text" class="form-control" id="p_spec" name="p_spec"
                                               placeholder="Product Specification"
                                               value="{{$all_items->specifcation}}">
        </div>
        <div class="col-sm-6">
            <label>Ingredients</label><input type="text" class="form-control" id="p_ingredent" name="p_ingredent"
                                             placeholder="Product Ingredients"
                                             value="{{$all_items->ingredients}}">
            <label>Nutrients</label><input type="text" class="form-control" id="p_nutrients" name="p_nutrients"
                                           placeholder="Product Nutrients"
                                           value="{{$all_items->nutrients}}">
            <label>Delivery</label><input type="text" class="form-control" id="p_delivery" name="p_delivery"
                                          placeholder="Product Delivery"
                                          value="{{$all_items->delivery}}">
            <label>Status</label>@if($all_items->is_active=='1')
                <div class="status pending">Active</div>@else
                <div class="status approved">Inactive</div>@endif
        </div>
    </div>
    <div class="col-sm-12">
        <p class="clearfix"></p>
        <label>Old Selected Price</label>
        @foreach($all_items_price as $objmy)
            <i class="mdi mdi-star"></i><b>Unit</b> :&nbsp;&nbsp;{{$objmy->unit}}&nbsp;&nbsp; <i
                    class="mdi mdi-star"></i><b>Quantity</b> :&nbsp;&nbsp;{{$objmy->qty}} &nbsp;&nbsp; <i
                    class="mdi mdi-star"></i><b>price</b> :&nbsp;&nbsp;{{$objmy->price}}&nbsp;&nbsp; <i
                    class="mdi mdi-star"></i><b>Special Price</b>:&nbsp;&nbsp;{{$objmy->spl_price}}
        @endforeach
        <p class="clearfix"></p>
        <label>Unit :</label>
        <input type="text" name="item_unit[]" value="" class="form-control unit_id_one " placeholder="Product Unit">
    </div>
    <div class="col-sm-12">
        <div class="col-sm-3">
            <p class="clearfix"></p>
            <label>Quantity :</label>
            <input type="text" name="item_unit[]" value="" class="form-control qty_id_one " placeholder="Product Qty">
        </div>
        <div class="col-sm-3">
            <p class="clearfix"></p>
            <label>Price :</label>
            <input type="text" name="item_unit[]" value="" class="form-control price_id_one "
                   placeholder="Product Price">
        </div>
        <div class="col-sm-3">
            <p class="clearfix"></p>
            <label>Spc. Price :</label>
            <input type="text" name="item_unit[]" value="" class="form-control spc_id_one"
                   placeholder="Product Spc. Price">
        </div>
        <div id="more_price_edit">
        </div>
        <div align="center">
            <p class="clearfix"></p>
            <input type="button" onclick="add_more_edit();" class="btn btn-default"
                   value="Add More Price">
        </div>
    </div>
    <div class="col-sm-12">
        <label>Old Selected Category</label>
        @foreach($all_items_cat as $objmycat)
            *{{$objmycat->cat_name->name}}&nbsp;
        @endforeach
        <label>Select Category Again</label>
        @foreach($allcat as $object)
            <div class="label_checkbox">
                <div class="checkbox ">
                    <label><input type="checkbox" name="category[]"
                                  class="setchat_box chekgetid"
                                  value="{{$object->id}}"
                                  id="CheckboxHead"><span class="cr"><i
                                    class="cr-icon mdi mdi-check"></i></span>{{$object->name}}
                    </label>
                    <p class="clearfix"></p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-4">
                <label>Meta Tag :</label>
                <input type="text" name="meta_tag" id="meta_tag" class="form-control " placeholder="Product Meta Tag"
                       value="{{$all_items->meta_tag}}">
            </div>
            <div class="col-sm-4">
                <label>Meta Keyword :</label>
                <input type="text" name="meta_key" id="meta_key" class="form-control "
                       placeholder="Product Meta Keyword" value="{{$all_items->meta_keyword}}">
            </div>
            <div class="col-sm-4">
                <label>Meta Description :</label>
                <input type="text" name="meta_des" name="meta_des" class="form-control"
                       placeholder="Product Meta Description" value="{{$all_items->meta_description}}">
            </div>
        </div>
        <div>
            <label>Previous Uploaded Item Image</label>
            <div>
                @foreach($all_items_image as $imgobj)
                    <img style="height: 150px;
    width: 150px;
    margin-right: 5px;" src="{{url('p_img').'/'.$imgobj->item_master_id.'/'.$imgobj->image}}">
                @endforeach
            </div>

        </div>
        <div>
            <label>Upload Image</label>
            <p class="clearfix"></p>
            <input onchange="PreviewImage();" id="upload_file_image" type="file" name="images[]" multiple=""
                   accept="image/jpg, image/jpeg">
           {{-- <input type="file" name="images[]"/>--}}
            <p class="clearfix"></p>
            <div style="display: inline-block; width: 100%;" id="image_preview">

            </div>
            <div style="display: block;" id="files_block">

            </div>

        </div>
    </div>

    <div class="col-sm-12">
        {!! Form::submit('Edit', array('id' => 'Edit', 'class' => 'btn btn-success' )) !!}
    </div>
</div>
{!! Form::close() !!}


<script>

    var limit = 1;

    function add_more_edit() {
        if (limit < 4) {
            $('#more_price_edit').append('<div class="col-sm-3"><p class="clearfix"></p><input type="text" name="item_unit[]" class="form-control unit_id_one " placeholder="Product Unit"></div><div class="col-sm-3"><p class="clearfix"></p><input type="text" name="item_unit[]" class="form-control qty_id_one " placeholder="Product Qty"></div><div class="col-sm-3"><p class="clearfix"></p><input type="text" name="item_unit[]" class="form-control price_id_one " placeholder="Product Price"></div><div class="col-sm-3"><p class="clearfix"></p><input type="text" name="item_unit[]" class="form-control spc_id_one" placeholder="Product Spc. Price"></div>');
            limit++;

        }
        else {

            alert('you can input only 4');

        }

    }
</script>
<script>
    {{--function fully() {--}}
    {{--var getcidone = [];--}}
    {{--var getqtyone = [];--}}
    {{--var getpriceone = [];--}}
    {{--var getspclone = [];--}}
    {{--var delet_id = $('#p_id').val();--}}

    {{--$('.unit_id_one').each(function () {--}}
    {{--if ($(this).val() != '') {--}}
    {{--getcidone.push($(this).val());--}}

    {{--}--}}

    {{--});--}}
    {{--$('.qty_id_one').each(function () {--}}
    {{--if ($(this).val() != '') {--}}
    {{--getqtyone.push($(this).val());--}}


    {{--}--}}
    {{--});--}}
    {{--$('.price_id_one').each(function () {--}}
    {{--if ($(this).val() != '') {--}}
    {{--getpriceone.push($(this).val());--}}

    {{--}--}}
    {{--});--}}
    {{--$('.spc_id_one').each(function () {--}}
    {{--if ($(this).val() != '') {--}}
    {{--getspclone.push($(this).val());--}}


    {{--}--}}
    {{--});--}}

    {{--$.get('{{url('update_item')}}', {--}}
    {{--getcidone: getcidone,--}}
    {{--getqtyone: getqtyone,--}}
    {{--getpriceone: getpriceone,--}}
    {{--getspclone: getspclone,--}}
    {{--delet_id: delet_id,--}}

    {{--}, function (data) {--}}
    {{--$('#myheader').html('');--}}
    {{--$('#mybody').html('');--}}
    {{--$('#mybody').text('New Product Edit Successfully');--}}
    {{--$('#myheader').html('Success Message<button type="button" class="close"  data-dismiss="modal">&times;</button>');--}}
    {{--$('#myModal').modal();--}}
    {{--location.reload();--}}


    {{--});--}}


    {{--}--}}
</script>


<script>
    {{--$("#editForm").on('submit', function (e) {--}}
    {{--//                var textval = $('#post_text').text();--}}
    {{--//                $('#posttext').val(textval);--}}
    {{--e.preventDefault();--}}
    {{--$.ajax({--}}
    {{--type: 'POST',--}}
    {{--url: "{{ url('itemeditpost') }}",--}}
    {{--data: new FormData(this),--}}
    {{--contentType: false,--}}
    {{--cache: false,--}}
    {{--processData: false,--}}

    {{--success: function (data) {--}}
    {{--console.log(data);--}}

    {{--// fully();--}}


    {{--//--}}
    {{--},--}}
    {{--error: function (xhr, status, error) {--}}
    {{--//                    console.log('Error:', data);--}}
    {{--//                    ShowErrorPopupMsg('Error in uploading...');--}}
    {{--$('#err1').html(xhr.responseText);--}}
    {{--}--}}
    {{--});--}}
    {{--//                }--}}
    {{--});--}}

    function Remove_uploadimg(dis) {
        $(dis).parent().remove();
        current_uploadfile--;
        var chkcount = $('#image_preview').children().length;
        if (chkcount < 1) {
            $('#files_block').hide();
            $('#upload_file_image').val('');
        }
    }

    var current_uploadfile = 0;
    var oversize = false;
    var overfilesname = "";

    function PreviewImage() {
        debugger;
        var total_file = document.getElementById("upload_file_image").files.length;
        var _file = document.getElementById("upload_file_image").files;
        /* var copyfile=document.getElementById("copyfile").files;*/
        if (total_file < 11) {
            if (current_uploadfile < 11) {
                for (var i = 0; i < total_file; i++) {
                    if (current_uploadfile < 5) {
                        //sizefile = Number(i.size);
                        var sizefile = _file.item(i).size;
                        if (sizefile > 3145728) {
                            oversize = true;
                            overfilesname += _file.item(i).name + ", ";
                        } else {
                            var currentfile = _file[i].name;

                            /* var currentfile=_file[i].prop('files')[0];
                             var reader = new FileReader();
                             reader.readAsText(_file[i]);
                             reader.onload = function(e) {
                             alert(e.target.result);
                             // currentfile=e.target.result;
                             };*/
                            //copyfile.files=_file.files;
                            var append_image = "<div class='upimg_box'><i class='thumb_close mdi mdi-close' onclick='Remove_uploadimg(this);'></i>" +
                                "<img class='up_img' style='width: 100%;height: 100%' src='" + URL.createObjectURL(event.target.files[i]) + "' />" +
                                /* "<input class='profile-upload-pic' type='file' val='" + currentfile + "'  />"+*/
                                "<input class='profile-upload-pic dynamic_fileappend' type='file' val='" + _file.item(i).name + "'  /></div>";

                            $('#image_preview').append(append_image);
                            $('#files_block').show();
                            current_uploadfile++;
                        }
                    } else {
                        ShowErrorPopupMsg("Maximum 10 images post at a time");
                        break;
                    }
                }
            } else {
                ShowErrorPopupMsg("Maximum 10 images post at a time");
                return false;
            }
        } else {
            ShowErrorPopupMsg("Maximum 10 images post at a time");
            return false;
        }
        if (oversize == true) {
            ShowErrorPopupMsg(overfilesname + " File size should not exceed 3 MB");
        }
    }
</script>

