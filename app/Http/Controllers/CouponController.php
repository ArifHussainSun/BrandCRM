<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuickNotify;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CouponController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:Coupon-Create|Coupon-Edit|Coupon-View|Coupon-Delete', ['only' => ['index','store']]);
        $this->middleware('permission:Coupon-Create', ['only' => ['add','store']]);
        $this->middleware('permission:Coupon-Edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Coupon-Delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $coupon = Coupon::whereNull('deleted_at')->with('createdBy')->get();
            return DataTables::of($coupon)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $html = ' <a href="#" class="btn btn-primary viewModal"  data-bs-toggle="modal" data-bs-target=".couponDetailsModal" data-id="' . $row->id . '"><i title="View" class="fas fa-eye "></i></a>&nbsp';


                    $html .= '<a href="'.route('coupon.edit',$row->id).'"  class="btn btn-success btn-edit" ><i class="fas fa-edit"></i></a>&nbsp' ;

                    if (Auth::user()->can('Coupon-Delete')) {
                        $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';
                    }
                    return $html;
                })
                ->addColumn('created_at', function ($row) {
                    return date('d-M-Y', strtotime($row->created_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->created_at)->diffForHumans() . '</label>';
                })
                ->addColumn('created_by_name', function ($row) {


                    return $row->createdBy()->first();
                })
                ->addColumn('status', function ($row) {
                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="coupon_status" switch="bool" data-id="' . $row->id . '" value="'.($row->status==1 ? "1" : "0").'" '.($row->status==1 ? "checked" : "").'/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';
                    return $btn;
                })
                ->rawColumns(['action', 'status','created_at','created_by_name'])->make(true);

        }

        return view('admin.coupon.list');
    }
    public function form($id = 0)
    {
        return view('admin.coupon.add');
    }

    public function storeOrUpdate(Request $request)
    {
        $valid =  $request->validate([
            'coupon_name' => 'required',
            'quantity' => 'required|numeric|min:0',
            'utilized' => 'required|numeric|min:0',
            'date_from' => 'required|before:date_to',
            'date_to' => 'required|after:tomorrow',
            'discount' => 'required|numeric|min:0',
            'discount_type' => 'required'
        ]);
    
        if ($valid) {
            $coupon = Coupon::findOrNew($request->id);
            $isNewCoupon = $coupon->id == null;
    
            $coupon->coupon_name = $request->input('coupon_name');
            $coupon->coupon_description = $request->input('coupon_description');
            $coupon->discount = $request->input('discount');
            $coupon->discount_type = $request->input('discount_type');
            $coupon->date_from = $request->input('date_from');
            $coupon->date_to = $request->input('date_to');
            $coupon->quantity = $request->input('quantity');
            $coupon->utilized = $request->input('utilized');
                   
    
            $management = User::role(['Admin', 'Brand Manager'])->get();
            $management->pluck('id');
            $data = array(
                "success" => true,
                "message" => $isNewCoupon ? "Coupon Added Successfully" : "Coupon Updated Successfully"
            );
    
            // Set the created_by and updated_by values
            $user_id = Auth::user()->id;
            if ($isNewCoupon) {
                $coupon->created_by = $user_id;
            } else {
                $coupon->updated_by = $user_id;
            }
    
            if ($coupon->save()) {
                // Call the touch() method to update the updated_at field
                $coupon->touch();
                $notifyKey = $isNewCoupon ? 'added' : 'updated';
                $notify = array(
                    "performed_by" => $user_id,
                    "title" => $isNewCoupon ? "Added New Coupon" : "Coupon Updated Successfully",
                    "desc" => array(
                        $notifyKey.'_title' => $request->input('name'),
                        $notifyKey.'_description' => $request->coupon_name,
                    )
                );
                Notification::send($management, new QuickNotify($notify));
                Session::flash('success', $data["message"]);
            } else {
                $data["success"] = false;
                $data["message"] = $isNewCoupon ? "Coupon Not Added Successfully." : "Coupon Not Updated Successfully.";
                Session::flash('error', $data["message"]);
            }
    
            return redirect()->route('coupon.list')->with($data);
        } else {
            return redirect()->back();
        }
    }

    public function edit(Request $request , $id)
    {
        $discounttype = Coupon::all();
        $where = array('id' => $request->id);
        $coupon  = Coupon::where($where)->first();
        return view('admin.coupon.edit',compact('discounttype','coupon'));
    }
    public function view(Request $request , $id)
    {
        $coupon = Coupon::find($id);
        if(!$coupon){
            abort(404);
        }

        $data['coupon'] = $coupon;
        $data['created_by'] = $data['coupon']->createdBy()->first()->first_name;
        $data['created_at']= Carbon::parse($data['coupon']->created_at)->diffForHumans();
        if($data['coupon']->updated_by != NULL){

            $data['updated_by'] = User::where('id',$data['coupon']->updated_by)->first()->first_name;
        }
        else{
            $data['updated_by'] = "";
        }
        $data['updated_at']= Carbon::parse($data['coupon']->updated_at)->diffForHumans();
        return $data;
    }
  
    public function delete(Request $request)
    {
        $coupon = Coupon::find($request->id);
        $success = $coupon->delete();

        return response()->json([
            "success" => $success,
            "message" => $success ? "Coupon deleted Successfully!" : "Failed to delete Coupon!"
        ]);
    }
    
    public function destroy(Request $request)
    {
        $coupon = Coupon::onlyTrashed()->find($request->id);
        $success = $coupon->forceDelete();
        $response = [
            "success" => $success,
            "message" => $coupon->trashed() ? "Coupon Destroy Successfully!" : "Failed to Destroy Coupon!"
        ];

        return response()->json($response);
    }
    public function trashed(Request $request)
    {
        if ($request->ajax()) {
            $data = Coupon::onlyTrashed()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0);" class="restore btn btn-xs  btn-success btn-restore" data-id="' . $row->id . '"><i title="Restore" class="fas fa-trash-restore-alt"></i></a>&nbsp';
                    $btn .= '<a data-id="' . $row->id . '" class="btn btn-xs  btn-danger btn-destroy" ><i title="destroy" class="far fa-trash-alt"></i></a>&nbsp';

                    return $btn;
                })
                ->addColumn('deleted_at', function ($row) {
                    return date('d-M-Y', strtotime($row->deleted_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->deleted_at)->diffForHumans() . '</label>';
                })

                ->rawColumns(['action', 'deleted_at'])
                ->make(true);
        }
        return view('admin.coupon.trash');
    }
    
    public function restore(Request $request)
    {
        $coupon = Coupon::onlyTrashed()->findOrFail($request->id);
        $success = $coupon->restore();

        $response = [
            "success" => $success,
            "message" => $success ? "Coupon Restored Successfully!" : "Failed to Restore Coupon!",
            "type" => $success ? "success" : "danger",
            "icon" => $success ? "mdi-check-all" : "mdi-block-helper",
        ];
        echo json_encode($response);
    }
    
    function status(Request $request, $id) {
        $banner = Coupon::find($id);
        $banner->status = (($request->status == "true") ? 1 : 0);

        $response = array();

        if($banner->save()) {
            $response["success"] = true;
            $response["message"] = "Coupon Status Updated Successfully!";
        } else {
            $response["error"] = false;
            $response["message"] = "Failed to Update Coupon Status!";
        }

        return response()->json($response);
    }
}