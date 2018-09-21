<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apartment;
use Validator;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $apartments = Apartment::All();
        $table = array('source' => 'apartments',
                        'title' => 'Apartments List',
                           'id' => 'apartments_table',
                         //'data' => $col_heads
                     );
        return view('apartments.list', compact('apartments','table'));

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $apartment = new Apartment();
        return view('apartments.create',compact('apartment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Validator::make($request->all(), [
                 'code' => 'required|max:45|unique:apartments',
                'owner' => 'required|max:255',
                'phone' => 'required|max:45',
                'email' => 'required|max:100',
               'status' => 'required|max:1',
            ])->validate();
        
        $apartment = new Apartment();
        $apartment->code = $request->code;
        $apartment->owner = $request->owner;
        $apartment->phone = $request->phone;
        $apartment->email = $request->email;
        $apartment->status = $request->status;
        $apartment->save();

        return 'fine';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
