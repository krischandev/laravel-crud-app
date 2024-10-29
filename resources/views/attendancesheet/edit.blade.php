@extends('layouts.app')

@section('title','Edit Attendance')
    
@section('page_heading','Edit Attendance')
@section('card_header')
    <h3>Update Details</h3>
    <a href="{{ route('attendancesheet.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    {{-- @dd($attendancesheet); --}}
@section('card_body')
<form action="{{ route('attendancesheet.update', $attendancesheet->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <label>Employee</label>
                <input type="text" class="form-control" name="atd_emp_id" value="{{ $attendancesheet->atdEmpID->id }}" hidden>
                {{ $attendancesheet->atdEmpID->emp_id }} - {{ $attendancesheet->atdEmpID->emp_fn }} {{ $attendancesheet->atdEmpID->emp_mn }} {{ $attendancesheet->atdEmpID->emp_ln }}
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                @php
                $config = [
                    'format' => 'YYYY-MM-DD',
                    
                ];
                @endphp
                <x-adminlte-input-date name="atd_date" label="Date" 
                    :config="$config" placeholder="Date" value="{{ $attendancesheet->atd_date }}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>
            <div class="col-4">
                @php
                $config = [
                    'format' => 'HH:mm:ss',
                    
                ];
                @endphp
                <x-adminlte-input-date name="atd_in" label="Time IN" 
                    :config="$config" placeholder="Time IN" value="{{ $attendancesheet->atd_in }}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>
            <div class="col-4">
                @php
                $config = [
                    'format' => 'HH:mm:ss',
                    
                ];
                @endphp
                <x-adminlte-input-date name="atd_out" label="Time OUT" 
                    :config="$config" placeholder="Time OUT" value="{{ $attendancesheet->atd_out }}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>

            <div class="col-4">
                <label>Overtime *in Minutes</label>
                <input type="text" class="form-control" name="atd_ot" placeholder="OT" value="{{ $attendancesheet->atd_ot }}">
                @error('atd_ot')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            {{-- <div class="col-3">
                <label>LATE *in Minutes</label>
                <input type="text" class="form-control" name="atd_late" placeholder="LATE">
                @error('atd_late')<span class="text-danger">{{ $message }}</span>@enderror
            </div> --}}
            <div class="col-4">
                @php
                $config = [
                    'format' => 'HH:mm:ss',
                    
                ];
                @endphp
                <x-adminlte-input-date name="atd_break_out" label="Break OUT" 
                    :config="$config" placeholder="Break OUT" value="{{ $attendancesheet->atd_break_out }}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>
            <div class="col-4">
                @php
                $config = [
                    'format' => 'HH:mm:ss',
                    
                ];
                @endphp
                <x-adminlte-input-date name="atd_break_in" label="Break IN" 
                    :config="$config" placeholder="Break IN" value="{{ $attendancesheet->atd_break_in }}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>
            
        </div>
    </div>
        
        <input type="submit" class="btn btn-primary" value="Update">
   </form>

@endsection