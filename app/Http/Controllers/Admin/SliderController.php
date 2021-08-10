<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class SliderController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Slider::get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        return view('Admin.Slider.index');
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'image' => 'required|image|max:2000',
            ],
            [
                'image.required' =>'من فضلك ادخل صوره ',
                'image.image' =>'من فضلك ادخل صورة صالحة'
            ]
        );
        $this->save_slider($request,new Slider);
        return $this->apiResponseMessage(1,'تم اضافة الصوره بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return $slider;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $slider = Slider::find($request->id);
        $this->save_slider($request,$slider);
        return $this->apiResponseMessage(1,'تم تعديل الصوره بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_slider($request,$slider){
        $slider->btn_name=$request->btn_name;
        $slider->btn_link=$request->btn_link;
        $slider->title=$request->title;
        $slider->desc=$request->desc;
        $slider->status=$request->status;
        if($request->image) {
            deleteFile('Slider',$slider->image);
            $slider->image=saveImage('Slider',$request->image);
        }
        $slider->save();
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|int
     */
    public function destroy($id,Request $request)
    {
        if ($request->type == 2) {
            $ids = explode(',', $id);
            $slider = Slider::whereIn('id', $ids)->get();
            foreach($slider as $row){
                $this->deleteRow($row);
            }
        } else {
            $slider = Slider::find($id);
            $this->deleteRow($slider);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($slider){
        deleteFile('Sliders',$slider->image);
        $slider->delete();
    }

    /**
     * @param $id
     * @param Request $request
     * @return int
     */
    public function ChangeStatus($id,Request $request){
        $slider = Slider::find($id);
        $slider->status=$request->status;
        $slider->save();
        return 1;
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
            $options .= ' <button type="button" onclick="deleteFunction(' . $data->id . ',1)" class="btn btn-dribbble waves-effect btn-circle waves-light"><i class="sl-icon-trash"></i> </button></td>';
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('image', function ($data) {
            $image = '<a href="'. getImageUrl('Slider',$data->image).'" target="_blank">'
                .'<img  src="'. getImageUrl('Slider',$data->image) . '" width="50px" height="50px"></a>';
            return $image;
        })->editColumn('btn_link', function ($data) {
            $image = '<a href="'. $data->btn_link.'" target="_blank">'.$data->btn_name.'</a>';
            return $image;
        })->editColumn('status', function ($data) {
            $status = '<button class="btn waves-effect waves-light btn-rounded btn-success statusBut" style="cursor:pointer !important" onclick="ChangeStatus(2,'.$data->id.')" title="اضغط هنا لالغاء التفعيل">مفعل</button>';
            if ($data->status == 2)
                $status = '<button class="btn waves-effect waves-light btn-rounded btn-danger statusBut" onclick="ChangeStatus(1,'.$data->id.')" style="cursor:pointer !important" title="اضغط هنا للتفعيل">غير مفعل</button>';
            return $status;
        })->rawColumns(['action' => 'action','image' => 'image','checkBox'=>'checkBox','status'=>'status','btn_link'=>'btn_link'])->make(true);
    }
}
