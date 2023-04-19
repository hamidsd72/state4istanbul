@extends('user.layouts.user')
@section('style_css')
    <style>
        
    </style>
@endsection
@section('body')
    <!-- PRODUCT DETAILS AREA START -->
    <div class="header_menu_top bg-white text-dark" id="header_menu_top">
        @include('user.layouts.menu')
    </div>
    <div class="body">
        <div class="container py-5 mt-5 mt-lg-0">
            <div class="row">
                <div class="col-lg">
                    <div class="row">
                        @if($projects->count())
                            @foreach($projects as $project)
                                <div class="col-lg-6">
                                    <div data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="500" class="p-2 px-lg-3">
                                        <a href="{{route('user.project.show',$project->slug)}}">
                                            <div class="project_item bg-white box-shadow c-rounded mt-4">
                                                <div class="project_image position-relative br-radius-6-6-0-0">
                                                    <img src="{{$project->image ? $project->image :url('assets/user/pic/blog1.jpg') }}" />
                                                    <div class="project_image_detail "></div>
                                                    <div class="project_image_detail_1 text-white d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fa fa-map-marker px-2"></i>
                                                            <small>{{$project->getProjectCountry()."/".$project->getProjectCity()."/".$project->getProjectLocation()}}</small>
                                                        </div>
                                                        <div class="d-flex align-items-center  justify-content-center">
                                                            <small>{{num2fa(number_format($project->seen))}}</small>
                                                            <i class="fa fa-eye small px-2"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="project_content p-2 px-lg-4">
                                                    <div class="project_content_description d-flex flex-column">
                                                        <strong class="py-2 min-height-68 title">{{$project->title}}</strong>
                                                        <span class="py-2 price">{{$project->price_label}} $ {{num2fa(number_format($project->start_price))}}</span>
                                                        <p class="height-78">{{ $project->short_description}}</p>
                                                    </div>
                                                    <div class="project_content_footer">
                                                        <div class="row">
                                                            <div class="small col">
                                                                <a href="#" class="goToSingle">مشاهده بیشتر <i class="fas fa-angle-left"></i></a>
                                                            </div>
                                                            <div class="col-auto"><i class="fa fa-superscript" aria-hidden="true"></i>{{$project->area}}</div>
                                                            <div class="col-auto"><i class="fa fa-bed" aria-hidden="true"></i>{{$project->bedroom}}</div>
                                                            <div class="col-auto"><i class="fa fa-bath" aria-hidden="true"></i>{{$project->bathroom}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    {{ $projects->links() }}
                </div>
                
                <div class="col-lg-3 my-2 pt-lg-2 my-4">
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
    
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->
@endsection
@section('script_js') @endsection
