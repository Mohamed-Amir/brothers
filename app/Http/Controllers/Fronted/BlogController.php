<?php

namespace App\Http\Controllers\Fronted;

use App\Interfaces\UserInterface;
use App\Models\Blog;
use App\Models\BlogCat;
use App\Models\BlogComment;
use App\Models\BlogWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Controllers\Manage\EmailsController;

class BlogController extends Controller
{




    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function news(){

        return view('Fronted.Blog.news');

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function partners(){

        return view('Fronted.Blog.partners');

    }

    public function testimonials(){

        return view('Fronted.Blog.testimonials');

    }
//    /**
//     * @param Request $request
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
//     */
//    public function singleBlog  (Request $request){
//        $blog=Blog::find($request->blog_id);
//        if(is_null($blog)){
//            return view('404');
//        }
//        return view('Fronted.Blog.singleBlog',compact('blog'));
//    }

}
