@extends('adminlte::page')

@section('title', 'Employee Dashboard')

@section('content_header')
    <h3>@yield('page_heading')</h3>
@endsection
    
@section('content')
    @session('status')
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        
    @endsession
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            @yield('card_header')
        </div>
    </div>
    <div class="card-body">
        @yield('card_body')

    </div>
  

</div>
    
@endsection
