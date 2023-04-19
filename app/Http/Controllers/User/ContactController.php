<?php

namespace App\Http\Controllers\User;

use App\Models\Contact;
use App\Models\Conseling;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
  
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        try{
            $item=new Contact();
            $item->name=$request->name;
            $item->email=$request->email;
            $item->phone=$request->phone;
            $item->message=$request->message;
            $item->subject=$request->subject;
            $item->save();
//            $headers = 'MIME-Version: 1.0' . "\r\n";
//            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
//            $headers .= 'From: <info@vandidadgroup.com.tr>' . "\r\n";
//            $email='info@vandidadgroup.com.tr';
////            $email='adeln1368@gmail.com';
//            $subject='تماس با ما';
//            $masage='<h2 style="text-align: center;margin-bottom: 20px;margin-top: 20px">تماس با ما</h2>';
//            $masage.='<p style="text-align: right;direction: rtl">نام : '.$request->name.'</p>';
//            $masage.='<p style="text-align: right;direction: rtl">ایمیل : <span style="direction: ltr!important"> '.$request->email.' </span></p>';
//            $masage.='<p style="text-align: right;direction: rtl">شماره تماس : <span style="direction: ltr!important"> '.$request->phone.' </span></p>';
//            $masage.='<hr/>';
//            $masage.='<p style="text-align: right;direction: rtl">'.$request->message.'</p>';
//
//
//            $msg= '<div style="width: 95%;min-height: 300px;margin: auto;position: relative;border: 1px solid #e1e1e1;direction: rtl">';
//            $msg.= '<div style="padding:20px;text-align: justify;font-size: 18px">';
//            $msg.=$masage;
//            $msg.='</div>';
//            $msg.='</div>';
//            mail($email,$subject, $msg , $headers);
            return redirect()->back()->with('flash_message', 'پیام شما با موفقیت ارسال شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ارسال پیام بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function conseling(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'request_type' => 'required',
        ]);

        try{
            $item=new Conseling();
            $item->name=$request->name;
            $item->mobile=$request->phone;
            $item->request_type=$request->request_type;
            $item->save();

            return redirect()->back()->with('flash_message', 'پیام شما با موفقیت ارسال شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ارسال پیام بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function store1(Request $request)
    {
        try{
            $item=new Contact();
            $item->name=$request->name;
            $item->age=$request->age;
            $item->city=$request->city;
            $item->education=$request->education;
            $item->login_tr=$request->login_tr;
            $item->along_count=$request->along_count;
            $item->time_tr=$request->time_tr;
            $item->know_izmir=$request->know_izmir;
            $item->target_tr=$request->target_tr;
            $item->start_price=$request->start_price;
            $item->email=$request->email;
            $item->phone=$request->phone;
            $item->message=$request->message;
            $item->type='consulting';
            $item->description=serialize($request->all());
            $item->save();
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'From: <info@vandidadgroup.com.tr>' . "\r\n";
            $email='info@vandidadgroup.com.tr';
//            $email='adeln1368@gmail.com';
            $subject='درخواست مشاوره';
            $masage='<h2 style="text-align: center;margin-bottom: 20px;margin-top: 20px">درخواست مشاوره</h2>';
            $masage.='<p style="text-align: right;direction: rtl">نام : '.$request->name.'</p>';
            $masage.='<p style="text-align: right;direction: rtl">سن : '.$request->age.'</p>';
            $masage.='<p style="text-align: right;direction: rtl">شهر محل سکونت : '.$request->city.'</p>';
            $masage.='<p style="text-align: right;direction: rtl">میزان تحصیلات : '.$request->education.'</p>';
            $masage.='<p style="text-align: right;direction: rtl">تا بحال ورود به ترکیه داشته اید؟ : '.$request->login_tr.'</p>';
            $masage.='<p style="text-align: right;direction: rtl">تعداد افرادحاضر همراه شما برای مهاجرت چند نفر میباشد؟ : '.$request->along_count.'</p>';
            $masage.='<p style="text-align: right;direction: rtl">چه زمانی قصد مهاجرت یا سرمایه گذاری دارید؟ : '.$request->time_tr.'</p>';
            $masage.='<p style="text-align: right;direction: rtl">شناخت شما از شهر ازمیر به چه میزان است؟ : '.$request->know_izmir.'</p>';
            $masage.='<p style="text-align: right;direction: rtl">هدف شما از مهاجرت کدام یک از موارد زیر است؟ : '.$request->target_tr.'</p>';
            $masage.='<p style="text-align: right;direction: rtl">شروع سرمایه گذاری  شما با چه مبلغی می باشد؟ : '.$request->start_price.'</p>';
            $masage.='<p style="text-align: right;direction: rtl">ایمیل : <span style="direction: ltr!important"> '.$request->email.' </span></p>';
            $masage.='<p style="text-align: right;direction: rtl">شماره تماس : <span style="direction: ltr!important"> '.$request->phone.' </span></p>';
            $masage.='<hr/>';
            $masage.='<p style="text-align: right;direction: rtl">'.$request->message.'</p>';


            $msg= '<div style="width: 95%;min-height: 300px;margin: auto;position: relative;border: 1px solid #e1e1e1;direction: rtl">';
            $msg.= '<div style="padding:20px;text-align: justify;font-size: 18px">';
            $msg.=$masage;
            $msg.='</div>';
            $msg.='</div>';
            mail($email,$subject, $msg , $headers);
            return redirect()->back()->with('flash_message', 'پیام شما با موفقیت ارسال شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ارسال پیام بوجود آمده،مجددا تلاش کنید');
        }
    }
}
