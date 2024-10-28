@extends('layouts.app')

@section('title','Schedule Assigned Profile')
    
@section('page_heading','Schedule Assigned Profile')

@section('card_header')


    <h3>Schedule Profile</h3>
    <a href="{{ route('scheduleprofile.create') }}" class="btn btn-primary icon-block"><i class="fas fa-plus-circle"></i> Assign Schedule</a>
    
    
@endsection
    
@section('card_body')

             
  {{-- Setup data for datatables --}}
@php
$heads = [
    'Employee ID',
    'Employee Name',
    'Schedule Assigned',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

//populate data in array
if(count($scheduleprofiles)>0){
    foreach ($scheduleprofiles as $key => $value) {
        $scheduleprofiles_data[]= array( //undefined variable
            $value['schedEmp']['emp_id'],
            $value['schedEmp']['emp_fn']." ".$value['schedEmp']['emp_mn']." ".$value['schedEmp']['emp_ln'],
            $value['schedSet']['ss_shift_title'],
            
            $btnEdit = '<span class="btn-group"><a href="'.route('scheduleprofile.edit', $value['id']).'" class="btn btn-success"><i class="fa fa-lg fa-fw fa-pen"></i></a>
            <span class="btn-group">'.
            $btnDelete = '<a href="'.route('scheduleprofile.destroy', $value['id']).'" class="btn btn-danger"><i class="fa fa-lg fa-fw fa-trash"></i></a></span>',
            // $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
            //                 <i class="fa fa-lg fa-fw fa-eye"></i>
            //             </button> ',
        );
        
        // echo $employee_name;
    };

    $config = [
        'data' =>  $scheduleprofiles_data,
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];

};
// dd($scheduleprofiles);

@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" class="bg-gray" 
    striped hoverable with-buttons >
    @if(count($scheduleprofiles)>0)
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