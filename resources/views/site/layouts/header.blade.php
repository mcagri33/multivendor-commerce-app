<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <ul class="header-contact-info">
                    @auth
                        <li>Welcome to Xton</li>
                    @endauth
                    @if($global_setting_data->phone)
                        <li>Call: <a href="tel:{{$global_setting_data->phone}}">{{$global_setting_data->phone}}</a></li>
                    @endif
                    <li>
                        <div class="dropdown language-switcher d-inline-block">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <img src="{{asset('assets/site/img/us-flag.jpg')}}" alt="image">
                                <span>Eng <i class='bx bx-chevron-down'></i></span>
                            </button>

                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item d-flex align-items-center">
                                    <img src="{{asset('assets/site/img/germany-flag.jpg')}}" class="shadow-sm"
                                         alt="flag">
                                    <span>Ger</span>
                                </a>
                                <a href="#" class="dropdown-item d-flex align-items-center">
                                    <img src="{{asset('assets/site/img/france-flag.jpg')}}" class="shadow-sm"
                                         alt="flag">
                                    <span>Fre</span>
                                </a>
                                <a href="#" class="dropdown-item d-flex align-items-center">
                                    <img src="{{asset('assets/site/img/spain-flag.jpg')}}" class="shadow-sm" alt="flag">
                                    <span>Spa</span>
                                </a>
                                <a href="#" class="dropdown-item d-flex align-items-center">
                                    <img src="{{asset('assets/site/img/russia-flag.jpg')}}" class="shadow-sm"
                                         alt="flag">
                                    <span>Rus</span>
                                </a>
                                <a href="#" class="dropdown-item d-flex align-items-center">
                                    <img src="{{asset('assets/site/img/italy-flag.jpg')}}" class="shadow-sm" alt="flag">
                                    <span>Ita</span>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-12">
                <ul class="header-top-menu">
                    @auth
                        <li><a href="login.html"><i class='bx bxs-user'></i> My Account</a></li>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#shoppingWishlistModal"><i
                                    class='bx bx-heart'></i> Wishlist</a></li>
                    @endauth
                    @guest()
                        <li><a href="compare.html"><i class='bx bx-registered'></i> Register</a></li>
                        <li><a href="login.html"><i class='bx bx-log-in'></i> Login</a></li>
                    @endguest
                </ul>

                <ul class="header-top-others-option">
                    <div class="option-item">
                        <div class="search-btn-box">
                            <i class="search-btn bx bx-search-alt"></i>
                        </div>
                    </div>

                    <div class="option-item">
                        <div class="cart-btn">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#shoppingCartModal"><i
                                    class='bx bx-shopping-bag'></i><span>0</span></a>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
