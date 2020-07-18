@extends('adminlte::page')

@section('title', 'Create Company')

@section('content_header')
<h1 class="m-0 text-dark">Employees</h1>
@stop

@section('content')

@include('components.flash-message')
<div class="row my-5">
    <div class="col text-left">
        <h2>Employees</h2>
    </div>
    <div class="col text-right">
        <div class="btn-toolbar" role="toolbar" aria-label="employees Context Toolbar">
            <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="">
                <a href="{{route('employees.create')}}" class="btn btn-outline-primary">Add</a>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Company</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)
            <tr>
                <td><a href="{{ route('employees.show', $employee->id) }}">{{$employee->id }}</a></td>
                <td>{{$employee->company->name ?? ''}}</td>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                <td class="text-right">
                    <div class="btn-group btn-group-sm">
                        <a href="{{route('employees.edit', $employee->id)}}" type="button"
                         class="btn btn-primary">Edit</a>
                         <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <div class="btn-group btn-group-sm">
                                <button type="submit" class="btn btn-block btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7"><p class="text-center mb-0">No Employee to show. <a
                class="btn btn-primary btn-sm rounded-0"
                href="{{route('employees.create')}}">Add One</a></p></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{ $employees->links() }}
@endsection

