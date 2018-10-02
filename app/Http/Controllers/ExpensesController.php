<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Entrust;

use App\Expenses;


class ExpensesController extends Controller
{
    //Log Activities
    use BasicController;

    public function index()
    {
        if (!Entrust::can('manage-user'))
            return redirect('/home')->withErrors(trans('messages.permission_denied'));

        $col_heads = array();

        array_push($col_heads, trans('messages.option'));
        array_push($col_heads, trans('messages.name'));
        array_push($col_heads, trans('messages.description'));
        array_push($col_heads, trans('messages.status'));

        $table_data['expenses-table'] = array(
           'source' => 'expenses',
            'title' => 'Expenses List',
               'id' => 'expenses_table',
             'data' => $col_heads
        );

        $assets = ['recaptcha'];
        return view('expenses.list', compact('table_data','assets'));
    } 

    public function lists()
    {
        if (defaultRole())
            $expenses = Expenses::all();
        else
            $expenses = Expenses::whereIsHidden(0)->get();

        foreach ($expenses as $expense) {
            $row = array(
            '<div class="row col s5">' .

                (($expense->status == 1 /*&& Entrust::can('change-expenses-status')*/) ? 
                    '<a href="#" class="col s1 mdi-navigation-close " style="font-size:20px" data-ajax="1" data-extra="&expense_id=' . $expense->id . '&status=' .$expense->status. '" data-source="/change-expenses-status">
                        <i class="fa fa-ban" data-toggle="tooltip" title="' . trans('messages.inactive') . ' ' . trans('messages.expenses') . '"></i>
                    </a>' : '') .

                (($expense->status == 0 /*&& Entrust::can('change-expenses-status')*/) ?
                    '<a href="#" class="col s1 mdi-navigation-check" style="font-size:20px" data-ajax="1" data-extra="&expense_id=' . $expense->id . '&status=' .$expense->status. '" data-source="/change-expenses-status">
                        <i class="fa fa-check" data-toggle="tooltip" title="' . trans('messages.active') . ' ' . trans('messages.expenses') . '"></i>
                    </a>' : '') .

                '<a href="/expenses/' . $expense->id . '/edit" class="col s1" style="font-size:20px;" ><div class="material-icons" >edit</div></a>'.
                
                '<a class="col s1" style="font-size:20px;">
                    <form method="POST" action="/expenses/' . $expense->id. '" id="form-expenses-delete">'.
                        csrf_field() .
                        method_field('DELETE') .
                        '<button data-toggle="tooltip" title="Delete" style=" outline: none; background: transparent; border: none; font-size:20px; width:3px; heigth:3px" class="mdi-action-delete" data-submit-confirm-text="Yes" type="submit"></button>
                     </form>
                </a>
            </div>');

            $status = '';
            if ($expense->status === 1)
                $status = '<span class="card blue card-content white-text">' . trans('messages.active') . '</span>';
            elseif ($expense->status === 0)
                $status = '<span class="card red card-content white-text">' . trans('messages.inactive') . '</span>';

            array_push($row, $expense->name);
            array_push($row, $expense->description);
            array_push($row, $status);

            $rows[] = $row;
        }

        $list['aaData'] = $rows;
        return json_encode($list);
    }

    public function create()
    {
        $expense = new Expenses;
        return view('expenses.create',compact('expense'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
                       'name' => 'required|max:56',
                'description' => 'required|max:255',
                     'status' => 'required|max:1|boolean'
        ])->validate();

        $expenses = new Expenses();
        $expenses->name = $request->name;
        $expenses->description = $request->description;
        $expenses->status = $request->status;
        $expenses->save();

        $this->logActivity(['module' => 'expenses','activity' => 'expenses_create']);

        return response()->json([
            'message'=> trans('messages.saved'),
            'status' => "success",
        ]);
    }

    public function show($id)
    {
        return redirect('errors.404');
    }

    public function edit(Expenses $expense)
    {
        return view('expenses.edit',compact('expense'));
    }

    public function update(Request $request, Expenses $expense)
    {
         Validator::make($request->all(), [
                 'name' => 'present|max:56|',
          'description' => 'present|max:255',
               'status' => 'present|max:1|boolean',
            ])->validate();
        
        if ($request->name != '') {$expense->name = $request->name;}
        if ($request->description != '') {$expense->description = $request->description;}
        if ($request->status != '') {$expense->status = $request->status;}

        $expense->save();

        $this->logActivity(['module' => 'expenses','activity' => 'expenses_update']);

        return response()->json([
            'message'=> trans('messages.saved'),
            'status' => "success",
        ]);
    }

    public function changeStatus(Request $request)
    {
        $expense = Expenses::findOrFail($request->input('expense_id'));
        Validator::make($request->all(), ['status' => 'present|max:1|boolean'])->validate();
        
        if ($request->input('status') == 1 ) 
            $expense->status = 0;
        elseif ($request->input('status') == 0 )
            $expense->status = 1;

        $expense->save();

        $this->logActivity(['module' => 'expenses','activity' => 'expenses_status_change']);

        if ($request->has('ajax_submit')) {
            $response = ['message' => trans('messages.status') . ' ' . trans('messages.updated'), 'status' => 'success'];
            return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
        }

    }

    public function destroy(Expenses $expense)
    {
        if (!Entrust::can('manage-user'))
            return redirect('/home')->withErrors(trans('messages.permission_denied'));
        
        $expense->delete();

        $this->logActivity(['module' => 'expenses','activity' => 'expenses_deleted']);

        return response()->json([
            'message'=> trans('messages.successful') .' '. trans('messages.deletion'),
            'status' => "success",
        ]);
    }
}
