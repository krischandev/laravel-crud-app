@extends('layouts.app')

@section('title','Employee List')
    
@section('page_heading','Employee List')

@section('card_header')


    <h3>Payroll Information</h3>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">New Employee</a>
    
    
@endsection
    
@section('content')
   {{-- <table class="table">
        <thead>
            <tr>
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
                    <td>{{ $employee->employee_name }}</td>
                    <td>{{ $employee->employee_dailyrate }}</td>
                    <td>{{ $employee->employee_days_present }}</td>
                    <td>{{ $employee->employee_days_absent }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('employees.destroy',$employee->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
   </table> --}}
    {{-- {{ $employees->links() }} --}}

     {{-- Setup data for datatables --}}
     {{-- @foreach ($employees as $employee)
     {{ $employee->employee_name}}
     {{ $employee->employee_dailyrate}}
     {{ $employee->employee_days_present}}
     {{ $employee->employee_days_absent}}
         
     @endforeach --}}
     @foreach($employees as $d)
                  {{ $d['employee_name'] }} 
                    ({{ $d['employee_dailyrate'] }})
                    ({{ $d['employee_days_present'] }})
                    ({{ $d['employee_days_absent'] }})
    @endforeach
   
@php

$heads = [
    'Employee Name',
    'Employee Daily Rate',
    'Employee Days Present',
    'Employee Days Absent',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

$btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button>';
$btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
$btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';
foreach ($employees as $key => $value) {
    // echo json_encode($value['employee_name']);
    $employee_data[]= array(
        $value['employee_name'],
        $value['employee_dailyrate'],
        $value['employee_days_present'],
        $value['employee_days_absent'],
        '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'
    );
    // echo $employee_name;
};

$config = 
[
    'data' => 
        $employee_data,
        // [
           
        // 1, 'John Bender', '+02 (123) 123456789', '' ,'<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'
           
        // ],
        // [3, 'Peter Sousa', '+69 (555) 12367345243', '' ,'<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
    
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];

// print_r($config);
// dd($config);
@endphp


{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" class="bg-teal" :config="$config"
    striped hoverable with-buttons>
    @foreach($config['data'] as $row)
        <tr>
            @foreach($row as $cell)
                <td>{!! $cell !!}</td>
            @endforeach
        </tr>
    @endforeach
</x-adminlte-datatable>



@endsection