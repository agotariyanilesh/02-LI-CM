<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\EmailTemplate;
use Yajra\Datatables\Datatables;
use Lang;

class EmailTemplateController extends Controller
{
    private $data = array(
        'route' => 'admin.emailTemplate.',
        'title' => 'Email Template',
        'menu' => 'emailTemplate',
        'submenu' => '',
        'path' => 'admin/email'
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
            return view('admin.emailTemplate.view');
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
        return view('admin.emailTemplate.create');
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
            'constant' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ];

        // Validation Custom message
        $Message = [
            'constant.required' => 'Constant name is Required.',
            'subject.required' => 'Subject is Required.',
            'message.required' => 'Message is Required.'
        ];

        $this->validate($request,$rules,$Message);

        $input = array(
            'constant' =>$request->constant,
            'subject' => $request->subject,
            'message' => $request->message
        );

        try {
            $category = EmailTemplate::create($input);
        } catch(Exception $e){
            $notification = array(
                'message' => Lang::get('messages.error.support'), 
                'alert-type' => 'info'
            );
            return redirect('admin/email')->with($notification);
        }

        $notification = array(
            'message' => Lang::get('messages.success.category.created'), 
            'alert-type' => 'info'
        );
        return redirect('admin/email')->with($notification);

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
        $this->data['record'] = EmailTemplate::where('slug','=',$slug)->first();
        return view('admin.emailTemplate.show',$this->data);
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
        $category = EmailTemplate::findOrFail($id);
        return view('admin.emailTemplate.create',compact('category'));
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
        $category = EmailTemplate::findOrFail($id);

        /* Change Status Block */
        if ($request->ajax()) {
            $category->update($request->only(['status']));
            return \Illuminate\Support\Facades\Response::json(['result'=>'success']);
        }

        $this->validate($request,[
            'constant' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $input = array(
            'constant' =>$request->constant,
            'subject' => $request->subject,
            'message' => $request->message
        );

        try {
            $category->update($input);
        } catch(Exception $e){
            $notification = array(
                'message' => Lang::get('messages.error.support'), 
                'alert-type' => 'info'
            );
            return redirect('admin/email')->with($notification);
        }

        $notification = array(
            'message' => Lang::get('messages.success.category.updated'), 
            'alert-type' => 'info'
        );
        return redirect('admin/email')->with($notification);
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
            EmailTemplate::destroy($id);    
        } catch(Exception $e){
            return response('Unauthorized.', 401);
        }
        
        return "true";
    }

    public function getdatatable(){
        $contents = EmailTemplate::all('id','slug','constant','subject','message','status');
         
        return Datatables::of($contents)
                ->addColumn('status', function ($record) {
                    return '<input id="toggle-demo" value="'.$record->id.'" class="chk_status" data-toggle="toggle" data-on="Active" data-off="Deactive" data-size="small" data-onstyle="success"  type="checkbox" '.($record->status==1 ? "checked" : "").' >';
                })  
                ->addColumn('action', function ($category) {
                    return '<a href="'.url("admin/email/{$category->slug}").'" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>'.'  <a href="'.url("admin/email/{$category->id}/edit").'" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i></a>'.' <a id="delete" href="#" data-token="' . csrf_token() . '" val="' . $category->id . '" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>';
                })
                ->make(true);
    }
}
