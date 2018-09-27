<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Apartment;
use Validator;

class ApartmentController extends Controller
{

    public function index()
    {
        //
        $apartments = Apartment::All();

        $col_heads = array();

        array_push($col_heads, trans('messages.option'));
        array_push($col_heads, trans('messages.code'));
        array_push($col_heads, trans('messages.owner'));
        array_push($col_heads, trans('messages.email'));
        array_push($col_heads, trans('messages.status'));


        $table_data['apartment-table'] = array(
           'source' => 'apartments',
            'title' => 'Apartments List',
               'id' => 'apartments_table',
             'data' => $col_heads
        );

        $assets = ['recaptcha'];
        return view('apartments.list', compact('apartments','table_data','assets'));


        /*
        if (!Entrust::can('manage-user'))
            return redirect('/home')->withErrors(trans('messages.permission_denied'));

        $col_heads = array(
            trans('messages.option'),
            trans('messages.email')
        );

        if (!config('config.login'))
            array_push($col_heads, trans('messages.username'));

        array_push($col_heads, trans('messages.name'));
        array_push($col_heads, trans('messages.role'));
        array_push($col_heads, trans('messages.status'));
        array_push($col_heads, trans('messages.signup') . ' ' . trans('messages.date'));
        array_push($col_heads, trans('messages.last') . ' ' . trans('messages.login') . ' ' . trans('messages.date'));

        $table_data['user-table'] = array(
            'source' => 'user',
            'title' => 'User List',
            'id' => 'user_table',
            'data' => $col_heads
        );

        $assets = ['recaptcha'];
        return view('user.index', compact('table_data', 'assets'));
        */
    }

    public function lists()
    {
        $apartments = Apartment::all();

        foreach ($apartments as $apartment) {
            
            $row = array(
            '<div class="row col s5">' .
                
                '<a href="/apartments/' . $apartment->id . '" class="col s1 mdi-action-visibility" style="font-size:20px"><i class="fa fa-arrow-circle-o-right" data-toggle="tooltip" title="' . trans('messages.view') . '"></i></a>' .

                '<a href="#" class="col s1 mdi-action-visibility" ></a>'.

                '<a href="/apartments/' . $apartment->id . '/edit" ><div class="material-icons" >edit</div></a>'.
                
                '<a>
                    <form method="POST" action="/apartments/' . $apartment->id. '" id="form-apartments-delete">'.
                        csrf_field() .
                        method_field('DELETE') .
                        '<button data-toggle="tooltip" title="Delete" style=" outline: none; background: transparent; border: none; font-size:20px; width:3px; heigth:3px" class="mdi-action-delete" data-submit-confirm-text="Yes" type="submit"></button>
                     </form>'.'</div>
                 </a>');

            $status = '';
            if ($apartment->status === 1)
                $status = '<span class="card blue card-content white-text">' . trans('messages.active') . '</span>';
            elseif ($apartment->status === 0)
                $status = '<span class="card red card-content white-text">' . trans('messages.inactive') . '</span>';

            array_push($row, $apartment->code);
            array_push($row, $apartment->owner);
            array_push($row, $apartment->email);
            array_push($row, $status);

            $rows[] = $row;
        }

        $list['aaData'] = $rows;
        return json_encode($list);
        
    }

    public function create()
    {
        $apartment = new Apartment();
        return view('apartments.create',compact('apartment'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
                 'code' => 'required|numeric|unique:apartments',
                'owner' => 'required|max:255',
                'phone' => 'required|numeric',
                'email' => 'required|max:100|email',
               'status' => 'required|max:1|boolean',
            ])->validate();
        
        $apartment = new Apartment();
        $apartment->code = $request->code;
        $apartment->owner = $request->owner;
        $apartment->phone = $request->phone;
        $apartment->email = $request->email;
        $apartment->status = $request->status;
        $apartment->save();

         //return redirect('/apartments');
         return response()->json([
                    'message'=>'Datos de Guardados.',
                    'status' => "success",
                ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('apartments.edit',compact('apartment'));
    }

    public function update(Request $request, Apartment $apartment)
    {
        Validator::make($request->all(), [
                 //'code' => 'present|numeric|unique:apartments,code,'.$apartment->id,
                 'code' => 'present|numeric|'.Rule::unique('apartments')->ignore($apartment->id),
                'owner' => 'present|max:255',
                'phone' => 'present|numeric',
                'email' => 'present|max:100|email',
               'status' => 'present|max:1|boolean',
            ])->validate();
        
        if ($request->code != '') {$apartment->code = $request->code;echo'entro:'.$request->code;}
        if ($request->owner != '') {$apartment->owner = $request->owner;echo'entro:'.$request->owner;}
        if ($request->phone != '') {$apartment->phone = $request->phone;echo'entro:'.$request->phone;}
        if ($request->email != '') {$apartment->email = $request->email;echo'entro:'.$request->email;}
        if ($request->status != '') {$apartment->status = $request->status;echo'entro:'.$request->status;}

        $apartment->save();
        return response()->json([
                    'message'=>'Datos de Guardados.',
                    'status' => "success",
                ]);
        //return redirect('/apartments');
    }

    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect('/apartments');
    }
}
