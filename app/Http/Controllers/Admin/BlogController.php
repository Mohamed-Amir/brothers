<?php


namespace App\Http\Controllers\Admin;

use App\Models\BlogCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Blog::where('type',$request->type)->get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $type=$request->type;
        $title=$request->title;
        return view('Admin.Blog.index',compact('type','title'));
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
        $this->save_Blog($request,new Blog);
        return $this->apiResponseMessage(1,'تم الاضافة بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Blog = Blog::find($id);
        return $Blog;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $Blog = Blog::find($request->id);
        $this->save_Blog($request,$Blog);
        return $this->apiResponseMessage(1,'تم التعديل بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_Blog($request,$Blog){
        $Blog->title=$request->title;
        $Blog->tags=$request->tags;
        $Blog->author=$request->author;
        $Blog->content=$request->content;
        $Blog->status=$request->status;
        $Blog->type=$request->type;
        $Blog->count=$request->count;
        if($request->image) {
            deleteFile('Blog',$Blog->image);
            $Blog->image=saveImage('Blog',$request->image);
        }
        if($request->icon) {
            deleteFile('Blog',$Blog->icon);
            $Blog->icon=saveImage('Blog',$request->icon);
        }
        $Blog->save();
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
            $Blog = Blog::whereIn('id', $ids)->get();
            foreach($Blog as $row){
                $this->deleteRow($row);
            }
        } else {
            $Blog = Blog::find($id);
            $this->deleteRow($Blog);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Blog){
        deleteFile('Blog',$Blog->image);
        deleteFile('Blog',$Blog->icon);
        $Blog->delete();
    }

    /**
     * @param $id
     * @param Request $request
     * @return int
     */
    public function ChangeStatus($id,Request $request){
        $Blog = Blog::find($id);
        $Blog->status=$request->status;
        $Blog->save();
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
            $image = '<a href="'. getImageUrl('Blog',$data->image).'" target="_blank">'
                .'<img  src="'. getImageUrl('Blog',$data->image) . '" width="50px" height="50px"></a>';
            return $image;
        })->editColumn('icon', function ($data) {
            $image = '<a href="'. getImageUrl('Blog',$data->icon).'" target="_blank">'
                .'<img  src="'. getImageUrl('Blog',$data->icon) . '" width="50px" height="50px"></a>';
            return $image;
        })->editColumn('status', function ($data) {
            $status = '<button class="btn waves-effect waves-light btn-rounded btn-success statusBut" style="cursor:pointer !important" onclick="ChangeStatus(2,'.$data->id.')" title="اضغط هنا لالغاء التفعيل">مفعل</button>';
            if ($data->status == 2)
                $status = '<button class="btn waves-effect waves-light btn-rounded btn-danger statusBut" onclick="ChangeStatus(1,'.$data->id.')" style="cursor:pointer !important" title="اضغط هنا للتفعيل">غير مفعل</button>';
            return $status;
        })->editColumn('cat_id', function ($data) {
            return $data->cat ?$data->cat->name : '';
        })->rawColumns(['action' => 'action','image' => 'image','checkBox'=>'checkBox','status'=>'status','icon'=>'icon'])->make(true);
    }
}
