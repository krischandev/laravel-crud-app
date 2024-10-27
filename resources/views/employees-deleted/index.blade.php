@extends('layouts.app')

@section('title','Employee Deleted List')
    
@section('page_heading','Employee Deleted List')

@section('card_header')


    <h3>Deleted Information</h3>
    
    
@endsection
    
@section('card_body')

   <table class="table">
        <thead>
            <tr>
                <th>Status</th>
                <th>Employee Name</th>
                <th>Employee Daily Rate</th>
                <th>Employee Days Present</th>
                <th>Employee Days Absent</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td><span class="badge badge-warning">Deleted</span></td>
                    <td>{{ $employee->employee_name }}</td>
                    <td>{{ $employee->employee_dailyrate }}</td>
                    <td>{{ $employee->employee_days_present }}</td>
                    <td>{{ $employee->employee_days_absent }}</td>
                    <td>
                        <a href="{{ route('employees-deleted.restore', $employee->id) }}" class="btn btn-success">Restore</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
   </table>
   {{ $employees->links() }}

@endsection