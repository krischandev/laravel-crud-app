@extends('layouts.app')

@section('title','New Schedule')
    
@section('page_heading','New Schedule')
@section('card_header')
    <h3>Details</h3>
    <a href="{{ route('schedulesettings.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    
@section('card_body')
   <form action="{{ route('schedulesettings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <label>Schedule Title</label>
                    <input type="text" class="form-control" name="ss_shift_title" placeholder="Title">
                    @error('ss_shift_title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                
                
            </div>
        </div>
        
        
        <input type="submit" class="btn btn-primary" >
   </form>

@endsection