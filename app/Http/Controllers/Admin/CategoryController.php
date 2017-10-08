<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Model\Category;
use Lang;

class CategoryController extends Controller
{

    private $data = array(
        'route' => 'admin.category.',
        'title' => 'Category',
        'menu' => 'category',
        'submenu' => '',
    );
    // public function __construct()
    // {
    //     $this->middleware('auth:admin',['except' => ['getdatatable']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            return $this->getdatatable();
        } else {
            return view('admin.category.view');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rules = [
        //     'title' => 'required|min:10|max:255',
        //     'desc' => 'required|min:100',
        //     'fileName' => 'required'
        // ];

        // $customMessage = [
        //     'title.required' => 'Title is Required.',
        //     'title.min' => 'TEST',
        // ];

        // $this->validate($request,$rules,$customMessage);

        // Validation Rules
        $rules = [
            'category_name' => 'required'
        ];

        // Validation Custom message
        $Message = [
            'category_name.required' => 'Category name is Required.',
        ];

        $this->validate($request,$rules,$Message);

        $input = array(
            'category_name' =>$request->category_name,
            'category_desc' => $request->category_desc
        );
        
        try {
            $category = Category::create($input);
        } catch(Exception $e){
            $notification = array(
                'message' => Lang::get('messages.error.support'), 
                'alert-type' => 'info'
            );
            return redirect('admin/category')->with($notification);
        }

        $notification = array(
            'message' => Lang::get('messages.success.category.created'), 
            'alert-type' => 'info'
        );
        return redirect('admin/category')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['record'] = Category::where('category_slug','=',$id)->first();
        return view('admin.category.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::findOrFail($id);
        return view('admin.category.create',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        /* Change Status Block */
        if ($request->ajax()) {
            $category->update($request->only(['status']));
            return \Illuminate\Support\Facades\Response::json(['result'=>'success']);
        }

        $this->validate($request,[
            'category_name' => 'required'
        ]);

        $input = array(
            'category_name' => $request->category_name,
            'category_desc' => $request->category_desc
        );
        
        try {
            $category->update($input);
        } catch(Exception $e){
            $notification = array(
                'message' => Lang::get('messages.error.support'), 
                'alert-type' => 'info'
            );
            return redirect('admin/category')->with($notification);
        }
        $notification = array(
            'message' => Lang::get('messages.success.category.updated'), 
            'alert-type' => 'info'
        );
        return redirect('admin/category')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            Category::destroy($id);    
        } catch(Exception $e){
            return response('Unauthorized.', 401);
        }
        
        return "true";
    }


    public function getdatatable(){
       
        $categories = Category::all('id','category_name','category_desc','category_slug','status');
         
        return Datatables::of($categories)
                ->addColumn('is_active', function ($record) {
                    return '<input id="toggle-demo" value="'.$record->id.'" class="chk_status" data-toggle="toggle" data-on="Active" data-off="Deactive" data-size="small" data-onstyle="success"  type="checkbox" '.($record->status==1 ? "checked" : "").' >';
                })  
                ->addColumn('action', function ($category) {
                    return '<a href="'.url("admin/category/{$category->category_slug}").'" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>'.'  <a href="'.url("admin/category/{$category->id}/edit").'" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i></a>'.' <a id="delete" href="#" data-token="' . csrf_token() . '" val="' . $category->id . '" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>';
                })
                ->make(true);
    }
}
