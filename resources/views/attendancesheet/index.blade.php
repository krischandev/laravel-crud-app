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
    'Emp ID',
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
            $value['pos_acronym'],
            $value['pos_title'],
            $value['posDept']['dept_title'],
            
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
        'data' =>  $position_data,
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];

};
// dd($config);

@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" class="bg-gray" 
    striped hoverable with-buttons >
    @if(count($position)>0)
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