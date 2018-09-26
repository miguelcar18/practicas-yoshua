    @extends('layouts.materialize.default')

@section('breadcrumbs')
<h5 class="breadcrumbs-title">Apartments</h5>
<ol class="breadcrumbs">
    <li><a href="home">Home</a></li>
    <li><a href="apartments">Apartments</a></li>
    <li class="active">List</li>
</ol>

@stop

@section('content')

@include('common.materialize.header-form-link',['icon' => 'mdi-image-timer-auto','url'=>'apartments/create','buttonMessage'=>trans('messages.add_new'),'message'=>''])

{{-- @include('common.materialize.datatable',['table' => $table_data['user-table']]) --}}
<div class="container">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <table  class="datatabl responsive-table display "
        data-table-source="{{ $table['source'] }}"
         data-table-title="{{ $table['title'] }}"
                       id="{{ $table['id'] }}" 
                       {!! array_key_exists('form',$table) ? 'data-form="'.$table['form'].'"' : '' !!}
                       {!! array_key_exists('disable-sorting',$table) ? 'data-disable-sorting="'.$table['disable-sorting'].'"' : '' !!}>
        <thead>
            <tr>
                <th style="min-width:20%;">Opciones</th>
                <th>{{-- $col_head --}}Identificador del Apartamento</th>
                <th>{{-- $col_head --}}Propietario</th>
                <th>{{-- $col_head --}}Correo</th>
                <th>{{-- $col_head --}}Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($apartments as $apartment)
            <tr>
                <td>
                    <a href="/apartments/{{$apartment->id}}/edit" ><div class="material-icons" >edit</div></a>
                    <form method="POST" action="/apartments/{{$apartment->id}}" id="form-apartments-delete">
                        {{ csrf_field() }} 
                        {{ method_field('DELETE') }}
                        <button data-toggle="tooltip"
                                      title="Delete"
                                      style=" outline: none;
                                            background: transparent;
                                                border: none;
                                                font-size:20px;
                                                width:3px;
                                                heigth:3px" 
                                     class="mdi-action-delete"
                                     data-submit-confirm-text="Yes"
                                     type="submit">
                        </button>
                    </form>
                </td> 
               <td>{{ $apartment->code }}</td>
               <td>{{ $apartment->owner }}</td>
               <td>{{ $apartment->email }}</td>
               <td>{{ $apartment->status() }}</td>
            </tr>
            @endforeach                
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>



@stop

