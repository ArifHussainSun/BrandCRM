<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuickNotify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PartnerController extends Controller
{
    function __construct()
    {
        $this->partnersimagepath= 'backend/assets/images/partners/';
        $this->middleware('permission:Partner-Create|Partner-Edit|Partner-View|Partner-Delete', ['only' => ['index','store']]);
        $this->middleware('permission:Partner-Create', ['only' => ['form','store']]);
        $this->middleware('permission:Partner-Edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Partner-Delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $partners = Partner::all();
            return DataTables::of($partners)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<a href="#"  class="btn btn-primary btn-view" data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="'.$row->id.'" ><i class="far fa-eye"></i></a>&nbsp' ;
                    if (Auth::user()->can('Partner-Edit')) {
                        $html .= '<a href="'.route('partner.edit',$row->id).'"  class="btn  btn-success btn-edit" ><i class="fas fa-edit"></i></a>&nbsp' ;

                    }
                    if (Auth::user()->can('Partner-Delete')) {
                        $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';
                    }
                    return $html;
                })->addColumn('created_at', function ($row) {
                    return date('d-M-Y', strtotime($row->created_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->created_at)->diffForHumans() . '</label>';
                })->addColumn('status', function ($row) {

                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="partner_status" switch="bool" data-id="' . $row->id . '" value="'.($row->active==1 ? "1" : "0").'" '.($row->active==1 ? "checked" : "").'/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';

                    return $btn;
                })->addColumn('image', function ($row) {
                    $imageName = Str::of($row->image)->replace(' ', '%10');
                    if ($row->image) {
                        $image = '<img src=' . asset('/' . $imageName) . ' class="avatar-sm" />';
                    } else {
                        $image = '<img src=' . asset('backend/assets/images/default/no-image.jpg') . ' class="avatar-sm" />';
                    }
                    return $image;
                })->rawColumns(['action', 'status','image','created_at'])->make(true);

        }

        return view('admin.partners.list');
    }

    public function trashed(Request $request)
    {
        if ($request->ajax()) {
            $partners = Partner::onlyTrashed();
            return DataTables::of($partners)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<button href="#"  class="btn btn-primary btn-view" data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="'.$row->id.'" ><i class="far fa-eye"></i></button>&nbsp' ;
                    if (Auth::user()->can('Partner-Edit')) {
                        $html .= '<a href="'.route('partner.restore',$row->id).'"  class="btn btn-xs btn-success btn-restore" ><i class="mdi mdi-delete-restore"></i></a>&nbsp' ;
                    }
                    if (Auth::user()->can('Partner-Delete')) {
                        $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';
                    }
                    return $html;
                })->addColumn('deleted_at', function ($row) {
                    return date('d-M-Y', strtotime($row->deleted_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->deleted_at)->diffForHumans() . '</label>';
                })->addColumn('status', function ($row) {

                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="partner_status" switch="bool" data-id="' . $row->id . '" value="'.($row->active==1 ? "1" : "0").'" '.($row->active==1 ? "checked" : "").'/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';

                    return $btn;
                })->addColumn('image', function ($row) {
                    $imageName = Str::of($row->image)->replace(' ', '%10');
                    if ($row->image) {
                        $image = '<img src=' . asset('/' . $imageName) . ' class="avatar-sm" />';
                    } else {
                        $image = '<img src=' . asset('backend/assets/images/default/no-image.jpg') . ' class="avatar-sm" />';
                    }
                    return $image;
                })->rawColumns(['action', 'status','image','deleted_at'])->make(true);

        }

        return view('admin.partners.trashed');
    }


    public function form()
    {
        return view('admin.partners.add');
    }

    function status(Request $request, $id,$isType=null) {

        $partners = Partner::find($id);
        $partners->active = (($request->status == "true") ? 1 : 0);

        $response = array();

        if($partners->save()) {
            $response["success"] = true;
            $response["message"] = "Partner Status Updated Successfully!";
        } else {
            $response["success"] = false;
            $response["message"] = "Failed to Update Partner Status!";
        }

        return response()->json($response);
    }

    public function storeOrUpdate(Request $request)
    {
        $valid =  $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'desc' => 'nullable',
        ]);
    
        if ($valid) {
            $partner = Partner::findOrNew($request->id);
            $isNewPartner = $partner->id == null;
    
            $partner->name = $request->input('name');
            $partner->desc = strip_tags($request->desc);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image_destinationPath = public_path($this->partnersimagepath);
                $image->move($image_destinationPath, $imagename);
                $imagename = $this->partnersimagepath . $imagename;
                $partner->image = $imagename;
            }
                   
    
            $management = User::role(['Admin', 'Brand Manager'])->get();
            $management->pluck('id');
            $data = array(
                "success" => true,
                "message" => $isNewPartner ? "Partner Added Successfully" : "Partner Updated Successfully"
            );
    
            // Set the created_by and updated_by values
            $user_id = Auth::user()->id;
            if ($isNewPartner) {
                $partner->created_by = $user_id;
            } else {
                $partner->updated_by = $user_id;
            }
    
            if ($partner->save()) {
                // Call the touch() method to update the updated_at field
                $partner->touch();
                $notifyKey = $isNewPartner ? 'added' : 'updated';
                $notify = array(
                    "performed_by" => $user_id,
                    "title" => $isNewPartner ? "Added New Partner" : "Partner Updated Successfully",
                    "desc" => array(
                        $notifyKey.'_title' => $request->input('name'),
                        $notifyKey.'_description' => strip_tags($request->desc),
                    )
                );
                Notification::send($management, new QuickNotify($notify));
                Session::flash('success', $data["message"]);
            } else {
                $data["success"] = false;
                $data["message"] = $isNewPartner ? "Partner Not Added Successfully." : "Partner Not Updated Successfully.";
                Session::flash('error', $data["message"]);
            }
    
            return redirect()->route('partner.list')->with($data);
        } else {
            return redirect()->back();
        }
    }

    public function restore(Request $request, $id)
    {
        $partner = Partner::onlyTrashed()->findOrFail($id);
        $success = $partner->restore();

        $response = [
            "success" => $success,
            "message" => $success ? "Partner Restored Successfully!" : "Failed to Restore Partner!"
        ];
        return redirect()->route('partner.list')->with($response);
    }

    public function edit(Request $request ,$id)
    {
        $where = array('id' => $id);
        $partners  = Partner::where($where)->first();

        return view('admin.partners.edit',compact('partners'));
    }
    public function view(Request $request, $isTrashed=null)
    {
        $where = array('id' => $request->id);

        if($isTrashed!=null) {
            $partners = Partner::onlyTrashed()->where($where)->first();
        } else {
            $partners = Partner::where($where)->first();
        }

        return Response::json($partners);
    }

    public function delete(Request $request)
    {
        $partner = Partner::find($request->id);
        $success = $partner->delete();

        return response()->json([
            "success" => $success,
            "message" => $success ? "Partner Deleted Successfully!" : "Failed to delete Partner!"
        ]);
    }

    public function destroy(Request $request)
    {
        $partner = Partner::onlyTrashed()->find($request->id);
        $success = $partner->forceDelete();
        $response = [
            "success" => $success,
            "message" => $partner->trashed() ? "Partner Destroy Successfully!" : "Failed to Destroy Partner!"
        ];

        return response()->json($response);
    }
}