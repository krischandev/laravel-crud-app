@extends('layouts.app')

@section('title','Edit Payroll')
    
@section('page_heading','Edit Payroll')
@section('card_header')
    <h3>Update Details</h3>
    <a href="{{ route('payrollsheet.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    {{-- @dd($payrollsheet); --}}
@section('card_body')
<form action="{{ route('payrollsheet.update', $payrollsheet->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <label>Employee</label>
                <input type="text" class="form-control" name="ps_pp_id" value="{{ $payrollsheet->id }}" hidden>
                {{ $payrollsheet->pyrProfile->pyrEmp->emp_id }} - {{ $payrollsheet->pyrProfile->pyrEmp->emp_fn }} {{ $payrollsheet->pyrProfile->pyrEmp->emp_mn }} {{ $payrollsheet->pyrProfile->pyrEmp->emp_ln }}
            </div>
            <div class="col-6">
                @php
                $config = [
                    'format' => 'YYYY-MM-DD',
                    
                ];
                @endphp
                <x-adminlte-input-date name="ps_date_from" label="Date From" 
                    :config="$config" placeholder="Date From" value="{{ $payrollsheet->ps_date_from }}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>
            <div class="col-6">
                @php
                $config = [
                    'format' => 'YYYY-MM-DD',
                    
                ];
                @endphp
                <x-adminlte-input-date name="ps_date_to" label="Date To" 
                    :config="$config" placeholder="Date To" value="{{ $payrollsheet->ps_date_to }}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>
            
        </div>
    </div>
        
        
        <input type="submit" class="btn btn-primary" >
   </form>

@endsection