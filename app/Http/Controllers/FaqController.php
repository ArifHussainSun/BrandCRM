<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Pages;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuickNotify;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FaqController extends Controller
{
    function __construct()
    {
        $this->faqsimagepath= 'backend/assets/images/faqs/';
        $this->middleware('permission:Faq-Create|Faq-Edit|Faq-View|Faq-Delete', ['only' => ['index','store']]);
        $this->middleware('permission:Faq-Create', ['only' => ['form','store']]);
        $this->middleware('permission:Faq-Edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Faq-Delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $faq = Faq::all();
            return DataTables::of($faq)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<a href="#"  class="btn btn-primary btn-view" data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="'.$row->id.'"  ><i class="far fa-eye"></i></a>&nbsp' ;
                    if (Auth::user()->can('Faq-Edit')) {
                        $html .= '<a href="'.route('faq.edit',$row->id).'"  class="btn btn-success btn-edit" ><i class="fas fa-edit"></i></a>&nbsp' ;
                    }
                    if (Auth::user()->can('Faq-Delete')) {
                        $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';
                    }
                    return $html;
                })->addColumn('created_at', function ($row) {
                    return date('d-M-Y', strtotime($row->created_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->created_at)->diffForHumans() . '</label>';
                })->addColumn('status', function ($row) {

                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="faq_status" switch="bool" data-id="' . $row->id . '" value="'.($row->active==1 ? "1" : "0").'" '.($row->active==1 ? "checked" : "").'/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';

                    return $btn;
                })->addColumn('image', function ($row) {
                    $image = '<img src=' . asset($row->image) . ' class="avatar-sm" id="hvt" />';
                    return $image;
                })->rawColumns(['action', 'status','image','created_at'])->make(true);
        }

        return view('admin.faqs.list');
    }

    public function trashed(Request $request) 
    {
        if ($request->ajax()) {
            $faq = Faq::onlyTrashed();
            return DataTables::of($faq)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<a href="#"  class="btn btn-primary btn-view" data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="'.$row->id.'"  ><i class="far fa-eye"></i></a>&nbsp' ;
                    if (Auth::user()->can('Faq-Edit')) {
                        $html .= '<a href="'.route('faq.restore',$row->id).'"  class="btn btn-xs btn-success btn-restore" ><i class="mdi mdi-delete-restore"></i></a>&nbsp' ;
                    }
                    if (Auth::user()->can('Faq-Delete')) {
                        $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';
                    }
                    return $html;
                })->addColumn('deleted_at', function ($row) {
                    return date('d-M-Y', strtotime($row->deleted_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->deleted_at)->diffForHumans() . '</label>';
                })->addColumn('status', function ($row) {

                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="faq_status" switch="bool" data-id="' . $row->id . '" value="'.($row->active==1 ? "1" : "0").'" '.($row->active==1 ? "checked" : "").'/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';

                    return $btn;
                })->addColumn('image', function ($row) {
                    $image = '<img src=' . asset($row->image) . ' class="avatar-sm" id="hvt" />';
                    return $image;
                })->rawColumns(['action', 'status','image','deleted_at'])->make(true);
        }

        return view('admin.faqs.trashed');

    }

    public function form()
    {
        $pages = Pages::all();
        return view('admin.faqs.add', ['pages' => $pages]);
    }

    function status(Request $request, $id,$isType=null) 
    {

        $faq = Faq::find($id);
        $faq->active = (($request->status == "true") ? 1 : 0);

        $response = array();

        if($faq->save()) {
            $response["success"] = true;
            $response["message"] = "Faq Status Updated Successfully!";
        } else {
            $response["success"] = false;
            $response["message"] = "Failed to Update Faq Status!";
        }

        return response()->json($response);
    }

    public function storeOrUpdate(Request $request)

    {
        $valid =  $request->validate([
            'page' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);

        if ($valid) {
            $faq = Faq::findOrNew($request->id);
            $isNewFaq = $faq->id == null;

            $faq->page = $request->input('page'); 	
            $faq->question = $request->input('question');
            $faq->answer = $request->input('answer');           

            $management = User::role(['Admin', 'Brand Manager'])->get();
            $management->pluck('id');
            $data = array(
                "success" => true,
                "message" => $isNewFaq ? "Faq Added Successfully" : "Faq Updated Successfully"
            );

            // Set the created_by and updated_by values
            $user_id = Auth::user()->id;
            if ($isNewFaq) {
                $faq->created_by = $user_id;
            } else {
                $faq->updated_by = $user_id;
            }

            if ($faq->save()) {
                // Call the touch() method to update the updated_at field
                $faq->touch();
                $notifyKey = $isNewFaq ? 'added' : 'updated';
                $notify = array(
                    "performed_by" => Auth::user()->id,
                    "title" => $isNewFaq ? "Added New Faq" : "Updated Faq",
                    "desc" => array(
                        $notifyKey . '_title' => $request->page,
                        $notifyKey . '_description' => $request->question,
                    )
                );
                Notification::send($management, new QuickNotify($notify));
                Session::flash('success', $data["message"]);
            } else {
                $data["success"] = false;
                $data["message"] = $isNewFaq ? "Faq Not Added Successfully." : "Faq Not Updated Successfully.";
                Session::flash('error', $data["message"]);
            }

            return redirect()->route('faq.list')->with($data);
        } else {
            return redirect()->back();
        }
    }

    public function restore(Request $request, $id)
    {
        $faq = Faq::onlyTrashed()->findOrFail($id);
        $success = $faq->restore();

        $response = [
            "success" => $success,
            "message" => $success ? "Faq Restored Successfully!" : "Failed to Restore Faq!"
        ];
        return redirect()->route('faq.list')->with($response);
    }

    public function edit(Request $request,$id)
    {
        $pages = Pages::all();
        $where = array('id' => $id);
        $faq  = Faq::where($where)->first();
        // $faq['pages'] = $pages;
        return view('admin.faqs.edit',compact('pages','faq'));
    }

    public function view(Request $request, $isTrashed=null)
    {
        $where = array('id' => $request->id);

        if($isTrashed!=null) {
            $faq = Faq::onlyTrashed()->where($where)->first();
        } else {
            $faq = Faq::where($where)->first();
        }

        return Response::json($faq);
    }


    public function delete(Request $request)
    {
        $faq = Faq::find($request->id);
        $success = $faq->delete();

        return response()->json([
            "success" => $success,
            "message" => $success ? "Faq Deleted Successfully!" : "Failed to Delete Faq!"
        ]);
    }

    public function destroy(Request $request)
    {
        $faq = Faq::onlyTrashed()->find($request->id);
        $success = $faq->forceDelete();
        $response = [
            "success" => $success,
            "message" => $faq->trashed() ? "Faq Destroy Successfully!" : "Failed to Destroy Faq!"
        ];

        return response()->json($response);
    }
 
}