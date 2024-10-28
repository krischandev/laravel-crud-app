@extends('layouts.app')

@section('title','New Payroll Profile')
    
@section('page_heading','New Payroll Profile')
@section('card_header')
    <h3>Details</h3>
    <a href="{{ route('payrollprofile.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    
@section('card_body')
   <form action="{{ route('payrollprofile.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <label>Employee</label>
                    <x-adminlte-select name="pp_emp_id">
                        <option class="d-none" value="">Select Employee ...</option>
                        @foreach($empProfile as $eprof)
                            <option value="{{ $eprof->id }}">{{ $eprof->emp_id }} - {{ $eprof->emp_fn }} {{ $eprof->emp_mn }} {{ $eprof->emp_ln }}</option>
                        @endforeach
                    </x-adminlte-select>
                </div>
                <div class="col-4">
                    <label>Daily Rate</label>
                    <input type="text" class="form-control" name="pp_dailyrate" placeholder="Daily Rate">
                    @error('pp_dailyrate')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-4">
                    <label>Allowance</label>
                    <input type="text" class="form-control" name="pp_allowance" placeholder="Allowance">
                    @error('pp_allowance')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                
                
            </div>
        </div>
        
        
        <input type="submit" class="btn btn-primary" >
   </form>

@endsection