@extends('layouts.app')

@section('title','Edit Schedule Profile')
    
@section('page_heading','Edit Schedule Profile')
@section('card_header')
    <h3>Update Details</h3>
    <a href="{{ route('scheduleprofile.index') }}" class="btn btn-danger">Back</a>
    {{-- @dd($scheduleSettingsAll); --}}
@endsection
@section('card_body')
<form action="{{ route('scheduleprofile.update', $scheduleprofile->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <label>Employee</label>
                <x-adminlte-select name="sp_emp_id" disabled>
                    <option class="d-none" value="">Select Employee ...</option>
                    @foreach($employee as $emp)
                        <option value="{{ $emp->id }}" @if ($scheduleprofile->sp_emp_id == $emp->id)selected="selected" @endif>{{ $emp->emp_id }} - {{ $emp->emp_fn }} {{ $emp->emp_mn }} {{ $emp->emp_ln }}</option>
                    @endforeach
                </x-adminlte-select>
            </div>
            <div class="col-4">
                <label>Schedule</label>
                <x-adminlte-select name="sp_ss_id">
                    @foreach($scheduleSettingsAll as $spProf)
                        <option value="{{ $spProf->id }}" @if ($scheduleprofile->sp_ss_id == $spProf->id)selected="selected" @endif>{{ $spProf->ss_shift_title }} [{{ $spProf->ss_time_from }} - {{ $spProf->ss_time_to }}]</option>
                    @endforeach
                </x-adminlte-select>
            </div>
            
        </div>
    </div>
        
    <input type="submit" class="btn btn-primary" value="Update">
   </form>

@endsection