@extends('layouts.app')

@section('title','Assign Schedule')
    
@section('page_heading','Assign Schedule')
@section('card_header')
    <h3>Details</h3>
    <a href="{{ route('scheduleprofile.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    
@section('card_body')
   <form action="{{ route('scheduleprofile.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label>Employee</label>
                    <x-adminlte-select name="sp_emp_id">
                        <option class="d-none" value="">Select Employee ...</option>
                        @foreach($empProfile as $eprof)
                            <option value="{{ $eprof->id }}">{{ $eprof->emp_id }} - {{ $eprof->emp_fn }} {{ $eprof->emp_mn }} {{ $eprof->emp_ln }}</option>
                        @endforeach
                    </x-adminlte-select>
                </div>
                <div class="col-6">
                    <label>Schedule</label>
                    <x-adminlte-select name="sp_ss_id">
                        <option class="d-none" value="">Select Schedule ...</option>
                        @foreach($ssProfile as $ssprof)
                            <option value="{{ $ssprof->id }}">{{ $ssprof->ss_shift_title }} [{{ $ssprof->ss_time_from }} - {{ $ssprof->ss_time_to }}]</option>
                        @endforeach
                    </x-adminlte-select>
                </div>
                
            </div>
        </div>
        
        
        <input type="submit" class="btn btn-primary" >
   </form>

@endsection