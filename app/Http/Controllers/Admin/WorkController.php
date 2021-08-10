<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TeamWork;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class WorkController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request,$id)
    {
        $data = TeamWork::where('team_id',$id)->get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        return view('Admin.TeamWork.index');
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->save_TeamWork($request,new TeamWork);
        return $this->apiResponseMessage(1,'تمت الاضافة بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $TeamWork = TeamWork::find($id);
        return $TeamWork;
    }


    /**
     * @param $request
     * @param $TeamWork
     */
    public function save_TeamWork($request,$TeamWork){
        $TeamWork->image=saveImage('Work',$request->image);
        $TeamWork->team_id=$request->team_id;
        $TeamWork->save();
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
            $TeamWork = TeamWork::whereIn('id', $ids)->get();
            foreach($TeamWork as $row){
                $this->deleteRow($row);
            }
        } else {
            $TeamWork = TeamWork::find($id);
            $this->deleteRow($TeamWork);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($TeamWork){
        deleteFile('Work',$TeamWork->image);
        $TeamWork->delete();
    }



    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    private function mainFunction($data)
    {
        return Datatables::of($data)->addColumn('action', function ($data) {
            $options = ' <button type="button" onclick="deleteFunction2(' . $data->id . ',1)" class="btn btn-dribbble waves-effect btn-circle waves-light"><i class="sl-icon-trash"></i> </button></td>';
            return $options;
        })->editColumn('image', function ($data) {
            $image = '<a href="'. getImageUrl('Work',$data->image).'" target="_blank">'
                .'<img  src="'. getImageUrl('Work',$data->image) . '" width="50px" height="50px"></a>';
            return $image;
        })->rawColumns(['action' => 'action','image' => 'image','checkBox'=>'checkBox','status'=>'status','btn_link'=>'btn_link'])->make(true);
    }
}
