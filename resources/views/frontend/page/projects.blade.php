@extends('frontend.layouts.app')


@section('content')


    <?php if($projectInfo){

    ?>
    <main id="main" role="main">


        <!----Project Banner SECTION---->
        <section class="projects-section" style="background: url({{asset('project_banner/'.$projectInfo->banner)}});">
            <div class="overlay">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="project_banner_info">

                                <h2>{{$projectInfo->title}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @push('after-styles');
    {!! style('css/frontend/jquery.fancybox.css') !!}
    @endpush
    @push('after-scripts')
        {!! script('js/frontend/jquery.fancybox.min.js') !!}
    @endpush
    <!----Project Info SECTION---->
        <section class="project-info">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="project-details">
                            <h3>Project Description</h3>
                            <ul>
                                <li>
                                    <h4>Location</h4>
                                    <p>{{$projectInfo->meta->location}}</p>
                                </li>
                                <li>
                                    <h4>Area</h4>
                                    <p>{{$projectInfo->meta->site_area}}</p>
                                </li>
                                <li>
                                    <h4>Client</h4>
                                    <p>{{$projectInfo->meta->client}}</p>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                if(count(json_decode($projectInfo->gallery, true)) > 0) ?>
                <div class="row">
                    <div class="col-12">
                        <div class="project-images">
                            <ul>

                                @foreach(json_decode($projectInfo->gallery, true) as $imgId => $img )
                                    <li>
                                        <a href="{{asset('project_gallery/'.$img)}}" data-fancybox="gallery" data-caption="">
                                            <img src="{{asset('project_gallery/'.$img)}}" alt=""/>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
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
                                            <img src="{{asset('project_banner/'.$recent_project->banner)}}"/>
                                        </div>
                                        <div class="project-info">
                                            <h3>{{$recent_project->title}}</h3>
                                            <p>{{substr($recent_project->description,0,25)}}</p>
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
                <a href="#">Home</a>
                <a href="#">Projects Section</a>
            </div>
        </section>


        <!----Service Four SECTION---->
        <section class="four-service-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title-page">PROJECTS </h2>
                    </div>
                    <div class="col-md-12">

                    </div>
                    <div class="col-12">

                        <div class="service_img-four">
                            <ul>
                                @foreach($projects as $project)
                                    <li role="button" onClick="location.href='{{ route('frontend.page.project', ['slug'=>$project->slug])
                                    }}'">
                                        <div class="zoomWrapper-one"><img src="{{asset('cat_image/'.$project->cat_image)}}"/></div>
                                        <div class="text_boxx-four">
                                            <h3 class="text-uppercase">{{$project->cat_name}}</h3>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>

                        </div>
                        {{ $projects->links() }}

                    </div>

                </div>
            </div>
        </section>


    </main>



    <?php }?>
@endsection
