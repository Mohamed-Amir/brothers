<?php


namespace App\Http\Controllers\Admin;

use App\Models\SubscribeCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class SubscribeController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Subscribe::where('type',$request->type);
        if($request->status)
            $data=$data->where('status',$request->status);
        if($request->dataFilter ==1)
            $data=$data->whereDay('created_at',now());
        if($request->dataFilter ==2)
            $data=$data->whereMonth('created_at',now());
        if($request->dataFilter ==3)
            $data=$data->whereYear('created_at',now());
        $data=$data->get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $type=$request->type;
        $title=$type == 1 ? 'الاشتراكات العاملة' : 'الاشتراكات المنتسبة';
        return view('Admin.Subscribe.index',compact('type','title'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $Subscribe = Subscribe::find($id);
        return $Subscribe;
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
            $Subscribe = Subscribe::whereIn('id', $ids)->get();
            foreach($Subscribe as $row){
                $this->deleteRow($row);
            }
        } else {
            $Subscribe = Subscribe::find($id);
            $this->deleteRow($Subscribe);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Subscribe){
        $Subscribe->delete();
    }

    /**
     * @param $id
     * @param Request $request
     * @return int
     */
    public function ChangeStatus($id,Request $request){
        $Subscribe = Subscribe::find($id);
        $Subscribe->status=$request->status;
        $Subscribe->save();
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
            $options = '<td class="sorting_1"><button  class="btn btn-info waves-effect btn-circle waves-light" onclick="showFunction(' . $data->id . ')" type="button" ><i class="fa fa-spinner fa-spin" id="loadShow_' . $data->id . '" style="display:none"></i><i class="icon-Eye-Blind"></i></button>';
            $options .= ' <button type="button" onclick="deleteFunction(' . $data->id . ',1)" class="btn btn-dribbble waves-effect btn-circle waves-light"><i class="sl-icon-trash"></i> </button></td>';
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('status', function ($data) {
            $status = '<button class="btn waves-effect waves-light btn-rounded btn-success statusBut" style="cursor:pointer !important" onclick="ChangeStatus(2,'.$data->id.')" title="اضغط هنا لالغاء التفعيل">مفعل</button>';
            if ($data->status == 2)
                $status = '<button class="btn waves-effect waves-light btn-rounded btn-danger statusBut" onclick="ChangeStatus(1,'.$data->id.')" style="cursor:pointer !important" title="اضغط هنا للتفعيل">غير مفعل</button>';
            return $status;
        })->rawColumns(['action' => 'action','image' => 'image','checkBox'=>'checkBox','status'=>'status','icon'=>'icon'])->make(true);
    }
}
