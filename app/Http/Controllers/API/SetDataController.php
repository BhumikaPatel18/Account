<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\App;


class SetDataController extends Controller
{
    private $modelPath;
    private $modelRepo;

    public function __construct(Request $request)
    {
        if(isset($request->module_name))
        {
            $this->modelPath ='App\\Interfaces\\'.$request->module_name.'RepositoryInterface';
            $this->modelRepo = App::make($this->modelPath);
        }
    }

    public function create(Request $request)
    {
    $input = $request->input_request;
    $data = $this->modelRepo->create($input);
    return response()->json(['module_name'=>$request->module_name,'id'=>$request->id,'data'=>$data]);
    }

    public function index(Request $request)
    {
        $data = $this->modelRepo->all($request->select);
        return response()->json(['module_name'=>$request->module_name,'data'=>$data]);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $data = $this->modelRepo->find($id);
        return response()->json(['module_name'=>$request->module_name,'id'=>$request->id,'data'=>$data]);

    }

    public function update(Request $request)
    {
        $input = $request->input_request;
        $id = $request->id;
        $data = $this->modelRepo->update($id,$input);
        $DataWithoutId = $data->makeHidden(['id']);
        return response()->json(['module_name'=>$request->module_name,'id'=>$request->id,'data'=>$DataWithoutId]);   
    }

    public function destroy(Request $request)
    {
         $id = $request->id;
         $data = $this->modelRepo->delete($id);
         return response()->json(['module_name'=>$request->module_name,'id'=>$request->id,'data'=>$data]);
    }
}
