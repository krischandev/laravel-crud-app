@extends('layouts.app')

@section('title','Employee List')
    
@section('page_heading','Employee List')

@section('card_header')


    <h3>Payroll Information</h3>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">New Employee</a>
    
    
@endsection
    
@section('card_body')

             
  {{-- Setup data for datatables --}}
@php
$heads = [
    'Employee Name',
    'Employee Daily Rate',
    'Employee Days Present',
    'Employee Days Absent',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

//populate data in array
foreach ($employees as $key => $value) {
    // echo json_encode($value['employee_name']);
    $employee_data[]= array(
        $value['employee_name'],
        $value['employee_dailyrate'],
        $value['employee_days_present'],
        $value['employee_days_absent'],
        
        // {{ route('employees.edit', $employee->id) }}
        $btnEdit = '
       <a href="employees/edit/1" class="btn btn-success">Edit</a>
        <span class="btn-group"> <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" onClick="window.location.href="/employees-deleted"" >
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>'.
        $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" >
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>'.
        $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </button> </span>',
    );
    // echo $employee_name;
};
$config = [
    'data' =>  $employee_data,
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
// dd($config);

@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" class="bg-gray" 
    striped hoverable with-buttons >
    @foreach($config['data'] as $row)
        <tr>
            @foreach($row as $cell)
                <td>{!! $cell !!}</td>
            @endforeach
        </tr>
    @endforeach
</x-adminlte-datatable>


@endsection