<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Models\BrandSettings;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuickNotify;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use App\Models\User;
use App\Traits\ApplicationTrait;
use Illuminate\Validation\Rule;

class EmailTemplateController extends Controller
{
    use ApplicationTrait;
    function __construct()
    {

        $this->middleware('permission:EmailTemplate-Create|EmailTemplate-Edit|EmailTemplate-View|EmailTemplate-Delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:EmailTemplate-Create', ['only' => ['form', 'store']]);
        $this->middleware('permission:EmailTemplate-Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:EmailTemplate-Delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {


        if ($request->ajax()) {
            $emailtemplate = EmailTemplate::whereNull('deleted_at')->with('createdBy')->get();
            return DataTables::of($emailtemplate)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $html = ' <a href="#" class="btn btn-primary viewModal"  data-bs-toggle="modal" data-bs-target=".emailtemplateDetailsModal" data-id="' . $row->id . '"><i title="View" class="fas fa-eye"></i></a>&nbsp';


                    $html .= '<a href="' . route('emailtemplate.edit', $row->id) . '"  class="btn btn-success btn-edit" ><i class="fas fa-edit"></i></a>&nbsp';

                    if (Auth::user()->can('EmailTemplate-Delete')) {
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
                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="emailtemplate_status" switch="bool" data-id="' . $row->id . '" value="' . ($row->status == 1 ? "1" : "0") . '" ' . ($row->status == 1 ? "checked" : "") . '/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';
                    return $btn;
                })
                ->rawColumns(['action', 'status', 'created_at', 'created_by_name'])->make(true);
        }


        return view('admin.emailtemplate.list');
    }

    public function form()
    {
        $mailes = BrandSettings::where('key_name', 'LIKE', "%mail_setting%")->get();

        return view('admin.emailtemplate.add', compact('mailes'));
    }

    public function storeOrUpdate(Request $request)

    {
        $valid =  $request->validate([
            'name' => [
                'required',
                Rule::unique('email_templates')->ignore($request->id)
            ],
            'title' => 'required',
            'to' => 'required|email',
            'from' => 'required|email',
            'cc' => 'nullable',
            'bcc' => 'nullable|email',
            'subject' => 'required',
            'content' => 'required',
        ]);

        if ($valid) {
            $email_template = EmailTemplate::findOrNew($request->id);
            $isNewemail_template = $email_template->id == null;

            $email_template->name = $request->input('name');
            $email_template->title = $request->input('title');
            $email_template->subject = $request->input('subject');
            $email_template->to = $request->input('to');
            $email_template->from = $request->input('from');
            $email_template->cc = !empty($request->cc) ? explode(',', $request->cc):null;
            $email_template->bcc = !empty($request->input('bcc')) ? explode(',', $request->input('bcc')):null;
            $email_template->subject = $request->input('subject');
            $email_template->content = $request->input('content');

            $management = User::role(['Admin', 'Brand Manager'])->get();
            $management->pluck('id');
            $data = array(
                "success" => true,
                "message" => $isNewemail_template ? "Email Template Added Successfully" : "Email Template Updated Successfully"
            );

            // Set the created_by and updated_by values
            $user_id = Auth::user()->id;
            if ($isNewemail_template) {
                $email_template->created_by = $user_id;
            } else {
                $email_template->updated_by = $user_id;
            }

            if ($email_template->save()) {
                // Call the touch() method to update the updated_at field
                $email_template->touch();
                $notifyKey = $isNewemail_template ? 'added' : 'updated';
                $notify = array(
                    "performed_by" => Auth::user()->id,
                    "title" => $isNewemail_template ? "Added New Email Template" : "Updated Email Template",
                    "desc" => array(
                        $notifyKey . '_title' => $request->input('name'),
                        $notifyKey . '_description' => $request->title,
                    )
                );
                Notification::send($management, new QuickNotify($notify));
                Session::flash('success', $data["message"]);
            } else {
                $data["success"] = false;
                $data["message"] = $isNewemail_template ? "Email Template Not Added Successfully." : "Email Template Not Updated Successfully.";
                Session::flash('error', $data["message"]);
            }

            return redirect()->route('emailtemplate.list')->with($data);
        } else {
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        $Email_template = EmailTemplate::find($request->id);
        $success = $Email_template->delete();

        return response()->json([
            "success" => $success,
            "message" => $success ? "Email Template Deleted Successfully!" : "Failed to Delete Email Template!"
        ]);
    }
  
    public function restore(Request $request)
    {
        $Email_template = EmailTemplate::onlyTrashed()->findOrFail($request->id);
        $success = $Email_template->restore();

        $response = [
            "success" => $success,
            "message" => $success ? "Email Template Restored Successfully!" : "Failed to Restore Email Template!",
            "type" => $success ? "success" : "danger",
            "icon" => $success ? "mdi-check-all" : "mdi-block-helper",
        ];
        echo json_encode($response);
    }

    public function destroy(Request $request)
    {
        $Email_template = EmailTemplate::onlyTrashed()->find($request->id);
        $success = $Email_template->forceDelete();
        $response = [
            "success" => $success,
            "message" => $Email_template->trashed() ? "Email Template Destroy Successfully!" : "Failed to Destroy Email Template!"
        ];

        return response()->json($response);
    }

    function render($template)
    {
        $content = EmailTemplate::latest()->first();
        $this->invoice = Blade::render($content->content, $this->brandSetting->toArray());
        return Blade::render('admin.emailtemplate.invoice', ['data' => $this->invoice]);
    }

    function generate()
    {
        $content = EmailTemplate::latest()->first();
        $parseHTML = Blade::render($content->content, $this->brandSetting);
        $downloadPdf = $this->pdf = PDF::loadHtml($parseHTML);
        return $downloadPdf->download('invoice.pdf');
    }

    public function edit(Request $request, $id)
    {
        $mailes = BrandSettings::where('key_name', 'LIKE', "%mail_setting%")->get();
        $emailtemplate = EmailTemplate::where('id', $request->id)->first();
        $cc = !empty($emailtemplate->cc) ? implode(',', json_decode($emailtemplate->cc)):'';
        $bcc = !empty($emailtemplate->bcc) ? implode(',', json_decode($emailtemplate->bcc)):'';
        return view('admin.emailtemplate.edit', compact('emailtemplate', 'mailes','cc','bcc'));
    }

    public function view(Request $request, $id)
    {
        $emailtemplate = EmailTemplate::find($id);
        if (!$emailtemplate) {
            abort(404);
        }

        $data['emailtemplate'] = $emailtemplate;

        $data['emailtemplatenames'] = EmailTemplate::where('id', $emailtemplate->id)->with('createdBy')->first();
        $data['created_by'] = $data['emailtemplate']->createdBy()->first()->first_name;
        $data['created_at'] = Carbon::parse($data['emailtemplate']->created_at)->diffForHumans();
        if ($data['emailtemplate']->updated_by != NULL) {

            $data['updated_by'] = User::where('id', $data['emailtemplate']->updated_by)->first()->first_name;
        } else {
            $data['updated_by'] = "";
        }
        $data['updated_at'] = Carbon::parse($data['emailtemplate']->updated_at)->diffForHumans();
        return $data;
    }


    public function updateStatus(Request $request)
    {
        $update = EmailTemplate::where('id', $request->id)->update(['status' => $request->status]);

        if ($update) {
            $request->status == 1 ? $alertType = 'success' : $alertType = 'danger';
            $request->status == 1 ? $message = 'Email Template Activated Successfuly!' : $message = 'Email Template Deactivated Successfuly!';

            $notification = array(
                'message' => $message,
                'type' => $alertType,
                'icon' => 'mdi-check-all'
            );
        } else {
            $notification = array(
                'message' => 'Some Error Occured, Try Again!',
                'type' => 'error',
                'icon'  => 'mdi-block-helper'
            );
        }

        echo json_encode($notification);
    }

    public function trashed(Request $request)
    {
        if ($request->ajax()) {
            $data = EmailTemplate::onlyTrashed()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0);" class="restore btn btn-xs  btn-success btn-restore" data-id="' . $row->id . '"><i title="Restore" class="fas fa-trash-restore-alt "></i></a>&nbsp';
                    $btn .= '<a data-id="' . $row->id . '" class="btn btn-xs  btn-danger btn-destroy" ><i title="destroy" class="far fa-trash-alt "></i></a>&nbsp';

                    return $btn;
                })
                ->addColumn('deleted_at', function ($row) {
                    return date('d-M-Y', strtotime($row->deleted_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->deleted_at)->diffForHumans() . '</label>';
                })

                ->rawColumns(['action', 'deleted_at'])
                ->make(true);
        }
        return view('admin.emailtemplate.trash');
    }


    function status(Request $request, $id)
    {
        $emailtemplate = EmailTemplate::find($id);
        $emailtemplate->status = (($request->status == "true") ? 1 : 0);

        $response = array();

        if ($emailtemplate->save()) {
            $response["success"] = true;
            $response["message"] = "Email Template Status Updated Successfully!";
        } else {
            $response["error"] = false;
            $response["message"] = "Failed to Update Email Template Status!";
        }

        return response()->json($response);
    }
}