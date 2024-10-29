@extends('layouts.app')

@section('title','Edit Department')
    
@section('page_heading','Edit Department')
@section('card_header')
    <h3>Update Details</h3>
    <a href="{{ route('department.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    
@section('card_body')
<form action="{{ route('department.update', $department->id) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
            <div class="row">
                
                <div class="col-4">
                    <label>Department Title</label>
                    <input type="text" class="form-control" name="dept_title" placeholder="DEPARTMENT TITLE" value="{{ $department->dept_title }}">
                    @error('dept_title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                
                
            </div>
        </div>
        
        
        <input type="submit" class="btn btn-primary" >
   </form>

@endsection