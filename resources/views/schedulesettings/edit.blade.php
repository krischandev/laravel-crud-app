@extends('layouts.app')

@section('title','Edit Schedule')
    
@section('page_heading','Edit Schedule')
@section('card_header')
    <h3>Update Details</h3>
    <a href="{{ route('schedulesettings.index') }}" class="btn btn-danger">Back</a>
    
@endsection

@section('card_body')
<form action="{{ route('schedulesettings.update', $schedulesetting->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <div class="row">
            <div class="col-4">
                <label>Schedule Title</label>
                <input type="text" class="form-control" name="ss_shift_title" placeholder="Title" value="{{ $schedulesetting->ss_shift_title }}">
                @error('ss_shift_title')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-4">
                    @php
                    $config = [
                        'format' => 'HH:mm:ss',
                        
                    ];
                    @endphp
                    <x-adminlte-input-date name="ss_time_from" label="Schedule Time From" 
                        :config="$config" placeholder="Time From" value="{{ $schedulesetting->ss_time_from }}">
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
                <x-adminlte-input-date name="ss_time_to" label="Schedule Time To" 
                    :config="$config" placeholder="Time To" value="{{ $schedulesetting->ss_time_to }}">
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