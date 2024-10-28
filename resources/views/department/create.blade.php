@extends('layouts.app')

@section('title','New Department')
    
@section('page_heading','New Department')
@section('card_header')
    <h3>Details</h3>
    <a href="{{ route('department.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    
@section('card_body')
   <form action="{{ route('department.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="row">
                
                <div class="col-4">
                    <label>Department Title</label>
                    <input type="text" class="form-control" name="dept_title" placeholder="DEPARTMENT TITLE">
                    @error('dept_title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                
                
            </div>
        </div>
        
        
        <input type="submit" class="btn btn-primary" >
   </form>

@endsection