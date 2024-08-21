@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
@endsection

@section('scriptsTop')
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
@endsection

@section('content')
    <div class="admin-dashboard container-fluid">
        <div class="row">
            <div class="col-md-2">
                <ul class="admin-menu">
                    <li><a href="{{ route('show-admin-list') }}">Recepti</a></li>
                    <li class="active"><a href="{{ route('show-users-list') }}">Korisnici</a></li>
                    <li><a href="{{ route('show-posts-list') }}">Blog</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptsBottom')
    {{ $dataTable->scripts() }}
@endsection
