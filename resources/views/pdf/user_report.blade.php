<!DOCTYPE html>
<html lang="en">
<head>
    <?php header('Content-Type: charset=utf-8');

    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>User Reports</title>
        <style>
            table {
                width: 100%;
                background-color: #CCCCCC;
                border: 1px solid #f1f1f1;
            }
        </style>
</head>
<body>
    @if($user)
        <pre>
            <table style="width: 100%; background-color: #f1f1f1; border: 1px #CCCCCC;" class="table table-responsive table-striped table-bordered">
                <tr>
                    <th>Name:</th>
                    <td>{{$user->name}}</td>
                    <th>Email:</th>
                    <td>{{$user->email}}</td>
                    <th>Age</th>
                    <td>{{$user->age}}</td>
                    <th>Address</th>
                </tr>
                @if($report)
                    @foreach($report as $report)
                     <tr>
                         <th colspan="2">Title</th>
                         <td colspan="5">{{$report->title}}</td>
                     </tr>
                     <tr>
                         <td colspan="7">
                             <h2>Report Tests</h2>
                         </td>
                     </tr>
                     <?php
                            $report = \App\Models\UserReport::find($report->id);
                            $test = $report->tests;
                        ?>
                      @if($test)
                          @foreach($test as $test)
                              <tr>
                                  <td colspan="2">{{$test->test}}}</td>
                                  <td colspan="5">{{$test->pivot->result}}</td>
                              </tr>
                          @endforeach
                      @endif
                    @endforeach
                @endif
            </table>
        </pre>
    @endif
</body>
</html>