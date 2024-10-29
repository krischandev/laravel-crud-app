@extends('layouts.app')

@section('title','Time Card')
    
@section('page_heading','Time Card')
@section('card_header')
    <h3>Details</h3>
    <a href="{{ route('attendancesheet.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    
@section('card_body')
   <form action="{{ route('attendancesheet.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <label>Employee</label>
                    <x-adminlte-select name="atd_emp_id">
                        <option class="d-none" value="">Select Employee ...</option>
                        @foreach($employee as $emp)
                            <option value="{{ $emp->schedEmp->id }}">{{ $emp->schedEmp->emp_id }} - {{ $emp->schedEmp->emp_fn }} {{ $emp->schedEmp->emp_mn }} {{ $emp->schedEmp->emp_ln }} | {{ $emp->schedSet->ss_shift_title }} [{{ $emp->schedSet->ss_time_from }} - {{ $emp->schedSet->ss_time_to }}]</option>
                        @endforeach
                    </x-adminlte-select>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    @php
                    $config = [
                        'format' => 'YYYY-MM-DD',
                        
                    ];
                    @endphp
                    <x-adminlte-input-date name="atd_date" label="Date" 
                        :config="$config" placeholder="Time To">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                </div>
                <div class="col-3">
                    @php
                    $config = [
                        'format' => 'HH:mm:ss',
                        
                    ];
                    @endphp
                    <x-adminlte-input-date name="atd_in" label="Time IN" 
                        :config="$config" placeholder="Time IN">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                </div>
                <div class="col-3">
                    @php
                    $config = [
                        'format' => 'HH:mm:ss',
                        
                    ];
                    @endphp
                    <x-adminlte-input-date name="atd_out" label="Time OUT" 
                        :config="$config" placeholder="Time OUT">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                </div>

                <div class="col-3">
                    <label>Overtime *in Minutes</label>
                    <input type="text" class="form-control" name="atd_ot" placeholder="OT">
                    @error('atd_ot')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                {{-- <div class="col-3">
                    <label>LATE *in Minutes</label>
                    <input type="text" class="form-control" name="atd_late" placeholder="LATE">
                    @error('atd_late')<span class="text-danger">{{ $message }}</span>@enderror
                </div> --}}
                {{-- <div class="col-4">
                    @php
                    $config = [
                        'format' => 'HH:mm:ss',
                        
                    ];
                    @endphp
                    <x-adminlte-input-date name="atd_break_out" label="Break OUT" 
                        :config="$config" placeholder="Break OUT">
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
                        :config="$config" placeholder="Break IN">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                </div> --}}
                
            </div>
        </div>
        
        
        <input type="submit" class="btn btn-primary" >
   </form>

@endsection