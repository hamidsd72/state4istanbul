@extends('user.layouts.user')
@section('style_css')
    <style>
        
    </style>
@endsection
@section('body')
    <div class="header_menu_top bg-white text-dark" id="header_menu_top">
        @include('user.layouts.menu')
    </div>
    <div class="body pt-5 mt-5">
        <section class="blog pt-5 mt-lg-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="fw-bold py-4 fs-sm-24">بلاگ ها</h2>
                    </div>
                    <div class="col">
                        @foreach($items as $item)
                            @if($item->articles()->count() )
                                <div class="border-bottom pb-2 my-3 fs-3 fs-sm-20 fw-bold">
                                    <a href="#" class="goToSingle">{{$item->name}} ({{num2fa($item->articles()->count())}}) <i class="fas fa-angle-left"></i></a>
                                </div>
                                <div class="row">
                                    @foreach($item->articles->take(3) as $article)
                                        <div class="col-lg-4 mb-3">
                                            <a href="{{route('user.blog.show',$article->slug)}}">
                                                <div class="project_item bg-white box-shadow c-rounded mb-2 p-3">
                                                    <div class="project_image position-relative">
                                                        <img src="{{$article->photo?url($article->photo):url('assets/user/pic/blog1.jpg')}}" alt="{{$article->title}}" width="100%" height="100%" />
                                                        <div class="project_image_detail "></div>
                                                        <div class="project_image_detail_1 text-white d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <small>{{num2fa(number_format($article->seen))}}</small>
                                                                <i class="fa fa-eye small px-2"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="project_content px-3">
                                                        <div class="project_content_description d-flex flex-column">
                                                            <strong class="py-2 min-height-68 title">{{$article->title}}</strong>
                                                            
                                                            <div class="row">
                                                                <div class="col calendar small text-secondary">
                                                                    {{num2fa(my_jdate($article->created_at,'d F Y'))}}
                                                                </div>
                                                            </div>
                                                            <small class="text-secondary height-78">{{ $article->text_short }}</small>
                                                        </div>
                                                        
                                                        <div class="pt-2 row">
                                                            <div class="project_content_footer_icon small col">
                                                                <a href="#" class="goToSingle">مشاهده بیشتر <i class="fas fa-angle-left"></i></a>
                                                            </div>
                                                            <div class="project_content_footer_author col text-end">
                                                                <span class="small pt-2">{{$article->user->first_name}}</span>
                                                                <i class="fa fa-user small text-secondary"></i>
                                                            </div>
                                                        </div>
    
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                    
                    <div class="col-lg-3 my-2 mb-4">
                        <div class="d-lg-min-height-580 card box-shadow c-rounded p-4 px-lg-5 mb-4 mb-lg-5" style="border: none !important;">
                            <form action="{{route('user.conseling.store')}}" method="post" class="w-100" >
                                @csrf
                                <div class="row">
                                    <h3 class="pt-3 fs-sm-24">جستجو</h3>
                                    <div class="form-group mt-4">
                                        <input type="text" name="name" class="form-control form-control-lg " placeholder=" منطقه "/>
                                    </div>
                                        
                                    <div class="form-group mt-4">
                                        <select name="select1" id="select1" class="form-control form-control-lg my-2">
                                            <option value="">دسته بندی</option>
                                            <option value="">آپارتمان</option>
                                            <option value="">خانه</option>
                                            <option value="">ویلا</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group mt-4">
                                        <select name="select2" id="select2" class="form-control form-control-lg my-2">
                                            <option value="">نوع</option>
                                            <option value="">فروش</option>
                                            <option value="">رهن</option>
                                            <option value="">اجاره</option>
                                        </select>
                                    </div>

                                    <div class="form-group mt-4">
                                        <select name="select2" id="select2" class="form-control form-control-lg my-2">
                                            <option value="">تعداد خواب</option>
                                            <option value="">۱ خواب</option>
                                            <option value="">۲ خواب</option>
                                            <option value="">۳ خواب</option>
                                        </select>
                                    </div>

                                    <div class="form-group my-4">
                                        <select name="select2" id="select2" class="form-control form-control-lg my-2">
                                            <option value="">منطقه</option>
                                            <option value="">مرکز شهر</option>
                                            <option value="">حومه شهر</option>
                                            <option value="">منطقه تجاری</option>
                                        </select>
                                    </div>

                                    <label for="amount">رنج قیمت : <span class="jsRangePrice">750.000</span></label>
                                    <div class="row mt-3">
                                        <div class="col-auto small">10.000.000</div>
                                        <div class="col"></div>
                                        <div class="col-auto small">0</div>
                                        <div class="col-12">
                                            <input type="range" class="form-range js-form-range" id="customRange1" min="500000" max="10000000" onchange="changeRange()">
                                        </div>    
                                    </div>

                                    <div class="form-group text-center py-2 mt-4 col-lg-12">
                                        <button type="submit" class="btn btn-lg btn-success py-lg-3 col-12">جستجو کردن</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="card box-shadow c-rounded p-4 px-lg-5 " style="border: none !important;">
                            <form action="{{route('user.conseling.store')}}" method="post" class="w-100" >
                                @csrf
                                <div class="row">
                                    <h3 class="pt-3 fs-sm-24">لیست های ما</h3>
                                    @foreach($items as $item)
                                        @if($item->articles()->count())
                                            <div class="border-bottom pb-2 my-3">
                                                <a href="#" class="goToSingle">{{$item->name}}</a>
                                                <div class="float-end">({{$item->articles()->count()}})</div>
                                            </div>
                                        @endif
                                    @endforeach
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