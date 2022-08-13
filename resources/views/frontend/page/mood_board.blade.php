@extends('frontend.layouts.app')


@section('content')


    <?php if($detail){

    ?>
    <main id="main" role="main">


        <!----MOOD BOARD SECTION---->
        <section class="mood-board">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="moodboard_boxx">
                            <img src="{{asset('design_image/'.$detail->image)}}"/>
                        </div>
                    </div>
                </div>

            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="recent-title">
                            <h2>RECENT PROJECTS</h2>
                        </div>

                        <div id="news-slider-one" class="owl-carousel">

                            @foreach($recent_projects as $recent_project)
                                <div class="post-slide-one">
                                    <div class="post-img">
                                        <div class="zoomWrapper">
                                            <img src="{{asset('design_image/'.$recent_project->image)}}"/>
                                        </div>
                                        <div class="project-info">
                                            <h3>{{$recent_project->title}}</h3>
                                            <p>{{$recent_project->sub_title}}</p>

                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            @push('after-scripts')
                {!! script('js/frontend/wow.min.js') !!}
                <script>
                    $(document).ready(function () {
                        $("#news-slider-one").owlCarousel({
                            items: 4,
                            itemsDesktop: [1199, 2],
                            itemsDesktopSmall: [1000, 2],
                            itemsMobile: [700, 1],
                            pagination: false,
                            navigationText: false,
                            autoPlay: true
                        });
                    });

                    new WOW().init();
                    $(".zoomWrapper img").click(function () {
                        $(this).toggleClass("flasher");
                    });
                </script>
            @endpush
        </section>


    </main>
    <?php }else{ ?>
    <main id="main" role="main">

        <!----BANNER IMAGE SECTION---->

        <section class="hero hero--reduced-height" data-sidebar-caption="ADD SOME EYE-CATCHING SHINE.">
            <div class="breadcrumb breadcrumb_link">
                <a href="index.html">Home</a>
                <a href="#">Moodboard Section</a>
            </div>
        </section>


        <!----Service Four SECTION---->
        <section class="four-service-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title-page">MOODBOARD </h2>
                    </div>
                    <div class="col-12">
                        <div class="service_img-three">
                            <ul>
                                @foreach($categories as $category)
                                    <li role="button" onClick="location.href='{{ route('frontend.page.mood_board', ['detail'=>$category->slug]) }}'">
                                        <div class="zoomWrapper-one"><img src="{{asset('cat_image/'.$category->cat_image)}}"/></div>
                                        <div class="text_boxx-four">
                                            <h3 class="text-uppercase">{{$category->cat_name}}</h3>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </section>


    </main>



    <?php }?>
@endsection
