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
                                <td>{{$user->name}}</td>
                                <td>{{$user->user_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{url('user/'.$user->id)}}" class="btn">View</a>
                                    <a href="#" class="btn">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbdoy>
                </table>
            </div>
            <div id="add-test" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content section-content">
                        <form action="#" class="form-horizontal">
                            <header class="modal-header modal-title title">
                                Add test for selected Report
                            </header>
                            <section class="modal-body">
                                <div class="form-group">
                                    <label for="test_title" class="control-label"> Test Title</label>
                                    <input type="text" id="test_title" name="test_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="test_result" class="control-label"> Test Result</label>
                                    <textarea name="test_result" id="test_result" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </section>
                            <footer class="modal-footer">
                                <input type="button" class="pull-right btn btn-default" value="Cancel">
                                <input type="button" class="pull-right btn btn-success" value="save">
                            </footer>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop