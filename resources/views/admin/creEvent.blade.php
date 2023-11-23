@extends('layouts.layout')
@section('title','event')
@section('eventform')
<style>
    .card{width:400px;background-color:#fff;border:none;border-radius: 12px}
    label.radio{cursor: pointer;width: 100%}
    label.radio input{position: absolute;top: 0;left: 0;visibility: hidden;pointer-events: none}
    label.radio span{padding: 7px 14px;border: 2px solid #eee;display: inline-block;color: #039be5;border-radius: 10px;width: 100%;height: 48px;line-height: 27px}
    label.radio input:checked+span{border-color: #039BE5;background-color: #81D4FA;color: #fff;border-radius: 9px;height: 48px;line-height: 27px}
    .form-control{margin-top: 10px;height: 48px;border: 2px solid #eee;border-radius: 10px}
    .form-control:focus{box-shadow: none;border: 2px solid #039BE5}
    .agree-text{font-size: 12px}.terms{font-size: 12px;text-decoration: none;color: #039BE5}
    .confirm-button{height: 50px;border-radius: 10px}
</style>

@endsection
@section('content')
    <form action="{{url('event/action')}}" method="post">
        @csrf
            <div class="container mt-5 mb-5 d-flex justify-content-center">
                <div class="card px-1 py-4">
                    <div class="card-body">
                        <h6 class="information mt-4">Please provide following information about new Event</h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Title" name="etitle"> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input class="form-control" type="date" placeholder="Day" name="eday"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input class="form-control" type="time" placeholder="Time" name="etime"> </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block confirm-button">Confirm</button>
                    </div>
                </div>
            </div>
    </form>
@endsection