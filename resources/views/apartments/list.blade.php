    @extends('layouts.materialize.default')

@section('breadcrumbs')
<h5 class="breadcrumbs-title">User</h5>
<ol class="breadcrumbs">
    <li><a href="user">User</a></li>
    <li><a href="#">Index</a></li>
    <li class="active">User</li>
</ol>

@stop

@section('content')

@include('common.materialize.header-form-link',['icon' => 'mdi-image-timer-auto','url'=>'user/create','buttonMessage'=>trans('messages.add_new'),'message'=>''])

{{-- @include('common.materialize.datatable',['table' => $table_data['user-table']]) --}}
<div class="container">
    <table  class="datatable responsive-table display "
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
                <td>
                    <button>dele</button>
                    <button>view</button>
                </td> 
               <td>{{ $apartment->code }}</td>
               <td>{{ $apartment->owner }}</td>
               <td>{{ $apartment->email }}</td>
               <td>{{ $apartment->status }}</td>
               
            @endforeach                
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>



@stop

