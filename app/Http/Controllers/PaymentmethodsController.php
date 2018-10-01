<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Entrust;

use App\Paymentmethod;

class PaymentmethodsController extends Controller
{
   
    public function index()
    {
        if (!Entrust::can('manage-user'))
            return redirect('/home')->withErrors(trans('messages.permission_denied'));

        $paymentmethods = Paymentmethod::All();

        $col_heads = array();

        array_push($col_heads, trans('messages.option'));
        array_push($col_heads, trans('messages.name'));
        array_push($col_heads, trans('messages.description'));
        array_push($col_heads, trans('messages.status'));

        $table_data['paymentmethods-table'] = array(
           'source' => 'paymentmethods',
            'title' => 'Paymentmethods List',
               'id' => 'paymentmethods_table',
             'data' => $col_heads
        );

        $assets = ['recaptcha'];
        return view('paymentmethods.list', compact('paymentmethods','table_data','assets'));
    }

    public function lists()
    {
        if (defaultRole())
            $paymentmethods = Paymentmethod::all();
        else
            $paymentmethods = Paymentmethod::whereIsHidden(0)->get();

        foreach ($paymentmethods as $paymentmethod) {
            $row = array(
            '<div class="row col s5">' .

                (($paymentmethod->status == 1 /*&& Entrust::can('change-paymentmethods-status')*/) ? 
                    '<a href="#" class="col s1 mdi-navigation-close " style="font-size:20px" data-ajax="1" data-extra="&paymentmethod_id=' . $paymentmethod->id . '&status=' .$paymentmethod->status. '" data-source="/change-paymentmethods-status">
                        <i class="fa fa-ban" data-toggle="tooltip" title="' . trans('messages.inactive') . ' ' . trans('messages.paymentmethods') . '"></i>
                    </a>' : '') .

                (($paymentmethod->status == 0 /*&& Entrust::can('change-paymentmethods-status')*/) ?
                    '<a href="#" class="col s1 mdi-navigation-check" style="font-size:20px" data-ajax="1" data-extra="&paymentmethod_id=' . $paymentmethod->id . '&status=' .$paymentmethod->status. '" data-source="/change-paymentmethods-status">
                        <i class="fa fa-check" data-toggle="tooltip" title="' . trans('messages.active') . ' ' . trans('messages.paymentmethods') . '"></i>
                    </a>' : '') .

                '<a href="/paymentmethods/' . $paymentmethod->id . '/edit" class="col s1" style="font-size:20px;" ><div class="material-icons" >edit</div></a>'.
                
                '<a class="col s1" style="font-size:20px;">
                    <form method="POST" action="/paymentmethods/' . $paymentmethod->id. '" id="form-paymentmethods-delete">'.
                        csrf_field() .
                        method_field('DELETE') .
                        '<button data-toggle="tooltip" title="Delete" style=" outline: none; background: transparent; border: none; font-size:20px; width:3px; heigth:3px" class="mdi-action-delete" data-submit-confirm-text="Yes" type="submit"></button>
                     </form>
                </a>
            </div>');

            $status = '';
            if ($paymentmethod->status === 1)
                $status = '<span class="card blue card-content white-text">' . trans('messages.active') . '</span>';
            elseif ($paymentmethod->status === 0)
                $status = '<span class="card red card-content white-text">' . trans('messages.inactive') . '</span>';

            array_push($row, $paymentmethod->name);
            array_push($row, $paymentmethod->description);
            array_push($row, $status);

            $rows[] = $row;
        }

        $list['aaData'] = $rows;
        return json_encode($list);
    }

    public function create()
    {
        $paymentmethod = new Paymentmethod;
        return view('paymentmethods.create',compact('paymentmethod'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
                       'name' => 'required|max:56',
                'description' => 'required|max:255',
                     'status' => 'required|max:1|boolean'
        ])->validate();

        $paymentmethod = new Paymentmethod();

        $paymentmethod->name = $request->name;
        $paymentmethod->description = $request->description;
        $paymentmethod->status = $request->status;
        $paymentmethod->save();

        return response()->json([
            'message'=> trans('messages.saved'),
            'status' => "success",
        ]);
    }

    public function show($id)
    {
        
    }

    
    public function edit(Paymentmethod $paymentmethod)
    {
        return view('paymentmethods.edit',compact('paymentmethod'));
    }

    public function update(Request $request, Paymentmethod $paymentmethod)
    {
        Validator::make($request->all(), [
                 'name' => 'present|max:56|',
          'description' => 'present|max:255',
               'status' => 'present|max:1|boolean',
            ])->validate();
        
        if ($request->name != '') {$paymentmethod->name = $request->name;}
        if ($request->description != '') {$paymentmethod->description = $request->description;}
        if ($request->status != '') {$paymentmethod->status = $request->status;}

        $paymentmethod->save();

        return response()->json([
            'message'=> trans('messages.saved'),
            'status' => "success",
        ]);
    }

    public function changeStatus(Request $request)
    {
        $paymentmethod = Paymentmethod::findOrFail($request->input('paymentmethod_id'));
        Validator::make($request->all(), ['status' => 'present|max:1|boolean'])->validate();
        
        if ($request->input('status') == 1 ) 
            $paymentmethod->status = 0;
        elseif ($request->input('status') == 0 )
            $paymentmethod->status = 1;

        $paymentmethod->save();

        if ($request->has('ajax_submit')) {
            $response = ['message' => trans('messages.status') . ' ' . trans('messages.updated'), 'status' => 'success'];
            return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
        }

    }

    public function destroy(Paymentmethod $paymentmethod)
    {
        if (!Entrust::can('manage-user'))
            return redirect('/home')->withErrors(trans('messages.permission_denied'));
        
        $paymentmethod->delete();
        return response()->json([
            'message'=> trans('messages.successful') .' '. trans('messages.deletion'),
            'status' => "success",
        ]);
    }

}
