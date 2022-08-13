@extends('frontend.layouts.app')


@section('content')
    <main id="main" role="main">

        <!----BANNER IMAGE SECTION---->

        <section class="hero hero--reduced-height" data-sidebar-caption="ADD SOME EYE-CATCHING SHINE.">
            <div class="breadcrumb breadcrumb_link">
                <a href="{{route('frontend.index')}}">Home</a>
                <a href="#">About Us</a>
            </div>
        </section>


        <!----About Us SECTION---->
        <section class="abt-boxx">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="abt-imgs">
                            <img src="{{asset('img/frontend/homepage')}}/projects/project-1.jpg"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="abt-content">
                            <h2>ABOUT US</h2>
                            <p>Shaping our projects involves not just calculative intelligence of our team but their intense research of historical
                                and futuristic context as well. We like to keep our clients close so that we can accept their social, economic and
                                sustainability goals with all our hearts.
                                .</p>
                            <p>We take immense pride in quality of our work and constant research on our projects which helps us to reach our
                                desirable standards. This process helps us not only to make concise design decisions but the decisions that augments
                                subconscious designs.
                            </p>
                            <p>
                                For us your space is your powerhouse. And to our belief every corner of your space should enrich the overall sensation
                                it creates.
                            </p>
                            <p>
                                We are based in Bangladesh and cultural and ethnical diversity is something which we root with and understand to the
                                core.
                            </p>
                            <p>
                                We have not only been making spaces beautiful in Bangladesh, but we have been making lives happy internationally in
                                UAE and India and other places as well. For us borders are no limits for creativity and happiness in our client’s
                                lives.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>


    </main>
@endsection
