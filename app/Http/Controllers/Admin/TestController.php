<?php
namespace App\Http\Controllers\Admin;

use App\Test;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use \Illuminate\Http\Request;

/**
 * Description of DashboardController
 *
 * @author yuren
 */
class TestController extends Controller{
    
    
    public function __construct()
    {
        $this->middleware('auth');
     
    }
    
    public function index() {

        
        return view('admin/test/test');   
    }
    
    public function delete() {
        
        
    }
    
    public function data() {
        
        $tables = Test::select(['id', 'name','message']);
     
        return DataTables::of($tables)
            ->addColumn('action', function (Test $tables) {
                $html = '<a href="' . URL::to('admin/test/' . $tables->id . '/edit') . '" class="btn btn btn-primary btn-sm btn-sm-table"><i class="fa fa-edit"></i>Edit</a>&nbsp;&nbsp;&nbsp;';
                $html.= '<a href="'.URL::to('admin/test/' . $tables->id . '/confirm-delete').'" 
                                    class="btn btn btn-danger btn-sm delete-modal btn-sm-table"
                                    data-toggle="modal" data-target="#delete_confirm">
                                    <i class="fa fa-trash-o"></i>Delete
                              </a>';
                return $html;
            })
            ->removeColumn('id')
            ->make(true);
    }
    

    public function create()
    {
        return view('admin.test.create');
    }
    
    
    
    public function edit(Request $request,Test $test)
    {   
        $testModel = Test::find($test->id);
       
        return view('admin.test.edit',compact('testModel'));
    }

    public function update(TestRequest $request,Test $test)
    {
       
        $test->name = $request->input('name');
        $test->message = $request->input('message');
        
        if ($test->update()) {
           return redirect()->back()->withSuccess('Record updated');;
        } 
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(TestRequest $request)
    {
        $test = new Test();


        $test->name = $request->input('name');
        $test->message = $request->input('message');
        $test->save();


        if ($test->id) {
            
            return redirect('admin/test/'.$test->id.'/edit')->with('success', 'Record created');
           
        }else{
            
            return redirect()->back()->with('error', 'Record not created');
        } 

    }
    
    /**
     *.
     *
     * @param Test $test
     * @return Response
     */
    public function getModalDelete(Test $test)
    {
        $model = 'test';
        $item  = $test;
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.test.delete', ['id' => $test->id]);
            return view('admin.layouts.modal_confirmation', compact('item','error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('region/message.error.delete', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error','item_mame', 'model', 'confirm_route'));
        }
    }
    
    public function destroy(Test $test){
        
        
        if(Test::find($test->id)->delete()){
            
            return redirect('admin/test/')->with('success', 'Record deleted');
            
            
        }
    }
    

}
