@extends('layouts.app')

@section('title','Payroll Deduction List')
    
@section('page_heading','Payroll Deduction List')

@section('card_header')


    <h3>Payroll Deduction</h3>
    <a href="{{ route('payrolldeduction.create') }}" class="btn btn-primary icon-block"><i class="fas fa-plus-circle"></i> New Payroll Deduction</a>
    
    
@endsection
    
@section('card_body')

             
  {{-- Setup data for datatables --}}
@php
$heads = [
    'SSS',
    'PAGIBIG',
    'PHILHEALTH',
    'OTHERS',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

//populate data in array
if(count($payrolldeduction)>0){
    foreach ($payrolldeduction as $key => $value) {
        $payrolldeduction_data[]= array( //undefined variable
            $value['pd_sss']." %",
            $value['pd_pagibig'],
            $value['pd_philhealth'],
            $value['pd_others'],
            
            $btnEdit = '<span class="btn-group"><a href="'.route('payrolldeduction.edit', $value['id']).'" class="btn btn-success"><i class="fa fa-lg fa-fw fa-pen"></i></a>
            <span class="btn-group">'.
            $btnDelete = '<a href="'.route('payrolldeduction.destroy', $value['id']).'" class="btn btn-danger"><i class="fa fa-lg fa-fw fa-trash"></i></a></span>',
            // $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
            //                 <i class="fa fa-lg fa-fw fa-eye"></i>
            //             </button> ',
        );
        
        // echo $employee_name;
    };

    $config = [
        'data' =>  $payrolldeduction_data,
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];

};
// dd($payrollprofile);

@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" class="bg-gray" 
    striped hoverable with-buttons >
    @if(count($payrolldeduction)>0)
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