@extends('layouts.app')

@section('title','Payroll List')
    
@section('page_heading','Payroll List')

@section('card_header')


    <h3>Payroll List</h3>
    <a href="{{ route('payrollsheet.create') }}" class="btn btn-primary icon-block"><i class="fas fa-plus-circle"></i> New Payroll</a>
    
    
@endsection
    
@section('card_body')

             
  {{-- Setup data for datatables --}}
@php
$heads = [
    'ps_pp_id',
    'ps_date_from',
    'ps_date_to',
    'ps_days',
    'ps_totdeduct',
    'ps_grosspay',
    'pas_netincome',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

//populate data in array
if(count($payrollsheet)>0){
    foreach ($payrollsheet as $key => $value) {
        $payrollsheet_data[]= array( //undefined variable
            $value['ps_pp_id'],
            $value['ps_date_from'],
            $value['ps_date_to'],
            $value['ps_days'],
            $value['ps_totdeduct'],
            $value['ps_grosspay'],
            $value['ps_netincome'],
            
            $btnEdit = '<span class="btn-group"><a href="'.route('payrollsheet.edit', $value['id']).'" class="btn btn-success"><i class="fa fa-lg fa-fw fa-pen"></i></a>
            <span class="btn-group">'.
            $btnDelete = '<a href="'.route('payrollsheet.destroy', $value['id']).'" class="btn btn-danger"><i class="fa fa-lg fa-fw fa-trash"></i></a></span>',
            // $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
            //                 <i class="fa fa-lg fa-fw fa-eye"></i>
            //             </button> ',
        );
        
        // echo $employee_name;
    };

    $config = [
        'data' =>  $payrollsheet_data,
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];

};
// dd($payrollprofile);

@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" class="bg-gray" 
    striped hoverable with-buttons >
    @if(count($payrollsheet)>0)
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