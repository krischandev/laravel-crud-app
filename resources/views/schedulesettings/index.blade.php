@extends('layouts.app')

@section('title','Schedule List')
    
@section('page_heading','Schedule List')

@section('card_header')


    <h3>Schedules</h3>
    <a href="{{ route('schedulesettings.create') }}" class="btn btn-primary icon-block"><i class="fas fa-plus-circle"></i> New Schedule</a>
    
    
@endsection
    
@section('card_body')

             
  {{-- Setup data for datatables --}}
@php
$heads = [
    'Shift Title',
    'Time From',
    'Time To',
    'Minutes',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

//populate data in array
if(count($schedulesettings)>0){
    foreach ($schedulesettings as $key => $value) {
        $schedulesettings_data[]= array( //undefined variable
            $value['ss_shift_title'],
            $value['ss_time_from'],
            $value['ss_time_to'],
            $value['ss_minutes'],
            
            $btnEdit = '<span class="btn-group"><a href="'.route('schedulesettings.edit', $value['id']).'" class="btn btn-success"><i class="fa fa-lg fa-fw fa-pen"></i></a>
            <span class="btn-group">'.
            $btnDelete = '<a href="'.route('schedulesettings.destroy', $value['id']).'" class="btn btn-danger"><i class="fa fa-lg fa-fw fa-trash"></i></a></span>',
            // $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
            //                 <i class="fa fa-lg fa-fw fa-eye"></i>
            //             </button> ',
        );
        
        // echo $employee_name;
    };

    $config = [
        'data' =>  $schedulesettings_data,
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];

};
// dd($config);

@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" class="bg-gray" 
    striped hoverable with-buttons >
    @if(count($schedulesettings)>0)
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