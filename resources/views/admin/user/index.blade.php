@extends('layouts.layout')
@section('content')
<style>
  /* styles.css */

/* Style the table */
.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #333;
    background-color: #fff;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

/* Style table hover effect */
.table-hover tbody tr:hover {
    background-color: #f5f5f5;
}

/* Style buttons */
.btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    background-color: #007bff;
    border: 1px solid #007bff;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
        border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn-info {
    color: #fff;
    background-color: #17a2b8;
    border-color: #17a2b8;
}

.btn-info:hover {
    background-color: #138496;
    border-color: #117a8b;
}

.btn-sm {
    font-size: 0.875rem;
}

/* Style alert */
.alert {
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}
</style>
<h1>Admin Category</h1>
<br>
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
    <table class="table table-hover mx-auto">
      <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Specialist</th>
        <th>Date In</th>
        <th>Date of Birth</th>
        <th>Salary</th>
        <th>Create At</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>
            @if($user->role == 1)
                    Admin
                @elseif($user->role == 2)
                    Doctor 
                @elseif($user->role == 3)
                    Nurse 
                @elseif($user->role == 4)
                    Receptionist 
                @elseif($user->role == 5)
                    Pharmacist 
                @endif
          </td>
          <td>{{$user->specialist}}</td>
          <td>{{$user->dateIn}}</td>
          <td>{{$user->dob}}</td>
          <td>{{$user->salary}}</td>
          <td>{{$user->created_at}}</td>
          <td>
            <a class="btn btn-info btn-sm" href='{{url("admin/user/edit/$user->id")}}'>
                <i class="fas fa-pencil-alt"></i> Edit
            </a>
            {{-- <a class="btn btn-danger btn-sm" href='{{url("admin/user/delete/$user->id")}}'>
                <i class="fas fa-trash"></i> Delete
            </a> --}}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection