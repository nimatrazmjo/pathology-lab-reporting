<div class="modal-dialog">
    <div class="modal-content section-content">
        {!! Form::open(['url'=>'/test/store']) !!}
        <header class="modal-header title">Test results of selected reports <button type="button" class="close has-ripple" data-dismiss="modal">×</button></header>
        <section class="modal-body">
            <div class="form-group">
                <label class="control-label"> Title </label>
                <p>
                    {{$report->title}}
                </p>
            </div>
            <pre style="font-weight: bold;text-align: center;font-size: 14px;">Add Test Result</pre>
            <table class="table table-responsive table-striped table-bordered">
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
            <div class="form-group">
                <label class="control-label"> Descrption </label>
                <p>
                    {{$report->description}}
                </p>
            </div>
        </section>
        <footer class="modal-footer">
            <input type="hidden" value="{{$report->id}}" name="report_id">
            <button type="submit" class="btn btn-success pull-right"> Save </button>
        </footer>
        {!! Form::close() !!}
    </div>
</div>