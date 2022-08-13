<!DOCTYPE html>
@langrtl
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Space Factor')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        <meta name="application-name" content="Space Factor design">

        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('favicon')}}/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="{{asset('favicon')}}/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('favicon')}}/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('favicon')}}/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('favicon')}}/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('favicon')}}/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset('favicon')}}/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('favicon')}}/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon')}}/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('favicon')}}/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon')}}/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset('favicon')}}/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon')}}/favicon-16x16.png">
        <link rel="manifest" href="{{asset('favicon')}}/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{asset('favicon')}}/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
    @yield('meta')

    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ style(('css/frontend/core.min.css')) }}
        {{ style(('css/frontend/animate.css')) }}
        {{ style(('css/frontend/responsive.css')) }}
        {{ style(('css/frontend/ecom-style.min.css')) }}

        <script>document.createElement("picture");</script>
        <script src="{{asset('js/frontend/lib')}}/picturefill/picturefill.min.js" async></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
              integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">

        @stack('after-styles')
    </head>
    <body class="frontpage menu-fixed-black-on-white">


    <div id="app">
        <div id="wrapper" class="pt_storefront">
            @include('includes.partials.messages')
            @include('frontend.includes.header')
            @yield('content')
            @include('frontend.includes.footer')
        </div>
    </div><!-- #app -->

    <!-- Scripts -->
    @stack('before-scripts')


    <script type="text/javascript">

        (function () {
            window.Resources = {
                "GENERAL_ERROR": "There was an error fulfilling your request. Please try again.",
                "TLS_WARNING": "We value your security! <br/>We detected that you are using an outdated browser. <br/>Update your browser to continue a secure shopping experience.",
                "INVALID_PHONE": "Please specify a valid phone number.",
                "INVALID_PASSWORD": "Minimum 8 characters",
                "INVALID_OWNER": "This appears to be a credit card number. Please enter the name of the card holder.",
                "VALIDATE_REQUIRED": "This field is required.",
                "VALIDATE_REMOTE": "Please fix this field.",
                "VALIDATE_EMAIL": "Please enter a valid email address.",
                "VALIDATE_URL": "Please enter a valid URL.",
                "VALIDATE_DATE": "Please enter a valid date.",
                "VALIDATE_DATEISO": "Please enter a valid date ( ISO ).",
                "VALIDATE_NUMBER": "Please enter a valid number.",
                "VALIDATE_DIGITS": "Please enter only digits.",
                "VALIDATE_CREDITCARD": "Please enter a valid credit card number.",
                "VALIDATE_EQUALTO": "Please enter the same value again.",
                "VALIDATE_MAXLENGTH": "Please enter no more than {0} characters.",
                "VALIDATE_MINLENGTH": "Please enter at least {0} characters.",
                "VALIDATE_RANGELENGTH": "Please enter a value between {0} and {1} characters long.",
                "VALIDATE_RANGE": "Please enter a value between {0} and {1}.",
                "VALIDATE_MAX": "Please enter a value less than or equal to {0}.",
                "VALIDATE_MIN": "Please enter a value greater than or equal to {0}.",
                "VALIDATE_CONFIRM_FOR": "Does not match {0}"
            };
        }());
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#news-slider").owlCarousel({
                items: 5,
                itemsDesktop: [1199, 2],
                itemsDesktopSmall: [1000, 2],
                itemsMobile: [700, 1],
                pagination: false,
                navigationText: false,
                autoPlay: true
            });
        });
    </script>

    <script src="https://fast.wistia.com/assets/external/E-v1.js"></script>
    <script src='https://fast.wistia.com/labs/crop-fill/plugin.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/3.0.0/lazysizes.min.js"></script>
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>

    {!! script('js/frontend/vendor.js') !!}
    {!! script('js/frontend/app.js') !!}

    <script>
        pageContext = {"title": "Storefront", "type": "storefront", "ns": "storefront"};
        checkTLS = false;
    </script>
    <script>
        var meta = "An interior design service tailored to you. BoConcept is a Danish furniture store that turns houses into modern homes. Browse our designer furniture.";
        var keywords = "";
    </script>

    @stack('after-scripts')
    <style>
        .float {
            position: fixed;
            width: 60px;
            height: 61px;
            bottom: 85px;
            right: 22px;
            /*background-color: #25d366;*/
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            /*box-shadow: 2px 2px 3px #999;*/
            z-index: 100;
        }


    </style>
    <a href="https://api.whatsapp.com/send?phone=8801311337111&text=Hi, How can we help you ?" class="float" target="_blank">

        <img class="my-float" src="{{asset('img/frontend/homepage/whatsapp.png')}}" alt="">
    </a>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5e99e6d235bcbb0c9ab23452/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    </body>
    </html>
