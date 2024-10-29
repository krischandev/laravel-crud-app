@extends('layouts.app')

@section('title','Edit Payroll Deduction')
    
@section('page_heading','Edit Payroll Deduction')
@section('card_header')
    <h3>Update Details</h3>
    <a href="{{ route('payrolldeduction.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    
@section('card_body')
<form action="{{ route('payrolldeduction.update', $payrolldeduction->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <div class="row">
            <div class="col-3">
                <label>SSS in Percentage</label>
                <input type="text" class="form-control" name="pd_sss" placeholder="SSS" value="{{ $payrollprofile->pd_sss }}">
                @error('pd_sss')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-3">
                <label>PAGIBIG</label>
                <input type="text" class="form-control" name="pd_pagibig" placeholder="PAGIBIG" value="{{ $payrollprofile->pd_pagibig }}">
                @error('pd_pagibig')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-3">
                <label>PHILHEALTH</label>
                <input type="text" class="form-control" name="pd_philhealth" placeholder="PHILHEALTH" value="{{ $payrollprofile->pd_philhealth }}">
                @error('pd_philhealth')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-3">
                <label>OTHERS</label>
                <input type="text" class="form-control" name="pd_others" placeholder="OTHERS" value="{{ $payrollprofile->pd_others }}">
                @error('pd_others')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            
        </div>
    </div>
        
        <input type="submit" class="btn btn-primary" value="Update">
   </form>

@endsection