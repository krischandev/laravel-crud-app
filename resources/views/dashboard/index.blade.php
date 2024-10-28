@extends('layouts.app')

@section('title','Dashboard')


@section('page_heading','')
    
@section('content')
      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <div class="col-lg-4 col-6">
              <!-- small box -->
                  <div class="small-box bg-info">
                      <div class="inner">
                      <h3>{{ $dashboard->count() }}</h3>
                      <p>Employee Count</p>
                      </div>
                      <div class="icon">
                          <i class="fas fa-users"></i>
                      </div>
                      {{-- TODO: Link to Employee List --}}
                      <a href="{{ route('employees.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      
                    </div>
                 
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-6">
              <!-- small box -->
                  <div class="small-box bg-success">
                      <div class="inner">
                      <h3>{{ $attendancesheet->count() }}</h3>
      
                      <p>Attendance Present</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-calendar-check"></i>
                      </div>
                      {{-- TODO: Link to Attendance Present List --}}
                      <a href="{{ route('attendancesheet.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              
              <!-- ./col -->
              <div class="col-lg-4 col-6">
              <!-- small box -->
                  <div class="small-box bg-danger">
                      <div class="inner">
                      <h3>{{ $checkAbsence->count() }}</h3>
      
                      <p>Attendance Absent</p>
                      </div>
                      <div class="icon">
                      <i class="fas fa-calendar-times"></i>
                      </div>
                      {{-- TODO: Link to Attendance Absent List --}}
                      <a href="{{ route('attendancesheet.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
          </div>
          <!-- /.row -->
          
          </div>
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

    
      </section>
       <!-- /.content -->
  

@endsection