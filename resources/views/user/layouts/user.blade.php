<!DOCTYPE html>
<html class="no-js" lang="fa">
<head>
    <meta charset="utf-8">
    <meta auth="{{Auth::check()}} @auth() {{Auth::user()->first_name}} @endif">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$titleSeo}}</title>
    <meta name="base-url" content="{{url('/')}}"/>

    <meta name="robots" content="noindex, follow" />
    @if (trim($__env->yieldContent('meta')))
        @yield('meta')
    @else
    <meta name="keywords" content="{{$keywordsSeo}}">
    <meta name="description" content="{{$descriptionSeo}}"/>
    <meta property="og:title" content="{{$titleSeo}}"/>
    <meta property="og:description" content="{{$descriptionSeo}}"/>
    @endif
    <meta name="googlebot" content="noindex">
    <meta name="bingbot" content="noindex">
    <meta name="baiduspider" content="noindex">
{{--    <meta property="og:url" content="{{route('user.index')}}">--}}
    <meta property="og:url" content="{{$urlPage}}">

    <meta property="og:image" content="{{url($setting->logo)}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="{{url($setting->logo)}}" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="{{asset('user/css/reset.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{asset('user/node_modules/bootstrap/dist/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{url('assets/user/css/font-icons.css')}}">

    <link rel="stylesheet" href="{{url('assets/user/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('user/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/header2.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/footer.css')}}">
    <link rel="stylesheet" href="{{url('assets/user/css/responsive.css')}}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <style>
        /*.header_menu { color: black !important; }*/
    </style>
    @yield('style_css')
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->

<!-- Body main wrapper start -->
<div class="body-wrapper">
{{--@if(\Request::route()->getName()=='user.index')--}}
{{--@else--}}
{{--    @include('user.layouts.header_index2')--}}
{{--    @include('user.layouts.header')--}}
{{--@endif--}}


   @yield('body')


    <!-- FOOTER AREA START -->
    <footer class="footer position-relative pb-3">
        <div class="bg-footer"></div>
        <div class="container">
            <div class="pt-5 position-relative">
                <div class="mb-5">
                    <div class="row">
                        <div class="col-lg-9 pt-lg-5">
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="footer-text h-100 d-flex align-items-center">
                                        <div>
                                            <p class="f-bold text-white mb-3">پروژه ها :</p>
                                            <ul>
                                                <li class="">
                                                    <a href="{{route('user.projects')}}">
                                                        <p class="Answer hover-li">بالای 300 هزار دلار</p>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{route('user.projects')}}">
                                                        <p class="Answer hover-li">بین 250 تا 300 هزار دلار</p>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{route('user.projects')}}">
                                                        <p class="Answer hover-li">بین 150 تا 250 هزار دلار</p>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{route('user.projects')}}">
                                                        <p class="Answer hover-li">بین 100 تا 150 هزار دلار</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3 col-md-6 my-media">
                                    <div class="footer-text h-100 d-flex align-items-center">
                                        <div>
                                            <p class="f-bold text-white mb-3">دسته بندی :</p>
                                            <ul>
                                                <li class="">
                                                    <a href="{{route('user.projects.villa')}}">
                                                        <p class="Answer hover-li">ویلا</p>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{route('user.projects')}}">
                                                        <p class="Answer hover-li">پروژه</p>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{route('user.projects.office')}}">
                                                        <p class="Answer hover-li">تجاری و هوم آفیس</p>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{route('user.projects.consept')}}">
                                                        <p class="Answer hover-li">پروژه اقساطی و درحال ساخت</p>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#">
                                                        <p class="Answer hover-li">خرید اقساطی ملک در استانبول</p>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#">
                                                        <p class="Answer hover-li">دریافت شهروندی ترکیه</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3 col-md-6 my-media">
                                    <div class="footer-text h-100 d-flex align-items-center">
                                        <div>
                                            <p class="f-bold text-white mb-3">بخش توریستی و گردشگری :</p>
                                            <ul>



                                                <li class="">
                                                    <a href="https://api.whatsapp.com/send?phone={{$setting->whatsapp}}">
                                                        <p class="Answer hover-li">بخش رزرو هتلار</p>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="https://api.whatsapp.com/send?phone={{$setting->whatsapp}}">
                                                        <p class="Answer hover-li">رزرو تور</p>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="https://api.whatsapp.com/send?phone={{$setting->whatsapp}}">
                                                        <p class="Answer hover-li">مشاوره تور</p>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="https://api.whatsapp.com/send?phone={{$setting->whatsapp}}">
                                                        <p class="Answer hover-li">ارتباط با مدیریت</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-6 col-lg-3 col-md-6 my-media">
                                    <div class="footer-text h-100 d-flex align-items-center">
                                        <div>
                                            <p class="f-bold text-white mb-3">درباره ما :</p>
                                            <ul>
                                                <li class="">
                                                    <a href="{{route('user.contact_us')}}">
                                                        <p class="Answer hover-li">تماس با ما</p>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{route('user.about_us')}}">
                                                        <p class="Answer hover-li">درباره ما</p>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{route('user.contact_us')}}">
                                                        <p class="Answer hover-li">ارتباط مستقیم با سازنده</p>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{route('user.citizenship')}}">
                                                        <p class="Answer hover-li">مشاوره شهروندی ترکیه</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="pt-lg-4">
                                <p class="f-bold text-white mb-3">ما را در شبکه های اجتماعی دنبال کنید :</p>
                                <div class="mb-3 d-flex flex-wrap justify-content-end w-100">
                                    <div class="rounded-circle btn-circle border-0 bg-white d-flex align-items-center justify-content-center footer-btn-circle"><a
                                                href="{{$setting->insta}}"><i class="lab la-instagram text-dark"
                                                            style="font-size: 25px;padding-top: 6px"></i></a></div>
                                    <div class="rounded-circle btn-circle border-0 bg-white d-flex align-items-center justify-content-center  footer-btn-circle"><a
                                                href="{{$setting->whatsapp}}"><i class="lab la-whatsapp text-dark"
                                                            style="font-size: 25px;;padding-top: 6px"></i></a></div>
                                    <div class="rounded-circle btn-circle border-0 bg-white d-flex align-items-center justify-content-center  footer-btn-circle"><a
                                                href="{{$setting->facebook}}"><i class="lab la-facebook text-dark"
                                                            style="font-size: 25px;;padding-top: 6px"></i></a></div>
                                    <div class="rounded-circle btn-circle border-0 bg-white d-flex align-items-center justify-content-center  footer-btn-circle"><a
                                                href="{{$setting->facebook}}"><i class="lab la-twitter text-dark"
                                                            style="font-size: 25px;;padding-top: 6px"></i></a></div>

                                </div>
                                <div class="mb-4" dir="ltr">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-lg-2">
                                            <div class=" text-center text-lg-end mb-4 mb-lg-0 ">
                                                <i class="lab la-instagram text-white" style="font-size: 25px;">
                                                </i>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <p class="text-white text-center text-lg-end">{{$setting->phone}}</p>
                                            <p class="text-white text-center text-lg-end">ارتباط مستقیم</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4" dir="ltr">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-lg-2">
                                            <div class=" text-center text-lg-end mb-4 mb-lg-0 ">
                                                <i class="lab la-map-marker-alt text-white" style="font-size: 25px;">
                                                </i>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <p class="f-14 text-white text-center text-lg-end">{{$setting->address}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="pb-2 pt-4 px-4 footer-end position-relative">
            <div class="row align-items-center">
                <div class="col-sm-8 col-lg-8 col-xl-8">
                    <p class="text-white f-13">تمامی حقوق سایت برای هلدینگ سازنده YIGIT GROUP محفوظ میباشد و هرگونه کپی
                        برداری پیگرد قانونی دارد</p>
                </div>
                <div class="col-sm-4 col-lg-4 col-xl-4">
                    <p class="text-white f-12">طراحی و توسعه : ادیب گستر عصر نوین</p>
                </div>
            </div>
        </div>

    </footer>
    <!-- FOOTER AREA END -->
{{--@if($contact_provider->phone_icall)--}}
{{--    <!-- icall AREA START -->--}}
{{--        <div class="icall icall1">--}}
{{--            <a target="_blank" rel="noreferrer" href="tel:+{{str_replace([' ','_','-'],'',$contact_provider->phone_icall)}}">--}}
{{--                <img class="social_img" src="{{url('assets/user/pic/icall_1.png')}}" alt="آیکال آوارتین">--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <!-- icall AREA END -->--}}
{{-- @endif--}}
{{--    @if($contact_provider->phone_whatsapp)--}}
{{--        <!-- WHATSAPP AREA START -->--}}
{{--            <div class="wat_sapp wat_sapp1">--}}
{{--                <a target="_blank" rel="noreferrer" href="https://api.whatsapp.com/send?phone=+{{str_replace([' ','_','-'],'',$contact_provider->phone_whatsapp)}}">--}}
{{--                    <img class="social_img" src="{{url('assets/user/pic/whatssapp_1.png')}}" alt="واتساپ آوارتین">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <!-- WHATSAPP AREA END -->--}}
{{--    @endif--}}


</div>
<!-- Body main wrapper end -->

<!-- preloader area start -->
<div class="preloader d-none" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->


<!-- All JS Plugins -->
<script src="{{url('assets/user/js/plugins.js')}}"></script>
<!-- Chosen -->
<script src="{{url('assets/user/chosen/js.js')}}"></script>
<script src="{{url('assets/user/js/new_menu.js')}}"></script>
<!-- Main JS -->
{{--<script src="{{url('assets/user/js/main.js')}}"></script>--}}
{{--<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"--}}
{{--        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="--}}
{{--        crossorigin=""></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>--}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>--}}

<script src="{{asset('user/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
{{--<script src="{{asset('user/js/map.js')}}"></script>--}}
{{--<script src="{{asset('user/js/menu.js')}}"></script>--}}
{{--<script src="{{asset('user/js/ani_text.js')}}"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>--}}
<script defer>
    $(document).ready(function (){
       $('.d-none_load_page').removeClass('d-none')
    });
</script>
{{-- new script --}}
<script>
    function reverse(s) { return s.split("").reverse().join(""); }
    function changeRange() {
        let price       = document.querySelector('.js-form-range').value;
        price           = reverse(price);
        let newPrice    = '';
        for (let index = 0; index < price.length; index++) {
            newPrice = newPrice + price[index];
            if (index == 2 || index == 5 || index == 8) { newPrice = newPrice+'.'; }
        }
        newPrice = reverse(newPrice);
        if (newPrice == '.500.000') { newPrice = '500.000' }
        document.querySelector('.jsRangePrice').innerHTML = newPrice;
    }
</script>
@yield('script_js')
</body>
</html>