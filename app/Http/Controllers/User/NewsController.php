<?php

namespace App\Http\Controllers\User;

use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{

    public function show($id) {

        $item       = Article::where('slug',$id)->first();
        $prev       = Article::where('type',$item->type)->where('id', '<', $item->id)->max('id');
        $prev_item  = Article::find($prev);

        $next       = Article::where('type',$item->type)->where('id', '>', $item->id)->min('id');
        $next_item  = Article::find($next);
        if(!$item) abort(404);
        $item->seen += 1;
        $item->update();

        $title      = "مشاهده".'('.$item->title.')';
        $items      = Article::where('status',1)->orderBy('id','DESC')->where('id','!=',$item->id)->take(6)->get();
        // $villas=Villa::where('status','published')->where('villa_vip',1)->orderBy('id','DESC')->take(4)->get();
        $categories = Category::orderBy('id','DESC')->take(4)->get();
        return view('user.blog.show',compact('item','prev_item','next_item','items','categories'),['title'=>$title]);

    }

}
