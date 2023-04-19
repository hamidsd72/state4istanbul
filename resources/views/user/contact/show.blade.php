@extends('user.layouts.user')
@section('style_css')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/jgrowl.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/contact.css') }}"/>
    <script src="https://use.fontawesome.com/83dfdfbf2c.js"></script>
    <style>
    </style>
@endsection
@section('body')
    <div class="body">
        <section class="contact_us mt-lg-3 py-5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 mb-2 mb-lg-0">
                        <div class="d-lg-min-height-580 card box-shadow c-rounded p-4 px-lg-5">
                            <div class="text-right">
                                <h2 class="text-right my-lg-4 fw-bold fs-sm-28">تماس با ما</h2>
                                <p class="text-right fs-sm-20">جهت ارسال پیام فرم زیر را تکمیل نمایید</p>
                            </div>
                            <div class="align-items-center justify-content-between">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="social_networks d-flex align-items-center justify-content-between">
                                        <div class="social_item rounded-50 d-flex flex-column align-items-center justify-content-center">
                                            <a href="{{$setting->insta}}">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </div>
                                        <div class="social_item rounded-50 d-flex flex-column align-items-center justify-content-center">
                                            <a href="{{$setting->whatsapp}}">
                                                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="social_item rounded-50 d-flex flex-column align-items-center justify-content-center">
                                            <a href="{{$setting->whatsapp}}">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="social_item rounded-50 d-flex flex-column align-items-center justify-content-center">
                                            <a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="detail col-lg-7">
                                    <div class="contact_detail row mb-2">
                                        <div class="col-xl-3 col-lg-4 mb-2 mb-lg-0 px-lg-0"><strong class="text-secondary px-lg-3">آدرس دفتر</strong></div>
                                        <div class="col"><small class="text-secondary">{{$setting->address}}</small></div>
                                    </div>
                                    <div class="contact_detail row mb-2">
                                        <div class="col-xl-3 col-lg-4 mb-2 mb-lg-0 px-lg-0"><strong class="text-secondary px-lg-3">شماره تماس</strong></div>
                                        <div class="col"><small class="text-secondary">{{$setting->phone}}</small></div>
                                    </div>
                                    <div class="contact_detail row mb-2">
                                        <div class="col-xl-3 col-lg-4 mb-2 mb-lg-0 px-lg-0"><strong class="text-secondary px-lg-3">ایمیل</strong></div>
                                        <div class="col"><small class="text-secondary">{{$setting->email}}</small></div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <p class="px-3 my-4 fs-sm-16">استیت فور استانبول با استفاده از تجربه استثنایی و دانش خود ، در مورد بازارهای ملکی ، به عنوان یک پایگاه گسترده مشتری مدار و متخصص آماده خدمتگزاری به مشتریان عزیز در سرتاسر استانبول است اعتماد شما سرمایه ماست ، آن را به بهترین شکل ممکن پاسخ می دهیم</p>
                                    <ul>
                                        <li><i class="fa fa-check" ></i> انتظارات خودتان را با مشاوران ما در میان بگذارید</li>
                                        <li><i class="fa fa-check" ></i>از راه حل های ما در سرمایه گذاری مفید بهره مند شوید.</li>
                                        <li><i class="fa fa-check" ></i>همین حالا درخواست مشاوره رایگان دهید تا ما با شما تماس بگیریم</li>
                                        <li><i class="fa fa-check" ></i>پشتیبانی آنلاین در دسترس</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="d-lg-min-height-580 card box-shadow c-rounded p-4 px-lg-5">
                            @if(session()->has('flash_message'))
                                <div class="alert alert-success">
                                    پیام شما با موفقیت ارسال شد
                                </div>
                            @endif
                            @if(session()->has('err_message'))
                                <div class="alert alert-danger">
                                    مشکلی در ارسال پیام بوجود آمده،مجددا تلاش کنید'
                                </div>
                            @endif
                            <form action="{{route('user.conseling.store')}}" method="post" class="w-100" >
                                @csrf
                                <div class="row">
                                    <h3 class="pt-3 fs-sm-24">ارتباط با ما</h3>
                                    <div class="form-group mt-4">
                                        <label for="name">لطفا نام و نام خانواگی را وارد کنید</label>
                                        <input type="text" name="name" class="form-control form-control-lg" placeholder=" نام و نام خانوادگی *  "/>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="name">لطفا شماره تماس را وارد کنید</label>
                                        <input type="text" name="phone" class="form-control form-control-lg" placeholder="شماره تماس *"/>
                                    </div>

                                    <div class="form-group col-lg-12 my-4 pt-3 col-12">
                                        <label for="title">نوع درخواست </label>
                                        
                                        <div class="my-4">
                                            <label for="select1">
                                                {{-- <input type="radio" name="request_type" value="eghamat"> --}}
                                                اقامت ترکیه بالای ۷۵ هزار دلار
                                            </label>
                                            <select name="select1" id="select1" class="form-control form-control-lg my-2">
                                                <option value="">عدم انتخاب</option>
                                                <option value="eghamat">انتخاب کردن</option>
                                            </select>
                                        </div>
                                        
                                        <div class="my-4">
                                            <label for="select2">
                                                {{-- <input type="radio" name="request_type" value="shahrvandi"> --}}
                                                شهروندی کشور ترکیه (بالای 400 هزار دلار)
                                            </label>
                                            <select name="select2" id="select2" class="form-control form-control-lg my-2">
                                                <option value="">عدم انتخاب</option>
                                                <option value="shahrvandi">انتخاب کردن</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group text-center py-2 col-lg-12">
                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-lg btn-success py-lg-3 col-12">درخواست مشاوره رایگان</button>
                                            </div>
                                            <div class="col">
                                                <a href=" https://api.whatsapp.com/send/?phone={{$setting->whatsapp}}&text=مشاوره-شهروندیtype=phone_number&app_absent=0" class="btn btn-lg btn-secondary py-lg-3 col-12"  >تماس سریع واتساپ</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                        
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script_js')
    
@endsection



{{-- <div class="body">

    <section class="contact_us pb-5">
        <div class="container">
            <div class="text-right py-4">
                <h1 class="text-right" id="estate_swiper"></h1>
                <h3 class="text-right">تماس با ما</h3>
                <p class="text-right">جهت ارسال پیام فرم زیر را تکمیل نمایید</p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <p>استیت فور استانبول با استفاده از تجربه استثنایی و دانش خود ، در مورد بازارهای ملکی ، به عنوان یک پایگاه گسترده مشتری مدار و متخصص آماده خدمتگزاری به مشتریان عزیز در سرتاسر استانبول است اعتماد شما سرمایه ماست ، آن را به بهترین شکل ممکن پاسخ می دهیم</p>
                    <ul>
                        <li><i class="fa fa-check px-2" ></i> انتظارات خودتان را با مشاوران ما در میان بگذارید</li>
                        <li><i class="fa fa-check px-2" ></i>از راه حل های ما در سرمایه گذاری مفید بهره مند شوید.</li>
                        <li><i class="fa fa-check px-2" ></i>همین حالا درخواست مشاوره رایگان دهید تا ما با شما تماس بگیریم</li>
                        <li><i class="fa fa-check px-2" ></i>پشتیبانی آنلاین در دسترس</li>
                    </ul>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="social_networks d-flex align-items-center justify-content-between">
                            <div class="social_item d-flex flex-column align-items-center justify-content-center">
                                <a href="{{$setting->insta}}">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                            <div class="social_item d-flex flex-column align-items-center justify-content-center">
                                <a href="{{$setting->whatsapp}}">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="social_item d-flex flex-column align-items-center justify-content-center">
                                <a href="{{$setting->whatsapp}}">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="social_item d-flex flex-column align-items-center justify-content-center">
                                <a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="card shadow-sm rounded-sm">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="logo_item"><img src="{{url($setting->logo)}}" /> </div>
                            <div class="detail">
                                   <div class="d-flex align-items-center ">
                                       <div class="contact_icon" >
                                           <i class="fa fa-map-marker "></i>
                                       </div>
                                       <div class="contact_detail d-flex px-2 flex-column">
                                            <strong class="text-dark py-1">آدرس دفتر</strong>
                                            <small class="text-dark  py-1">{{$setting->address}}</small>
                                       </div>
                                   </div>
                                    <div class="d-flex align-items-center ">
                                       <div class="contact_icon" >
                                           <i class="fa fa-phone"></i>
                                       </div>
                                       <div class="contact_detail d-flex px-2  flex-column">
                                            <strong class="text-dark py-1">شماره تماس</strong>
                                            <small class="text-dark  py-1">{{$setting->phone}}</small>
                                       </div>
                                   </div>
                                    <div class="d-flex  align-items-center">
                                           <div class="contact_icon" >
                                               <i class="fa fa-envelope" aria-hidden="true"></i>
                                           </div>
                                           <div class="contact_detail d-flex flex-column px-2 ">
                                                <strong class="text-dark py-1">ایمیل</strong>
                                                <small class="text-dark  py-1">{{$setting->email}}</small>
                                           </div>
                                       </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-sm rounded-sm mt-2 p-2">
                        @if(session()->has('flash_message'))
                            <div class="alert alert-success">
                                پیام شما با موفقیت ارسال شد
                            </div>
                        @endif
                        @if(session()->has('err_message'))
                            <div class="alert alert-danger">
                                مشکلی در ارسال پیام بوجود آمده،مجددا تلاش کنید'
                            </div>
                        @endif
                    <form action="{{route('user.conseling.store')}}" method="post" class="w-100" >
                    @csrf
                    <div class="row">
                        <h3 class="py-3">ارتباط با ما</h3>
                        <div class="form-group col-lg-6 py-2 col-12">
                            <input type="text" name="name" class="form-control" placeholder=" نام و نام خانوادگی *  "/>
                        </div>
                        <div class="form-group col-lg-6 py-2 col-12">
                            <input type="text" name="phone" class="form-control" placeholder="شماره تماس *"/>
                        </div>
                        <div class="form-group col-lg-12 py-2 col-12">
                            <label for="">نوع درخواست </label>
                            <br/>
                            <label>
                                <input type="radio" name="request_type" value="eghamat">
                                اقامت ترکیه بالای ۷۵ هزار دلار
                            </label>
                            <br/>
                            <label>
                                <input type="radio" name="request_type" value="shahrvandi">
                                شهروندی کشور ترکیه (بالای 400 هزار دلار)
                            </label>
                        </div>
                        <div class="form-group text-center py-2 col-lg-12 col-12">
                            <button type="submit" class="btn btn-warning"  >درخواست مشاوره رایگان</button>
                            <a href=" https://api.whatsapp.com/send/?phone={{$setting->whatsapp}}&text=مشاوره-شهروندیtype=phone_number&app_absent=0" class="btn btn-success"  >تماس سریع واتساپ</a>
                        </div>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> --}}



{{-- <script type="text/javascript" src="{{ asset('js/jgrowl.min.js') }}"></script>
    @if (count($errors) > 0)
        <script type="text/javascript">
            $.jGrowl('<ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>', {
                life: 8000,
                position: 'bottom-right',
                theme: 'bg-danger'
            });
        </script>
    @endif
    @if(Session::has('flash_message'))
        <script type="text/javascript">
            $.jGrowl('{!! session("flash_message") !!}', {life: 8000, position: 'bottom-right', theme: 'bg-success'});
        </script>
    @endif
    @if(Session::has('err_message'))
        <script type="text/javascript">
            $.jGrowl('{!! session("err_message") !!}', {life: 8000, position: 'bottom-right', theme: 'bg-danger'});
        </script>
    @endif
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>

    <script>

    var app = document.getElementById('estate_swiper');

        var typewriter = new Typewriter(app, {
            loop: true
        });

        typewriter.typeString('Estate 4 Istanbul')
            .pauseFor(2500)
            .deleteAll()
            .start(); 
</script>
--}}