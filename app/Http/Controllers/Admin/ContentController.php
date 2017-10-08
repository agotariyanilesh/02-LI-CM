<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Lang;
use App\Model\content;
use App\Model\ContentType;
use DB;

class ContentController extends Controller
{
    private $data = array(
        'route' => 'admin.content.',
        'title' => 'Content',
        'menu' => 'content',
        'submenu' => '',
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
            return view('admin.content.view');
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
        $contentType = ContentType::where('status','=',1)->pluck('contentType','id')->toArray();
        return view('admin.content.create',compact('contentType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        // Validation Rules
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'contentTypeId' => 'required',
        ];

        // Validation Custom message
        $Message = [
            'title.required' => 'Content name is Required.',
            'content.required' => 'Content is Required.',
            'contentTypeId.required' => 'Content Type is Required.',
        ];

        $this->validate($request,$rules,$Message);

        $input = array(
            'title' => $request->title,
            'content' => $request->content,
            'contentTypeId' => $request->contentTypeId
        );
        
        try {
            $contents = Content::create($input);
            
        } catch(Exception $e){
            $notification = array(
                'message' => Lang::get('messages.error.support'), 
                'alert-type' => 'info'
            );
            return redirect('admin/content')->with($notification);
        }

        $notification = array(
            'message' => Lang::get('messages.success.content.created'), 
            'alert-type' => 'info'
        );
        return redirect('admin/content')->with($notification);
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
        $this->data['record'] = DB::table('content')
                    ->join('contentType','content.contentTypeId','=','contentType.id')
                    ->where('Content.slug','=',$slug)
                    ->select('Content.*','contentType.contentType')
                    ->first();
                
        // $this->data['record'] = Content::where('slug','=',$slug)->first();
        return view('admin.content.show',$this->data);
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
        $contentType = ContentType::where('status','=',1)->pluck('contentType','id')->toArray();
        $category = Content::findOrFail($id);
        return view('admin.content.create',compact('category','contentType'));
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
        $category = Content::findOrFail($id);

        /* Change Status Block */
        if ($request->ajax()) {
            $category->update($request->only(['status']));
            return \Illuminate\Support\Facades\Response::json(['result'=>'success']);
        }

        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'contentTypeId' => 'required',
        ]);

        $input = array(
            'title' =>$request->title,
            'content' => $request->content,
            'contentTypeId' => $request->contentTypeId,   
        );

        try {
            $category->update($input);
        } catch(Exception $e){
            $notification = array(
                'message' => Lang::get('messages.error.support'), 
                'alert-type' => 'info'
            );
            return redirect('admin/content')->with($notification);
        }

        $notification = array(
            'message' => Lang::get('messages.success.content.updated'), 
            'alert-type' => 'info'
        );
        return redirect('admin/content')->with($notification);

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
            Content::destroy($id);    
        } catch(Exception $e){
            return response('Unauthorized.', 401);
        }
        
        return "true";
    }

    public function getdatatable(){
        $contents = DB::table('content')
                    ->join('contentType','content.contentTypeId','=','contentType.id')
                    ->select('Content.*','contentType.contentType');
        
        return Datatables::of($contents)
                ->addColumn('is_active', function ($record) {
                    return '<input id="toggle-demo" value="'.$record->id.'" class="chk_status" data-toggle="toggle" data-on="Active" data-off="Deactive" data-size="small" data-onstyle="success"  type="checkbox" '.($record->status==1 ? "checked" : "").' >';
                })  
                ->addColumn('action', function ($category) {
                    return '<a href="'.url("admin/content/{$category->slug}").'" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>'.'  <a href="'.url("admin/content/{$category->id}/edit").'" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i></a>'.' <a id="delete" href="#" data-token="' . csrf_token() . '" val="' . $category->id . '" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>';
                })
                ->make(true);
    }
}
