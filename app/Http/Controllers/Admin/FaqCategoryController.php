<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FaqCategory;
use Yajra\Datatables\Datatables;
use Lang;

class FaqCategoryController extends Controller
{
    private $data = array(
        'route' => 'admin.faqCat.',
        'title' => 'FAQ Category',
        'menu' => 'faqCat',
        'submenu' => '',
        'path' => 'admin/faqCat'
    );
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
            return view('admin.FaqCategory.view');
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
        return view('admin.faqCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        $rules = [
            'title' => 'required'
        ];

        // Validation Custom message
        $Message = [
            'title.required' => 'FAQ category is Required.',
        ];

        $this->validate($request,$rules,$Message);

        $input = array(
            'title' =>$request->title,
        );
        

        try {
            $faqCategory = FaqCategory::create($input);

        } catch(Exception $e){
            $notification = array(
                'message' => Lang::get('messages.error.support'), 
                'alert-type' => 'info'
            );
            return redirect('admin/faqCat')->with($notification);
        }

        $notification = array(
            'message' => Lang::get('messages.success.faqCategory.created'), 
            'alert-type' => 'info'
        );  
        return redirect('admin/faqCat')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $this->data['record'] = FaqCategory::where('slug','=',$slug)->first();
        return view('admin.FaqCategory.show',$this->data);
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
        $category = FaqCategory::findOrFail($id);
        return view('admin.faqCategory.create',compact('category'));
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
        //
        $category = FaqCategory::findOrFail($id);


        /* Change Status Block */
        if ($request->ajax()) {
            $category->update($request->only(['status']));
            return \Illuminate\Support\Facades\Response::json(['result'=>'success']);
        }

        $rules = [
            'title' => 'required'
        ];

        // Validation Custom message
        $Message = [
            'title.required' => 'FAQ category is Required.',
        ];

        $this->validate($request,$rules,$Message);

        $input = array(
            'title' =>$request->title,
        );

        try {
            $category->update($input);
        } catch(Exception $e){
            $notification = array(
                'message' => Lang::get('messages.error.support'), 
                'alert-type' => 'info'
            );
            return redirect('admin/faqCat')->with($notification);
        }

        $notification = array(
            'message' => Lang::get('messages.success.faqCategory.updated'), 
            'alert-type' => 'info'
        );
        return redirect('admin/faqCat')->with($notification);
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
            FaqCategory::destroy($id);    
        } catch(Exception $e){
            return response('Unauthorized.', 401);
        }
        
        return "true";
    }

    public function getdatatable(){
       
        $faqType = FaqCategory::all('id','title','slug','status');
        
        
        return Datatables::of($faqType)
                ->addColumn('status', function ($record) {
                    return '<input id="toggle-demo" value="'.$record->id.'" class="chk_status" data-toggle="toggle" data-on="Active" data-off="Deactive" data-size="small" data-onstyle="success"  type="checkbox" '.($record->status==1 ? "checked" : "").' >';
                })  
                ->addColumn('action', function ($category) {
                    return '<a href="'.url("admin/faqCat/{$category->slug}").'" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>'.'  <a href="'.url("admin/faqCat/{$category->id}/edit").'" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i></a>'.' <a id="delete" href="#" data-token="' . csrf_token() . '" val="' . $category->id . '" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>';
                })
                ->make(true);
    }
}
