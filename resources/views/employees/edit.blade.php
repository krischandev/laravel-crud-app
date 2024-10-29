@extends('layouts.app')

@section('title','Edit Employee')
    
@section('page_heading','Edit Employee')
@section('card_header')
    <h3>Update Details</h3>
    <a href="{{ route('employees.index') }}" class="btn btn-danger">Back</a>
    
@endsection
{{-- @dd($employees,$position); --}}
    
@section('card_body')
<form action="{{ route('employees.update', $employees->id) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <label>Position</label>
                    <x-adminlte-select name="emp_pos_id">
                        @foreach($position as $pos)
                        {{-- <option value="{{ $employees->emp_pos_id }},{{ $pos->pos_acronym }}">[{{ $pos->pos_acronym }}]-{{ $pos->pos_title }}</option> --}}
                            <option value="{{ $pos->id }},{{ $pos->pos_acronym }}" @if ($employees->emp_pos_id == $pos->id)selected="selected" @endif>[{{ $pos->pos_acronym }}]-{{ $pos->pos_title }}</option>
                            {{-- <option value="{{ $pos->id }},{{ $pos->pos_acronym }}">[{{ $pos->pos_acronym }}]-{{ $pos->pos_title }}</option> --}}
                        @endforeach
                    </x-adminlte-select>
                    @error('emp_pos_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                {{-- @dd($position); --}}
                <div class="col-4">
                    <label>Date Hired</label>
                    {{-- Placeholder, date only and append icon --}}
                    @php
                    $config = ['format' => 'YYYY-MM-DD'];
                    @endphp
                    <x-adminlte-input-date name="emp_date_hired" :config="$config" value="{{ $employees->emp_date_hired }}" >
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-gradient-danger" >
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                    @error('emp_date_hired')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
              <div class="col-4">
                <label>First Name</label>
                <input type="text" class="form-control" name="emp_fn" placeholder="First Name" value="{{ $employees->emp_fn }}">
                @error('emp_fn')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
              <div class="col-4">
                <label>Middle Name</label>
                <input type="text" class="form-control" name="emp_mn"placeholder="Middle Name" value="{{ $employees->emp_mn }}">
                {{-- @error('emp_mn')<span class="text-danger">{{ $message }}</span>@enderror --}}
              </div>
              <div class="col-4">
                <label>Last Name</label>
                <input type="text" class="form-control" name="emp_ln" placeholder="Last Name" value="{{ $employees->emp_ln }}">
                @error('emp_ln')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
              <div class="col-12">
                <label>Address</label>
                <input type="text" class="form-control" name="emp_addr" placeholder="Address" value="{{ $employees->emp_addr }}">
                @error('emp_addr')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
              <div class="col-4">
                <label>Contact Mobile Number</label>
                <input type="text" class="form-control" name="emp_cn"placeholder="Contact Number" value="{{ $employees->emp_cn }}">
                @error('emp_cn')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
              <div class="col-4">
                <label>Gender</label>
                <x-adminlte-select name="emp_gender">
                    <option value="0" @if ($employees->emp_gender == 0)selected="selected" @endif>Male</option>
                    <option value="1" @if ($employees->emp_gender == 1)selected="selected" @endif>Female</option>
                </x-adminlte-select>
                    @error('emp_gender')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
              <div class="col-4">
                <label>Status</label>
                <x-adminlte-select name="status">
                    <option value="Regular" @if ($employees->status == "Regular")selected="selected" @endif>Regular</option>
                    <option value="Contractual" @if ($employees->status == "Contractual")selected="selected" @endif>Contractual</option>
                    <option value="Probitionary" @if ($employees->status == "Probitionary")selected="selected" @endif>Probitionary</option>
                    <option value="Resigned" @if ($employees->status == "Resigned")selected="selected" @endif>Resigned</option>
                </x-adminlte-select>
                    @error('status')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
            </div>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Update">
   </form>

@endsection