<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Entrust;

use App\Expenses;


class ExpensesController extends Controller
{
    public function index()
    {
        if (!Entrust::can('manage-user'))
            return redirect('/home')->withErrors(trans('messages.permission_denied'));

        $expenses = Expenses::All();

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
        return view('expenses.list', compact('expenses','table_data','assets'));
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

        return response()->json([
            'message'=> trans('messages.saved'),
            'status' => "success",
        ]);
    }

    public function show($id)
    {
        
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

        return response()->json([
            'message'=> trans('messages.saved'),
            'status' => "success",
        ]);
    }

    public function destroy($expense)
    {
        if (!Entrust::can('manage-user'))
            return redirect('/home')->withErrors(trans('messages.permission_denied'));
        
        $expense->delete();
        return redirect('/expenses');
    }
}
