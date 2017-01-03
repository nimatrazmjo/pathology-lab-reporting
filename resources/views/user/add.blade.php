<div class="modal-dialog">
    <div class="modal-content section-content">
        {!! Form::open(['route' => 'user.store']) !!}
        <header class="modal-header title">Test results of selected reports</header>
        <section class="modal-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="roles" class="control-label">User Type<span class="required-label">*</span></label>
                {{ Form::select('role',$role,2,["class"=>'form-control','required' => 'required']) }}
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
                <textarea name="address" id="address" cols="30" rows="6" class="form-control" required> </textarea>
            </div>
            <footer class="modal-footer">
                <button type="button" class="btn btn-danget pull-right">Cancel</button>
                <input type="submit" class="pull-right btn btn-success" value="save">
            </footer>
        </section>
        {!! Form::close() !!}
    </div>
</div>