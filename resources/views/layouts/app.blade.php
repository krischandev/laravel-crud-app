@extends('adminlte::page')

@section('title')
    {{ config('adminlte.title') }}
@stop

@section('content_header')
    <h3>@yield('page_heading')</h3>
@stop
@section('content')
    @session('status')
        
        @push('js')
        <script>
            Swal.fire({
                icon: "success",
                title:  '{{ session('status') }}',
                showConfirmButton: false,
                timer: 3500
                    });
        </script>
        @endpush
        
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
    
@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>

    <strong>
        Attendance and Payroll Management System - Laravel APP
    </strong>
@stop
{{-- Add common Javascript/Jquery code --}}


