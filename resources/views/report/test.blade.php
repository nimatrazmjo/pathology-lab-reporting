<div class="modal-dialog">
    <div class="modal-content section-content">
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
                <tr>
                    <td colspan="4"><pre>Test Result</pre></td>
                </tr>
                @if($test)
                    @foreach($test as $test)
                        <tr>
                            <td colspan="2">{{$test->test}}</td>
                            <td colspan="2">{{$test->pivot->result}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </section>
        <footer class="modal-foooter">
            <button class="btn btn-danget">CLose</button>
        </footer>
    </div>
</div>