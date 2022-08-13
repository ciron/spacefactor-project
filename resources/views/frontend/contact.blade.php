@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    <main id="main" role="main">

        <!----BANNER IMAGE SECTION---->

        <section class="hero hero--reduced-height" data-sidebar-caption="ADD SOME EYE-CATCHING SHINE.">
            <div class="breadcrumb breadcrumb_link">
                <a href="{{ route('frontend.index') }}">Home</a>
                <a href="#">Contact Us</a>
            </div>
        </section>


        <!----About Us SECTION---->
        <section class="abt-boxx">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="contact-boxx">
                            <h3>GET US A MESSAGE</h3>
                            <form method="post" action="{{route('frontend.contact.send')}}">
                                {!! csrf_field() !!}
                            <div class="boxx-form">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" id="email" placeholder="Email Address" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Mobile Number" name="phone">
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" rows="5" name="message" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="contact-boxx">
                            <h3>OFFICE LOCATION</h3>
                            <div class="ofc_box">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109066.25059453573!2d75.50337851910588!3d31.32252538701129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a5a5747a9eb91%3A0xc74b34c05aa5b4b8!2sJalandhar%2C%20Punjab!5e0!3m2!1sen!2sin!4v1583178644293!5m2!1sen!2sin"
                                        width="100%" height="320" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>
							<div class="contact_detail_info">
								<ul>
									<li><i class="fa fa-map-marker"></i>32/2 NEW ESKATON ROAD, KAZI NAZRUL AVENUE, DHAKA 1200</li>
									<li><i class="fa fa-envelope"></i>info@spacefactor.design</li>
									<li><i class="fa fa-phone"></i>+880 1311 337111</li>
								</ul>
							</div>
                        </div>
                    </div>
                </div>
				
				<!------ team ---->
				<div class="col-lg-12 col-sm-12">
                        <div class="abt-content">
                            <h2>Lorem Ipsum</h2>
                            <p>Shaping our projects involves not just calculative intelligence of our team but their intense research of historical
                                and futuristic context as well. We like to keep our clients close so that we can accept their social, economic and
                                sustainability goals with all our hearts.
                                .</p>                            
                        </div>
                    </div>

            </div>
        </section>


    </main>
@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush