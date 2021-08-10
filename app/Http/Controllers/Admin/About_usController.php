<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About_us;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class About_usController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = About_us::get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Admin.About_us.index');
    }


    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $About_us = About_us::find($id);
        return $About_us;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $About_us = About_us::find($request->id);
        $this->save_info($request,$About_us);
        return $this->apiResponseMessage(1,'تم التعديل بنجاح',200);
    }

    /**
     * @param $request
     * @param $About_us
     */
    public function save_info($request,$About_us){
        if($request->image) {
            deleteFile('About_us',$About_us->image);
            $About_us->image=saveImage('About_us',$request->image);
        }
        if($request->ceo_image) {
            deleteFile('About_us',$About_us->ceo_image);
            $About_us->ceo_image=saveImage('About_us',$request->ceo_image);
        }
        $About_us->ceo_speech=$request->ceo_speech;
        $About_us->about_us=$request->about_us;
        $About_us->phone1=$request->phone1;
        $About_us->phone2=$request->phone2;
        $About_us->our_email=$request->our_email;
        $About_us->address=$request->address;
        $About_us->charity_idea=$request->charity_idea;
        $About_us->vision=$request->vision;
        $About_us->initiatives=$request->initiatives;
        $About_us->orphans=$request->orphans;
        $About_us->fraternize=$request->fraternize;
        $About_us->family=$request->family;
        $About_us->save();
    }


    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    private function mainFunction($data)
    {
        return Datatables::of($data)->addColumn('action', function ($data) {
            $options = '<td class="sorting_1"><button  class="btn btn-info waves-effect btn-circle waves-light" onclick="editFunction(' . $data->id . ')" type="button" ><i class="fa fa-spinner fa-spin" id="loadEdit_' . $data->id . '" style="display:none"></i><i class="sl-icon-wrench"></i></button>';
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('image', function ($data) {
            $image = '<a href="'. getImageUrl('About_us',$data->image).'" target="_blank">'
                .'<img  src="'. getImageUrl('About_us',$data->image) . '" width="50px" height="50px"></a>';
            return $image;
        })->rawColumns(['action' => 'action','checkBox'=>'checkBox','image'=>'image'])->make(true);
    }
}
