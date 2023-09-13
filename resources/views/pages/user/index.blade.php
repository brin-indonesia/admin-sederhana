@extends('layouts.app')

@section('title', $title)

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-primary font-weight-bold">{{ $title }}</h1>
                @can('users.create')
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a href="{{ route('users.create') }}" type="button" class="btn btn-primary">New {{ str($title)->singular }}</a>
                        <div class="btn-group" role="group">
                            <button id="btnGroup{{ str($title)->slug() }}" type="button"
                                class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"></button>
                            <div class="dropdown-menu" aria-labelledby="btnGroup{{ str($title)->slug() }}">
                                <a class="dropdown-item" href="#">Export {{ $title }}</a>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>
            <div class="card">
                <div class="card-body">
                    <x-datatable :tableId="'users'" :tableHeaders="['Name', 'Email', 'Roles', 'Action']" :tableColumns="[['data' => 'name'], ['data' => 'email'], ['data' => 'jabatan'], ['data' => 'action']]" :getDataUrl="route('datatables.users')" />
                </div>
            </div>
        </div>
    </div>
@endsection
