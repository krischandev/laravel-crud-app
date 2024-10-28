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

@section('body')
<div class="login-box">
    <div class="login-logo">
        <div>
            <p id="clock12"></p>
          </div>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">USE YOUR RFID</p>
  
        <form action="/" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="TIME IN / TIME OUT">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-clock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">TIME IN</button>
              <button type="submit" class="btn btn-primary btn-block">TIME OUT</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
    
@stop


