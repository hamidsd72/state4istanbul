@extends('user.layouts.user')
@section('style_css')
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"  />
    <style>
        .swiper {
            width: 100%;
            height: 500px;
        }
        .swiper-slide img{
            border-radius: 20px;
            width: 100%;
            height: 100%;
        }
        .property_list{
            display: flex;
        }
        .card {
            border: none !important;
        }
        img.big-sm {
            height: 168px;
        }
        img.medium-sm {
            height: 84px;
        }
        .box-relative {
            position: relative;
            top: -42px;
            background: #ffffffcf;
            border-radius: 12px;
        }
        .box-top {
            height: 68px;
        }
        @media (min-width: 992px) {
            img.big-lg {
                height: 640px;
            }
            img.medium-lg {
                height: 320px;
            }
            .box-relative {
                position: relative;
                top: -68px;
                background: #ffffffcf;
                border-radius: 12px;
            }
        }
    </style>
@endsection
@section('body')

    <div class="header_menu_top bg-white text-dark" id="header_menu_top">
        @include('user.layouts.menu')
    </div>
    <!-- PAGE DETAILS AREA START (portfolio-details) -->
    <div class="body pt-5 mt-5 mt-lg-0">
        <section class="project pt-4 pt-lg-0">
                
            <div class="col-12">
                <div class="row">
                    <div class="col p-0">
                        <img src="{{$project->image?url($project->image):''}}" alt="{{$project->title}}" class="w-100 big-sm big-lg border">
                    </div>
                    <div class="col p-0">
                        <div class="row">
                            @foreach($project->photos->take(4) as $photo)
                                <div class="col-6 p-0">
                                    <img src="{{$photo->path?url($photo->path):''}}" class="w-100 medium-sm medium-lg border" alt="{{$project->title}}"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" >
                <div class="box-top">
                    <div class="box-relative">
                        <div class="row p-4 p-lg-5">
                            <div class="col-auto col-lg text-center">
                                <p class="my-1 fs-sm-16">آخرین بروزرسانی</p>
                                <small >{{num2fa(my_jdate($project->updated_at,'d F Y')) ?: num2fa(my_jdate($project->created_at,'d F Y'))}}</small>
                            </div>
                            <div class="col text-center">
                                <p class="my-1 fs-sm-16">کد پروژه</p>
                                <small >{{ $project->id }}</small>
                            </div>
                            <div class="col text-center">
                                <p class="my-1 fs-sm-16"><i class="fa fa-bed" aria-hidden="true"></i></p>
                                <small >{{$project->bedroom}}</small>
                            </div>
                            <div class="col text-center">
                                <p class="my-1 fs-sm-16"><i class="fa fa-bath" aria-hidden="true"></i></p>
                                <small >{{$project->bathroom}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if($project->project_property()->count())
                        <div class="col-lg-auto bg-secondary d-flex flex-row c-rounded p-1 px-3 mx-1 mx-lg-3 w-auto mb-2 mb-lg-0">
                        @foreach($project->project_property as $property)
                            <small class="text-light">{{$property->name}},</small>
                        @endforeach
                        </div>
                    @endif
                    @if($project->project_category->count())
                        <div class="col-lg-auto bg-secondary d-flex flex-row c-rounded p-1 px-3 mx-1 mx-lg-3 w-auto mt-2 mt-lg-0">
                        @foreach($project->project_category as $category)
                            <small class="text-light">{{$category->title}},</small>
                        @endforeach
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <h1 class="text-dark py-3">{{$project->title}}</h1>
                        <small class="py-2"><i class="fa fa-map-marker px-2"></i>{{$project->getProjectCountry()."/".$project->getProjectCity()."/".$project->getProjectLocation()}}</small>
                    </div>
                    <div class="col">
                        <h1 class="text-warning d-flex py-2">{{$project->price_label}}{{ $project->start_price != null ? ' $ '.(number_format($project->start_price)) : ''}} </h1>
                        <a href="{{route('user.download.pdf',$project->id)}}" class="btn btn-success" id="cmd" target="_blank">خروجی pdf</a>
                    </div>
                </div>
            </div>

            <div class="container" >
                <div class="row">
                    <div class="col">
                        <div class="my-3 m-lg-3 card box-shadow c-rounded p-3 p-lg-4 d-none d-lg-block">
                            <h3 class="py-3 fs-sm-24">تماس با ما</h3>
        
                            <div class="form-group my-4">
                                <label>نام و نام خانوادگی</label>
                                <input class="form-control form-control-lg" name="name" placeholder="نام و نام خانوادگی">
                            </div>
                                <div class="form-group mb-4">
                                <label>ایمیل</label>
                                <input class="form-control form-control-lg" name="email" placeholder="ایمیل">
                            </div>
                                <div class="form-group mb-4">
                                <label>شماره تماس</label>
                                <input class="form-control form-control-lg" name="phone" placeholder="شماره تماس">
                            </div>
                            <div class="form-group mb-4">
                                <label>توضیحات</label>
                                <textarea class="form-control form-control-lg" id="text" name="text" rows="4"></textarea>
                            </div>
                            <div class="row mb-4 pt-3">
                                <div class="col-6"><button type="submit" class="btn btn-lg btn-success py-lg-3 col-12">ارسال</button></div>
                                <div class="col-6"><button type="submit" class="btn btn-lg btn-secondary py-lg-3 col-12">واتس اپ</button></div>
                            </div>
        
                            @if($project->agent)
                                <div class="row my-3 box-shadow rounded p-3 p-lg-4">
                                    <div class="col-lg-3">
                                        <img src="{{url($project->agent ? $project->agent->photo : '' )}}" />
                                    </div>
                                    <div class="col-lg-9">
                                        <h3 class="py-3">{{$project->agent->name}}</h3>
                                        <div>{!! $project->agent->description !!}</div>
                                        <div><i class="fa fa-map-marker px-2 text-success"></i> {!! $project->agent->address !!}</div>
                                        <div><i class="fa fa-phone px-2 text-success"></i>{!! $project->agent->phone !!}</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-lg-9">
                        {{-- <div class="row py-3">
                            <!-- Slider main container -->
                            <div class="swiper " id="image_gallery">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    @foreach($project->photos as $photo)
                                        <div class="swiper-slide"><img src="{{url($photo->path)}}" /> </div>
                                    @endforeach
                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>
        
                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                        <div class="row card my-3 shadow-sm rounded-sm p-3">
                            <h3 class="py-3">بررسی اجمالی</h3>
                            <div class="row">
                                <div class="col-lg-3 col-12">
                                    <div class="">
                                        <h5 class="py-3">به روز شده در </h5>
                                        <span>{{my_jdate($project->updated_at,'Y/m/d') ?: my_jdate($project->created_at,'Y/m/d')}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-12">
                                    <div class="">
                                        <h4 class="py-3"><i class="fa fa-bed" aria-hidden="true"></i></h4>
                                        <span>{{$project->bedroom}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-12">
                                    <div class="">
                                        <h4 class="py-3"><i class="fa fa-bath" aria-hidden="true"></i></h4>
                                        <span>{{$project->bathroom}}</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row card my-3 box-shadow c-rounded p-3 p-lg-4">
                            <h3 class="py-3 fs-sm-24">توضیحات مختصر پروژه</h3>
                            <div class="row"><p>{!! $project->short_description !!}</p></div>
                            <h3 class="py-3 fs-sm-24">توضیحات  پروژه</h3>
                            <div class="row">
                            <p>{!! $project->description !!}</p>
                            </div>
                            <div class="row" id="content">
                                <h3 class="text-warning py-3 fs-sm-24">قیمت و متراژ پروژه :</h3>
                                <table id="dataTable"  class="table table-striped  table-hover table-sm">
                                    <thead>
                                    <tr>
                                        <th>تعداد اتاق</th>
                                        <th>قیمت</th>
                                        <th>مساحت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($project->metrages as $key=>$item)
                                        <tr>
                                            <td>{{ $item->room }}</td>
                                            <td>{{ $item->price == "اتمام"  ? 'اتمام' : number_format($item->price).'$'  }}</td>
                                            <td>{{ $item->metrage }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                            <h3 class="text-warning py-3 fs-sm-24">نمونه پلان پروژه ها :</h3>
                                <div class="swiper " id="plan_gallery">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        <!-- Slides -->
                                        @foreach($project->plan_gallery as $photo)
                                            <div class="swiper-slide"><img src="{{url($photo->path)}}" /> </div>
                                        @endforeach
                                    </div>
                                    <!-- If we need pagination -->
                                    <div class="swiper-pagination"></div>
                                    <!-- If we need navigation buttons -->
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion accordion-flush accordion-transparent row" id="accordionFlushExample">
                            <div class="accordion-item bg-white box-shadow">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    {{-- <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"> --}}
                                    <button class="accordion-button text-dark fs-3 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        منطقه پروژه
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-12">
                                                <h4 class="py-3 fs-sm-16">آدرس:</h4>
                                                <label>{{$project->getProjectCountry()}}</label>
                                            </div>
                                            <div class="col-lg-3 col-12">
                                                <h4 class="py-3 fs-sm-16">شهر:</h4>
                                                <label>{{$project->getProjectCity()}}</label>
                                            </div>
                                            <div class="col-lg-3 col-12">
                                                <h4 class="py-3 fs-sm-16">منطقه:</h4>
                                                <label>{{$project->getProjectLocation()}}</label>
                                            </div>
                                            @if($project->map != null)
                                            <div class="col-lg-12 col-12 py-3">
                                            <h4 class="py-3">نمایش روی نقشه</h4>
                                                {!! $project->map !!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item bg-white box-shadow my-3">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button text-dark fs-3 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        ویژگی های پروژه    
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="row py-3">
                                            @foreach($project->project_property as $property)
                                                <div class="col-lg-2">
                                                    <label><i class="fa fa-check text-secondary px-1"></i> {{$property->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-3 m-lg-3 card box-shadow c-rounded p-3 p-lg-4 d-lg-none">
                            <h3 class="py-3 fs-sm-24">تماس با ما</h3>
        
                            <div class="form-group my-4">
                                <label>نام و نام خانوادگی</label>
                                <input class="form-control form-control-lg" name="name" placeholder="نام و نام خانوادگی">
                            </div>
                                <div class="form-group mb-4">
                                <label>ایمیل</label>
                                <input class="form-control form-control-lg" name="email" placeholder="ایمیل">
                            </div>
                                <div class="form-group mb-4">
                                <label>شماره تماس</label>
                                <input class="form-control form-control-lg" name="phone" placeholder="شماره تماس">
                            </div>
                            <div class="form-group mb-4">
                                <label>توضیحات</label>
                                <textarea class="form-control form-control-lg" id="text" name="text" rows="4"></textarea>
                            </div>
                            <div class="row my-4">
                                <div class="col-6"><button type="submit" class="btn btn-lg btn-success py-lg-3 col-12">ارسال</button></div>
                                <div class="col-6"><button type="submit" class="btn btn-lg btn-secondary py-lg-3 col-12">واتس اپ</button></div>
                            </div>
        
                            @if($project->agent)
                                <div class="row card my-3 box-shadow rounded p-3 p-lg-4">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <img src="{{url($project->agent ? $project->agent->photo : '' )}}" />
                                        </div>
                                        <div class="col-lg-9">
                                            <h3 class="py-3">{{$project->agent->name}}</h3>
                                            <div>{!! $project->agent->description !!}</div>
                                            <div><i class="fa fa-map-marker px-2 text-success"></i> {!! $project->agent->address !!}</div>
                                            <div><i class="fa fa-phone px-2 text-success"></i>{!! $project->agent->phone !!}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- PAGE DETAILS AREA END -->
@endsection
@section('script_js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>

        const swiper_slider = new Swiper('#image_gallery', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });


        const swiper_plan = new Swiper('#plan_gallery', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    </script>


<script type="text/javascript" src="{{asset('user/js/jquery.fancybox-1.3.4.pack.js')}}"></script>
@endsection