@extends('adminlte::page')

@section('title', 'Company Details')

@section('content_header')
    <h1 class="m-0 text-dark">Company Details</h1>
@stop

@section('content')
    <div class="row my-5">
        <div class="col text-left">
            <h2>{{$company->name}}</h2>
        </div>
        <div class="col text-right">
            <div class="btn-toolbar" role="toolbar" aria-label="companies Context Toolbar">
               <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="">
                   <a href="{{route('companies.index')}}" class="btn btn-outline-primary">Back to list</a>
               </div>
            </div>
        </div>
    </div>
    @component('vendor.moonbear.blade-components.themes.default.record-navigator', [
        'heading'=> $company->name,
        'route' => 'companies.show',
        'previous' => $previous,
        'next' => $next
    ])
    @endcomponent

    <div class="row h-100 justify-content-center align-items-center">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ isset($company->logo) ? asset($company->logo) : 'http://via.placeholder.com/100X100'}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $company->name }}</h5>
                <p class="card-text">{{ $company->email }}</p>
                <a href="{{ $company->website ?? '#' }}" class="btn btn-primary">Visit Website</a>
            </div>
        </div>
    </div>

@endsection



