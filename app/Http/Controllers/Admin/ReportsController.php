<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reports;
use App\Models\Cat_reports;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class ReportsController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Reports::where('type',$request->type)->get();
        return $this->mainFunction($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $Cat = Cat_reports::get();
        $type=$request->type;
        return view('Admin.Reports.index',compact('type','Cat'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'file' => 'required|',
                'name' => 'required',
            ],
            [
                'file.required' =>'من فضلك ادخل ملف ',
                'name.required' =>'من فضلك ادخل الاسم'
            ]
        );
        $this->save_Report($request,new Reports());
        return $this->apiResponseMessage(1,'تمت الاضافة بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Reports = Reports::find($id);
        return $Reports;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $Reports = Reports::find($request->id);
        $this->save_Report($request,$Reports);
        return $this->apiResponseMessage(1,'تم التعديل بنجاح',200);
    }

    /**
     * @param $request
     * @param $Reports
     */
    public function save_Report($request,$Reports){
        $Reports->name=$request->name;
        $Reports->cat_id=$request->cat_id;
        $Reports->type=$request->type;
        if($request->file) {
            deleteFile('Reports',$Reports->file);
            $Reports->file=saveImage('Reports',$request->file);
        }
        $Reports->save();
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id,Request $request)
    {
        if ($request->type == 2) {
            $ids = explode(',', $id);
            $Reports = Reports::whereIn('id', $ids)->get();
            foreach($Reports as $row){
                $this->deleteRow($row);
            }
        } else {
            $Reports = Reports::find($id);
            $this->deleteRow($Reports);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $Reports
     */
    private function deleteRow($Reports){
        deleteFile('Reports',$Reports->image);
        $Reports->delete();
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
        })->editColumn('file', function ($data) {
            $image = '<a href="'. getImageUrl('Reports',$data->file).'" target="_blank">اضغط لرؤية الملف</a>';
            return $image;
        })->editColumn('cat_id', function ($data) {
            $cat_id = $data->Cat  ? $data->Cat->name : '';
            return $cat_id;
        })->rawColumns(['action' => 'action','file' => 'file','checkBox'=>'checkBox','cat_id'=>'cat_id'])->make(true);
    }
}
