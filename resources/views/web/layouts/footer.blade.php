<footer id="footer">
    <!-- BEGIN INFORMATIVE FOOTER -->
    <div class="footer-inner">
        <div class="newsletter-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col">
                        <div class="payment-accept">
                            <img src="{{url('images/payment-1.png')}}" alt="payment1"> <img
                                        src="{{url('images/payment-2.png')}}"
                                        alt="payment2">  <img
                                        src="{{url('images/payment-4.png')}}"
                                        alt="payment4">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col1">
                        <form action="#" method="post" class="footer_news_latter_form" id="newsletter-validate-detail1">
                            <div class="newsletter-wrap">
                                <div class="sign_uptxt">Sign up for emails</div>
                                <input type="text" name="email" id="newsletter1" title="Sign up for our newsletter"
                                       class="news_letter_txt required-entry validate-email"
                                       placeholder="Enter your email address">
                                <button type="submit" title="Subscribe" class="button subscribe">
                                    <span>Subscribe</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12 col-lg-4">
                    <div class="co-info">
                        <div><a href="{{url('/')}}"><img src="{{url('images/white_logo.png')}}" alt="footer logo"></a>
                        </div>
                        <address>
                            <div><em class="mdi mdi-map-marker-radius"></em> <span>ABC Write Town, Jablpur Madhya Pradesh </span>
                            </div>
                            <div><em class="mdi mdi-phone-classic"></em><span> + 0800 567 345</span></div>
                            <div><em class="mdi mdi-email-alert"></em><span>abc@example.com</span></div>
                        </address>
                    </div>
                </div>

                <div class="col-sm-8 col-xs-12 col-lg-8">
                    <div class="footer-column">
                        <h4  onclick="show_link(this);">Custom Menu
                            <div class="res_arrow_show mdi mdi-chevron-right"></div></h4>
                        <ul class="links">
                            <li class="first"><a href="blog">
                                    <i class="mdi mdi-arrow-right-bold"></i>Blog</a></li>
                            <li><a href="faq">
                                    <i class="mdi mdi-arrow-right-bold"></i>FAQs</a></li>
                            <li><a href="payments">
                                    <i class="mdi mdi-arrow-right-bold"></i>Payment</a></li>
                            <li><a  href="product_list">
                                    <i class="mdi mdi-arrow-right-bold"></i>Product List</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h4  onclick="show_link(this);">Informations
                            <div class="res_arrow_show mdi mdi-chevron-right"></div></h4>
                        <ul class="links">
                            <li><a  href="aboutus">
                                    <i class="mdi mdi-arrow-right-bold"></i>About Us</a></li>
                            <li><a  href="contactus">
                                    <i class="mdi mdi-arrow-right-bold"></i>Contact Us</a></li>
                            <li><a  href="terms">
                                    <i class="mdi mdi-arrow-right-bold"></i>Terms & Condition</a></li>
                            <li class="last"><a  href="returnpolicy">
                                    <i class="mdi mdi-arrow-right-bold"></i>Return Policy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h4  onclick="show_link(this);">Follow Us
                        <div class="res_arrow_show mdi mdi-chevron-right"></div>
                        </h4>
                        <ul class="links">
                       <li><a><i class="mdi mdi-facebook facebook btn-follow"></i>Facebook</a></li>
                       <li><a><i class="mdi mdi-google-plus btn-follow gmail"></i>Google</a></li>
                       <li><a><i class="mdi mdi-linkedin btn-follow linkedin"></i>Linkedin</a></li>
                       <li><a><i class="mdi mdi-twitter btn-follow twitter"></i>Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
   {{-- <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="row"></div>
            </div>
        </div>
    </div>--}}
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 coppyright">
                    © 2018 All Rights Reserved. Powered by
                    <a href="http://www.retinodes.com/" target="_blank"><img src="{{url('images/retinodes_logo.png')}}"
                                                                         class="logo_powered"></a>
                </div>
            </div>
        </div>
    </div>
</footer>