<div class="modal-dialog">
    <div class="modal-content section-content">
        {!! Form::open(['url'=>'/test/store']) !!}
        <header class="modal-header title">Test results of selected reports</header>
        <section class="modal-body">

            <table class="table table-responsive table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <td>{{$report->title}}</td>
                    <th>Descrption</th>
                    <td>{{$report->description}}</td>
                </tr>
                </thead>
                <tbody>
                @if($tests)
                    @foreach($tests as $test)
                        <tr>
                            <td colspan="2">{{$test->test}}</td>
                            <td colspan="2">
                                {!! Form::select('result['.$test->id.']',["",'Positive(+)' => 'Positive(+)','Negative(-)' => 'Negative(-)','Nill' => 'Nill'],$test->pivot->result,['class'=>'form-control']) !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </section>
        <footer class="modal-footer">
            <input type="hidden" value="{{$report->id}}" name="report_id">
            <button type="button" class="btn btn-danget pull-right">Cancel</button>
            <button type="submit" class="btn btn-success pull-right"> Save </button>
        </footer>
        {!! Form::close() !!}
    </div>
</div>