@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="well">
               <table class="table table-striped table-responsive">
                   <tr>
                       <th >Full Name</th>
                       <td>{{$user->name}}</td>
                       <th>user Name</th>
                       <td>{{$user->user_name}}</td>
                   </tr>
                   <tr>
                       <th>Email</th>
                       <td>{{$user->email}}</td>
                       <th>Pass Code</th>
                       <td>{{$user->pass_code}}</td>
                   </tr>
                   <tr>
                       <th>sex</th>
                       <td>{{$user->status}}</td>
                       <th>Age</th>
                       <td>{{$user->age}}</td>
                   </tr>
               </table>
            </div>
        </div>

        <header class="title"> {{ $user->name  }} Reports</header>
        <a href="#" class="pull-right btn btn-default pull_right" data-toggle="modal" data-target="#add-modal"> Add Reports</a>
        <table class="table table-responsive table-striped table-bordered">
            <thead>
                <tr>
                    <th> Title </th>
                    <th> Details </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
            @if($user_reports)
                @foreach($user_reports as$report)
                <tr>
                    <td>
                        {{$report->title}}
                    </td>
                    <td>
                        {{ $report->description }}
                    </td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#view-tests" class="btn"> view tests</a>
                        <a href="#" data-toggle="modal" data-target="#add-test" class="btn">add test</a>
                    </td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div id="add-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content section-content">
                    <form action="#" class="form-horizontal">
                        <header class="modal-header title"> Add Report to {{ $user->name }}</header>
                        <section class="modal-body">
                            <div class="form-group">
                                <label for="title" class="control-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
                            </div>
                        </section>
                        <footer class="modal-footer">
                            <button type="button" class="btn btn-success pull-right"> save </button>
                        </footer>
                    </form>
                </div>
            </div>
        </div>
        <div id="view-tests" class="modal fade" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content section-content">
                    <header class="modal-header title">Test results of selected reports</header>
                    <section class="modal-body">
                        <table class="table table-responsive table-striped">
                            <thead>
                            <tr>
                                <th>Test Title</th>
                                <th>Test Result</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </section>
                    <footer class="modal-foooter">
                        <button class="btn btn-danget">CLose</button>
                    </footer>
                </div>
            </div>
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
@stop

@section('custom_script')

@stop