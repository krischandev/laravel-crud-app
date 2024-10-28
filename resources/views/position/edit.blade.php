@extends('layouts.app')

@section('title','Edit Position')
    
@section('page_heading','Edit Position')
@section('card_header')
    <h3>Update Details</h3>
    <a href="{{ route('position.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    
@section('card_body')
<form action="{{ route('position.update', $position->id) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <label>Position Acronym</label>
                    <input type="text" class="form-control" name="pos_acronym" placeholder="POSITION ACRONYM 3 LETTERS ONLY" disabled value="{{ $position->pos_acronym }}">
                    @error('pos_acronym')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-4">
                    <label>Position Title</label>
                    <input type="text" class="form-control" name="pos_title" placeholder="POSITION TITLE" value="{{ $position->pos_title }}">
                    @error('pos_title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-4">
                    <label>Department</label>
                    <x-adminlte-select name="pos_dept_id">
                        @foreach($department as $dept)
                            <option value="{{ $dept->id }}" @if ($position->pos_dept_id == $dept->id)selected="selected" @endif>{{ $dept->dept_title }}</option>
                        @endforeach
                    </x-adminlte-select>
                </div>
                
            </div>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Update">
   </form>

@endsection