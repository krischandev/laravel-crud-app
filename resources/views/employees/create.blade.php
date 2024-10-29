@php
    /** @var $view App\Http\Models\Position */
@endphp

@extends('layouts.app')

@section('title','New Employee')
    
@section('page_heading','New Employee')
@section('card_header')
    <h3>Details</h3>
    <a href="{{ route('employees.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    
@section('card_body')
   <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <label>Position</label>
                    <x-adminlte-select name="emp_pos_id">
                        <option class="d-none" value="">Select Position ...</option>
                        @foreach($position as $pos)
                            <option value="{{ $pos->id }},{{ $pos->pos_acronym }}">[{{ $pos->pos_acronym }}]-{{ $pos->pos_title }}</option>
                        @endforeach
                    </x-adminlte-select>
                </div>
                {{-- @dd($position); --}}
                <div class="col-4">
                    <label>Date Hired</label>
                    {{-- Placeholder, date only and append icon --}}
                    @php
                    $config = ['format' => 'YYYY-MM-DD'];
                    @endphp
                    <x-adminlte-input-date name="emp_date_hired" :config="$config" placeholder="Choose a date...">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-gradient-danger">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
              <div class="col-4">
                <label>First Name</label>
                <input type="text" class="form-control" name="emp_fn" placeholder="First Name">
                @error('emp_fn')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
              <div class="col-4">
                <label>Middle Name</label>
                <input type="text" class="form-control" name="emp_mn"placeholder="Middle Name">
                {{-- @error('emp_mn')<span class="text-danger">{{ $message }}</span>@enderror --}}
              </div>
              <div class="col-4">
                <label>Last Name</label>
                <input type="text" class="form-control" name="emp_ln" placeholder="Last Name">
                @error('emp_ln')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
              <div class="col-12">
                <label>Address</label>
                <input type="text" class="form-control" name="emp_addr" placeholder="Address">
                @error('emp_addr')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
              <div class="col-4">
                <label>Contact Mobile Number</label>
                <input type="text" class="form-control" name="emp_cn"placeholder="Contact Number">
                @error('emp_cn')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
              <div class="col-4">
                <label>Gender</label>
                <x-adminlte-select name="emp_gender">
                    <option class="d-none" value="">Select Gender ...</option>
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                </x-adminlte-select>
              </div>
              <div class="col-4">
                <label>Status</label>
                <x-adminlte-select name="status">
                    <option class="d-none" value="">Select Status ...</option>
                    <option value="Regular">Regular</option>
                    <option value="Contractual">Contractual</option>
                    <option value="Probitionary">Probitionary</option>
                    <option value="Resigned">Resigned</option>
                </x-adminlte-select>
              </div>
            </div>
        </div>
        
        <input type="submit" class="btn btn-primary" >
   </form>

@endsection