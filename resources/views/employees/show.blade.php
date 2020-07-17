@extends('adminlte::page')

@section('title', 'Employee Details')

@section('content_header')
<h1 class="m-0 text-dark">Employee</h1>
@stop

@section('content')
    <div class="row my-5">
        <div class="col text-left">
            <h2>Employee</h2>
        </div>
        <div class="col text-right">
            <div class="btn-toolbar" role="toolbar" aria-label="employees Context Toolbar">
               <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="">
                   <a href="{{route('employees.index')}}" class="btn btn-outline-primary">Back to list</a>
               </div>
            </div>
        </div>
    </div>
    @component('vendor.moonbear.blade-components.themes.default.record-navigator', [
        'heading'=> $employee->name,
        'route' => 'employees.show',
        'previous' => $previous,
        'next' => $next
    ])@endcomponent

    <div class="row h-100 justify-content-center align-items-center">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ isset($employee->company->logo) ? asset($employee->company->logo) : 'http://via.placeholder.com/100X100'}}" alt="Comapny logo">
            <div class="card-body">
                <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
                <p class="card-text">{{ $employee->email }}</p>
                <p class="card-text">{{ $employee->phone }}</p>
                <a href="{{ $employee->company->website ?? '#' }}" class="btn btn-primary">Visit Website</a>
            </div>
        </div>
    </div>
@endsection



