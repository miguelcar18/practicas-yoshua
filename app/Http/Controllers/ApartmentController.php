<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
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

         return redirect('/apartments');
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
        $apartment = Apartment::findOrFail($id);
        return view('apartments.edit',compact('apartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
        Validator::make($request->all(), [
                 //'code' => 'present|max:45|unique:apartments,code,'.$apartment->id,
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

         return redirect('/apartments');
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
