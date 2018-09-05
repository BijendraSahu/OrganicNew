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
                <form action="{{url('/postrollmasterupdate')}}" method="get">
                    <section id="item_part2">
                        <section id="item_list">
                            <div class="col-sm-12 col-md-12 col-xs-12">
                                <div class="dash_boxcontainner white_boxlist">
                                    <div class="upper_basic_heading"><span class="white_dash_head_txt">
                       Add Staff Member
                                            {{--<button onclick="openAddform();" class="btn btn-default pull-right"><i
                                                        class="mdi mdi-plus"></i>Add</button>--}}
                      </span>


                                        <input type="text" value="{{$mydata->username}}" name="username" class="form-control" placeholder="Enter User Name" disabled="disabled">
                                        <input type="text" value="{{$mydata->password}}" name="password1" class="form-control" placeholder="Enter User Password">
                                        <input type="hidden" value="{{$mydata->id}}" name="myid">

                                        <label>Select Menu :</label>
                                        <p class="clearfix"></p>
                                        <?php  $munudata=\App\Menumodel::get();?>
                                        @foreach($munudata as $munudata1)
                                            <div style="margin-bottom: 15px;" class="pretty p-icon p-rotate col-sm-2">
                                                <input value="{{$munudata1->id}}" class="item_chk" type="checkbox" name="menuid[]" />
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






    </section>

    <script>
        $(document).ready(function () {
            $('.item_chk').each(function () {
                @foreach($myallmenuid as $myobj)
                if ($(this).val() == '{{$myobj->menu_id}}') {
                    $(this).attr('checked', 'checked');
                }
                @endforeach
            });


        });




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






