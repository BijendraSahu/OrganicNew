<ul class="nav nav-tabs nav-justified indigo" role="tablist">
    <li class="nav-item active">
        <a class="nav-link" data-toggle="tab" onclick="first();" href="#aditya" role="tab"><i class="fa fa-user basicicon_margin"></i>
            Profile Settings</a>
    </li>
    {{--<li class="nav-item">
        <a class="nav-link" data-toggle="tab" onclick="second();" href="#aditya" role="tab"><i
                    class="fa fa-unlock-alt basicicon_margin"></i> Change Password</a>
    </li>--}}
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" onclick="third();" href="#adiya" role="tab"><i class="fa fa-users basicicon_margin"></i>
            Role Manager</a>
    </li>
</ul>

<div class="nav_containner" id="first" style="display: block;">
    <div class="col-sm-4 img">
        <img src="admin_pic/{{$_SESSION['admin_master']['id']}}/{{$data->image}}" class="img_profile"/>
    </div>
    <div class="col-sm-4 textbox_containner linemy">
        <form action="{{url('/myadminpost')}}" method="post" id="adminpostForm" enctype="multipart/form-data">
            <label>Name</label>
        <input type="text" name="name" id="name" placeholder="Enter Your Name" value="{{$_SESSION['admin_master']['username']}}" class="form-control" disabled/>
        <p></p>
            <label>Upload Profile Picture</label>
        <input type="file" name="file" id="file"  class="form-control"/>

        <p></p>
        <input type="submit" class="btn btn-info">
        </form>
    </div>
    <div class="col-sm-4 textbox_containner">

            <label>Old Password</label>
            <input type="password" name="old_password" id="opass" placeholder="Enter Your Old Password"  class="form-control required"/>
        <p id="almes"></p>
            <p></p>
            <label>New Password</label>
            <input type="password" name="new_password" placeholder="Enter Your New Password" id="npass"  class="form-control required"/>
            <p></p>
        <input type="button" value="Change" onclick="passchange();" class="btn btn-info">


    </div>
</div>
{{--<div class="nav_containner" id="second">
</div>--}}
<div class="nav_containner" id="third">
</div>

<style type="text/css">

    .linemy
    {
        border-right: 1px solid #ccc;
    }
    .img_profile {
        border: 1px solid #337ab7b8;
        width: 100%;
        max-width: 220px;
        border: solid thin #eaeaea;
        padding: 15px;
        border-radius: 50%;
        background: #f5f5f59c;
        box-shadow: 1px 1px 0px #f9f9f9;
        min-height: 200px;
        min-width: 200px;
    }
    .img {
        margin: 20px 0px;
        display: inline-block;
        border-right: 1px solid #ccc;
        text-align: center;
    }
    .nav_containner {
        width: 100%;
        display: none;
    }
    .textbox_containner
    {
        display: inline-block;
        margin-top: 40px;
    }
    .edit_item_container
    {
        display: inline-block;
    }
    .basicicon_margin
    {
        margin-right: 5px;
    }
</style>
<script type="text/javascript">
    function first() {
        $("#first").show();
        $("#second").hide();
        $("#third").hide();
    }
  /*  function second() {
        $("#second").show();
        $("#first").hide();
        $("#third").hide();
    }*/
    function third() {
        $("#first").hide();
        $("#second").hide();
        $("#third").show();
    }


    $("#adminpostForm").on('submit', function (e) {
//                var textval = $('#post_text').text();
//                $('#posttext').val(textval);
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "{{ url('myadminpost') }}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                //console.log(data);
                $('#myModal').modal('hide');
                swal({
                    title: "Thankyou!",
                    text: "You successfully Changed your Profile Picture",
                    icon: "success",
                    button: "Ok",
                });

//
            },
            error: function (xhr, status, error) {
//                    console.log('Error:', data);
//                    ShowErrorPopupMsg('Error in uploading...');
                $('#err1').html(xhr.responseText);
            }
        });
//                }
    });


    function passchange()
    {
        var opass=$('#opass').val();
        var npass=$('#npass').val();
        $.get('{{url('changepass')}}', {opass: opass,npass: npass}, function (data) {
            //console.log(data);
            if(data=='1')
            {
                $('#myModal').modal('hide');
                swal({
                    title: "Thankyou!",
                    text: "You successfully Changed your Password",
                    icon: "success",
                    button: "Ok",
                });
            }
            else {
               $('#almes').html(data);
            }

        });


    }
</script>