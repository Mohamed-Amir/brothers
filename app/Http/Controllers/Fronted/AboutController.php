<?php

namespace App\Http\Controllers\Fronted;

use App\Interfaces\UserInterface;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\About_us;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Resources\UserResource;
use App\Models\User;

class AboutController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function info(){
        return view('Fronted.About.info');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function values(){
        return view('Fronted.About.values');
    }

    public function ceo(){
        return view('Fronted.About.ceo');

    }

    public function news(){
        return view('Fronted.GeneralPages.news');
    }

    public function events (){
        return view('Fronted.GeneralPages.events');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveContactUs(Request $request){
        $contact=new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->message=$request->message;
        $contact->save();
        return response()->json(['status'=>1,'message'=>'تم ارسال رسالتك وسيقوم فريقنا بالتواصل معك']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(){
        return view('Fronted.GeneralPages.register');
    }

    public function save_register(Request $request){
        $User=new User();
        $User->name=$request->name;
        $User->email=$request->email;
        $User->desc=$request->desc;
        $User->phone=$request->phone;
        $User->address=$request->address;
        $User->password=Hash::make($request->password);
        $User->username=$request->username;
        if($request->image)
            $User->image=saveImage('User',$request->image);
        if($request->cv)
            $User->cv=saveImage('User',$request->cv);
        $User->save();
        return response()->json(['status'=>1,'message'=>'تم التسجيل بنجاح']);

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function singleBlog($id){
        $row=Blog::find($id);
        return view('Fronted.GeneralPages.singleBlog',compact('row'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View.
     */
    public function hawkama(){
        return view('Fronted.GeneralPages.hawkama');
    }

}
