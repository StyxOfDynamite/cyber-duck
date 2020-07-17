@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1 class="m-0 text-dark">Here you can add / remove companies from your CRM.</h1>
@stop

@section('content')


    @include('components.flash-message')

    <div class="row my-5">
        <div class="col text-left">
            <h2>Companies</h2>
        </div>
        <div class="col text-right">
            <div class="btn-toolbar" role="toolbar" aria-label="companies Context Toolbar">
                <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="">
                    <a href="{{route('companies.create')}}" class="btn btn-outline-primary">Add</a>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Website</th>
                <th class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($companies as $company)
                <tr>
                    <td>{{$company->id}}</td>
                    <td><a href="{{ route('companies.show', $company->id) }}">{{$company->name}}</a></td>
                    <td>{{$company->email}}</td>
                    <td>{{ isset($company->logo) ? '✔' : '✘' }}</td>
                    <td>{{$company->website}}</td>
                    <td class="text-right">
                        <div class="btn-group btn-group-sm">
                            <a href="{{route('companies.edit', $company->id)}}"
                               class="btn btn-block btn-primary">Edit</a>
                               <form action="{{ route('companies.destroy', $company->id) }}" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <button type="submit" class="btn btn-block btn-danger">Delete</button>
                               </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5"><p class="text-center mb-0">No Company to show. <a
                                    class="btn btn-primary btn-sm rounded-0"
                                    href="{{route('companies.create')}}">Add One</a></p></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $companies->links() }}
@endsection

