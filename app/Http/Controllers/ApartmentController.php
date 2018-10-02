<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Entrust;

use App\Apartment;

class ApartmentController extends Controller
{
    //Log Activities
    use BasicController;

    public function index()
    {
        if (!Entrust::can('manage-user'))
            return redirect('/home')->withErrors(trans('messages.permission_denied'));

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
        return view('apartments.list', compact('table_data','assets'));
    
    }

    public function lists()
    {
        if (defaultRole())
            $apartments = Apartment::all();
        else
            $apartments = Apartment::whereIsHidden(0)->get();

        foreach ($apartments as $apartment) {
            
            $row = array(
            '<div class="row col s5">' .
                
                 (($apartment->status == 1 /*&& Entrust::can('change-apartments-status')*/) ? 
                    '<a href="#" class="col s1 mdi-navigation-close " style="font-size:20px" data-ajax="1" data-extra="&apartment_id=' . $apartment->id . '&status=' .$apartment->status. '" data-source="/change-apartments-status">
                        <i class="fa fa-ban" data-toggle="tooltip" title="' . trans('messages.inactive') . ' ' . trans('messages.apartment') . '"></i>
                    </a>' : '') .

                (($apartment->status == 0 /*&& Entrust::can('change-apetments-status')*/) ?
                    '<a href="#" class="col s1 mdi-navigation-check" style="font-size:20px" data-ajax="1" data-extra="&apartment_id=' . $apartment->id . '&status=' .$apartment->status. '" data-source="/change-apartments-status">
                        <i class="fa fa-check" data-toggle="tooltip" title="' . trans('messages.active') . ' ' . trans('messages.apartment') . '"></i>
                    </a>' : '') .

                '<a href="/apartments/' . $apartment->id . '/edit" class="col s1" style="font-size:20px;" ><div class="material-icons" >edit</div></a>'.
                
                '<a class="col s1" style="font-size:20px;">
                    <form method="POST" action="/apartments/' . $apartment->id. '" id="form-apartments-delete">'.
                        csrf_field() .
                        method_field('DELETE') .
                        '<button data-toggle="tooltip" title="Delete" style=" outline: none; background: transparent; border: none; font-size:20px; width:3px; heigth:3px" class="mdi-action-delete" data-submit-confirm-text="Yes" type="submit"></button>
                     </form>
                </a>
            </div>');

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

        $this->logActivity(['module' => 'apartments','activity' => 'apartments_create']);

        return response()->json([
            'message'=>'Datos de Guardados.',
            'status' => "success",
        ]);
    }

    public function show($id)
    {
        return redirect('errors.404');
    }

    public function edit(Apartment $apartment)
    {
        return view('apartments.edit',compact('apartment'));
    }

    public function update(Request $request, Apartment $apartment)
    {
        Validator::make($request->all(), [
                 'code' => 'present|numeric|unique:apartments,code,'.$apartment->id,
                'owner' => 'present|max:255',
                'phone' => 'present|numeric',
                'email' => 'present|max:100|email',
               'status' => 'present|max:1|boolean',
            ])->validate();
        
        if ($request->code != '') {$apartment->code = $request->code;}
        if ($request->owner != '') {$apartment->owner = $request->owner;}
        if ($request->phone != '') {$apartment->phone = $request->phone;}
        if ($request->email != '') {$apartment->email = $request->email;}
        if ($request->status != '') {$apartment->status = $request->status;}

        $apartment->save();
        
        $this->logActivity(['module' => 'apartments','activity' => 'apartments_update']);
        
        return response()->json([
            'message'=>'Datos de Guardados.',
            'status' => "success",
        ]);
    }

    public function changeStatus(Request $request)
    {
        $apartment = Apartment::findOrFail($request->input('apartment_id'));
        Validator::make($request->all(), ['status' => 'present|max:1|boolean'])->validate();
        
        if ($request->input('status') == 1) 
            $apartment->status = 0;
        elseif ($request->input('status') == 0)
            $apartment->status = 1;

        $apartment->save();

        $this->logActivity(['module' => 'apartments','activity' => 'apartments_change_status']);

        if ($request->has('ajax_submit')) {
            $response = ['message' => trans('messages.status') . ' ' . trans('messages.updated'), 'status' => 'success'];
            return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
        }

    }

    public function destroy(Apartment $apartment)
    {
         if (!Entrust::can('manage-user'))
            return redirect('/home')->withErrors(trans('messages.permission_denied'));

        $apartment->delete();

        $this->logActivity(['module' => 'apartments','activity' => 'apartments_deleted']);

        return response()->json([
            'message'=> trans('messages.successful') .' '. trans('messages.deletion'),
            'status' => "success",
        ]);
    }

}