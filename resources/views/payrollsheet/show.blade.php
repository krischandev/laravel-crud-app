@extends('layouts.app')

@section('title','Payroll List')
    
@section('page_heading','')
{{-- @dd( $payrollsheet); --}}
@section('content')
<!-- Main content -->
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h4>
            <img src="{{ asset(config('adminlte.logo_img')) }}"
            alt="{{ config('adminlte.logo_img_alt') }}" height="40">  PEAK
          <small class="float-right">
            <b>Date Coverage: </b>{{  $payrollsheet->ps_date_from }} - {{  $payrollsheet->ps_date_to }}<br>
        </small>
        </h4>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <address>
            <b>Employee ID: </b>{{  $payrollsheet->pyrProfile->pyrEmp->emp_id }}<br>
            <b>Employee Name: </b>{{  $payrollsheet->pyrProfile->pyrEmp->emp_fn }} {{  $payrollsheet->pyrProfile->pyrEmp->emp_mn }} {{  $payrollsheet->pyrProfile->pyrEmp->emp_ln }}  <br>
            <b>Employee Position: </b>{{  $payrollsheet->pyrProfile->pyrEmp->empPos->pos_title }} - {{  $payrollsheet->pyrProfile->pyrEmp->status }}<br>
            <b>Employee Contact Number: </b>{{  $payrollsheet->pyrProfile->pyrEmp->emp_cn }}<br>
            <b>Employee Address: </b>{{  $payrollsheet->pyrProfile->pyrEmp->emp_addr }}<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
            <b>Daily Rate: </b>{{  number_format($payrollsheet->pyrProfile->pp_dailyrate,2) }} PHP<br>
            <b>Allowance: </b>{{  number_format($payrollsheet->pyrProfile->pp_allowance,2) }} PHP<br>
           
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
     
      <!-- /.col -->
      <div class="col-12">
        <p class="lead">Grosspay Income {{  number_format($payrollsheet->ps_grosspay,2) }} PHP</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:30%">DAYS:</th>
              <th></th>
              <th></th>
              <td>{{  $payrollsheet->ps_days }} DAYS</td>
            </tr>
            <tr>
              <th>DEDUCTIONS</th>
              <th style="width:20%">SSS</th>
              <td>{{  number_format(($payrollsheet->pyrProfile->pp_dailyrate*13)*($pyDeduct->pd_sss/100),2) }} PHP</td>
              <th ></th>
            </tr>
            <tr>
                <th></th>
                <th >PAGIBIG</th>
              <td>{{  number_format($pyDeduct->pd_pagibig,2) }} PHP</td>
              <th></th>
            </tr>
            <tr>
                <th></th>
                <th >PHILHEALTH</th>
              <td>{{  number_format($pyDeduct->pd_philhealth,2) }} PHP</td>
              <th></th>
            </tr>
            <tr>
                <th></th>
                <th >OTHERS</th>
              <td>{{  number_format($pyDeduct->pd_others,2) }} PHP</td>
              <th></th>
            </tr>
            <tr>
                <th>TOTAL DEDUCTIONS:</th>
                <th></th>
                <th></th>
                <td>{{  number_format($payrollsheet->ps_totdeduct,2) }} PHP</td>
              </tr>
              <tr>
                <th>NET INCOME:</th>
                <th></th>
                <th></th>
                <td style="font-size:35px;">{{  number_format($payrollsheet->ps_netincome,2) }} PHP</td>
              </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print float-right">
      <div class="col-12">
        <a href="javascript:if(window.print)window.print()" rel="noopener" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
        
      </div>
    </div>
</div>
  <!-- /.invoice -->

@endsection