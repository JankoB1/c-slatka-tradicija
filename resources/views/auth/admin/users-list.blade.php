@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
@endsection

@section('scriptsTop')
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
@endsection

@section('content')
    <div class="table-responsive">
        {{ $dataTable->table() }}
    </div>
@endsection

@section('scriptsBottom')
    {{ $dataTable->scripts() }}
@endsection
