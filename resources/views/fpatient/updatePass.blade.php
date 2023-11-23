{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> TuTam Hospital Page </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Change Password</div>

                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

                      <form method="POST" action="{{ url('fpatient/postUpdatePass')}}">
                          @csrf

                          <div class="form-group">
                              <label for="current_password">Current Password</label>
                              <input type="password" name="current_password" id="current_password" class="form-control" required>
                            @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="form-group">
                              <label for="new_password">New Password</label>
                              <input type="password" name="new_password" id="new_password" class="form-control" required>
                            @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="form-group">
                              <label for="new_password_confirmation">Confirm Password</label>
                              <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                          </div>

                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html> --}}

@extends('layouts.app')
@section('content')
<div class="card">
  
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Password</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{url('fpatient/postUpdatePass')}}">
                        @csrf

                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" name="current_password" id="current_password" class="form-control" required>
                          @error('current_password')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control" required>
                          @error('new_password')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password_confirmation">Confirm Password</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection
