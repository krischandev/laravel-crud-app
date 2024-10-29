@extends('adminlte::master')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop

@push('js')
        <script>
         const clock12 = document.getElementById('clock12')

// Concatenate a zero to the left of every single digit time frame
function concatZero(timeFrame) {
  return timeFrame < 10 ? '0'.concat(timeFrame) : timeFrame
}
function realTime() {
  let date = new Date()
  let sec = date.getSeconds()
  let mon = date.getMinutes()
  let hr = date.getHours()
  // 12 hour time
  // If the hour equals 0 or 12, the remainder equals 0, so output 12 instead. (0 || 12 = 12)
  clock12.textContent = `${concatZero((hr % 12) || 12)} : ${concatZero(mon)} : ${concatZero(sec)} ${hr >= 12 ? 'PM' : 'AM'}`
  // 24 hour time
}
setInterval(realTime, 1000)
        </script>
        @endpush
        
{{-- @dd($timeCardEmp); --}}
@section('body')


<form action="{{ route('timecard.store') }}" method="POST">
  @csrf
            <div class="login-box">
                <div class="login-logo">
                  <img src="{{ asset(config('adminlte.logo_img')) }}"
                         alt="{{ config('adminlte.logo_img_alt') }}" height="100">
                    <div>
                      @php
                      $currentDate = date('l, F j, Y'); echo $currentDate;
                      @endphp
                        <p id="clock12" style="font-size: 45px;"></p>
                        
                      </div>
                </div>
                <!-- /.login-logo -->
                <div class="card">
                  <div class="card-body login-card-body">
                    <p class="login-box-msg">USE YOUR EMPLOYEE ID</p>
                    <div class="col-lg-12">
                      <!-- select -->
                      <div class="form-group">
                        <select class="form-control" name="optAttendance">
                            <option value="Time IN">TIME IN</option>
                            <option value="Break OUT">BREAK OUT</option>
                            <option value="Break IN">BREAK IN</option>
                            <option value="Time OUT">TIME OUT</option>
                        </select>
                      </div>
                    </div>
                    <form action="/" method="post">
                      <div class="input-group mb-3">
                        
                        <input type="text" class="form-control" placeholder="EMPLOYEE ID" name="emp_id">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-clock"></span>
                            
                          </div>
                        </div>

                      </div>
                      @error('emp_id')<span class="text-danger">{{ $message }}</span>@enderror

                      <div class="row">
                        
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary btn-block" >LOG</button>
                          
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>
              
                    
                  </div>
                  <!-- /.login-card-body -->
                </div>
              </div>
</form>
@stop
@session('status')
        
          @push('js')
          <script>
          const Toast = Swal.mixin({
                  toast: true,
                  position: "top-end",
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                  }
                });
                Toast.fire({
                  icon: "success",
                  title: "{{ session('status') }}"
                });      
          </script>
          
          @endpush
        
    @endsession

    @session('error')
        
          @push('js')
          <script>
          const Toast = Swal.mixin({
                  toast: true,
                  position: "top-end",
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                  }
                });
                Toast.fire({
                  icon: "error",
                  title: "{{ session('error') }}"
                });      
          </script>
          
          @endpush
        
    @endsession
    
@section('adminlte_js')
    @stack('js')
    @yield('js')
    
@stop


