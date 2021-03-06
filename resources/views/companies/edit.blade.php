@extends('adminlte::page')

@section('title', 'Edit Company')

@section('content_header')
<h1 class="m-0 text-dark">Edit Company</h1>
@stop

@section('content')

@include('components.flash-message')
<div class="row my-5">
    <div class="col text-left">
        <h2>Edit Company</h2>
    </div>
    <div class="col text-right">
        <div class="btn-toolbar" role="toolbar" aria-label="companies Context Toolbar">
         <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="">
             <a href="{{route('companies.index')}}" class="btn btn-outline-primary">Back to list</a>
         </div>
     </div>
 </div>
</div>
<form action="{{route('companies.update', $company->id)}}" method="post" enctype="multipart/form-data">
    <div class="row">
        {{csrf_field()}}
        {{method_field('patch')}}
        <div class="col-md-8">
            @include('companies._form')
            <div class="form-group row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-block btn-primary ml-auto">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
