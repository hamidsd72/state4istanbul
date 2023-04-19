@extends('user.layouts.user')
@section('style_css')
    <style>
        
    </style>
@endsection
@section('body')
    <div class="body about_us">
        <div class="container pt-5 mt-5 mt-lg-5">

            <div class="text-center">
                <h2 class="fw-bold py-4 fs-sm-24">ما به مشتریان خود کمک می کنیم تا ملک خود را بدون دردسر پیدا کنند</h2>
                <p class="col-xl-9 col-lg-10 mx-auto text-secondary fs-sm-16">استیت فور استانبول با استفاده از تجربه استثنایی و دانش خود ، در مورد بازارهای ملکی ، به عنوان یک پایگاه گسترده مشتری مدار و متخصص آماده خدمتگزاری به مشتریان عزیز در سرتاسر استانبول است اعتماد شما سرمایه ماست ، آن را به بهترین شکل ممکن پاسخ می دهیم</p>
            </div>
            
            <div class="row py-4">
                {{-- <div class="col-4">
                    <div class="about_us_image">
                        <img src="{{asset('user/pic/img-4.jpg')}}" />
                    </div>
                </div> --}}
                <div class="col-lg-6 mb-4 mb-lg-5">
                    <h4 class="text-center text-lg-start fs-sm-20">پشتیبانی 24/7 در دسترس است</h4>
                    <div class="pe-lg-5 text-center text-lg-start text-secondary">تکنولوژی بازاریابی قدرتمند ما، یک پورتال  است که دارای ویژگی های فراوان برای فعال کردن عملیا ت روز به روز و پشتیبانی 24 آنلاین است</div>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-5">
                    <h4 class="text-center text-lg-start fs-sm-20">دارای وکلای مجرب ترک</h4>
                    <div class="pe-lg-5 text-center text-lg-start text-secondary"> یکی از بزرگترین دغدغه های افراد در برخورد با مسائل حقوقی و کیفری است. زیرا زمانی که به دادگاه مراجعه می کنند و این افراد با ماهیت و مفاهیم حقوقی پرونده آشنا نیستند، می تواند شانس موفقیت فرد ناآگاه را در دادگاه کاهش دهد</div>
                    
                </div>
                <div class="col-lg-6 mb-4 mb-lg-5">
                    <h4 class="text-center text-lg-start fs-sm-20">دارای پروژه های اقساطی</h4>
                    <div class="pe-lg-5 text-center text-lg-start text-secondary">در حال حاضر تنها بستر امن و قابل اطمینان که افراد با هر اندازه نقدینگی و اقساط بلند مدّت و بدون بهره، بدون در نظر گرفتن قیمت های نجومی بازار و صرفاً بر اساس قیمت تمام شده ساخت، امکان سرمایه‌گذاری در پروژه های ساختمانی دارند</div>
                    
                </div>
                <div class="col-lg-6 mb-4 mb-lg-5">
                    <h4 class="text-center text-lg-start fs-sm-20">دارای پرونده های موفق شهروندی ترکیه</h4>
                    <div class="pe-lg-5 text-center text-lg-start text-secondary">اخذ شهروندی ترکیه و پاسپورت این کشور یکی از ساده ترین روش ها برای اخذ شهروندی در میان دیگر کشورهای جهان است. اگر می خواهید شهروندی ترکیه را بدست آورید و بدین ترتیب در یک کشور زیبا و استراتژیک در نزدیکی مرزهای اروپا ساکن شوید</div>
                </div>
            </div>
        </div>

        <div class="accordion bg-custom-a1 py-lg-5" id="accordionPanelsStayOpenExample">
            <div class="container">
                <div class="row py-4 accordion-transparent">
                    <div class="col-12 text-center">
                       <h2 class="fw-bold py-4 fs-sm-24">سوالات متداول</h2>
                        <p class="col-10 col-xl-9 mx-auto text-secondary fs-sm-16">شما می توانید از این راهنما برای آشنایی با قوانین، قوانین و سایر اطلاعات مهم مربوط به ملک خود استفاده کنید.</p>
                    </div>

                    <div class="col-lg-6">
                        <div class="p-4">

                            <div class="accordion-item p-4">
                                <div class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button text-dark fs-3 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne"
                                        aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                        در صورت انتقال یا هدیه بودن ملک باید حق تمبر پرداخت کنم؟
                                    </button>
                                </div>
                                {{-- <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne"> --}}
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body text-secondary">
                                        مشتری بسیار مهم است، مشتری توسط مشتری دنبال خواهد شد. چون سرزمین زمین، ماتم و سردار زمین، بالش شیر.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-4">
                            
                            <div class="accordion-item p-4">
                                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                    <button class="accordion-button text-dark fs-3 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                    چرا ثبت قرارداد فروش ضروری است؟
                                </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                                    <div class="accordion-body text-secondary">
                                        قانون ثبت، 1908، قانون انتقال املاک، 1882 و قانون املاک و مستغلات (تنظیم و توسعه) 2016، ثبت قرارداد برای فروش یک ملک غیر منقول را الزامی می کند. با ثبت قرارداد فروش یک ملک غیرمنقول به ثبت عمومی دائمی تبدیل می شود. بعلاوه، شخص تنها پس از ثبت آن ملک به نام خود، مالک قانونی مال غیر منقول محسوب می شود.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-4">
                            
                            <div class="accordion-item p-4">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button text-dark fs-3 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    مدارکی که خریدار از من نیاز دارد چیست؟
                                </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body text-secondary">
                                        مشتری بسیار مهم است، مشتری توسط مشتری دنبال خواهد شد. چون سرزمین زمین، ماتم و سردار زمین، بالش شیر.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-4">
                            
                            <div class="accordion-item p-4">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button text-dark fs-3 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    چگونه می توانم واجد شرایط معافیت مالیات بر عایدی سرمایه باشم؟
                                </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                    <div class="accordion-body text-secondary">
                                        مشتری بسیار مهم است، مشتری توسط مشتری دنبال خواهد شد. چون سرزمین زمین، ماتم و سردار زمین، بالش شیر.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="my-4 py-lg-5 align-items-center justify-content-center">
                <div class="bg-white box-shadow c-rounded">
                    <div class="about_us p-4 p-lg-5">
                        <h2 class="fw-bold py-4 fs-sm-24">از لحظه ورود شما به استانبول تا دریافت کلید خانه رویائیتان همراه شما هستیم</h2>
                        
                        <p class="text-secondary mb-0 fs-sm-16">به هلدینگ پرآوازه و سازنده مطرح YIGIT GROUP با نام تجاری ESTATE 4 ISTANBUL خوش آمدید.</p>
                        <p class="text-secondary mb-0 fs-sm-16">ما، ارائه دهنده خدمات پیشرو و مشاوره ای  مهاجرت در زمینه خرید ملک در کشور ترکیه هستیم.</p>
                        <p class="text-secondary mb-0 fs-sm-16">با ESTATE 4 ISTANBUL سرمایه گذاریتان را شروع کنید ، شهروندی و پاسپورت ترکیه خود را در کمتر از 90 روز دریافت کنید.</p>
                        <p class="text-secondary mb-0 fs-sm-16">هدف ما در هلدینگ YIGIT GROUP ارائه پرسودترین و باارزش ترین پیشنهاد ها برای خرید ملک و سرمایه گذاری در ترکیه است.</p>

                        <form action="#" method="post" class="w-100" >
                            @csrf
                            <div class="row">
                                <div class="form-group mt-4 col-md-6">
                                    <label for="first_name">لطفا نام را وارد کنید</label>
                                    <input type="text" name="first_name" class="form-control form-control-lg" placeholder=" نام *  "/>
                                </div>
                                <div class="form-group mt-4 col-md-6">
                                    <label for="last_name">لطفا نام خانواگی را وارد کنید</label>
                                    <input type="text" name="last_name" class="form-control form-control-lg" placeholder=" نام خانوادگی *  "/>
                                </div>

                                <div class="form-group mt-4 col-md-6">
                                    <label for="email">لطفا آدرس ایمیل را وارد کنید</label>
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="ایمیل *"/>
                                </div>
                                <div class="form-group mt-4 col-md-6">
                                    <label for="name">لطفا شماره تماس را وارد کنید</label>
                                    <input type="text" name="phone" class="form-control form-control-lg" placeholder="شماره تماس *"/>
                                </div>

                                <div class="form-group mt-4 col-md-12">
                                    <label for="message">لطفا پیام خود را وارد کنید</label>
                                    <textarea name="message" id="message" rows="4" class="form-control form-control-lg"></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="col mt-4 mt-lg-5">
                                            <div class="row">
                                                <div class="col col-lg-auto">
                                                    <input type="number" class="form-control form-control-lg {{$errors->has('captcha')?'error_border':''}}"
                                                     onkeyup="captcha_func(this.value)" id="captcha" name="captcha" placeholder="کد امنیتی را وارد کنید">
                                                </div>
                                                <div class="col-auto">
                                                    <img class="c-rounded" src="{{url(captcha())}}" class="m-auto" style="height: 36px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-4 mt-lg-5">
                                            <button type="submit" class="btn btn-lg btn-success py-lg-3 col-12 btn_activate d-none">ارسال پیام</button>
                                            <button type="submit" class="btn btn-lg btn-secondary py-lg-3 col-12 btn_disabled" disabled>ارسال پیام</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script_js')
    <script>
        function captcha_func(value) {
            if( value.length > 3 ) {
                document.querySelector('.btn_activate').classList.remove('d-none');
                document.querySelector('.btn_disabled').classList.add('d-none');
            } else {
                document.querySelector('.btn_activate').classList.add('d-none');
                document.querySelector('.btn_disabled').classList.remove('d-none');
            }
        }
    </script>
@endsection

{{-- 
<div class="container py-5 mt-5">
    <div class="row py-2">
        <div class="col-4">
            <div class="about_us_image">
                <img src="{{asset('user/pic/img-4.jpg')}}" />
            </div>
        </div>
        <div class="col-8">
            <div class="about_us">
                <strong class="py-2">ما به مشتریان خود کمک می کنیم تا ملک خود را بدون دردسر پیدا کنند</strong>
                <p>استیت فور استانبول با استفاده از تجربه استثنایی و دانش خود ، در مورد بازارهای ملکی ، به عنوان یک پایگاه گسترده مشتری مدار و متخصص آماده خدمتگزاری به مشتریان عزیز در سرتاسر استانبول است اعتماد شما سرمایه ماست ، آن را به بهترین شکل ممکن پاسخ می دهیم</p>
                <ul>
                    <li><i class="fa fa-check px-2" ></i>پشتیبانی 24/7 در دسترس است</li>
                    <li><i class="fa fa-check px-2" ></i>دارای وکلای مجرب ترک</li>
                    <li><i class="fa fa-check px-2" ></i>دارای پروژه های اقساطی</li>
                    <li><i class="fa fa-check px-2" ></i>دارای پرونده های موفق شهروندی ترکیه</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row py-5">
        <div class="col-8  align-items-center justify-content-center">
            <div class="about_us">

                <strong class="py-2">از لحظه ورود شما به استانبول تا دریافت کلید

                    خانه رویائیتان همراه شما هستیم</strong>
                <ul>
                    <li>
                        به هلدینگ پرآوازه و سازنده مطرح YIGIT GROUP با نام تجاری ESTATE 4 ISTANBUL خوش آمدید.
                    </li>
                    <li>
                        ما، ارائه دهنده خدمات پیشرو و مشاوره ای  مهاجرت در زمینه خرید ملک در کشور ترکیه هستیم.
                    </li>
                    <li>
                        با ESTATE 4 ISTANBUL سرمایه گذاریتان را شروع کنید ، شهروندی و پاسپورت ترکیه خود را در کمتر از 90 روز دریافت کنید.
                    </li>
                    <li>
                        هدف ما در هلدینگ YIGIT GROUP ارائه پرسودترین و باارزش ترین پیشنهاد ها برای خرید ملک و سرمایه گذاری در ترکیه است.
                    </li>
                </ul>

            </div>

        </div>
        <div class="col-4 py-2 align-items-center justify-content-center">
            <div class="about_us_image">
            <img src="{{asset('user/pic/img-4.jpg')}}" />
            </div>
        </div>
    </div>
</div> --}}