<?php

namespace App\Http\Controllers\User;

use App\Models\Article;
use App\Models\Category;
use App\Models\Project;
use App\Models\Setting;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $items = Category::with(['articles'=> function($q){
            $q->where('status',1);
        }])->orderby('created_at','desc')->get();

        $title = 'اخبار-و-مقالات-به-روز-ترکیه';
        return view('user.blog.index',compact('items'),['title'=>$title]);
    }

    public function show($id)
    {
        if ($id == "پروژه-ها") {
            $projects = Project::with('project_category')->orderBy('created_at','desc')->paginate(12);
            return view('user.project.index', compact('projects'));
        } else  if ($id == "اخبار-و-مقالات-به-روز-ترکیه") {
            $items = Category::with(['articles'=> function($q){
                $q->where('status',1);
            }])->orderby('created_at','desc')->get();
            $title = 'اخبار-و-مقالات-به-روز-ترکیه';
            return view('user.blog.index',compact('items'),['title'=>$title]);
        }else  if ($id == "خرید-خانه-در-استانبول") {
            $projects = Project::with(['project_category'=>function($q){
                $q->where('name','shahrvandi');
            }])->orderBy('created_at','desc')->take(10)->get();
            $setting=Setting::latest()->first();
            return view('user.conseling.index',compact('projects','setting'));
        }else  if ($id == "درباره-ما") {
            return view('user.about.show');
        }else if ($id == "تماس-با-ما") {
            $setting=Setting::latest()->first();
            return view('user.contact.show',compact('setting'));
        }else if ($id == "شهروندی-ترکیه") {
            return view('user.citizenship.index');
        }else {
            $item = Article::where('slug', $id)->first();
            $prev = Article::where('type', $item->type)->where('id', '<', $item->id)->max('id');
            $prev_item = Article::find($prev);

            $next = Article::where('type', $item->type)->where('id', '>', $item->id)->min('id');
            $next_item = Article::find($next);
            if (!$item) {
                abort(404);
            }
            $item->seen += 1;
            $item->update();

            $title = "مشاهده" . '(' . $item->title . ')';
            $items = Article::where('status', 1)->orderBy('id', 'DESC')->where('id', '!=', $item->id)->take(6)->get();
            $categories = Category::orderBy('id', 'DESC')->take(4)->get();
            return view('user.blog.show', compact('item', 'prev_item', 'next_item', 'items', 'categories'), ['title' => $title]);
        }
    }
}
