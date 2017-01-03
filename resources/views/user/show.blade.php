@extends('master')

@section('custom_style')
    <link rel="stylesheet" href="{{asset('css/multi-select.css')}}">
@endsection
@section('content')
    <div class="content">
        <div class="page-header">
            <h4>{{$user->name}} Details</h4></span>
        </div>
        <pre>
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
        </pre>
        <span class="pull-left">
                <h4> {{ $user->name  }} Reports</h4>
        </span>
        <span class="pull-right">
            <a href="#" class="pull-right btn btn-default" data-toggle="modal" data-target="#add-modal"> Add Reports</a>
            <a href="{{url('/pdf/'.$user->id)}}" class="btn btn-default"> Export to PDF</a>
        </span>
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
                        <a href="#" class="btn viewTest" report_id="{{$report->id}}"> view tests</a>
                        <a href="#" class="btn addTest" report_id="{{$report->id}}">add test Result</a>
                    </td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div id="add-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content section-content">
                    {!! Form::open(['route'=>'report.store','class'=>'form-horizontal']) !!}
                        <header class="modal-header title"> Add Report to {{ $user->name }}</header>
                        <section class="modal-body">
                            <div class="form-group">
                                <label for="title" class="control-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>
                            <div class="form-group">
                                <label for="test" class="control-label">Test</label>
                                {!! Form::select("test[]",$test,null,['class' => 'form-control multi_select','multiple' => 'multiple','required']) !!}
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
                            </div>
                        </section>
                        <footer class="modal-footer">
                            <input type="hidden" value="{{$user->id}}" name="user_id" id="user_id">
                            <button type="submit" class="btn btn-success pull-right"> Save </button>
                        </footer>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div id="view-tests" class="modal fade" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">

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
    <script src="{{ asset('javascript/jquery.multi-select.js')  }}"></script>
    <script>
        $('.multi_select').multiSelect();

        $(".viewTest").on('click', function(){
            var reportid = $(this).attr('report_id');
            $.ajax({
                url: '{{url('report')}}/'+reportid+'/test',
                type: 'get',
                success: function (response) {
                    $("#view-tests").html(response);
                    $('#view-tests').modal('show');
                }
            });
        });
        $(".addTest").on('click', function(){
            var reportid = $(this).attr('report_id');
            $.ajax({
                url: '{{url('test')}}/'+reportid+'/create',
                type: 'get',
                success: function (response) {
                    $("#view-tests").html(response);
                    $('#view-tests').modal('show');
                }
            });
        });
    </script>
@stop