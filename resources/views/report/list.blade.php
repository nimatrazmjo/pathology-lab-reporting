@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="content">
                <div class="page-header">All Patient Report</div>
                <table class="table table-responsive table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th> Name</th>
                            <th> Mail</th>
                            <th> Report Title</th>
                            <th> Test</th>
                            <th> Report Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($reports)
                            @for($i=0; $i< count($reports); $i++)
                                <?php $user = \Illuminate\Foundation\Auth\User::find($reports[$i]->user_id); ?>
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->mail}}</td>
                                    <td>{{$reports[$i]->title}}</td>
                                    <td>{{$reports[$i]->test}}</td>
                                    <td>{{$reports[$i]->description}}</td>
                                    <td>
                                        <a href="{{url('/user/'.$user->id)}}" class="btn btn-default">View Details</a>
                                        <a href="{{url('pdf/'.$user->id)}}" class="btn btn-default">Export to PDF</a>
                                    </td>
                                </tr>
                            @endfor
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection