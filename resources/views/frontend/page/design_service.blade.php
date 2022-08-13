@extends('frontend.layouts.app')


@section('content')


    <?php if($detail){

    ?>
    <main id="main" role="main">


        <!----DESIGN SERVICE SECTION---->
        <section class="mood-board">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="moodboard_boxx">
                            <!----DESIGN  SERVICE DETAILS SECTION---->
                            <section class="abt-boxx">
                                <div class="container-fluid">
                                    @foreach($detail as $key => $detailInfo)
                                        <div class="row" style="margin-top: 25px">
                                            <?php if ($key % 2 === 0) { ?>
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="abt-imgs">
                                                    <img src="{{asset('design_image/'.$detailInfo->image)}}"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="abt-content">
                                                    <h2> {{$detailInfo->title}}</h2>
                                                    {{\GuzzleHttp\json_decode($detailInfo->meta)->description}}
                                                </div>
                                            </div>
                                            <?php }else{?>

                                            <div class="col-lg-6 col-sm-6">
                                                <div class="abt-content">
                                                    <h2> {{$detailInfo->title}}</h2>
                                                    {{\GuzzleHttp\json_decode($detailInfo->meta)->description}}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="abt-imgs">
                                                    <img src="{{asset('design_image/'.$detailInfo->image)}}"/>
                                                </div>
                                            </div>
                                            <?php }?>

                                        </div>
                                    @endforeach
                                </div>

                            </section>

                        </div>
                    </div>
                </div>

            </div>




        </section>


    </main>
    <?php }else{ ?>
    <main id="main" role="main">

        <!----BANNER IMAGE SECTION---->

        <section class="hero hero--reduced-height" data-sidebar-caption="ADD SOME EYE-CATCHING SHINE.">
            <div class="breadcrumb breadcrumb_link">
                <a href="#">Home</a>
                <a href="#">Design Services Section</a>
            </div>
        </section>


        <!----Service Four SECTION---->
        <section class="four-service-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title-page">DESIGN SERVICE </h2>
                    </div>
                    <div class="col-12">
                        <div class="service_img-four">
                            <ul>
                                @foreach($categories as $category)
                                    <li role="button" onClick="location.href='{{ route('frontend.page.design_service', ['detail'=>$category->slug])
                                    }}'">
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
