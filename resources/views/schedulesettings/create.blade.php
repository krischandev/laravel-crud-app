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
                <div class="col-4">
                        @php
                        $config = [
                            'format' => 'HH:mm:ss',
                            
                        ];
                        @endphp
                        <x-adminlte-input-date name="ss_time_from" label="Schedule Time From" 
                            :config="$config" placeholder="Time From">
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
                        :config="$config" placeholder="Time To">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>

                    {{-- @dd($finishTime->diff($startTime)->format('%H:%I:%S')); --}}
            </div>
                
            </div>
        </div>
        
        
        <input type="submit" class="btn btn-primary" >
   </form>

@endsection