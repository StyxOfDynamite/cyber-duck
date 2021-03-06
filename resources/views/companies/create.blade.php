@extends('adminlte::page')

@section('title', 'Create Company')

@section('content_header')
<h1 class="m-0 text-dark">Create Company</h1>
@stop

@section('content')

@include('components.flash-message')

<div class="row my-5">
    <div class="col text-center">
        <h2>Add Company</h2>
    </div>
    <div class="col-auto text-right">
        <div class="btn-toolbar" role="toolbar" aria-label="companies Context Toolbar">
         <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="">
             <a href="{{route('companies.index')}}" class="btn btn-outline-primary">Back to list</a>
         </div>
     </div>
 </div>
</div>
<form action="{{route('companies.store')}}" method="post" enctype="multipart/form-data">
    <div class="row">
        {{csrf_field()}}
        <div class="col-md-8">
            @include('companies._form')
            <div class="form-group row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-block btn-primary ml-auto">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
