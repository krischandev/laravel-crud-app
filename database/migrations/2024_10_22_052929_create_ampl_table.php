<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up():void
    {
        Schema::create('employees_department', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('dept_title',255);
            $table->timestamps();
            $table->softDeletes();
            
        });
        Schema::create('employees_position', function (Blueprint $table) {
           

            $table->bigIncrements('id');
            $table->string('pos_acronym',255);
            $table->string('pos_title',255);
            $table->unsignedBigInteger('pos_dept_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pos_dept_id')->references('id')->on('employees_department')->onDelete('cascade');
        });
        Schema::create('employees', function (Blueprint $table) {
           

            $table->bigIncrements('id');
            // $table->string('image')->nullable();
            $table->string('emp_id');
            $table->string('emp_fn',255);
            $table->string('emp_mn',255)->nullable();
            $table->string('emp_ln',255);
            $table->unsignedBigInteger('emp_pos_id')->unsigned();
            $table->string('emp_addr',255);
            $table->string('emp_cn',255);
            $table->boolean('emp_gender')->unsigned()->default(0);
            $table->date('emp_date_hired');
            $table->string('status');
            $table->boolean('isActive')->unsigned()->default(1);


            $table->timestamps();
            $table->softDeletes();

            $table->foreign('emp_pos_id')->references('id')->on('employees_position')->onDelete('cascade');
        });

        Schema::create('schedule_settings', function (Blueprint $table) {
           

            $table->bigIncrements('id');
            $table->string('ss_shift_title',255);
            $table->time('ss_time_from');
            $table->time('ss_time_to');
            $table->integer('ss_minutes');
            $table->boolean('isAvailable')->unsigned()->default(1);
            $table->timestamps();
            $table->softDeletes();
            
        });
        Schema::create('schedule_profile', function (Blueprint $table) {
           

            $table->bigIncrements('id');
            $table->unsignedBigInteger('sp_emp_id')->unsigned();
            $table->unsignedBigInteger('sp_ss_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('sp_emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('sp_ss_id')->references('id')->on('schedule_settings')->onDelete('cascade');
        });
        
        Schema::create('attendance_sheet', function (Blueprint $table) {
            

            $table->bigIncrements('id');
            $table->unsignedBigInteger('atd_emp_id')->unsigned();
            $table->date('atd_date');
            $table->time('atd_in');
            $table->time('atd_break_out');
            $table->time('atd_break_in');
            $table->time('atd_out');
            $table->integer('atd_ot');
            $table->integer('atd_late');
            $table->integer('atd_minutes');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('atd_emp_id')->references('sp_emp_id')->on('schedule_profile')->onDelete('cascade');
            
        });

        Schema::create('payroll_profile', function (Blueprint $table) {
          

            $table->bigIncrements('id');
            $table->unsignedBigInteger('pp_emp_id')->unsigned();
            $table->float('pp_dailyrate');
            $table->float('pp_allowance');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pp_emp_id')->references('id')->on('employees')->onDelete('cascade');
            
        });

        Schema::create('payroll_slip', function (Blueprint $table) {
           

            $table->bigIncrements('id');
            $table->unsignedBigInteger('ps_pp_id')->unsigned();
            $table->date('ps_date_from');
            $table->date('ps_date_to');
            $table->integer('ps_days');
            $table->float('ps_totdeduct');
            $table->float('ps_grosspay');
            $table->float('pas_netincome');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ps_pp_id')->references('id')->on('payroll_profile')->onDelete('cascade');
            
        });

        Schema::create('payroll_deductions', function (Blueprint $table) {
           

            $table->bigIncrements('id');
            $table->float('pd_sss');
            $table->integer('pd_pagibig');
            $table->integer('pd_philhealth');
            $table->integer('pd_others');
            $table->timestamps();
            $table->softDeletes();

            
        });
        

        
    }

    /**
     * Reverse the migrations.
     */
    public function down():void
    {
        Schema::dropIfExists('employees_department');
        Schema::dropIfExists('employees_position');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('schedule_settings');
        Schema::dropIfExists('schedule_profile');
        Schema::dropIfExists('attendance_sheet');
        Schema::dropIfExists('payroll_profile');
        Schema::dropIfExists('payroll_slip');
        Schema::dropIfExists('payroll_deductions');
    }
};
