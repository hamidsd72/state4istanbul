@extends('user.layouts.user')
@section('meta')
    <meta name="keywords" content="{{$item->keywords}}">
    <meta name="description" content="{{$item->description}}"/>
    <meta property="og:title" content="{{$item->page_title}}"/>
    <meta property="og:description" content="{{$item->description}}"/>
@endsection
@section('style_css')
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />

    
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <style>
        .swiper {
            height: 500px;
            max-height: 500px;
        }
    </style>
    <style>
        .header_menu{
            color: black!important;
        }
    </style>
@endsection
@section('body')
    <div class="header_menu_top bg-white text-dark" id="header_menu_top">
        @include('user.layouts.menu')
    </div>
    <div class="body">
        <section class="blog py-3">
              <div class="container">
                  <div class="row">
                      <div class="col-12 col-lg-8 p-2">
                          <div class="col-12 bg-white shadow-sm ">
                            <div class="blog_image">
                                <img src="{{ url($item->photo ?: 'assets/user/pic/blog1.jpg')}}" />
                            </div>
                            <div class="d-flex align-items-center justify-content-center p-2">
                                <div class="text-center text-dark px-2">
                                    <i class="far fa-user px-2"></i><a>{{$item->author != null ? $item->author : $item->user->first_name.' '.$item->last_name}}</a>
                                </div>
                                <div class="text-center text-dark px-2">
                                    <i class="far fa-calendar-alt px-2"></i>{{my_jdate($item->created_at,'Y/m/d')}}
                                </div>
                                <div class="text-center text-dark px-2">
                                    <a><i class="far fa-eye px-2"></i>{{$item->seen}}</a>
                                </div>
                            </div>
                            <div class="blog_detail p-2">
                                <h1 class="py-3 text-center">{{$item->title}}</h1>
                                {!! $item->text !!}
                            </div>
                          </div>
                      </div>
                      <div class="col-12  col-lg-4 p-2">
                          <div class="col-12 bg-white shadow-sm mx-2">
                                <ul>
                                    @foreach($categories as $category)
                                        <li class="py-2 category_item"><i class="fa fa-hand-o-left px-2" aria-hidden="true"></i>{{$category->name}}</li>
                                    @endforeach
                                </ul>
                          </div>

                      </div>
                  </div>
                <div class="col-12 bg-white shadow-sm">
                    <h4 class="text-center py-3">آخرین نوشته ها</h4>
                    <div class="swiper p-2">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach($items as $article)
                                <div class="swiper-slide">
                                    <a href="{{route('user.blog.show',$article->slug)}}">
                                    <div class="project_item bg-white shadow-sm rounded-sm my-2">
                                        <div class="project_image position-relative">
                                            <img src="{{$article->photo?url($article->photo):url('assets/user/pic/blog1.jpg')}}" alt="{{$article->title}}" width="100%" height="100%" />
                                            <div class="project_image_detail "></div>
                                            <div class="project_image_detail_1 text-white d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    {{--                                        <i class="fa fa-map-marker  px-2"></i>--}}
                                                    {{--                                        <small>{{$article->getProjectCountry()."/".$article->getProjectCity()."/".$project->getProjectLocation()}}</small>--}}
                                                </div>
                                                <div class="d-flex align-items-center  justify-content-center">
                                                    <i class="fa fa-eye small px-2"></i>
                                                    <small>{{number_format($article->seen)}}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project_content p-2">
                                            <div class="project_content_description d-flex flex-column">
                                                <strong class="py-2">{{$article->title}}</strong>
                                                {{--                                    <span class="py-2 text-warning font-weight-bold">{{$article->price_label}} $ {{$project->start_price}}</span>--}}
                                                {{--                                    <p>{{ str_limit($article->short_description, 30)}}</p>--}}
                                            </div>
                                            <div class="project_content_footer py-2 d-flex align-items-center justify-content-between">

                                                <div class="project_content_footer_author d-flex align-items-center justify-content-between">
                                                    <div class="icon d-flex">
                                                        <i class="fa fa-user small"></i>
                                                    </div>
                                                    <span class="mx-2 small">{{$article->user->first_name}}</span>

                                                </div>

                                                <div class="project_content_footer_icon d-flex align-items-center justify-content-center small">
                                                    <i class="far fa-calendar-alt px-2"></i>{{my_jdate($article->created_at,'Y/m/d')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
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
       </section>
    </div>
@endsection
@section('script_js')

    <script>
        var swiper = new Swiper(".swiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2500,
            },
        });
    </script>
@endsection