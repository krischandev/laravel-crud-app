@extends('layouts.app')

@section('title','Dashboard')


@section('page_heading','')
    
@section('content')
<div class="container">
  <div class="row justify-content-center">
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
                      <h3>53</h3>
      
                      <p>Attendance Present</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-calendar-check"></i>
                      </div>
                      {{-- TODO: Link to Attendance Present List --}}
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              
              <!-- ./col -->
              <div class="col-lg-4 col-6">
              <!-- small box -->
                  <div class="small-box bg-danger">
                      <div class="inner">
                      <h3>65</h3>
      
                      <p>Attendance Absent</p>
                      </div>
                      <div class="icon">
                      <i class="fas fa-calendar-times"></i>
                      </div>
                      {{-- TODO: Link to Attendance Absent List --}}
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
              <!-- Left col -->
                  {{-- TODO: users table --}}
                      <div class="col-md-12">
                          <div class="card">
                          <div class="card-header">
                              <h3 class="card-title">Users Table</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table class="table table-bordered">
                              <thead>
                                  <tr>
                                  <th style="width: 10px">#</th>
                                  <th>Task</th>
                                  <th>Progress</th>
                                  <th style="width: 40px">Label</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                  <td>1.</td>
                                  <td>Update software</td>
                                  <td>
                                      <div class="progress progress-xs">
                                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                      </div>
                                  </td>
                                  <td><span class="badge bg-danger">55%</span></td>
                                  </tr>
                                  <tr>
                                  <td>2.</td>
                                  <td>Clean database</td>
                                  <td>
                                      <div class="progress progress-xs">
                                      <div class="progress-bar bg-warning" style="width: 70%"></div>
                                      </div>
                                  </td>
                                  <td><span class="badge bg-warning">70%</span></td>
                                  </tr>
                                  <tr>
                                  <td>3.</td>
                                  <td>Cron job running</td>
                                  <td>
                                      <div class="progress progress-xs progress-striped active">
                                      <div class="progress-bar bg-primary" style="width: 30%"></div>
                                      </div>
                                  </td>
                                  <td><span class="badge bg-primary">30%</span></td>
                                  </tr>
                                  <tr>
                                  <td>4.</td>
                                  <td>Fix and squish bugs</td>
                                  <td>
                                      <div class="progress progress-xs progress-striped active">
                                      <div class="progress-bar bg-success" style="width: 90%"></div>
                                      </div>
                                  </td>
                                  <td><span class="badge bg-success">90%</span></td>
                                  </tr>
                              </tbody>
                              </table>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer clearfix">
                              <ul class="pagination pagination-sm m-0 float-right">
                              <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                              </ul>
                          </div>
                          </div>
                      </div>
              <!-- /.card -->
  
              {{-- TODO: available schedule --}}
              <div class="col-md-12">
                  <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Schedule available Table</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table class="table table-bordered">
                      <thead>
                          <tr>
                          <th style="width: 10px">#</th>
                          <th>Task</th>
                          <th>Progress</th>
                          <th style="width: 40px">Label</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                          <td>1.</td>
                          <td>Update software</td>
                          <td>
                              <div class="progress progress-xs">
                              <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                              </div>
                          </td>
                          <td><span class="badge bg-danger">55%</span></td>
                          </tr>
                          <tr>
                          <td>2.</td>
                          <td>Clean database</td>
                          <td>
                              <div class="progress progress-xs">
                              <div class="progress-bar bg-warning" style="width: 70%"></div>
                              </div>
                          </td>
                          <td><span class="badge bg-warning">70%</span></td>
                          </tr>
                          <tr>
                          <td>3.</td>
                          <td>Cron job running</td>
                          <td>
                              <div class="progress progress-xs progress-striped active">
                              <div class="progress-bar bg-primary" style="width: 30%"></div>
                              </div>
                          </td>
                          <td><span class="badge bg-primary">30%</span></td>
                          </tr>
                          <tr>
                          <td>4.</td>
                          <td>Fix and squish bugs</td>
                          <td>
                              <div class="progress progress-xs progress-striped active">
                              <div class="progress-bar bg-success" style="width: 90%"></div>
                              </div>
                          </td>
                          <td><span class="badge bg-success">90%</span></td>
                          </tr>
                      </tbody>
                      </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                      <ul class="pagination pagination-sm m-0 float-right">
                      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                      </ul>
                  </div>
                  </div>
              </div>
              <!--/.direct-chat -->
  {{-- Setup data for datatables --}}

@php
$heads = [
    'ID',
    'Name',
    ['label' => 'Phone', 'width' => 40],
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

$btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button>';
$btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
$btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

$config = [
    'data' => [
        [22, 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
    ],
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" class="bg-teal" :config="$config"
    striped hoverable with-buttons>
    @foreach($config['data'] as $row)
        <tr>
            @foreach($row as $cell)
                <td>{!! $cell !!}</td>
            @endforeach
        </tr>
    @endforeach
</x-adminlte-datatable>
              <!-- /.Left col -->
         
          </div>
          <!-- /.row (main row) -->
          </div><!-- /.container-fluid -->
      </section>
       <!-- /.content -->
  
  </div>
</div>

@endsection