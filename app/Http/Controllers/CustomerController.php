<?php

namespace App\Http\Controllers;

use App\Models\BrandSettings;
use Illuminate\Http\Request;
use App\Models\CountryCurrencies;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuickNotify;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    function __construct()
    {
        $this->userimagepath = 'backend/assets/images/users/';
        $this->middleware('permission:Customer-Create|Customer-Edit|Customer-View|Customer-Delete', ['only' => ['index','store']]);
        $this->middleware('permission:Customer-Create', ['only' => ['form','store']]);
        $this->middleware('permission:Customer-Edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Customer-Delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $role = $user->Roles->first()->name;

        if ($request->ajax()) {
            if($role=="Customer"){
              $customer = User::whereNull('deleted_at')->where('id', $user->id)->with('createdBy')->role('Customer')->get();

             }
             else{
               $customer = User::whereNull('deleted_at')->with('createdBy')->role('Customer')->get();
             }
            return DataTables::of($customer)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = ' <a href="#" class="btn btn-primary viewModal"  data-bs-toggle="modal" data-bs-target=".customerDetailsModal" data-id="' . $row->id . '"><i title="View" class="fas fa-eye"></i></a>&nbsp';
                    $html .= '<a href="'.route('customer.edit',$row->id).'"  class="btn btn-success btn-edit" ><i class="fas fa-edit"></i></a>&nbsp' ;

                    if (Auth::user()->can('Customer-Delete')) {
                        $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';
                    }

                    return $html;
                })->addColumn('created_at', function ($row) {
                    return date('d-M-Y', strtotime($row->created_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->created_at)->diffForHumans() . '</label>';
                })->addColumn('created_by_name', function ($row) {
                    return $row->createdBy()->first();
                })->addColumn('status', function ($row) {
                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="customer_status" switch="bool" data-id="' . $row->id . '" value="'.($row->status==1 ? "1" : "0").'" '.($row->status==1 ? "checked" : "").'/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';
                    return $btn;
                })->rawColumns(['action', 'status','created_at','created_by_name'])
                ->make(true);
        }

        return view('admin.customer.list');
    }

    public function form($id = 0)
    {
        $country = CountryCurrencies::all();
        return view('admin.customer.add', compact('country'));
    }

    public function storeOrUpdate(Request $request)
    {
        $valid =  $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => [
                'required','email',
                Rule::unique('users')->ignore($request->id)
            ],
            'address' => 'required',
            'company_name' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
        ]);
    
        if ($valid) {
            $customer = User::findOrNew($request->id);
            $isNewCustomer = $customer->id == null;
    
            $customer->first_name = $request->input('first_name');
            $customer->last_name = $request->input('last_name');
            $customer->email = $request->input('email');
            $customer->phone_number = $request->input('phone_number');
            $customer->company_name = $request->input('company_name');
            $customer->address = $request->input('address');
            $customer->city = $request->input('city');
            $customer->state = $request->input('state');
            $customer->zipcode = $request->input('zipcode');
            $customer->country = $request->input('country');

            $default_customer_password = BrandSettings::where('key_name', 'like', '%default_customer_password%')->first();
            $password = (!empty($default_customer_password->key_value)) ? $default_customer_password->key_value : "12345678";
            $customer->password = Hash::make($password);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image_destinationPath = public_path($this->userimagepath);
                $image->move($image_destinationPath, $imagename);
                $imagename = $this->userimagepath . $imagename;
                $customer->image = $imagename;
            }
                   
    
            $management = User::role(['Admin', 'Brand Manager'])->get();
            $management->pluck('id');
            $data = array(
                "success" => true,
                "message" => $isNewCustomer ? "Customer Added Successfully" : "Customer Updated Successfully"
            );
    
            // Set the created_by and updated_by values
            $user_id = Auth::user()->id;
            if ($isNewCustomer) {
                $customer->created_by = $user_id;
            } else {
                $customer->updated_by = $user_id;
            }
    
            if ($customer->save()) {
                // Call the touch() method to update the updated_at field
                $customer->touch();
                $notifyKey = $isNewCustomer ? 'added' : 'updated';
                $notify = array(
                    "performed_by" => $user_id,
                    "title" => $isNewCustomer ? "Added New Customer" : "Customer Updated",
                    "desc" => array(
                        $notifyKey.'_title' => $request->input('first_name'),
                        $notifyKey.'_description' => $request->input('email'),
                    )
                );
                if ($isNewCustomer) {
                    $customer->assignRole($request->roles);
                } else {
                    DB::table('model_has_roles')->where('model_id', $request->id)->delete();
                    $customer->assignRole($request->roles);
                }
                
                Notification::send($management, new QuickNotify($notify));
                Session::flash('success', $data["message"]);
            } else {
                $data["success"] = false;
                $data["message"] = $isNewCustomer ? "Customer Not Added Successfully." : "Customer Not Updated Successfully.";
                Session::flash('error', $data["message"]);
            }
    
            return redirect()->route('customer.list')->with($data);
        } else {
            return redirect()->back();
        }
    }

    public function edit(Request $request, $id)
    {
        $countries = CountryCurrencies::all();
        $where = array('id' => $id);
        $customers  = User::where($where)->first();
        return view('admin.customer.edit',compact('countries','customers'));
    }

    public function view(Request $request, $id)
    {
        $customer = User::find($id);
        if(!$customer){
            abort(404);
        }

        $data['customer'] = $customer;

        $data['customernames'] = User::where('id',$customer->id)->with('createdBy')->first();
        $data['created_by'] = $data['customer']->createdBy()->first()->first_name;
        $data['created_at']= Carbon::parse($data['customer']->created_at)->diffForHumans();

        if($data['customer']->updated_by != NULL){
            $data['updated_by'] = User::where('id',$data['customer']->updated_by)->first()->first_name;
        } else {
            $data['updated_by'] = "";
        }

        $data['updated_at']= Carbon::parse($data['customer']->updated_at)->diffForHumans();
        return $data;
    }

    public function delete(Request $request)
    {
        $customer = User::find($request->id);
        $success = $customer->delete();

        return response()->json([
            "success" => $success,
            "message" => $success ? "Customer Deleted Successfully!" : "Failed to delete Customer!"
        ]);
    }

    public function destroy(Request $request)
    {
        $customer = User::onlyTrashed()->find($request->id);
        $success = $customer->forceDelete();
        $response = [
            "success" => $success,
            "message" => $customer->trashed() ? "Customer Destroy Successfully!" : "Failed to Destroy Customer!"
        ];

        return response()->json($response);
    }

    public function trashed(Request $request)
    {

        if ($request->ajax()) {
            $data = User::onlyTrashed()->role('Customer')->get();
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
        return view('admin.customer.trash');
    }

    public function restore(Request $request)
    {
        $customer = User::onlyTrashed()->findOrFail($request->id);
        $success = $customer->restore();

        $response = [
            "success" => $success,
            "message" => $success ? "Customer Restored Successfully!" : "Failed to Restore Customer!",
            "type" => $success ? "success" : "danger",
            "icon" => $success ? "mdi-check-all" : "mdi-block-helper",
        ];
        echo json_encode($response);
    }

    function status(Request $request, $id) {
        $Customer = User::find($id);
        $Customer->status = (($request->status == "true") ? 1 : 0);

        $response = array();

        if($Customer->save()) {
            $response["success"] = true;
            $response["message"] = "Customer Status Updated Successfully!";
        } else {
            $response["error"] = false;
            $response["message"] = "Failed to Update Customer Status!";
        }

        return response()->json($response);
    }
}