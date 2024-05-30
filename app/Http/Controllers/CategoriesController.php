<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Pages;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuickNotify;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class CategoriesController extends Controller
{
    function __construct()
    {
        $this->categoriesimagepath= 'backend/assets/images/categories/';
        $this->middleware('permission:Categories-Create|Categories-Edit|Categories-View|Categories-Delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:Categories-Create', ['only' => ['form', 'store']]);
        $this->middleware('permission:Categories-Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Categories-Delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Categories::all();
            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<button href="#"  class="btn btn-primary btn-view"  data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="' . $row->id . '"><i class="far fa-eye"></i></button>&nbsp';
                    if (Auth::user()->can('Subscriber-Edit')) {
                        $html .= '<a href="' . route('categories.edit', $row->id) . '"  class="btn btn-success btn-edit" ><i class="fas fa-edit"></i></a>&nbsp';
                    }
                    if (Auth::user()->can('Subscriber-Delete')) {
                        $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';
                    }
                    return $html;
                })->addColumn('created_at', function ($row) {
                    return date('d-M-Y', strtotime($row->created_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->created_at)->diffForHumans() . '</label>';
                })->addColumn('status', function ($row) {
                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="banner_status" switch="bool" data-id="' . $row->id . '" value="' . ($row->active == 1 ? "1" : "0") . '" ' . ($row->active == 1 ? "checked" : "") . '/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';

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

        return view('admin.categories.list');
    }
    public function form($id = 0)
    {
        $pages = Pages::all();
        return view('admin.categories.form', compact('pages'));
    }

    public function status(Request $request, $id)
    {
        $category = Categories::find($id);
        $category->active = (($request->status == "true") ? 1 : 0);

        $response = array();

        if ($category->save()) {
            $response["success"] = true;
            $response["message"] = "Category Status Updated Successfully!";
        } else {
            $response["success"] = false;
            $response["message"] = "Failed to Update Category Status!";
        }

        return response()->json($response);
    }

    public function storeOrUpdate(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
    
        if ($valid) {
            $categories = Categories::findOrNew($request->id);
            $isNewCategory = $categories->id == null;
    
            $categories->name = $request->input('name');
            $categories->title = $request->input('title');
            $categories->description = strip_tags($request->description);
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image_destinationPath = public_path($this->categoriesimagepath);
                $image->move($image_destinationPath, $imagename);
                $imagename = $this->categoriesimagepath . $imagename;
                $categories->image = $imagename;
               }
    
            $management = User::role(['Admin', 'Brand Manager'])->get();
            $management->pluck('id');
            $data = array(
                "success" => true,
                "message" => $isNewCategory ? "Category Added Successfully" : "Category Updated Successfully"
            );
    
            // Set the created_by and updated_by values
            $user_id = Auth::user()->id;
            if ($isNewCategory) {
                $categories->created_by = $user_id;
            } else {
                $categories->updated_by = $user_id;
            }
    
            if ($categories->save()) {
                // Call the touch() method to update the updated_at field
                $categories->touch();
                $notifyKey = $isNewCategory ? 'added' : 'updated';
                $notify = array(
                    "performed_by" => $user_id,
                    "title" => $isNewCategory ? "Added New Category" : "Category Updated Successfully",
                    "desc" => array(
                        $notifyKey.'_title' => $request->input('name'),
                        $notifyKey.'_description' => $request->message,
                    )
                );
                Notification::send($management, new QuickNotify($notify));
                Session::flash('success', $data["message"]);
            } else {
                $data["success"] = false;
                $data["message"] = $isNewCategory ? "Category Not Added Successfully." : "Category Not Updated Successfully.";
                Session::flash('error', $data["message"]);
            }
    
            return redirect()->route('categories.list')->with($data);
        } else {
            return redirect()->back();
        }
    }


    public function edit(Request $request, $id)
    {
        $pages = Pages::all();
        $where = array('id' => $request->id);
        $categories  = Categories::where($where)->first();

        return view('admin.categories.edit', compact('pages', 'categories'));
    }

    public function view(Request $request, $isTrashed = null)
    {
        $where = array('id' => $request->id);

        if ($isTrashed != null) {
            $categories = Categories::onlyTrashed()->where($where)->first();
        } else {
            $categories = Categories::where($where)->first();
        }

        return Response::json($categories);
    }



    public function restore(Request $request, $id)
    {
        $category = Categories::onlyTrashed()->findOrFail($id);
        $success = $category->restore();

        $response = [
            "success" => $success,
            "message" => $success ? "Category Restored Successfully!" : "Failed to Restore Category!"
        ];
        return redirect()->route('categories.list')->with($response);
    }


    public function destroy(Request $request)
    {
        $category = Categories::onlyTrashed()->find($request->id);
        $success = $category->forceDelete();
        $response = [
            "success" => $success,
            "message" => $category->trashed() ? "Category Destroy Successfully!" : "Failed to Destroy Category!"
        ];

        return response()->json($response);
    }


    public function delete(Request $request)
    {
        $category = Categories::find($request->id);
        $success = $category->delete();

        return response()->json([
            "success" => $success,
            "message" => $success ? "Category deleted Successfully!" : "Failed to delete Category!"
        ]);
    }


    public function trashed(Request $request)
    {
        if ($request->ajax()) {
            $categories = Categories::onlyTrashed()->get();

            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('action', function ($category) {
                    $html = '<button href="#" class="btn btn-primary btn-view" data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="' . $category->id . '"><i class="far fa-eye"></i></button>&nbsp;';

                    if (Auth::user()->can('Subscriber-Edit')) {
                        $html .= '<a href="' . route('categories.restore', $category->id) . '" class="btn btn-success btn-restore"><i class="mdi mdi-delete-restore"></i></a>&nbsp;';
                    }

                    if (Auth::user()->can('Subscriber-Delete')) {
                        $html .= '<button data-id="' . $category->id . '" id="sa-params" class="btn btn-xs btn-danger btn-delete"><i class="far fa-trash-alt"></i></button>&nbsp;';
                    }

                    return $html;
                })
                ->addColumn('deleted_at', function ($category) {
                    return $category->deleted_at->format('d-M-Y') . '<br /> <label class="text-primary">' . $category->deleted_at->diffForHumans() . '</label>';
                })
                ->addColumn('status', function ($category) {
                    $isChecked = $category->active ? 'checked' : '';
                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $category->id . '" class="subscriber_status" switch="bool" data-id="' . $category->id . '" value="' . $category->active . '" ' . $isChecked . '/><label for="switch' . $category->id . '" data-on-label="Yes" data-off-label="No"></label></div>';

                    return $btn;
                })
                ->addColumn('image', function ($category) {
                    $imageName = Str::of($category->image)->replace(' ', '%10');
                    $imageSrc = $category->image ? asset('/' . $imageName) : asset('backend/assets/images/default/no-image.jpg');
                    $image = '<img src="' . $imageSrc . '" class="avatar-sm" />';

                    return $image;
                })
                ->rawColumns(['action', 'status', 'deleted_at', 'image'])
                ->make(true);
        }

        return view('admin.categories.trashed');
    }


    public function CategoryApi()
    {
        $categories = Categories::all();
        return response()->json($categories);
    }
}