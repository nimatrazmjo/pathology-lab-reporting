@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('user/store')}}" method="post" class="form-horizontal">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="full_name" class="control-label">Full Name</label>
                    <input type="text" class="form-control" value="{{$user->full_name}}" id="full_name" name="full_name">
                </div>
                <div class="form-group">
                    <label for="user_name" class="control-label">User Name</label>
                    <input type="text" class="form-control" value="{{$user->user_name}}" id="user_name" name="user_name">
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="text" class="form-control" value="{{$user->email}}" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="pass_code" class="control-label">Pass Code</label>
                    <input type="text" class="form-control" value="{{$user->pass_code}}" id="pass_code" name="pass_code">
                </div>
                <div class="form-group">
                    <label for="age" class="control-label">Age</label>
                    <input type="text" class="form-control" value="{{$user->age}}" id="age" name="age">
                </div>
                <div class="form-group">
                    <label for="sex" class="control-label">sex</label>
                    <input type="text" class="form-control" value="{{$user->age}}" id="sex" name="sex">
                </div>
                <div class="form-group">
                    <label for="address" class="control-label">Address</label>
                    <textarea name="address" id="address" cols="30" rows="6" class="form-control">{{$user->address}} </textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="pull-right btn btn-success" value="save">
                </div>
            </form>
        </div>
    </div>
@stop