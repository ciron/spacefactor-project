<header class="site-header">
    <div class="flyout-trigger">
        <span class="flyout-trigger__bar"></span>
        <span class="flyout-trigger__bar"></span>
        <span class="flyout-trigger__bar"></span>
    </div>
    <div class="side-bar">
        <div class="side-bar__text">
            <div class="content-asset">
                <p>MAKE AN EXTRAORDINARY <b>SPACE.</b></p>
            </div>
        </div>
    </div>
    <nav class="flyout">
        <div class="flyout__inner">
            <div class="flyout__menu-top">
                <ul class="js--menu-accordion menu-accordion" data-id="flyout-menu-accordion-products">
                    <li class="menu-accordion__item">
                        <button class="menu-accordion__title menu-accordion__title--small"
                                aria-controls="submenu-Sofas"
                                aria-expanded="false">
                            <span>Style Quiz</span>
                        </button>

                    </li>
                    <li class="menu-accordion__item">
                        <button onclick="window.location='<?=  route('frontend.page.mood_board')  ?>'" class="menu-accordion__title
                        menu-accordion__title--small" aria-controls="submenu-Chairs" aria-expanded="false">
                            <span>Mood Board</span>
                        </button>

                    </li>
                    <li class="menu-accordion__item">
                        <button onclick="window.location='<?=  route('frontend.page.trands')  ?>'" class="menu-accordion__title
                        menu-accordion__title--small" aria-controls="submenu-Tables" aria-expanded="false">
                            <span>Trends</span>
                        </button>

                    </li>
                    <li class="menu-accordion__item">
                        <button onclick="window.location='<?=  route('frontend.page.project')  ?>'" class="menu-accordion__title
                        menu-accordion__title--small" aria-controls="submenu-Storage" aria-expanded="false">
                            <span>Projects</span>
                        </button>

                    </li>
                    <li class="menu-accordion__item">
                        <button class="menu-accordion__title
                        menu-accordion__title--small" aria-controls="submenu-Beds" aria-expanded="false">
                            <span>Design Service</span>
                        </button>
                        <div id="submenu-Sofas" aria-hidden="true" class="menu-accordion__content">
                            <ul class="menu-accordion__sub-items">
                                @foreach($errors as $category)
                                    <li class="menu-accordion__sub-item">
                                        <a role="button"
                                           onClick="location.href='{{ route('frontend.page.design_service', ['detail'=>$category->slug]) }}'"
                                           title="{{$category->cat_name}}">
                                            {{$category->cat_name}}
                                        </a>
                                    </li>


                                @endforeach


                            </ul>

                        </div>

                    </li>
                    <li class="menu-accordion__item">
                        <button onclick="window.location='<?=  route('frontend.page.about')  ?>'" class="menu-accordion__title
                        menu-accordion__title--small" aria-controls="submenu-Accessories"
                                aria-expanded="false">
                            <span>About</span>
                        </button>

                    </li>
                    <li class="menu-accordion__item">
                        <button onclick="window.location='<?=  route('frontend.contact')  ?>'" class="menu-accordion__title
                        menu-accordion__title--small" aria-controls="submenu-Outdoor furniture"
                                aria-expanded="false">
                            <span>Contact Us</span>
                        </button>

                    </li>
                    <li class="menu-accordion__item">
                        <button class="menu-accordion__title
                        menu-accordion__title--small" aria-controls="submenu-Outdoor furniture"
                                aria-expanded="false">
                            <span>Blog</span>
                        </button>

                    </li>

                </ul>
            </div>
            <div class="flyout__menu-bottom">
                <div class="content-asset">
                    <ul class="js--menu-accordion menu-accordion" data-id="flyout-menu-accordion-products">
                        <li class="menu-accordion__item">
                            <button style="    font-size: 12px;  font-weight: 600;" class="menu-accordion__title menu-accordion__title--small"
                                    aria-controls="submenu-Sofas" aria-expanded="false">
                                <span>Email Us</span>
                            </button>
                            <div id="submenu-Sofas" aria-hidden="true" class="menu-accordion__content">
                                <ul class="menu-accordion__sub-items">
                                    <li class="menu-accordion__sub-item">
                                        <a href="mailto:info@spacefactor.design" title="info@spacefactor.design">
                                            info@spacefactor.design
                                        </a>
                                    </li>

                                </ul>
                                <div class="menu-accordion__show-all">
                                    <a href="mailto:designers@spacefactor.design" title="designers@spacefactor.design">
                                        designers@spacefactor.design
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="menu-accordion__item">
                            <button style="    font-size: 12px;  font-weight: 600;" class="menu-accordion__title menu-accordion__title--small"
                                    aria-controls="submenu-Sofas" aria-expanded="false">
                                <span>Call Us</span>
                            </button>
                            <div id="submenu-Sofas" aria-hidden="true" class="menu-accordion__content">
                                <ul class="menu-accordion__sub-items">
                                    <li class="menu-accordion__sub-item">
                                        <a href="tell:+880 1311 337111" title="+880 1311 337111">
                                            +880 1311 337111
                                        </a>
                                    </li>

                                </ul>

                            </div>
                        </li>
                        <li class="menu-accordion__item">
                            <button style="    font-size: 12px;  font-weight: 600;" class="menu-accordion__title menu-accordion__title--small"
                                    aria-controls="submenu-Sofas" aria-expanded="false">
                                <span>Follow Us</span>
                            </button>
                            <div id="submenu-Sofas" aria-hidden="true" class="menu-accordion__content follow-us">
                                <ul class="menu-accordion__sub-items">
                                    <li class="menu-accordion__sub-item">
                                        <a href="https://www.facebook.com/spacefactor" target="_blank" class="icon-link">
                                            <i class="fa fa-facebook"></i>
                                        </a>

                                    </li>
                                    <li class="menu-accordion__sub-item">
                                        <a href="https://www.youtube.com/channel/UClwUwJ9WiqwURaAgQLqdUbw?view_as=subscriber" target="_blank"
                                           class="icon-link">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="menu-accordion__sub-item">

                                        <a href="https://www.instagram.com/spacefactor.design/" target="_blank" class="icon-link">
                                            <i class="fa fa-instagram"></i>
                                        </a>

                                    </li>
                                    <li class="menu-accordion__sub-item">
                                        <a href="https://twitter.com/spacefactorbd" target="_blank" class="icon-link">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="menu-accordion__sub-item">

                                        <a href="https://www.pinterest.com/spacefactorbd/" target="_blank" class="icon-link ">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li class="menu-accordion__sub-item">

                                        <a href="https://www.houzz.com/pro/webuser-870346203/space-factor" target="_blank" class="icon-link ">
                                            <img style="margin-bottom: 14px" width="22.45" height="25"
                                                 src="{{asset('img/frontend/homepage/home.png')}}"
                                                 class="img-responsive"/>

                                        </a>
                                    </li>

                                </ul>

                            </div>
                        </li>
                    </ul>

                </div>
            </div>


        </div>
    </nav>
    <style>
        .follow-us ul {

            padding: 0 !important;
        }

        .follow-us ul li {
            display: inline-block;
            padding: 9px;
        }
    </style>

    <a class="site-header__logo" href="{{url('/')}}" title="Space Factor Design">
        <img src="{{asset('img/frontend/homepage')}}/logo.png" class="img-responsive img_logo"/>
    </a>

    <div class="site-header__top">
        <nav class="site-header__menu">
            <div class="site-header__menu__items js-site-header-items">

                <div class="content-asset">

                    <a href="#" title="Style Quiz" class="">Style Quiz</a>


                    <a href="{{ route('frontend.page.mood_board') }}" title="Mood Board" class="">Mood Board</a>


                    <a href="{{route('frontend.page.trands')}}" title="Trends" class="">Trends</a>
                    <a href="{{route('frontend.page.project')}}" title="Trends" class="">Projects</a>


                    {{--<a href="{{route('frontend.page.design_service')}}" title="Design Service" class="">Design Service</a>--}}

                    <button class="js-productmenu-trigger site-header__menu__item--products" aria-controls="product-menu" aria-expanded="false"
                            id="product-menu-control">
                        Design Service
                    </button>

                    <a href="{{route('frontend.page.about')}}">About</a>

                    <a href="{{ route('frontend.contact') }}" title="Contact Us" class="">Contact Us</a>

                    <p class="contact-number"><a style="color: #bb2b2b !important;" href="tel:+880 1311 337111">+880 1311 337111</a></p>

                </div>

            </div>
        </nav>
    </div>
    <nav class="site-header__sub-menu" id="product-menu" aria-hidden="true">
        <ul class="site-header__sub-menu__categories js--menu-accordion menu-accordion" data-initial-open="true">
            @foreach($errors as $category)
                <li class="site-header__sub-menu__category menu-accordion__item">
                    <button role="button"
                            class="site-header__sub-menu__category-title menu-accordion__title" aria-controls="submenu-Sofas" aria-expanded="false"

                    onClick="location.href='{{ route('frontend.page.design_service', ['detail'=>$category->slug])}}'"
                            title="{{$category->cat_name}}">
                       <span>{{$category->cat_name}}</span>
                    </button>
                </li>


            @endforeach

        </ul>
    </nav>

</header>