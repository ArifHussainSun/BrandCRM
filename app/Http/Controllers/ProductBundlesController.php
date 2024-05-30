<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductBundles;
use App\Models\Product;
use App\Models\Categories;
use App\Models\SubCategories;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuickNotify;
use Carbon\Carbon;

class ProductBundlesController extends Controller
{
    function __construct()
    {
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $product_bunbles = ProductBundles::all();
            return DataTables::of($product_bunbles)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<button href="#"  class="btn btn-primary btn-view"  data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="' . $row->id . '"><i class="far fa-eye"></i></button>&nbsp';
                    $html .= '<button href="#"  class="btn btn-primary btn-product"  data-bs-toggle="modal" data-bs-target=".orderdetails" data-id="' . $row->id . '"><i class="">Products</i></button>&nbsp';
                    $html .= '<a href="' . route('product-bundle.edit', $row->id) . '"  class="btn btn-success btn-edit"><i class="fas fa-edit"></i></a>&nbsp';
                    $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';

                    return $html;
                })->addColumn('created_at', function ($row) {
                    return date('d-M-Y', strtotime($row->created_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->created_at)->diffForHumans() . '</label>';
                })->addColumn('status', function ($row) {
                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="productBundle_status" switch="bool" data-id="' . $row->id . '" value="' . ($row->active == 1 ? "1" : "0") . '" ' . ($row->active == 1 ? "checked" : "") . '/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';

                    return $btn;
                })->rawColumns(['action', 'created_at', 'status'])->make(true);
        }

        return view('admin.productbundles.list');
    }

    public function trashed(Request $request)
    {

        if ($request->ajax()) {
            $product_bunbles = ProductBundles::onlyTrashed();
            return DataTables::of($product_bunbles)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<button href="#"  class="btn btn-primary btn-view"  data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="' . $row->id . '"><i class="far fa-eye"></i></button>&nbsp';
                    $html .= '<button href="#"  class="btn btn-primary btn-product"  data-bs-toggle="modal" data-bs-target=".orderdetails" data-id="' . $row->id . '"><i class="">Products</i></button>&nbsp';
                    $html .= '<a href="' . route('product-bundle.restore', $row->id) . '"  class="btn btn-xs btn-success btn-restore" ><i class="mdi mdi-delete-restore"></i></a>&nbsp';
                    $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';

                    return $html;
                })->addColumn('deleted_at', function ($row) {
                    return date('d-M-Y', strtotime($row->deleted_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->deleted_at)->diffForHumans() . '</label>';
                })->addColumn('status', function ($row) {
                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="productBundle_status" switch="bool" data-id="' . $row->id . '" value="' . ($row->active == 1 ? "1" : "0") . '" ' . ($row->active == 1 ? "checked" : "") . '/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';

                    return $btn;
                })->rawColumns(['action', 'deleted_at', 'status'])->make(true);
        }

        return view('admin.productbundles.trashed');
    }

    public function form()
    {
        $categories = Categories::all();
        $products = Product::all();
        $subcategories = SubCategories::all();
        return view('admin.productbundles.add',compact('categories','products','subcategories'));
    }

    function status(Request $request, $id, $isType = null)
    {
        $productBandle = ProductBundles::find($id);
        $productBandle->active = (($request->status == "true") ? 1 : 0);

        $response = array();

        if ($productBandle->save()) {
            $response["success"] = true;
            $response["message"] = "Product Bundle Status Updated Successfully!";
        } else {
            $response["success"] = false;
            $response["message"] = "Failed to Update Product Bundle Status!";
        }

        return response()->json($response);
    }


    public function storeOrUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'products' => 'required',
            'category_id' => '',
            'sub_categories_id' => '',
            'discount' => 'nullable',
            'discount_type' => 'nullable',
        ]);
    
        // Set the authenticated user as the creator/updater of the product bundle
        $userId = auth()->user()->id;
    
        $productBundle = $request->id ? ProductBundles::find($request->id) : new ProductBundles();
        $productBundle->name = $request->name;
        $productBundle->title = $request->title;
        $productBundle->products = json_encode($request->products);
        $productBundle->category_id = $request->category_id;
        $productBundle->sub_categories_id = $request->sub_categories_id;
        $productBundle->discount = $request->discount;
        $productBundle->discount_type = $request->discount_type;
        $productBundle->created_by = $request->id ? $productBundle->created_by : $userId;
        $productBundle->updated_by = $userId;
    
        if ($productBundle->save()) {
            $management = User::role(['Admin', 'Brand Manager'])->get();
            $notifyKey = $request->id ? 'updated' : 'added';
            $notify = [
                "performed_by" => $userId,
                "title" => $request->id ? "Updated Product Bundle" : "Added New Product Bundle",
                "desc" => [
                    $notifyKey.'_title' => $request->input('name'),
                    $notifyKey.'_description' => strip_tags($request->title),
                ]
            ];
            Notification::send($management, new QuickNotify($notify));
            $message = $request->id ? "Product Bundle Updated Successfully" : "Product Bundle Added Successfully";
            
            return redirect()->route('product-bundle.list')->with('success', "Product Bundle Added Successfully");
        } else {
            $message = $request->id ? "Product Bundle Not Updated Successfully" : "Failed to Add Product Bundle";
            return redirect()->back()->with('error', $message);
        }
    }
    


    public function restore(Request $request, $id)
    {
        $productBundle = ProductBundles::onlyTrashed()->findOrFail($id);
        $success = $productBundle->restore();

        $response = [
            "success" => $success,
            "message" => $success ? "Product Bundle Restored Successfully!" : "Failed to Restore Product Bundle!"
        ];
        return redirect()->route('product-bundle.list')->with($response);
    }
  
    public function delete(Request $request)
    {
        $productBundle = ProductBundles::find($request->id);
        $success = $productBundle->delete();

        return response()->json([
            "success" => $success,
            "message" => $success ? "Product Bundle Deleted Successfully!" : "Failed to Delete Product Bundle!"
        ]);
    }

    public function destroy(Request $request)
    {
        $productBundle = ProductBundles::onlyTrashed()->find($request->id);
        $success = $productBundle->forceDelete();
        $response = [
            "success" => $success,
            "message" => $productBundle->trashed() ? "Product Bundle Destroy Successfully!" : "Failed to Destroy Product Bundle!"
        ];

        return response()->json($response);
    }

    public function edit(Request $request, $id)
    {
        $categories = Categories::all();
        $subcategories = SubCategories::all();
        $where = array('id' => $id);
        $product_bundles  = ProductBundles::where($where)->first();
        $selected_products = collect(json_decode($product_bundles->products));
        $selected_bundle = collect(json_decode($product_bundles->discount_type));
        $products = Product::all();
        return view('admin.productbundles.edit',compact('products','selected_products','selected_bundle','categories','product_bundles','subcategories'));
    }

    public function view(Request $request, $isTrashed = null)
    {
        $categories = Categories::all();
        $where = array('id' => $request->id);
        if ($isTrashed != null && $isTrashed == 1) {

            $product_bundles  = ProductBundles::onlyTrashed()->where($where)->first();
            $selected_products = collect($product_bundles->products);
            $selected_bundle = collect(json_decode($product_bundles->discount_type));
            $products = Product::all();

            $html = '';
            $discount_type = '';
            foreach ($products as $product) {
                if ($selected_products->contains($product->id)) {
                    $html .= '<option value="' . $product->id . '" selected>' . $product->product_name . '</option>';
                } else {
                    $html .= '<option value="' . $product->id . '">' . $product->product_name . '</option>';
                }
            }
            $product_bundles['html'] = $html;
            $product_bundles["categories"] = $categories;
        } else {

            $product_bundles  = ProductBundles::where($where)->first();
            $selected_products = collect($product_bundles->products);
            $selected_bundle = collect(json_decode($product_bundles->discount_type));
            $products = Product::all();

            $html = '';
            $discount_type = '';
            foreach ($products as $product) {
                if ($selected_products->contains($product->id)) {
                    $html .= '<option value="' . $product->id . '" selected>' . $product->product_name . '</option>';
                } else {
                    $html .= '<option value="' . $product->id . '">' . $product->product_name . '</option>';
                }
            }
            $product_bundles['html'] = $html;
            $product_bundles["categories"] = $categories;
        }

        return Response::json(["status" => true, "product_bundle" => $product_bundles]);
    }

    public function ProductDisplay(Request $request, $isType = null)
    {
        $where = array('id' => $request->id);

        if ($isType != null) {
            $product_bundles  = ProductBundles::where($where)->with('products', 'category')->first();
            $products = Product::select('id', 'name', 'title', 'price', 'description')->whereIn('id', json_decode($product_bundles->products))->get();
            $data["products"] = $products;
        } else {
            $product_bundles  = ProductBundles::onlyTrashed()->where($where)->with('products', 'category')->first();
            $products = Product::select('id', 'name', 'title', 'price', 'description')->whereIn('id', json_decode($product_bundles->products))->get();
            $data["products"]  = $products;
        }

        return Response()->json($data);
    }

    public function ProductBundlesApi($id = null)
    {
        $product_bundles = ProductBundles::where('id', $id)->with('productdetails')->first();

        if (!empty($product_bundles)) {
            return response()->json([
                "status" => true,
                "data" => $product_bundles
            ]);
        } else {
            return response()->json(array(
                "status" => false,
                "message" => 'Product Bundle Id Does Not Exit',
            ), 400);
        }
    }

    protected function Product_bundle_discount($discount_type, $products_discount, $amount)
    {
        $discounted_amount = 0;
        $products_discount = floatval($products_discount);
        $amount = floatval($amount);

        if ($discount_type == "flat") {
            $discounted_amount = $amount - $products_discount;
        } else if ($discount_type == "percent") {
            $discounted_amount = $amount - ceil(($amount * ($products_discount / 100)));
        }

        return $discounted_amount;
    }
}