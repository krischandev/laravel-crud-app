@extends('layouts.app')

@section('title','Edit Payroll Profile')
    
@section('page_heading','Edit Payroll Profile')
@section('card_header')
    <h3>Update Details</h3>
    <a href="{{ route('payrollprofile.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    
@section('card_body')
<form action="{{ route('payrollprofile.update', $payrollprofile->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <div class="row">
            <div class="col-4">
                <label>Employee</label>
                <x-adminlte-select name="pp_emp_id" disabled>
                    @foreach($employee as $emp)
                        <option value="{{ $emp->id }}" @if ($payrollprofile->pp_emp_id == $emp->id)selected="selected" @endif>{{ $emp->emp_id }} - {{ $emp->emp_fn }} {{ $emp->emp_mn }} {{ $emp->emp_ln }}</option>
                    @endforeach
                </x-adminlte-select>
            </div>
            <div class="col-4">
                <label>Daily Rate</label>
                <input type="text" class="form-control" name="pp_dailyrate" placeholder="Daily Rate" value="{{ $payrollprofile->pp_dailyrate }}">
                @error('pp_dailyrate')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-4">
                <label>Allowance</label>
                <input type="text" class="form-control" name="pp_allowance" placeholder="Allowance" value="{{ $payrollprofile->pp_allowance }}">
                @error('pp_allowance')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            
            
        </div>
    </div>
        
        <input type="submit" class="btn btn-primary" value="Update">
   </form>

@endsection