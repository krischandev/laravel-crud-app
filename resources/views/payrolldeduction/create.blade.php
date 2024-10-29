@extends('layouts.app')

@section('title','New Payroll Deduction')
    
@section('page_heading','New Payroll Deduction')
@section('card_header')
    <h3>Details</h3>
    <a href="{{ route('payrolldeduction.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    
@section('card_body')
   <form action="{{ route('payrolldeduction.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    <label>SSS in Percentage</label>
                    <input type="text" class="form-control" name="pd_sss" placeholder="SSS">
                    @error('pd_sss')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-3">
                    <label>PAGIBIG</label>
                    <input type="text" class="form-control" name="pd_pagibig" placeholder="PAGIBIG">
                    @error('pd_pagibig')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-3">
                    <label>PHILHEALTH</label>
                    <input type="text" class="form-control" name="pd_philhealth" placeholder="PHILHEALTH">
                    @error('pd_philhealth')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-3">
                    <label>OTHERS</label>
                    <input type="text" class="form-control" name="pd_others" placeholder="OTHERS">
                    @error('pd_others')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                
            </div>
        </div>
        
        
        <input type="submit" class="btn btn-primary" >
   </form>

@endsection