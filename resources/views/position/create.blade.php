@extends('layouts.app')

@section('title','New Position')
    
@section('page_heading','New Position')
@section('card_header')
    <h3>Details</h3>
    <a href="{{ route('position.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    
@section('card_body')
   <form action="{{ route('position.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <label>Position Acronym</label>
                    <input type="text" class="form-control" name="pos_acronym" placeholder="POSITION ACRONYM 3 LETTERS ONLY">
                    @error('pos_acronym')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-4">
                    <label>Position Title</label>
                    <input type="text" class="form-control" name="pos_title" placeholder="POSITION TITLE">
                    @error('pos_title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-4">
                    <label>Department</label>
                    <x-adminlte-select name="pos_dept_id">
                        <option class="d-none" value="">Select Department ...</option>
                        @foreach($department as $dept)
                            <option value="{{ $dept->id }}">{{ $dept->dept_title }}</option>
                        @endforeach
                    </x-adminlte-select>
                </div>
                
            </div>
        </div>
        
        
        <input type="submit" class="btn btn-primary" >
   </form>

@endsection