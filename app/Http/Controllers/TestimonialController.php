<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuickNotify;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TestimonialController extends Controller
{
    function __construct()
    {
        $this->testimonialimagepath = 'backend/assets/images/testimonial/';
        $this->middleware('permission:Testimonial-Create|Testimonial-Edit|Testimonial-View|Testimonial-Delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:Testimonial-Create', ['only' => ['form', 'store']]);
        $this->middleware('permission:Testimonial-Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Testimonial-Delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {


        if ($request->ajax()) {
            $testimonial = Testimonial::whereNull('deleted_at')->with('createdBy')->get();
            return DataTables::of($testimonial)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $html = ' <a href="#" class="btn btn-primary viewModal"  data-bs-toggle="modal" data-bs-target=".testimonialDetailsModal" data-id="' . $row->id . '"><i title="View" class="fas fa-eye"></i></a>&nbsp';


                    $html .= '<a href="' . route('testimonial.edit', $row->id) . '"  class="btn btn-success btn-edit" ><i class="fas fa-edit"></i></a>&nbsp';

                    if (Auth::user()->can('Testimonial-Delete')) {
                        $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';
                    }
                    return $html;
                })
                ->addColumn('created_at', function ($row) {
                    return date('d-M-Y', strtotime($row->created_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->created_at)->diffForHumans() . '</label>';
                })
                ->addColumn('image', function ($row) {
                    $imageName = Str::of($row->image)->replace(' ', '%10');
                    if ($row->image) {
                        $image = '<img src=' . asset('/' . $imageName) . ' class="avatar-sm" />';
                    } else {
                        $image = '<img src=' . asset('backend/assets/images/default/no-image.jpg') . ' class="avatar-sm" />';
                    }
                    return $image;
                })
                ->addColumn('banner_image', function ($row) {
                    $imageName = Str::of($row->banner_image)->replace(' ', '%10');
                    if ($row->banner_image) {
                        $banner_image = '<img src=' . asset('/' . $imageName) . ' class="avatar-sm" />';
                    } else {
                        $banner_image = '<img src=' . asset('backend/assets/images/default/no-image.jpg') . ' class="avatar-sm" />';
                    }
                    return $banner_image;
                })

                ->addColumn('created_by_name', function ($row) {


                    return $row->createdBy()->first();
                })
                ->addColumn('status', function ($row) {
                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="testimonial_status" switch="bool" data-id="' . $row->id . '" value="' . ($row->active == 1 ? "1" : "0") . '" ' . ($row->active == 1 ? "checked" : "") . '/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';
                    return $btn;
                })
                ->rawColumns(['action', 'image', 'banner_image', 'status', 'created_at', 'created_by_name'])->make(true);
        }

        return view('admin.testimonials.list');
    }

    public function form()
    {

        return view('admin.testimonials.add');
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'company' => 'required',
            'rating' => 'required',
        ]);

        $isNewTestimonial = empty($request->id);
        $testimonial = $isNewTestimonial ? new Testimonial() : Testimonial::find($request->id);
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->company = $request->company;
        $testimonial->rating = $request->rating;
        $testimonial->desc = $request->desc;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image_destinationPath = $this->testimonialimagepath;
            $image->move($image_destinationPath, $imagename);
            $imagename = $this->testimonialimagepath . $imagename;
            $testimonial->image = $imagename;
        }

        // Set the created_by and updated_by values
        $user_id = Auth::user()->id;
        if ($isNewTestimonial) {
            $testimonial->created_by = $user_id;
        } else {
            $testimonial->updated_by = $user_id;
        }
        $management = User::role(['Admin', 'Brand Manager'])->get();
        $management->pluck('id');

        $data = array(
            "success" => true,
            "message" => $isNewTestimonial ? "Testimonial Added Successfully" : "Testimonial Updated Successfully"
        );

        if ($testimonial->save()) {
            $notifyKey = $isNewTestimonial ? 'added' : 'updated';
            $notify = array(
                "performed_by" => Auth::user()->id,
                "title" => $isNewTestimonial ? "Added New Testimonial" : "Updated Testimonial",
                "desc" => array(
                    $notifyKey.'_title' => $request->input('name'),
                    $notifyKey.'_description' => $request->description,
                )
            );
            Notification::send($management, new QuickNotify($notify));
   
            Session::flash('success', $data["message"]);
        } else {
            $data["success"] = false;
            $data["message"] = "Failed to save testimonial!";

            Session::flash('error', $data["message"]);
        }
        return redirect()->route('testimonial.list')->with($data);
    }

    public function delete(Request $request)
    {
        $testimonial = Testimonial::find($request->id);
        $success = $testimonial->delete();

        return response()->json([
            "success" => $success,
            "message" => $success ? "Testimonial Deleted Successfully!" : "Failed to Delete Testimonial!"
        ]);
    }

    public function destroy(Request $request)
    {
        $testimonial = Testimonial::onlyTrashed()->find($request->id);
        $success = $testimonial->forceDelete();
        $response = [
            "success" => $success,
            "message" => $testimonial->trashed() ? "Testimonial Destroy Successfully!" : "Failed to Destroy Testimonial!"
        ];

        return response()->json($response);
    }
    public function restore(Request $request)
    {
        $testimonial = Testimonial::onlyTrashed()->findOrFail($request->id);
        $success = $testimonial->restore();

        $response = [
            "success" => $success,
            "message" => $success ? "Testimonial Restored Successfully!" : "Failed to Restore Testimonial!",
            "type" => $success ? "success" : "danger",
            "icon" => $success ? "mdi-check-all" : "mdi-block-helper",
        ];
        echo json_encode($response);
    }
    

    public function edit(Request $request, $id)
    {
        $where = array('id' => $id);
        $testimonial  = Testimonial::where($where)->first();

        return view('admin.testimonials.edit', compact('testimonial'));
    }


    public function view(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);
        if (!$testimonial) {
            abort(404);
        }

        $data['testimonial'] = $testimonial;


        $data['testimonialnames'] = Testimonial::where('id', $testimonial->id)->with('createdBy')->first();
        $data['created_by'] = $data['testimonial']->createdBy()->first()->first_name;
        $data['created_at'] = Carbon::parse($data['testimonial']->created_at)->diffForHumans();
        if ($data['testimonial']->updated_by != NULL) {

            $data['updated_by'] = User::where('id', $data['testimonial']->updated_by)->first()->first_name;
        } else {
            $data['updated_by'] = "";
        }
        $data['updated_at'] = Carbon::parse($data['testimonial']->updated_at)->diffForHumans();
        return $data;
    }

    public function trashed(Request $request)
    {
        if ($request->ajax()) {
            $data = Testimonial::onlyTrashed()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0);" class="restore btn btn-xs  btn-success btn-restore" data-id="' . $row->id . '"><i title="Restore" class="fas fa-trash-restore-alt"></i></a>&nbsp';
                    $btn .= '<a data-id="' . $row->id . '" class="btn btn-xs  btn-danger btn-destroy" ><i title="destroy" class="far fa-trash-alt"></i></a>&nbsp';

                    return $btn;
                })->addColumn('image', function ($row) {
                    $imageName = Str::of($row->image)->replace(' ', '%10');
                    if ($row->image) {
                        $image = '<img src=' . asset('/' . $imageName) . ' class="avatar-sm" />';
                    } else {
                        $image = '<img src=' . asset('backend/assets/images/default/no-image.jpg') . ' class="avatar-sm" />';
                    }
                    return $image;
                })
                ->addColumn('deleted_at', function ($row) {
                    return date('d-M-Y', strtotime($row->deleted_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->deleted_at)->diffForHumans() . '</label>';
                })

                ->rawColumns(['action', 'image', 'deleted_at'])
                ->make(true);
        }
        return view('admin.testimonials.trash');
    }


    function status(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->active = (($request->active == "true") ? 1 : 0);

        $response = array();

        if ($testimonial->save()) {
            $response["success"] = true;
            $response["message"] = "Testimonial Status Updated Successfully!";
        } else {
            $response["error"] = false;
            $response["message"] = "Failed to Update Testimonial Status!";
        }

        return response()->json($response);
    }
}
