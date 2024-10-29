@extends('layouts.app')

@section('title','New Payroll')
    
@section('page_heading','New Payroll')
@section('card_header')
    <h3>Details</h3>
    <a href="{{ route('payrollsheet.index') }}" class="btn btn-danger">Back</a>
    
@endsection
    {{-- @dd($payProfile); --}}
@section('card_body')
   <form action="{{ route('payrollsheet.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <label>Employee</label>
                    <x-adminlte-select name="ps_pp_id">
                        <option class="d-none" value="">Select Employee ...</option>
                        @foreach($payProfile as $eprof)
                            <option value="{{ $eprof->id }}">{{ $eprof->pyrEmp->emp_id }} - {{ $eprof->pyrEmp->emp_fn }} {{ $eprof->pyrEmp->emp_mn }} {{ $eprof->pyrEmp->emp_ln }}</option>
                        @endforeach
                    </x-adminlte-select>
                </div>
                <div class="col-4">
                    @php
                    $config = [
                        'format' => 'YYYY-MM-DD',
                        
                    ];
                    @endphp
                    <x-adminlte-input-date name="ps_date_from" label="Date From" 
                        :config="$config" placeholder="Date From">
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
                        'format' => 'YYYY-MM-DD',
                        
                    ];
                    @endphp
                    <x-adminlte-input-date name="ps_date_to" label="Date To" 
                        :config="$config" placeholder="Date To">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                </div>
                
            </div>
        </div>
        
        
        <input type="submit" class="btn btn-primary" >
   </form>

@endsection