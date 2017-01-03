<div class="modal-dialog">
    <div class="modal-content section-content">
        <header class="modal-header title">Test results of selected reports <button type="button" class="close has-ripple" data-dismiss="modal">×</button></header>
        <section class="modal-body">
            <div class="form-group">
                <label class="control-label"> Title </label>
                <p>
                    {{$report->title}}
                </p>
            </div>
            <pre style="font-weight: bold;text-align: center;font-size: 14px;">Test Result</pre>
            <table class="table table-responsive table-striped table-bordered">
                <tbody>
                @if($test)
                    @foreach($test as $test)
                        <tr>
                            <th colspan="2">{{$test->test}}</th>
                            <td colspan="2">{{$test->pivot->result}}</td>
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
    </div>
</div>