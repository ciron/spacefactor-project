@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')


    @push('after-styles')
        {!! style('css/frontend/jquery.tagsinput-revisited.css') !!}
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    @endpush
    <main id="main" role="main">

        <!----BANNER IMAGE SECTION---->

        <section class="hero hero--reduced-height" data-sidebar-caption="ADD SOME EYE-CATCHING SHINE.">
            <div class="video video--wistia hero__video">
                <img src="{{asset('img/frontend/homepage')}}/background.jpg" class="img-responsive img_logo"/>
            </div>
            <div class="hero__inner">
                <span class="hero__trumpet">WE STAND FOR</span>
                <div class="hero__title">
                    <h1>HAVING AN IDEA.CREATING SPACES</h1>
                    <p>Interior Design Company: We create contemporary design spaces that are desirable and affordable to everyone. </p>
                </div>
                <a class="call_btn" title="Call Us"  href="tel:+880 1311 337111"><span>+880 1311 337111</span></a>
            </div>
        </section>


        <!----INSPIRED SECTION---->

        <section class="feature feature--no-animation" id="" data-background-color="eef1f6"
                 data-sidebar-caption="OUR WAYS TO CONNECT, LET’S GET INSPIRED">
            <div class="feature__container feature--color">
                <div class="feature__image feature__image--s-left feature__image--m-left feature__image--full-height wow fadeInUp"
                     data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="feature_boxx">
                        <h2>LET'S GET INSPIRED</h2>
                        <p>The world is full of contemporary inspiring objects, spaces, places, worlds, spirits, experiences, trends and culture and
                            that is where we derive our inspiration from. We let your personality shine through our designs. To us, design is not just
                            about analytics but about accurate beautification of our built environment.</p>
                    </div>
                </div>
                <div class="feature__text feature--space-top feature--space-top--m--double padding_zero wow fadeInUp" data-wow-duration="1s"
                     data-wow-delay="0.5s">
                    <img src="{{asset('img/frontend/homepage')}}/abt_img.png"/>
                </div>
            </div>
        </section>


        <!----SERVICE SECTION---->

        <section class="service_boxx">
            <div class="feature__container">
                <div class="content-wrapper-new">
                    <div class="flex-grid-center">
                        <div class="flex-item col-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                            <h2 class="title">OUR SERVICES</h2>
                            <p>Engaging an interior design firm doesn’t always have to require a major renovation or getting a new place. We offer a
                                variety of services for that’s applicable to anyone, even if it’s just minor tweaks to your current home or office.
                                Take a look at some of our offerings below.</p>
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="service_img">
                                        <ul>

                                            @foreach($categories as $category)
                                                <li  onClick="location.href='{{ route('frontend.page.design_service', ['detail'=>$category->slug])
                                    }}'" class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                                    <div class="zoomWrapper"><img src="{{asset('cat_image/'.$category->cat_image)}}"/></div>
                                                    <div class="text_boxx">
                                                        <h3 class="text-uppercase">{{$category->cat_name}}</h3>
                                                    </div>
                                                </li>


                                            @endforeach

                                        </ul>

                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>


        <!----QUIZ SECTION---->

        <section class="quiz_boxx">
            <div class="left-section">
                <div class="quiz_img wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                    <img src="{{asset('img/frontend/homepage')}}/quiz-img.jpg"/>
                </div>
            </div>
            <div class="right-section">
                <div class="quiz_content wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                    <h2>INTERIOR DESIGN STYLE QUIZ</h2>
                    <p>Not sure what your style is? Find out with our easy and fun quiz.<br> We're here to help. ENJOY!</p>
                    <a href="#" class="quiz_btn">TAKE THE QUIZ</a>
                </div>
            </div>
        </section>


        <!----HOW IT WORKS SECTION---->

        <section class="how-it-works">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <h2>HOW IT WORKS</h2>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="timeline_box">
                            <ul>
                                <li>
                                    <div class="timeline_boxx_number">
                                        <span>01</span>
                                    </div>
                                    <div class="boxx_time">
                                        <div class="timeline_boxx_info">
                                            <h4>A FRIENDLY CONVERSATION</h4>
                                            <p>A casual friendly conversation to know your likes, design ideas, budget and give your space a certain
                                                individuality of its own.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline_boxx_number">
                                        <span>02</span>
                                    </div>
                                    <div class="boxx_time">
                                        <div class="timeline_boxx_info">
                                            <h4>DESIGNING YOUR SPACE</h4>
                                            <p>Designing your space is where we seek your guidance and cooperation the most weather it is introducing
                                                new furniture, maintaining budget, color palate, designing whole space around a piece of furniture or
                                                a wall.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline_boxx_number">
                                        <span>03</span>
                                    </div>
                                    <div class="boxx_time">
                                        <div class="timeline_boxx_info" style="    min-height: 126px;">
                                            <h4>FROM VISION TO REALITY</h4>
                                            <p>Our team puts immense research and efforts in making your vision real. For us making your vision real
                                                is like giving wings to your dreams and that is of utmost importance to us.</p>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="work-img">
                            <img src="{{asset('img/frontend/homepage')}}/work-img.jpg"/>
                        </div>
                    </div>
                </div>


            </div>
        </section>


        <!----DETAILED QUOTATION SECTION---->

        <section class="quote-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <h2>GET A DETAILED QUOTATION</h2>
                        </div>
                    </div>

                </div>
                <form method="post" action="{{route('frontend.quotation.send')}}">
                    {!! csrf_field() !!}
                    <div class="row wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s" id="form_boxx">

                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group">
                                <label for="name">Full Name <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group">
                                <label for="phone">Phone Number <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phone" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group">
                                <label for="email">Email <span style="color:red;">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group">
                                <label for="services">Services <span style="color:red;">*</span></label>
                                <select name="services" id="services" class="form-control">
                                    @foreach($categories as $category)
                                        <option id="{{$category->id}}" name="{{$category->cat_name}}">{{$category->cat_name}}</option>
                                        @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group">
                                <label for="mood">Mood & color<span style="color:red;">*</span></label>
                                <input type="text" name="mood" class="form-control" id="mood" aria-describedby="mood" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group">
                                <label for="budget">Budget <span style="color:red;">*</span></label>
                                <select name="budget" id="budget" class="form-control">
                                    <option value="1,00,000 - 5,00,000">1,00,000 - 5,00,000</option>
                                    <option value="5,00,000 - 10,00,000">5,00,000 - 10,00,000</option>
                                    <option value="10,00,000 - 20,00,000">10,00,000 - 20,00,000</option>
                                    <option value="20,00,000 - 50,00,000">20,00,000 - 50,00,000</option>
                                    <option value="50,00,000 +">50,00,000 +</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group">
                                <label for="preferred_style">Preferred Style <span style="color:red;">*</span></label>
                                <select id="preferred_style" name="preferred_style" class="form-control">


                                    <option id="1" value="Contemporary">Contemporary</option>
                                    <option id="2" value="Modern">Modern</option>
                                    <option id="3" value="Classical">Classical</option>
                                    <option id="4" value="Asian">Asian/Bengali</option>
                                    <option id="5" value="Scandinavian">Scandinavian</option>
                                    <option id="6" value="Eclectic">Eclectic</option>
                                    <option id="7" value="Rustic">Rustic</option>
                                    <option id="8" value="Minimalist">Minimalist</option>
                                    <option id="9" value="Hollywood Glam">Hollywood Glam</option>
                                    <option id="10" value="Traditional">Traditional</option>
                                    <option id="11" value="Transitional">Transitional</option>
                                    <option id="12" value="Urban">Urban-Modern</option>
                                    <option id="13" value="Zen">Zen</option>
                                    <option id="14" value="Western">Western</option>
                                    <option id="15" value="English-Country">English-Country</option>
                                    <option id="16" value="Farmhouse">Farmhouse</option>
                                    <option id="17" value="Vintage/Nautical">Vintage/Nautical</option>
                                    <option id="18" value="Industrial">Industrial</option>
                                    <option id="19" value="Bohemian">Bohemian</option>
                                    <option id="20" value="Art-Deco">Art-Deco</option>
                                    <option id="21" value="Mediterranean">Mediterranean</option>


                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group">
                                <label for="how_did_you_find_us">How did you find us? <span style="color:red;">*</span></label>
                                <select class="form-control" name="how_did_you_find_us" id="how_did_you_find_us">
                                    <option>Social Media</option>
                                    <option>Reference</option>
                                    <option>Magazine</option>
                                    <option>Newspaper</option>
                                    <option>Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label for="address">Project Address <span style="color:red;">*</span></label>
                                <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-6">
                            <div class="form-group">
                                <label for="message">Message <span style="color:red;">*</span></label>
                                <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">SUBMIT</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            @if(config('access.captcha.contact'))
                @captchaScripts
            @endif
        </section>


        <!----TRUSTED BRANDS SECTION---->

        <section class="best-brand">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title text-center">
                            <h2>TRUSTED BY THE BEST BRANDS</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                        <div id="news-slider" class="owl-carousel">
                            <div class="post-slide">
                                <div class="post-img">
                                    <img src="{{asset('img/frontend/homepage/brand_logos/logo-1.png')}}" alt="Company Logo">
                                </div>
                            </div>

                            <div class="post-slide">
                                <div class="post-img">
                                    <img src="{{asset('img/frontend/homepage/brand_logos/logo-2.png')}}" alt="Company Logo">
                                </div>
                            </div>

                            <div class="post-slide">
                                <div class="post-img">
                                    <img src="{{asset('img/frontend/homepage/brand_logos/logo-3.png')}}" alt="Company Logo">
                                </div>
                            </div>

                            <div class="post-slide">
                                <div class="post-img">
                                    <img src="{{asset('img/frontend/homepage/brand_logos/logo-4.png')}}" alt="Company Logo">
                                </div>
                            </div>

                            <div class="post-slide">
                                <div class="post-img">
                                    <img src="{{asset('img/frontend/homepage/brand_logos/logo-5.png')}}" alt="Company Logo">
                                </div>
                            </div>

                            <div class="post-slide">
                                <div class="post-img">
                                    <img src="{{asset('img/frontend/homepage/brand_logos/logo-6.png')}}" alt="Company Logo">
                                </div>
                            </div>

                            <div class="post-slide">
                                <div class="post-img">
                                    <img src="{{asset('img/frontend/homepage/brand_logos/logo-7.png')}}" alt="Company Logo">
                                </div>
                            </div>

                            <div class="post-slide">
                                <div class="post-img">
                                    <img src="{{asset('img/frontend/homepage/brand_logos/logo-8.png')}}" alt="Company Logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>

    @push('after-scripts')
        <script src="https://cdn.cquotient.com/js/v2/gretel.min.js" type="text/javascript" async="async"></script>
        {!! script('js/frontend/internal/jscript/dwac-18.10.4.js') !!}

        {!! script('js/frontend/wow.min.js') !!}
        <script>
            new WOW().init();
            $(".zoomWrapper img").click(function () {
                $(this).toggleClass("flasher");
            });
        </script>
        {{--Tags-Input-Autocomplete--}}
        {!! script('js/frontend/jquery.tagsinput-revisited.js') !!}
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
                crossorigin="anonymous"></script>

        <script>
            $(function () {
                var availableTags = [
                    "Interior",
                    "Home",
                    "Room",
                    "Modern",
                    "House",
                    "Design",
                    "White",
                    "Luxury",
                    "Clean",
                    "Apartment",
                    "Furniture",
                    "Architecture",
                    "Domestic",
                    "New",
                    "Floor",
                    "Kitchen",
                    "Indoors",
                ];
                $("#mood").tagsInput({

                    // allows new tags
                    interactive: true,

                    // custom placeholder
                    placeholder: 'Add a tag',

                    // width/height
                    width: 'auto',
                    height: 'auto',

                    // hides the regular input field
                    hide: true,

                    // custom delimiter
                    delimiter: ',',

                    // removes tags with backspace
                    removeWithBackspace: true,
                    unique: true,
                    autocomplete: {
                        source: availableTags
                    }

                });
            });
        </script>
    @endpush

@endsection
