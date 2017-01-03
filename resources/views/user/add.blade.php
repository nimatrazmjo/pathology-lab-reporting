@extends('master')

@section('content')
    <div class="row">
        <div class="page-header"> <h4>Add New Patient</h4></div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open(['route' => 'user.store']) !!}
        <div class="content col-md-4">
            <div class="form-group">
                <label for="role_id" class="control-label">User Type<span class="required-label">*</span></label>
                {!!  Form::select('role_id',$role,2,["class"=>'form-control','required' => 'required','disabled','id'=>'role_id']) !!}
            </div>
            <div class="form-group">
                <label for="name" class="control-label">Full Name<span class="required-label">*</span></label>
                <input type="text" class="form-control" value="" id="name" name="name" required>

            </div>
            <div class="form-group">
                <label for="user_name" class="control-label">User Name <span class="required-label">*</span></label>
                <input type="text" class="form-control" value="" id="user_name" name="user_name" required>
            </div>
            <div class="form-group">
                <label for="email" class="control-label">Email <span class="required-label">*</span></label>
                <input type="text" class="form-control" value="" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Password <span class="required-label">*</span></label>
                <input type="password" class="form-control" value="" id="password" name="password" required>
            </div>

        </div>
        <div class="content col-md-4">
            <div class="form-group">
                <label for="age" class="control-label">Age <span class="required-label">*</span></label>
                <input type="text" class="form-control" value="" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="sex" class="control-label">sex <span class="required-label">*</span></label>
                <input type="text" class="form-control" value="" id="sex" name="sex" required>
            </div>
            <div class="form-group">
                <label for="address" class="control-label">Address <span class="required-label">*</span></label>
                <textarea name="address" id="address" cols="30" rows="8" class="form-control" required> </textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="pull-right btn btn-success" value="save">
            </div>

        </div>
            {!! Form::close() !!}

    </div>
@stop