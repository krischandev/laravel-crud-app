@extends('layouts.app')

@section('title','Employee List')
    
@section('page_heading','Employee List')

@section('card_header')


    <h3>Employee Information</h3>
    <a href="{{ route('employees.create') }}" class="btn btn-primary icon-block"><i class="fas fa-plus-circle"></i> New Employee</a>
    {{-- <x-adminlte-button label="New Employee" theme="info" icon="fas fa-info-circle" onclick="window.location='{{ URL::route('employees.create'); }}'"/> --}}
    
    
@endsection
    
@section('card_body')

             
  {{-- Setup data for datatables --}}
@php
$heads = [
    'ID',
    'FIRST NAME',
    'MIDDLE NAME',
    'LAST NAME',
    'POSITION',
    'ADDRESS',
    'CONTACT',
    'GENDER',
    'DATE HIRED',
    'STATUS',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

//populate data in array
if(count($employees)>0){
    foreach ($employees as $key => $value) {
        // echo json_encode($value['employee_name']);
        $employee_data[]= array( //undefined variable
            // $value['id'],
            $value['emp_id'],
            $value['emp_fn'],
            $value['emp_mn'],
            $value['emp_ln'],
            $value['empPos']['pos_title'],
            $value['emp_addr'],
            $value['emp_cn'],
            'gndr'=>$value['emp_gender']==0?'Male':'Female',
            $value['emp_date_hired'],
            $value['status'],
            
            // {{ route('employees.edit', $employee->id) }}
            $btnEdit = '<span class="btn-group"><a href="'.route('employees.edit', $value['id']).'" class="btn btn-success"><i class="fa fa-lg fa-fw fa-pen"></i></a>
            <span class="btn-group">'.
            $btnDelete = '<a href="'.route('employees.destroy', $value['id']).'" class="btn btn-danger"><i class="fa fa-lg fa-fw fa-trash"></i></a></span>',
            // $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
            //                 <i class="fa fa-lg fa-fw fa-eye"></i>
            //             </button> ',
        );
        
        // echo $employee_name;
    };

    $config = [
        'data' =>  $employee_data,
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];

};
// dd($config);

@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" class="bg-gray" 
    striped hoverable with-buttons >
    @if(count($employees)>0)
        @foreach($config['data'] as $row)
            <tr>
                @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                @endforeach
            </tr>
        @endforeach
    @endif
</x-adminlte-datatable>


@endsection