<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>About The {{$global_setting_data->title}}</h3>

                    <div class="about-the-store">
                        @if($global_setting_data->description)
                            <p>{{$global_setting_data->description}}</p>
                        @endif
                        <ul class="footer-contact-info">
                            @if($global_setting_data->address)
                                <li><i class='bx bx-map'></i>{{$global_setting_data->address}}</li>
                            @endif
                            @if($global_setting_data->phone)
                                <li><i class='bx bx-phone-call'></i> <a
                                        href="tel:{{$global_setting_data->phone}}">{{$global_setting_data->phone}}</a>
                                </li>
                            @endif
                            @if($global_setting_data->email)
                                <li><i class='bx bx-envelope'></i> <a
                                        href="mailto:{{$global_setting_data->email}}">{{$global_setting_data->email}}</a>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <ul class="social-link">
                        @if($global_setting_data->facebook)
                            <li><a href="{{$global_setting_data->facebook}}" class="d-block" target="_blank"><i
                                        class='bx bxl-facebook'></i></a></li>
                        @endif
                        @if($global_setting_data->twitter)
                            <li><a href="{{$global_setting_data->twitter}}" class="d-block" target="_blank"><i
                                        class='bx bxl-twitter'></i></a></li>
                        @endif
                        @if($global_setting_data->instagram)
                            <li><a href="{{$global_setting_data->instagram}}" class="d-block" target="_blank"><i
                                        class='bx bxl-instagram'></i></a></li>
                        @endif
                        @if($global_setting_data->linkedin)
                            <li><a href="{{$global_setting_data->linkedin}}" class="d-block" target="_blank"><i
                                        class='bx bxl-linkedin'></i></a></li>
                        @endif
                        @if($global_setting_data->pintrest)
                            <li><a href="{{$global_setting_data->pintrest}}" class="d-block" target="_blank"><i
                                        class='bx bxl-pinterest-alt'></i></a></li>
                        @endif
                        @if($global_setting_data->youtube)
                            <li><a href="{{$global_setting_data->youtube}}" class="d-block" target="_blank"><i
                                        class='bx bxl-youtube'></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-4">
                    <h3>Quick Links</h3>

                    <ul class="quick-links">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="products-left-sidebar.html">Shop Now!</a></li>
                        <li><a href="products-left-sidebar-2.html">Woman's</a></li>
                        <li><a href="faqs.html">FAQ's</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="customer-service.html">Customer Services</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Customer Support</h3>

                    <ul class="customer-support">
                        <li><a href="login.html">My Account</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="faqs.html">FAQ's</a></li>
                        <li><a href="track-order.html">Order Tracking</a></li>
                        <li><a href="contact.html">Help & Support</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Newsletter</h3>

                    <div class="footer-newsletter-box">
                        <p>To get the latest news and latest updates from us.</p>

                        <form class="newsletter-form" data-bs-toggle="validator">
                            <label>Your E-mail Address:</label>
                            <input type="email" class="input-newsletter" placeholder="Enter your email" name="EMAIL"
                                   required autocomplete="off">
                            <button type="submit">Subscribe</button>
                            <div id="validator-newsletter" class="form-result"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <p>© Xton is Proudly Owned by <a href="https://hibootstrap.com/" target="_blank">HiBootstrap</a></p>
                </div>

                <div class="col-lg-6 col-md-6">
                    <ul class="payment-types">
                        <li><a href="#" target="_blank"><img src="{{asset('assets/site/img/payment/visa.png')}}"
                                                             alt="image"></a></li>
                        <li><a href="#" target="_blank"><img src="{{asset('assets/site/img/payment/mastercard.png')}}"
                                                             alt="image"></a></li>
                        <li><a href="#" target="_blank"><img src="{{asset('assets/site/img/payment/mastercard2.png')}}"
                                                             alt="image"></a></li>
                        <li><a href="#" target="_blank"><img src="{{asset('assets/site/img/payment/visa2.png')}}"
                                                             alt="image"></a></li>
                        <li><a href="#" target="_blank"><img src="{{asset('assets/site/img/payment/expresscard.png')}}"
                                                             alt="image"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</footer>
