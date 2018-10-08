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
                       Staff List
                                        <button onclick="openmyform();" class="btn btn-default btn-sm pull-right"><i
                                                    class="mdi mdi-plus"></i>Add</button>
                      </span>
                                    <?php $myrdata=\App\LoginModel::where(['is_active'=>1])->orderBy('id','desc')->get();?>
                                    <p class="clearfix"></p>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th width="10%">Image</th>
                                            <th width="10%">Username</th>
                                            {{--     <th width="50%"></th>--}}
                                            <th width="20%">Roll Master</th>
                                            <th width="50%">Select Menu</th>
                                            <th width="10%">Action</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($myrdata as $obj)

                                            <tr>
                                                <td><img style="height: 90px;" src="{{url('/admin_pic').'/'.$obj->id.'/'.$obj->image}}"></td>
                                                <td>{{$obj->username}}</td>
                                                <td>{{$obj->rm->roll}}</td>
                                                <td>
                                                    <?php $myalldata=\App\Menurolemodel::where(['user_id'=>$obj->id])->get();?>
                                                    @foreach($myalldata as $myobj)
                                                            <div class="col-md-4"><i class="mdi mdi-equal-box"></i>{{ucwords($myobj->mnmy->menu)}}</div>
                                                        @endforeach

                                                </td>
                                                <td><a href="{{url('/getfullrole').'/'.$obj->id}}"><input type="button" class="btn btn-primary btn-sm" value="Update"></a></td>
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
                <form action="{{url('/postrollmaster')}}" method="get">
                <section id="item_part2">
                    <section id="item_list">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                       Add Staff Member
                                        {{--<button onclick="openAddform();" class="btn btn-default pull-right"><i
                                                    class="mdi mdi-plus"></i>Add</button>--}}
                      </span>


                                    <input type="text" onkeyup="checkusername();" name="username" class="form-control" placeholder="Enter User Name">







                                    <input type="password" name="password1" class="form-control" placeholder="Enter User Password">
                                    {{--<input type="password" name="password2" class="form-control" placeholder="Enter Confirm Password">--}}
                                    <label>Select Menu :</label>
                                    <p class="clearfix"></p>
                                    <?php $munudata=\App\Menumodel::where(['is_active'=>1])->get();?>
                                    @foreach($munudata as $munudata1)
                                    <div style="margin-bottom: 15px;" class="pretty p-icon p-rotate col-sm-2">
                                        <input value="{{$munudata1->id}}" type="checkbox" name="menuid[]" />
                                        <div class="state p-success">
                                            <i class="icon mdi mdi-check"></i>

                                            <label>{{ucwords($munudata1->menu)}}</label>

                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                                <input type="submit" name="submit" class="btn btn-primary btn-block">
                                </br>
                            </div>
                        </div>
                    </section>
                </section>
                </form>
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





    </section>

    <script>



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

    <script>

        functio

    </script>
@stop
{{--$("#myroll").load(location.href + " #myroll");--}}
{{--window.location.reload();--}}






