<style>
    .error_register {
        color: red;
        font-weight: bold;
        padding-top: 58px;
    }
</style>
<nav class="main_menu fixed_menu" id="top_header_menu">
    <div class="container">
        <div class="row top_menubox">
            <div class="main_logo">
                <a href="{{url('/')}}">
                    <img src="{{url('images/white_logo_single2.png')}}">
                </a>
            </div>
            <div class="menu_all_containner">
                <div class="testominial_box">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="testominial_row">
                                    <img class="testominial_img" src="{{url('images/testominial_img5.jpg')}}">
                                    <div class="testominial_txtbox">
                                        <h4>- Anurag Agrawal</h4>
                                        <p>EAT PURE KEEP FIT EAT PURE KEEP FITEAT PURE KEEP FITEAT PURE KEEP FITEAT PURE
                                            KEEP FITEAT PURE KEEP FIT</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testominial_row">
                                    <img class="testominial_img" src="{{url('images/testominial_img4.jpg')}}">
                                    <div class="testominial_txtbox">
                                        <h4>- Sandhya Borkar</h4>
                                        <p>At Organic Dolchi store kachnar At Organic Dolchi store kachnar At Organic
                                            Dolchi store kachnar At Organic Dolchi store kachnar</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testominial_row">
                                    <img class="testominial_img" src="{{url('images/testominial_img3.jpg')}}">
                                    <div class="testominial_txtbox">
                                        <h4>- Ashish Katiyar</h4>
                                        <p>At Organic Dolchi store kachnar At Organic Dolchi store kachnar At Organic
                                            Dolchi store kachnar At Organic Dolchi store kachnar</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testominial_row">
                                    <img class="testominial_img" src="{{url('images/Admin_pic.jpg')}}">
                                    <div class="testominial_txtbox">
                                        <h4>- Pinku Kesharwani</h4>
                                        <p>At Organic Dolchi store kachnar At Organic Dolchi store kachnar At Organic
                                            Dolchi store kachnar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login_with_baskit">
                    <ul>
                        @if(!isset($_SESSION['user_master']))
                            <li onclick="ShowLoginSignup('signin');">Sign In</li>
                            <li onclick="ShowLoginSignup('signup');">Sign Up</li>
                        @else
                            <li>
                                <div class="my_account_box glo_menuclick">My Account
                                    <div class="menu_basic_popup menu_popup_account scale0">
                                        <div class="menu_popup_account">
                                            <div class="menu_popup_settingrow">
                                                <a href="{{url('/')}}" class="menu_setting_row">
                                                    <i class="mdi mdi-home"></i>
                                                    Home
                                                </a>
                                            </div>
                                            <div class="menu_popup_settingrow">
                                                <a href="{{url('my_profile')}}" class="menu_setting_row">
                                                    <i class="mdi mdi-account-edit"></i>
                                                    Edit Profile
                                                </a>
                                            </div>
                                            <div class="menu_popup_settingrow">
                                                <a href="{{url('product_list')}}" class="menu_setting_row">
                                                    <i class="mdi mdi-basket"></i>
                                                    Product List
                                                </a>
                                            </div>
                                            <div class="menu_popup_settingrow">
                                                <a href="{{url('order_list')}}" class="menu_setting_row">
                                                    <i class="mdi mdi-format-list-checks"></i>
                                                    Order List
                                                </a>
                                            </div>
                                            <div class="menu_popup_settingrow">
                                                <a href="{{url('product_feedback')}}" class="menu_setting_row">
                                                    <i class="mdi mdi-message-draw"></i>
                                                    Review &amp; Rating
                                                </a>
                                            </div>
                                            <div onclick="ChangePasswordShow();" class="menu_popup_settingrow"
                                                 data-target="#myModal_UpdatePassword" data-toggle="modal">
                                                <a class="menu_setting_row" href="#">
                                                    <i class="mdi mdi-lock-open-outline"></i>
                                                    Change Password
                                                </a>
                                            </div>
                                            <div class="menu_popup_settingrow">
                                                <a href="{{url('logout')}}" class="menu_setting_row">
                                                    <i class="mdi mdi-logout"></i>
                                                    Logout
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                        <li style="border-right: none;">
                            <div class="baskit_containner glo_menuclick" id="cartload">

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
{{--<div class="page_loader" id="page_loader">--}}
{{--<div class="loaders">--}}
{{--<div class="dot dot-1"></div>--}}
{{--<div class="dot dot-2"></div>--}}
{{--<div class="dot dot-3"></div>--}}
{{--</div>--}}
{{--</div>--}}
<div class="fixed_button fixed_top" id="top_scroll_btn" onclick="ScrollBottom();">
    <i class="mdi mdi-mdi mdi-arrow-expand-down"></i>
</div>
<div class="fixed_button fixed_bottom" id="bottom_scroll_btn" onclick="ScrollTop();">
    <i class="mdi mdi-mdi mdi-arrow-expand-up"></i>
</div>
<div class="fixed_asked" data-toggle="tooltip" data-placement="left" title="Ask For Call" id="ask_call">
    <span class="" data-toggle="modal" data-target="#AskForCall">
    <i class="mdi mdi-phone"></i>
    </span>
</div>
<div class="modal right fade" id="AskForCall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2" style="color: #0dae0d;">Ask For Call</h4>
                <div class="headphone_forask">
                    <i class="mdi mdi-headphones-settings"></i>
                </div>
            </div>
            <div class="modal-body">
                <div class="deli_row">
                    <input type="number" name="ask_number" id="ask_number" autocomplete="off"
                           class="form-control numberOnly login_txt"
                           placeholder="Enter Mobile Number"/>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="AskForCall()" id="AskSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>
<div id="myModal_UpdatePassword" class="modal fade" role="dialog" aria-hidden="false">
    <div class="modal-dialog forgotpass_lb">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">UPDATE PASSWORD ?</h4>
            </div>
            <div class="modal-body">
                <div class="basic_lb_row">
                    <input type="password" class="form-control forgot_txt" placeholder="Old Password"
                           id="txtChange_previousPsd" autocomplete="off" data-validate="TT_btnChangepass">
                    <div class="forgot_icon"><i class="mdi mdi-lock mdi-16px"></i></div>
                </div>
                <div class="basic_lb_row">
                    <input type="password" class="form-control forgot_txt" placeholder="New Password"
                           id="txtchange_newPsd"
                           autocomplete="off" data-validate="TT_btnChangepass">
                    <div class="forgot_icon"><i class=" mdi mdi-lock-open-outline mdi-16px"></i></div>
                </div>
                <div class="basic_lb_row">
                    <input type="password" class="form-control forgot_txt" placeholder=" Re-type Password"
                           id="txtchange_retypePsd" autocomplete="off" data-validate="TT_btnChangepass">
                    <div class="forgot_icon"><i class=" mdi mdi-lock-open-outline mdi-16px"></i></div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="submitChange();" class="btn btn-primary" id="TT_btnChangepass">Update
                </button>
            </div>
        </div>

    </div>
</div>
<!------Popup Box -->
<div class="modal popup_bgcolor" id="sucess_popup">
    <div class="popup_box">
        <div class="alert_popup success_bg">
            <div class="popup_verified"><i class="mdi mdi-check"></i></div>
            <h4 class="popup_mainhead">Thank You!</h4>
            <p class="popup-text dynamic_popuptxt">You have successfully Submit</p>
        </div>
        <div class="popup_submit">
            <button class="popup_submitbtn success_bg sucess_btn" type="submit" onclick="HidePopoupMsg();">Ok
            </button>
        </div>
    </div>
</div>
<div class="modal popup_bgcolor" id="error_popup">
    <div class="popup_box">
        <div class="alert_popup error_bg">
            <div class="popup_verified"><i class="mdi mdi-close"></i></div>
            <h4 class="popup_mainhead">Error Massage!</h4>
            <p class="popup-text dynamic_popuptxt">You have entered wrong text</p>
        </div>
        <div class="popup_submit">
            <button class="popup_submitbtn error_bg error_btn" type="submit" onclick="HidePopoupMsg();">ok</button>
        </div>
    </div>
</div>
<div class="modal popup_bgcolor" id="conformation_popup">
    <div class="popup_box">
        <div class="alert_popup conformation_bg">
            <div class="popup_verified"><i class="mdi mdi-close"></i></div>
            <h4 class="popup_mainhead">Confirmation Massage!</h4>
            <p class="popup-text dynamic_popuptxt">Do you really want to delete this record.t</p>
        </div>
        <div class="popup_submit">
            <a class="popup_submitbtn conformation_bg conformation_btn" type="submit" id="ConfirmBtn"
               onclick="HidePopoupMsg();">Yes
            </a>
            <a class="popup_submitbtn conformation_nobtn" type="submit" onclick="HidePopoupMsg();">No</a>
        </div>
    </div>
</div>

<div class="modal popup_bgcolor" id="loginSignup_popup">
    <div class="login_popup_box">
        <div class="close_login" onclick="HidePopoupMsg();"><i class="mdi mdi-close"></i></div>
        <div class="login_lefttxtbox">
            <div class="left_block login">
                <h1>Login</h1>
                <p>Get access to your Orders, and Recommendations.</p>
                <img src="{{url('images/signin_images.png')}}">
            </div>
            <div class="left_block registration">
                <h1>Registration</h1>
                <p>We do not share your personal details with anyone.</p>
                <img src="{{url('images/signup_image.png')}}">
                <div class="error_register">
                    <p id="error_register"></p>
                </div>
            </div>
            <div class="left_block forgot">
                <h1>Forgot</h1>
                <p>Enter mobile number associated with your Organic Dolchi account.</p>
                <img src="{{url('images/forgot_image.png')}}"/>
            </div>
        </div>
        <div class="login_right_txt">
            <div class="right_block login">
                <form action="{{url('login')}}" method="post" enctype="multipart/form-data"
                      class="form-horizontal" id="frmLogin">
                    <div class="deli_row">
                        <input type="text" name="email_pass" autocomplete="off" class="form-control login_txt"
                               placeholder="Email/Mobile Number " id="login_mobile">
                    </div>
                    <div class="deli_row">
                        <input type="password" name="login_password" autocomplete="off" class="form-control login_txt"
                               placeholder="Password" id="login_password">
                    </div>
                    <hr>
                    <div class="deli_row">
                        <button onclick="send_login();" class="btn btn-success login_btn" type="button">
                            <i class="mdi mdi-account-check basic_icon_margin"></i>Submit
                        </button>
                    </div>
                </form>
                <hr>
                <div class="product_btn_box">
                    <div class="btn btn-warning pull-left" onclick="ShowLoginSignup('forgot')">
                        <i class="mdi mdi-account-alert basic_icon_margin"></i>Forgot
                    </div>
                    <div class="btn btn-success pull-center" onclick="ShowLoginSignup('verify')">
                        <i class="mdi mdi-account-alert basic_icon_margin"></i>Verify Account
                    </div>
                    <div class="btn btn-primary pull-right" onclick="ShowLoginSignup('signup');">
                        <i class="mdi mdi-account-edit basic_icon_margin"></i>Sign Up
                    </div>
                </div>
            </div>
            <div class="right_block forgot">
                <div class="deli_row">
                    <input type="text" name="email_pass" autocomplete="off" maxlength="10"
                           class="form-control numberOnly login_txt"
                           placeholder="Enter Mobile Number ">
                </div>
                <hr>
                <div class="deli_row">
                    <button class="btn btn-success login_btn" onclick="forgotpasswordsend();">
                        <i class="mdi mdi-account-check basic_icon_margin"></i>Submit
                    </button>
                </div>
                <hr>
                <div class="product_btn_box">
                    <div class="btn btn-primary login_btn" onclick="ShowLoginSignup('signin');">
                        <i class="mdi mdi-account-edit basic_icon_margin"></i>Sign In
                    </div>
                </div>
            </div>
            <div class="right_block verify">
                <div class="deli_row">
                    <input type="text" name="email_pass" autocomplete="off" class="form-control "
                           placeholder="Enter verification code" id="txtotp2">
                </div>
                <hr>
                <div class="deli_row">
                    <button class="btn btn-success login_btn" onclick="submitotpForm()">
                        <i class="mdi mdi-account-check basic_icon_margin"></i>Submit
                    </button>
                </div>
                <hr>
                <div class="product_btn_box">
                    <div class="btn btn-primary login_btn" onclick="ShowLoginSignup('signin');">
                        <i class="mdi mdi-account-edit basic_icon_margin"></i>Sign In
                    </div>
                </div>
            </div>
            <div class="right_block registration">
                <div class="deli_row">
                    <input type="text" name="referal_code" autocomplete="off"
                           class="form-control numberOnly txt_space login_txt"
                           placeholder="Referral Code(Contact No)" maxlength="10" onpaste="return false;" id="ref_code">
                </div>
                <div class="deli_row">
                    <input type="text" name="reg_name" autocomplete="off" class="form-control txt_space login_txt"
                           placeholder="Enter Name" id="name">
                </div>
                <div class="deli_row">
                    <input type="email" name="reg_email" autocomplete="off" class="form-control txt_space login_txt"
                           placeholder="Enter Email Id" id="email_id" maxlength="50" onpaste="return false;">
                </div>
                <div class="deli_row">
                    <input type="text" name="reg_number" autocomplete="off" maxlength="10"
                           class="form-control numberOnly txt_space login_txt"
                           placeholder="Enter Mobile Number" id="mobile" onpaste="return false;">
                </div>
                <div class="deli_row">
                    <input type="password" name="reg_password" autocomplete="off"
                           class="form-control txt_space login_txt"
                           placeholder="Enter Password" id="password">
                </div>
                <div class="deli_row">
                    <input type="password" name="reg_password" autocomplete="off"
                           class="form-control txt_space login_txt"
                           placeholder="Confirmation Password" id="confirm_password">
                </div>
                <div class="deli_row">
                    <button onclick="check();" data-validate="true" id="btnReg" class="btn btn-success login_btn">
                        <i class="mdi mdi-account basic_icon_margin"></i>Registered
                    </button>
                </div>
                <hr>
                <div class="deli_row">
                    <button class="btn btn-default login_btn" onclick="ShowLoginSignup('signin');">
                        <i class="mdi mdi-account-check basic_icon_margin"></i>Existing User? Log In
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

{{--<div id="re_verify_otp_email" class="connect_LBbox modal fade in" role="dialog" aria-hidden="false">--}}
{{--<div class="modal-dialog forgotpass_lb">--}}
{{--<!-- Modal content-->--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<button type="button" class="close" data-dismiss="modal" onclick="closeForgotLbox();">×</button>--}}
{{--<h4 class="modal-title">OTP VERIFICATION</h4>--}}
{{--</div>--}}
{{--<div class="modal-body">--}}
{{--<div class="logindiv" style="border: none">--}}
{{--<input type="text" class="form-control forgot_txt" placeholder="Please enter otp" id="txtotp2"--}}
{{--autocomplete="off" data-validate="TT_btnforgotpass">--}}
{{--<div class="forgot_icon mdi mdi-account-check"></div>--}}
{{--</div>--}}
{{--<!--  <div class="logindiv" style="border: none">--}}
{{--<input type="text" class="form-control forgot_txt" placeholder="Please enter email id"  id="txtvarify_email" autocomplete="off" data-validate="TT_btnforgotpass">--}}
{{--<div class="forgot_icon mdi mdi-email-open-outline"></div>--}}
{{--</div>-->--}}
{{--<p class="statusMsg"></p>--}}
{{--</div>--}}
{{--<div class="modal-footer text-center">--}}
{{--<a href="#">--}}
{{--<button type="button" class="btn btn-primary" onclick="submitotpForm()" id="varify_otp_email">--}}
{{--Validate OTP--}}
{{--</button>--}}
{{--</a>--}}

{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}
<!--<style type="text/css">

</style>
<script type="text/javascript">

</script>-->
<script type="text/javascript">
    function forgotpasswordsend() {
        var contact = $('#fcontact_no').val();
        if (contact.trim() == '') {
            swal("Oops....", "Please enter contact", "info");
            return false;
        }
        else {
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('forgot_password') }}",
                data: {contact: contact},
                success: function (data) {
                    if (data == 'ok') {
                        swal("Success....", "Password has been sent successfully", "success");
                    } else if (data == 'Incorrect') {
                        swal("Oops....", "Please enter registered mobile no", "info");
                    }
                },
                error: function (xhr, status, error) {
//                    alert('xhr.responseText');
                    $('#err').html(xhr.responseText);
                }
            });
        }
    }
    function submitotpForm() {
        var txtotp = $('#txtotp2').val();
        if (txtotp.trim() == '') {
            swal("Oops....", "Please enter verification code", "info");
            $('#txtotp').focus();
            return false;
        } else {
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('verify_otp') }}",
                data: {txtotp: txtotp},
                success: function (data) {
                    if (data == 'ok') {
                        $('#txtotp').val('');
                        swal("Success", "You have verified successfully...you will be redirected in 3 seconds", "success");
                        setTimeout(function () {
                            window.location.href = "{{url('product_list')}}";
                        }, 3000);
                    } else if (data == 'Incorrect') {
                        $('#txtotp').val('');
                        swal("Oops....", "Incorrect otp...Please enter correct otp", "info");
                    }
                },
                error: function (xhr, status, error) {
//                    alert('xhr.responseText');
                    $('#err').html(xhr.responseText);
                }
            });
        }
    }

    $(document).ready(function () {
        $('#email_id').focusout(function () {
            var re = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
            if ($(this).val() != '') {
                if (!re.test($(this).val())) {
                    swal("Oops....", "Please enter correct email id", "info");
                    this.value = "";
                }
                else {
                    var domains = ["gmail.com", "hotmail.com", "msn.com", "yahoo.com", "yahoo.in", "yahoo.com", "aol.com", "hotmail.co.uk", "yahoo.co.in", "live.com", "rediffmail.com", "outlook.com", "hotmail.it", "googlemail.com", "mail.com"]; //update ur domains here
                    var idx1 = this.value.indexOf("@");
                    if (idx1 > -1) {
                        var splitStr = this.value.split("@");
                        var sub = splitStr[1].split(".");
                        if ($.inArray(splitStr[1], domains) == -1) {
                            swal("Oops....", "Email must have correct domain name Eg: @gmail.com", "info");
                            this.value = "";
                        }
                    }
                }
            }


        });

        $('#mobile').focusout(function () {
            var txt_val = $(this).val();
            if (txt_val.trim() == '') {
                $('#mobile').html('');
            } else {
                $.ajax({
                    type: "get",
                    contentType: "application/json; charset=utf-8",
                    url: "{{ url('checkno') }}",
                    data: {contact: txt_val},
//                    data: '{"formData":"' + formData + '", "rc":"' + txt_val + '"}',
                    success: function (data) {
                        if (data == 'already') {
                            swal("Oops....", "Contact no already exist please user different contact no", "info");
                            $('#mobile').val('');
                        }
                    },
                    error: function (xhr, status, error) {
//                    alert('xhr.responseText');
//                        $('#mobile').html(xhr.responseText);
                    }
                });
            }
        });

        $('#ref_code').focusout(function () {
            var txt_val = $(this).val();
            if (txt_val.trim() == '') {
                $('#ref_code').html('');
            } else {
                $.ajax({
                    type: "get",
                    contentType: "application/json; charset=utf-8",
                    url: "{{ url('checkno') }}",
                    data: {contact: txt_val},
//                    data: '{"formData":"' + formData + '", "rc":"' + txt_val + '"}',
                    success: function (data) {
                        if (data != 'already') {
                            swal("Oops....", "You have entered invalid Referral code", "info");
                            $('#ref_code').val('');
                        }
                    },
                    error: function (xhr, status, error) {
//                    alert('xhr.responseText');
                        $('#ref_code').html(xhr.responseText);
                    }
                });
            }
        });
    });
    function Requiredtxt(me) {
        var text = $.trim($(me).val());
        if (text == '') {
            $(me).addClass("errorClass");
            return false;
        } else {
            $(me).removeClass("errorClass");
            return true;
        }
    }
    {{--var EmailValidate = function (me) {--}}
    {{--var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;--}}

    {{--var emailText = $.trim($(me).val());--}}
    {{--if (pattern.test(emailText)) {--}}
    {{--$(me).removeClass("errorClass");--}}
    {{--return true;--}}
    {{--} else {--}}
    {{--$(me).addClass("errorClass");--}}
    {{--return false;--}}
    {{--}--}}
    {{--}--}}
    function check() {
        var email = $('#email_id').val();
        var mobile = $('#mobile').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        var phoneno = /^\d{10}$/;
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        var result = true;
        if (!Boolean(Requiredtxt("#name")) || !Boolean(Requiredtxt("#email_id")) || !Boolean(Requiredtxt("#password")) || !Boolean(Requiredtxt("#confirm_password"))) {
            result = false;
        }
        if (!result) {
            return false;
        } else {
            register_user();
        }
    }


    function register_user() {
        var ref_code = $('#ref_code').val();
        var user_name = $('#name').val();
        var email_id = $('#email_id').val();
        var mobile = $('#mobile').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        $.ajax({
            type: "get",
            url: "{{url('register_user')}}",
            data: "ref_code= " + ref_code + "&user_name= " + user_name + "&email_id= " + email_id + "&mobile= " + mobile + "&password= " + password,
            success: function (data) {

                if (data == 'Mobile Number Already Linked With Another Account!!!!!!') {
                    $('#error_register').html('Mobile Number Already Linked With Another Account!!!!!!');
                }
                else if (data == 'email Address is Already Linked With Another Account!!!') {
                    $('#error_register').html('email Address is Already Linked With Another Account!!!');
                }
                else {
                    $('#error_register').html('');
                    HidePopoupMsg();
                    $('#ref_code').val('');
                    $('#name').val('');
                    $('#email_id').val('');
                    $('#mobile').val('');
                    $('#password').val('');
                    $('#confirm_password').val('');
                    swal("Success....", "User Registration Successfully...", "success");
                }
            },
            error: function (data) {
                HidePopoupMsg();
                ShowErrorPopupMsg('oops Something Went Wrong...');
            }
        });
    }

    function AskForCall() {
        var ask_number = $('#ask_number').val();
        if (ask_number == '') {
            swal("Required", "Please enter you number", "info");
        } else {
            $.ajax({
                type: "get",
                url: "{{url('ask_number')}}",
                data: "ask_number= " + ask_number,
                success: function (data) {
                    if (data == 'success') {
                        $('#AskForCall').modal('hide');
                        swal("Thank you", "We will get back to you soon", "success");
                    } else {
                        swal("Oops", "Something went wrong", "info");
                    }
                },
                error: function (data) {
                    HidePopoupMsg();
                    ShowErrorPopupMsg('oops Something Went Wrong...');
                }
            });
        }
    }


    function send_login() {
        var login_mobile = $('#login_mobile').val();
        var login_password = $('#login_password').val();
        var result = true;
        if (!Boolean(Requiredtxt("#login_mobile")) || !Boolean(Requiredtxt("#login_password"))) {
            result = false;
        }
        if (!result) {
            return false;
        } else {
            $.ajax({
                type: "get",
                url: "{{url('login_user')}}",
                data: {login_mobile: login_mobile, login_password: login_password},
                success: function (data) {
                    if (data == "Login Success") {
                        HidePopoupMsg();
                        window.location.reload();
                    } else if (data == "UserName/Password Invalid") {
                        HidePopoupMsg();
                        swal("Oops....", "UserName or Password is Invalid", "info");
                    } else if (data == 'Not Verified') {
                        swal("Oops....", "Your account in not verified, verification code has been sent to your registered mobile no", "info");
                        ShowLoginSignup('verify');
                    } else if (data == 'inactive') {
                        swal("Oops....", "Your account is deactivated by admin, Please contact to organic dolchi admin", "info");
                    } else {
                        window.location.reload();
                    }
                },
                error: function (data) {
//                alert(data);
                }
            });
        }
    }

    $(document).onkeydown = function () {
        // document.onkeydown = function () {
        if (window.event.keyCode == '13') {
            send_login();
        }
    }

    function submitChange() {
        $('#myModal_UpdatePassword').modal('show');
//        var cpassword = $('#cpswd').val();
        var oldpassword = $('#txtChange_previousPsd').val();
        var newpassword = $('#txtchange_newPsd').val();
        var confirmpassword = $('#txtchange_retypePsd').val();
        if (oldpassword.trim() == '') {
            alert('Please enter your previous password');
            $('#txtChange_previousPsd').focus();
            return false;
        } else if (newpassword.trim() == '') {
            alert('Please enter your new password');
            $('#txtchange_newPsd').focus();
            return false;
        } else if (confirmpassword.trim() == '') {
            alert('Please enter your confirm password');
            $('#txtchange_retypePsd').focus();
            return false;
        } else if (confirmpassword.trim() != newpassword.trim()) {
            alert('Password Mismatch');
            return false;
        } else {
            $.ajax({
                type: "post",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('change_p') }}",
//                data: '{"data":"' + endid + '"}',
                data: '{"newpassword":"' + newpassword + '", "confirmpassword":"' + confirmpassword + '", "oldpassword":"' + oldpassword + '"}',
                success: function (data) {
                    if (data == 'ok') {
//                        console.log(data);
                        $('#txtChange_previousPsd').val('');
                        $('#txtchange_newPsd').val('');
                        $('#txtchange_retypePsd').val('');
                        ShowSuccessPopupMsg('Password changed successfully');
                        $('#myModal_UpdatePassword').modal('toggle');
                    } else if (data == 'Incorrect') {
                        $('#txtChange_previousPsd').val('');
                        ShowErrorPopupMsg('Incorrect current password');
                    }
                },
                error: function (xhr, status, error) {
                    $('#err1').html(xhr.responseText);
                }
            });
        }
    }

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $(".txt_space").on({
        keydown: function (e) {
            if (e.which === 32)
                return false;
        },
        change: function () {
            this.value = this.value.replace(/\s/g, "");
        }
    });
</script>