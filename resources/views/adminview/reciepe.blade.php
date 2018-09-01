@extends('adminlayout.adminmaster')

@section('title','Dashboard')

@section('content')

    <script src="{{url('js/my_validation.js')}}"></script>
    <style>
        .hidealways {
            display: none;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {display:none;}

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>

    <section class="box_containner" id="fullid">
        <div class="container-fluid">
            <div class="row">
                <section id="item_part1">
                    <section id="item_list">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                        All Reciepe
                         {{--<button onclick="openmyform();" class="btn btn-default pull-right"><i
                                     class="mdi mdi-plus"></i>Add</button>--}}
                      </span>
                                    <?php $myrdata=\App\RecipeMaster::where(['is_active'=>1])->orderBy('id','desc')->get();?>
                                    <p class="clearfix"></p>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th width="10%">Image</th>
                                            <th width="10%">Title</th>
                                            {{--     <th width="50%"></th>--}}
                                            <th width="50%">Description</th>
                                            <th>Difficulty Level</th>
                                            <th>Status</th>
                                            <th>option</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($myrdata as $obj)

                                            <tr>
                                                <td><img style="height: 90px;" src="{{url('/').'/'.$obj->image}}"></td>
                                                <td>{{$obj->title}}</td>
                                                <td>{{$obj->desciption}}</td>
                                                <td>{{$obj->difficulty_level}}</td>
                                                <td>{{$obj->is_approved}}</td>
                                                <td>
                                                    @if($obj->is_approved=='approved'||$obj->is_approved=='rejected')
                                                        <a data-toggle="tooltip" title="Delete" href="#" onclick="deleteR({{$obj->id}});" class="btn btn-primary">
                                                            <span class="glyphicon glyphicon-remove-sign"></span>
                                                        </a>
                                                    @else


                                                    {{-- <button onclick="edittest({{$obj->id}});" class="btn btn-primary btn-sm">Update</button>--}}<a data-toggle="tooltip" title="Approved" href="#"  onclick="approvedr({{$obj->id}});"  class="btn btn-success ">
                                                        <span class="glyphicon glyphicon-ok"></span>
                                                    </a>
                                                    <a data-toggle="tooltip" title="Rejected" href="#" onclick="rejectr({{$obj->id}});" class="btn btn-danger">
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                    </a>
                                                        @endif

                                                </td>

                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                    {{-- <div align="center">
                                         {{$all_items->links()}}
                                     </div>--}}

                                </div>
                            </div>
                        </div>
                    </section>
                </section>
                <section id="item_part2" class="hidealways">
                    <section id="item_list">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                       Add Testimonials
                                        {{--<button onclick="openAddform();" class="btn btn-default pull-right"><i
                                                    class="mdi mdi-plus"></i>Add</button>--}}
                      </span>
                                    <?php $userdata= \App\UserMaster::get();?>
                                    <select class="form-control" name="userid" id="userid">
                                        <option value="0">--select--</option>
                                        @foreach($userdata as $userobj)
                                            <option value="{{$userobj->id}}">{{$userobj->name}}</option>
                                        @endforeach
                                    </select>

                                    <textarea class="form-control" placeholder="Enter Review" name="review" id="review" cols="30" rows="10"></textarea>
                                    <input type="button" onclick="mytesti();" class="btn btn-primary btn-block" value="Add">
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>

        <div class="modal fade" id="myModalR" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div id="Rh" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Reject Information</h4>
                    </div>
                    <div id="Rb" class="modal-body">
                        <textarea class="form-control" id="rejectdetails" placeholder="Enter Some Details"></textarea>
                    </div>
                    <div id="Rf" class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        </div>



    </section>

    <script>
        function approvedr(id)
        {
          var myid=id;
            $.get('{{url('approvereciepe')}}', {myid: myid}, function (data) {
                /* alert(data);*/

                location.reload();
            });

        }
function rejectr(id)
{

    $('#Rf').html('');
    $('#Rf').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="sendrejreq('+id+');" class="btn btn-danger">Reject</button>');
    $('#myModalR').modal();


}

function sendrejreq(id)
{
    var myid=id;
    var value= $('#rejectdetails').val();

    $.get('{{url('rejectRecip')}}', {myid: myid,value:value}, function (data) {
        /* alert(data);*/
        alert(data);
        console.log(data);
        location.reload();
    });
}

function deleteR(id)
{
    myid=id;
    $.get('{{url('deleteRecip')}}', {myid: myid}, function (data) {
        /* alert(data);*/

        console.log(data);
        location.reload();
    });
}




        function openmyform()
        {
            $("#item_part1").addClass("hidealways");
            $("#item_part2").removeClass("hidealways");
        }
        function openlist()
        {
            $("#item_part1").removeClass("hidealways");
            $("#item_part2").addClass("hidealways");
        }

    </script>
@stop
{{--$("#myroll").load(location.href + " #myroll");--}}
{{--window.location.reload();--}}






