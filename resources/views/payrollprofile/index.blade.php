@extends('layouts.app')

@section('title','Payroll Profile List')
    
@section('page_heading','Payroll Profile List')

@section('card_header')


    <h3>Payroll Profile</h3>
    <a href="{{ route('payrollprofile.create') }}" class="btn btn-primary icon-block"><i class="fas fa-plus-circle"></i> New Payroll Profile</a>
    
    
@endsection
    
@section('card_body')

             
  {{-- Setup data for datatables --}}
@php
$heads = [
    'Employee ID',
    'Employee Name',
    'Daily Rate',
    'Allowance',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

//populate data in array
if(count($payrollprofile)>0){
    foreach ($payrollprofile as $key => $value) {
        $payrollprofile_data[]= array( //undefined variable
            $value['pyrEmp']['emp_id'],
            $value['pyrEmp']['emp_fn']." ".$value['pyrEmp']['emp_mn']." ".$value['pyrEmp']['emp_ln'],
            $value['pp_dailyrate'],
            $value['pp_allowance'],
            
            $btnEdit = '<span class="btn-group"><a href="'.route('payrollprofile.edit', $value['id']).'" class="btn btn-success"><i class="fa fa-lg fa-fw fa-pen"></i></a>
            <span class="btn-group">'.
            $btnDelete = '<a href="'.route('payrollprofile.destroy', $value['id']).'" class="btn btn-danger"><i class="fa fa-lg fa-fw fa-trash"></i></a></span>',
            // $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
            //                 <i class="fa fa-lg fa-fw fa-eye"></i>
            //             </button> ',
        );
        
        // echo $employee_name;
    };

    $config = [
        'data' =>  $payrollprofile_data,
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];

};
// dd($payrollprofile);

@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" class="bg-gray" 
    striped hoverable with-buttons >
    @if(count($payrollprofile)>0)
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