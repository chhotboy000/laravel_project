@extends('layouts.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<link rel="stylesheet" href="/css/font-awesome.min.css">
<style>
  /* Custom CSS to make text less bold */
  .table td,
  .btn-info,
  .btn-danger {
      font-weight: normal; /* Set font-weight to normal for less bold text */
  }
</style>
<!-- Content in your HTML body -->
<div class="container my-5">
  <h1 class="mb-4">Medicine Category</h1>

  @if(session('status'))
  <div class="alert alert-success">
      {{ session('status') }}
  </div>
  @endif

  <!-- Table with Bootstrap classes and custom CSS class -->
  <div class="table-responsive">
      <table class="table table-hover" id="medi">
          <thead>
              <tr>
                <th >@sortablelink('id', 'ID')</th>
                <th >@sortablelink('name', 'Name')</th>
                <th>@sortablelink('quantity', 'quantity')</th>
                <th >@sortablelink('price', 'Price')</th>
                <th >@sortablelink('type', 'Type')</th>
                <th >@sortablelink('expire', 'expire')</th>
                <th >@sortablelink('Import', 'Import')</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach($medi as $med)
            <tr>
              <td>{{$med->id}}</td>
              <td>{{$med->name}}</td>
              <td>{{$med->quantity}}</td>
              <td>{{$med->price}}</td>
              <td>{{$med->type}}</td>
              <td>{{$med->expire}}</td>
              <td>{{$med->import}}</td>

              <td class="btn-group mt-3" role="group" aria-label="Basic example">
                <a class="btn btn-info" href='{{url("admin/pharma/edit/$med->id")}}' role="button">
                  <i class="bi bi-pencil-fill"></i> Edit
              </a>
              <a class="btn btn-danger" href='{{url("admin/pharma/delete/$med->id")}}' role="button">
                  <i class="bi bi-trash-fill"></i> Delete
              </a>
              </td>
            </tr>
            @endforeach
    </tbody>
  </table>{!! $medi->appends(\Request::except('page'))->render() !!}
</div>
@endsection