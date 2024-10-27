@extends('layouts.app')

@section('title','Edit Employee')
    
@section('page_heading','Edit Employee')
@section('card_header')
    <h3>Edit Information</h3>
    <a href="{{ route('employees.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    
@section('card_body')
   <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="employee_name">Employee Name</label>
            <input type="text" class="form-control" name="employee_name" value="{{ $employee->employee_name }}">
        </div>
        <div class="form-group">
            <label for="employee_dailyrate">Employee Daily Rate</label>
            <input type="text" class="form-control" name="employee_dailyrate" value="{{ $employee->employee_dailyrate }}">
        </div>
        <div class="form-group">
            <label for="employee_days_present">Employee Days Present</label>
            <input type="text" class="form-control" name="employee_days_present" value="{{ $employee->employee_days_present }}">
        </div>
        <div class="form-group">
            <label for="employee_days_absent">Employee Days Absent</label>
            <input type="text" class="form-control" name="employee_days_absent" value="{{ $employee->employee_days_absent }}">
        </div>
        <input type="submit" class="btn btn-primary" value="Update">
   </form>
@endsection