<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuickNotify;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SubCategoriesController extends Controller
{
    function __construct()
    {
        $this->subcategoriesimagepath = 'backend/assets/images/subcategories/';
        $this->middleware('permission:SubCategories-Create|SubCategories-Edit|SubCategories-View|SubCategories-Delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:SubCategories-Create', ['only' => ['form', 'store']]);
        $this->middleware('permission:SubCategories-Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:SubCategories-Delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $subcategories = SubCategories::all();
            return DataTables::of($subcategories)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<a href="#" class="btn btn-primary btn-view" data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="' . $row->id . '"><i class="far fa-eye"></i></a>&nbsp';
                    if (Auth::user()->can('SubCategories-Edit')) {
                        $html .= '<a href="' . route('sub-category.edit', $row->id) . '"  class="btn btn-success btn-edit" ><i class="fas fa-edit"></i></a>&nbsp';
                    }
                    if (Auth::user()->can('SubCategories-Delete')) {
                        $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';
                    }
                    return $html;
                })->addColumn('created_at', function ($row) {
                    return date('d-M-Y', strtotime($row->created_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->created_at)->diffForHumans() . '</label>';
                })->addColumn('status', function ($row) {

                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="subcategory_status" switch="bool" data-id="' . $row->id . '" value="' . ($row->active == 1 ? "1" : "0") . '" ' . ($row->active == 1 ? "checked" : "") . '/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';

                    return $btn;
                })->addColumn('image', function ($row) {
                    $imageName = Str::of($row->image)->replace(' ', '%10');
                    if ($row->image) {
                        $image = '<img src=' . asset('/' . $imageName) . ' class="avatar-sm" />';
                    } else {
                        $image = '<img src=' . asset('backend/assets/images/default/no-image.jpg') . ' class="avatar-sm" />';
                    }
                    return $image;
                })->rawColumns(['action', 'status', 'image', 'created_at'])->make(true);
        }

        return view('admin.subcategories.list');
    }

    public function trashed(Request $request)
    {
        if ($request->ajax()) {
            $subcategories = SubCategories::onlyTrashed();
            return DataTables::of($subcategories)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<a href="#" class="btn btn-primary btn-view" data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="' . $row->id . '"><i class="far fa-eye"></i></a>&nbsp';
                    if (Auth::user()->can('SubCategories-Edit')) {
                        $html .= '<a href="' . route('sub-category.restore', $row->id) . '"  class="btn btn-xs btn-success btn-restore" ><i class="mdi mdi-delete-restore"></i></a>&nbsp';
                    }
                    if (Auth::user()->can('SubCategories-Delete')) {
                        $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';
                    }
                    return $html;
                })->addColumn('deleted_at', function ($row) {
                    return date('d-M-Y', strtotime($row->deleted_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->deleted_at)->diffForHumans() . '</label>';
                })->addColumn('status', function ($row) {

                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="subcategory_status" switch="bool" data-id="' . $row->id . '" value="' . ($row->active == 1 ? "1" : "0") . '" ' . ($row->active == 1 ? "checked" : "") . '/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';

                    return $btn;
                })->addColumn('image', function ($row) {
                    $imageName = Str::of($row->image)->replace(' ', '%10');
                    if ($row->image) {
                        $image = '<img src=' . asset('/' . $imageName) . ' class="avatar-sm" />';
                    } else {
                        $image = '<img src=' . asset('backend/assets/images/default/no-image.jpg') . ' class="avatar-sm" />';
                    }
                    return $image;
                })->rawColumns(['action', 'status', 'image', 'deleted_at'])->make(true);
        }

        return view('admin.subcategories.trashed');
    }

    public function form($id = 0)
    {
        $data = [];
        $categories = Categories::all();
        return view('admin.subcategories.add', ['categories' => $categories]);
    }

    function status(Request $request, $id, $isType = null)
    {

        $subcategories = SubCategories::find($id);
        $subcategories->active = (($request->status == "true") ? 1 : 0);

        $response = array();

        if ($subcategories->save()) {
            $response["success"] = true;
            $response["message"] = "Sub Category Status Updated Successfully!";
        } else {
            $response["success"] = false;
            $response["message"] = "Failed to Update Sub Category Status!";
        }

        return response()->json($response);
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'categories_id' => 'required',
            'name' => 'required',
            'title' => 'required',
            'desc' => 'required',
        ]);

        $isNewSubCategories = empty($request->id);
        $SubCategories = $isNewSubCategories ? new SubCategories() : SubCategories::find($request->id);



        $SubCategories->categories_id = $request->categories_id;
        //  $SubCategories->sub_categories_id  = $request->sub_categories_id;
        $SubCategories->name = $request->name;
        $SubCategories->title = $request->title;
        $SubCategories->desc = $request->desc;

        $SubCategories->categories_id = $request->categories_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image_destinationPath = $this->subcategoriesimagepath;
            $image->move($image_destinationPath, $imagename);
            $imagename = $this->subcategoriesimagepath . $imagename;
            $SubCategories->image = $imagename;
        }


        // Set the created_by and updated_by values
        $user_id = Auth::user()->id;
        if ($isNewSubCategories) {
            $SubCategories->created_by = $user_id;
        } else {
            $SubCategories->updated_by = $user_id;
        }
        $management = User::role(['Admin', 'Brand Manager'])->get();
        $management->pluck('id');

        $data = array(
            "success" => true,
            "message" => $isNewSubCategories ? "Subcategory Added Successfully" : "Subcategory Updated Successfully"
        );

        if ($SubCategories->save()) {
            $notifyKey = $isNewSubCategories ? 'added' : 'updated';
            $notify = array(
                "performed_by" => Auth::user()->id,
                "title" => $isNewSubCategories ? "Added New Subcategory" : "Updated Subcategory",
                "desc" => array(
                    $notifyKey.'_title' => $request->input('name'),
                    $notifyKey.'_description' => $request->description,
                )
            );
            Notification::send($management, new QuickNotify($notify));
            Session::flash('success', $data["message"]);
        } else {
            $data["success"] = false;
            $data["message"] = "Failed to save Subcategory!";

            Session::flash('error', $data["message"]);
        }
        return redirect()->route('sub-category.list')->with($data);
    }

    public function restore(Request $request, $id)
    {
        $subcategory = SubCategories::onlyTrashed()->findOrFail($id);
        $success = $subcategory->restore();

        $response = [
            "success" => $success,
            "message" => $success ? "Subcategory Restored Successfully!" : "Failed to Restore Subcategory!"
        ];
        return redirect()->route('sub-category.list')->with($response);
    }
  
    public function delete(Request $request)
    {
        $subcategory = SubCategories::find($request->id);
        $success = $subcategory->delete();

        return response()->json([
            "success" => $success,
            "message" => $success ? "Subcategory Deleted Successfully!" : "Failed to Delete Subcategory!"
        ]);
    }

    public function destroy(Request $request)
    {
        $subcategory = SubCategories::onlyTrashed()->find($request->id);
        $success = $subcategory->forceDelete();
        $response = [
            "success" => $success,
            "message" => $subcategory->trashed() ? "Subcategory Destroy Successfully!" : "Failed to Destroy Subcategory!"
        ];

        return response()->json($response);
    }


    public function edit(Request $request, $id)
    {
        $categories = Categories::all();
        $where = array('id' => $id);
        $subcategories  = SubCategories::where($where)->first();

        return view('admin.subcategories.edit', compact('subcategories', 'categories'));
    }

    public function view(Request $request, $isTrashed = null)
    {
        $where = array('id' => $request->id);

        if ($isTrashed != null && $isTrashed == 1) {
            $subcategories = SubCategories::onlyTrashed()->where($where)->with('categories')->first();
        } else {
            $subcategories = SubCategories::where($where)->with('categories')->first();
        }

        return Response::json($subcategories);
    }




    public function SubCategoryApi($id = null, $subcategories_id = null)
    {
        $sub_categories_id = SubCategories::where('id', $id)->with('categories')->first();
        if ($sub_categories_id) {
            $sub_categories = SubCategories::where('id', $id)->with('categories')->get();
            return response()->json([
                "status" => true,
                "data" => $sub_categories
            ]);
        } else {

            return response()->json(array(
                "status" => false,
                "message" => 'Subcategory Id Does Not Exit',
            ), 400);
        }
    }
}