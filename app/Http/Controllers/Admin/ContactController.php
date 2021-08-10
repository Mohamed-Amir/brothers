<?php


namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class ContactController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Contact::orderBy('id','desc');
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
        $title= 'رسائل التواصل';
        return view('Admin.Contact.index',compact('title'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $Contact = Contact::find($id);
        return $Contact;
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
            $Contact = Contact::whereIn('id', $ids)->get();
            foreach($Contact as $row){
                $this->deleteRow($row);
            }
        } else {
            $Contact = Contact::find($id);
            $this->deleteRow($Contact);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Contact){
        $Contact->delete();
    }

    /**
     * @param $id
     * @param Request $request
     * @return int
     */
    public function ChangeStatus($id,Request $request){
        $Contact = Contact::find($id);
        $Contact->status=$request->status;
        $Contact->save();
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
        })->rawColumns(['action' => 'action','image' => 'image','checkBox'=>'checkBox','status'=>'status','icon'=>'icon'])->make(true);
    }
}
