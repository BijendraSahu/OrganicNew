@extends('adminlayout.adminmaster')

@section('title','Organic Dolchi | Brands')

@section('content')


    <section class="box_containner" id="fullid">
        <div class="container-fluid">
            <div class="row">
                <section id="item_part1">
                    <section id="item_list">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                         Brands
                         <button onclick="opendeliform();" class="btn btn-default pull-right"><i
                                     class="mdi mdi-plus"></i>Add</button>
                      </span>
                                    <p class="clearfix"></p>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Brand</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($brands as $object)
                                            <tr>
                                                <td>{{$object->brand}}</td>
                                                <input type="hidden" value="{{$object->brand}}"
                                                       id="brandname{{$object->id}}">
                                                {{--<input type="hidden" value="{{$object->brand}}"--}}
                                                {{--                                                           id="brandid{{$object->id}}">--}}

                                                <td>
                                                    <button type="button" onclick="editbrand({{$object->id}});"
                                                            class="btn btn-primary btn-xs">Edit
                                                    </button>
                                                    <button type="button" onclick="deletebrand({{$object->id}});"
                                                            class="btn btn-success btn-xs">Delete
                                                    </button>
                                                </td>

                                            </tr>
                                            {{--@endif--}}
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>


            </div>
        </div>
    </section>

    <script type="text/javascript">


        function opendeliform() {
            $('#smallheader').html('');
            $('#smallbody').html('');
            $('#smallfooter').html('');
            $('#smallheader').append('<div><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Add Delivery</h4></div>');
            $('#smallbody').append('<input type="text" name="brand_name" id="ad_brand_name" placeholder="enter brand name" class="form-control">');
            $('#smallfooter').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="addbrand();" class="btn btn-primary">Add</button>');
            $('#myModalsmall').modal();
        }
        function addbrand() {
            var brand_name = $('#ad_brand_name').val();
            if (brand_name == '') {
                swal("Please enter brand name!", {icon: "warning",});
            } else {
                $.get('{{url('add_brand')}}', {
                    brand: brand_name
                }, function (data) {
                    $('#myModalsmall').modal('hide');
                    $("#item_part1").load(location.href + " #item_part1");
                    swal({
                        title: "Success",
                        text: "Brand has been added",
                        icon: "success",
                        button: "ok",
                    });

                });
            }
        }


        function editbrand(id) {
            var brandname = $('#brandname' + id).val();
            $('#smallheader').html('');
            $('#smallbody').html('');
            $('#smallfooter').html('');
            $('#smallheader').append('<div><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Update Brand</h4></div>');
            $('#smallbody').append('<input type="text" name="brand" id="brand_name" value="' + brandname + '" placeholder="enter brand name" class="form-control textWithSpace">');
            $('#smallfooter').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="updateBrand(' + id + ');" class="btn btn-primary">Update</button>');
            $('#myModalsmall').modal();

        }


        function updateBrand(id) {
            var idd = id;
            var brand_name = $('#brand_name').val();
            if (brand_name == '') {
                swal("Please enter brand name..!", {icon: "warning",});
            } else {
                $.get('{{url('update_brand')}}', {
                    brand: brand_name,
                    idd: idd
                }, function (data) {
                    $('#myModalsmall').modal('hide');
                    $("#item_part1").load(location.href + " #item_part1");
                    swal({
                        title: "Update Success",
                        text: "Brand has been updated",
                        icon: "success",
                        button: "ok",
                    });

                });
            }

        }


        function deletebrand(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Brand!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.get('{{url('delete_brand')}}', {idd: id}, function (data) {
                        $('#myModalsmall').modal('hide');
                        $("#item_part1").load(location.href + " #item_part1");

                        swal("Brand has been deleted!", {
                            icon: "success",
                        });
                    });
                }
            }
        )
            ;
        }
    </script>


@stop
{{--$("#item_part1").load(location.href + " #item_part1");--}}
{{--window.location.reload();--}}


