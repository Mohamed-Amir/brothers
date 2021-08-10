<?php

namespace App\Http\Controllers\Fronted;

use App\Interfaces\UserInterface;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Resources\UserResource;
use App\Models\User;

class GeneralController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function donate(){

        return view('Fronted.GeneralPages.donate');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function our_work(){
        return view('Fronted.GeneralPages.our_work');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact_us(){
        return view('Fronted.GeneralPages.contact_us');
    }

    public function about_us(){
        return view('Fronted.GeneralPages.about_us');

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







}
