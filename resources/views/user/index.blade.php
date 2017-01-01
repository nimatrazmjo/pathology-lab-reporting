@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-body">
                <a href="{{url('user/create')}}" class="btn btn-default"> Add New User</a>
                <table class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbdoy>
                        @if($user)
                            @foreach($user as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->user_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{url('user/'.$user->id)}}" class="btn">Edit</a>
                                    <a href="#" class="btn">View</a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbdoy>
                </table>
            </div>
        </div>
    </div>
@stop