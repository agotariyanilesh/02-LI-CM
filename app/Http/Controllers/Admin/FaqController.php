<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Lang;
use DB;
use App\Model\Faq;
use App\Model\FaqCategory;

class FaqController extends Controller
{
    private $data = array(
        'route' => 'admin.faq.',
        'title' => 'FAQ',
        'menu' => 'faq',
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
            return view('admin.faq.view');
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
        $contentType = FaqCategory::where('status','=',1)->pluck('title','id')->toArray();
        return view('admin.faq.create',compact('contentType'));
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
        // Validation Rules
        $rules = [
            'question' => 'required',
            'answer' => 'required',
            'faqCatId' => 'required',
        ];

        // Validation Custom message
        $Message = [
            'question.required' => 'FAQ Question is Required.',
            'answer.required' => 'FAQ Answer is Required.',
            'faqCatId.required' => 'FAQ Category is Required.',
        ];

        $this->validate($request,$rules,$Message);

        $input = array(
            'question' => $request->question,
            'answer' => $request->answer,
            'faqCatId' => $request->faqCatId
        );

        try {
            $contents = Faq::create($input);
            } catch(Exception $e){
            $notification = array(
                'message' => Lang::get('messages.error.support'), 
                'alert-type' => 'info'
            );
            return redirect('admin/faq')->with($notification);
        }

        $notification = array(
            'message' => Lang::get('messages.success.faq.created'), 
            'alert-type' => 'info'
        );
        return redirect('admin/faq')->with($notification);

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
        $this->data['record'] = DB::table('faq')
                    ->join('faqCategory','faq.faqCatId','=','faqCategory.id')
                    ->where('Faq.slug','=',$slug)
                    ->select('Faq.*','FaqCategory.title')
                    ->first();
                
        // $this->data['record'] = Content::where('slug','=',$slug)->first();
        return view('admin.faq.show',$this->data);
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
        $contentType = FaqCategory::where('status','=',1)->pluck('title','id')->toArray();
        $category = Faq::findOrFail($id);
        return view('admin.faq.create',compact('category','contentType'));
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
        $category = Faq::findOrFail($id);

        /* Change Status Block */
        if ($request->ajax()) {
            $category->update($request->only(['status']));
            return \Illuminate\Support\Facades\Response::json(['result'=>'success']);
        }

        $this->validate($request,[
            'question' => 'required',
            'answer' => 'required',
            'faqCatId' => 'required',
        ]);

        $input = array(
            'question' =>$request->question,
            'answer' => $request->answer,
            'faqCatId' => $request->faqCatId,   
        );

        try {
            $category->update($input);
        } catch(Exception $e){
            $notification = array(
                'message' => Lang::get('messages.error.support'), 
                'alert-type' => 'info'
            );
            return redirect('admin/faq')->with($notification);
        }

        $notification = array(
            'message' => Lang::get('messages.success.faq.updated'), 
            'alert-type' => 'info'
        );
        return redirect('admin/faq')->with($notification);

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
            Faq::destroy($id);    
        } catch(Exception $e){
            return response('Unauthorized.', 401);
        }
        
        return "true";
    }

    public function getdatatable(){
        $contents = DB::table('faq')
                    ->join('FaqCategory','faq.faqCatId','=','FaqCategory.id')
                    ->select('Faq.*','FaqCategory.title');
        
        return Datatables::of($contents)
                ->addColumn('status', function ($record) {
                    return '<input id="toggle-demo" value="'.$record->id.'" class="chk_status" data-toggle="toggle" data-on="Active" data-off="Deactive" data-size="small" data-onstyle="success"  type="checkbox" '.($record->status==1 ? "checked" : "").' >';
                })  
                ->addColumn('action', function ($category) {
                    return '<a href="'.url("admin/faq/{$category->slug}").'" class="btn btn-primary btn-sm" title="" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>'.'  <a href="'.url("admin/faq/{$category->id}/edit").'" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i></a>'.' <a id="delete" href="#" data-token="' . csrf_token() . '" val="' . $category->id . '" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>';
                })
                ->make(true);
    }
}
