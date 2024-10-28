@extends('layouts.app')

@section('title','Attendance List')
    
@section('page_heading','Attendance List')

@section('card_header')


    <h3>Attendance Sheet</h3>
    <a href="{{ route('attendancesheet.create') }}" class="btn btn-primary icon-block"><i class="fas fa-plus-circle"></i> New Attendance</a>
    
    
@endsection
    
@section('card_body')

             
  {{-- Setup data for datatables --}}
@php
$heads = [
    'Employee',
    'Date',
    'Time IN',
    'Break OUT',
    'Break IN',
    'Time OUT',
    'OT',
    'Late',
    'Minutes',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

//populate data in array
if(count($attendancesheet)>0){
    foreach ($attendancesheet as $key => $value) {
        $attendancesheet_data[]= array( //undefined variable
            $value['atdEmpID']['emp_id']." - ".$value['atdEmpID']['emp_fn']." ".$value['atdEmpID']['emp_mn']." ".$value['atdEmpID']['emp_ln'],
            $value['atd_date'],
            $value['atd_in'],
            $value['atd_break_out'],
            $value['atd_break_in'],
            $value['atd_out'],
            $value['atd_ot'],
            $value['atd_late'],
            $value['atd_minutes'],
            
            $btnEdit = '<span class="btn-group"><a href="'.route('attendancesheet.edit', $value['id']).'" class="btn btn-success"><i class="fa fa-lg fa-fw fa-pen"></i></a>
            <span class="btn-group">'.
            $btnDelete = '<a href="'.route('attendancesheet.destroy', $value['id']).'" class="btn btn-danger"><i class="fa fa-lg fa-fw fa-trash"></i></a></span>',
            // $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
            //                 <i class="fa fa-lg fa-fw fa-eye"></i>
            //             </button> ',
        );
        
        // echo $employee_name;
    };

    $config = [
        'data' =>  $attendancesheet_data,
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];

};
// dd($attendancesheet_data);

@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" class="bg-gray" 
    striped hoverable with-buttons >
    @if(count($attendancesheet)>0)
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