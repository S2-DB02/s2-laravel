<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserveringen</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/teststyle.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="font-family: Arial">
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
<div class="content">
    <header>
        {{--<a href="/history"> <h2>Laatste bestellingen</h2></a>--}}
        {{--<a href="{{url('create')}}"> <h2>Add Task</h2></a>--}}
        <h1>Open tickets</h1>
    </header>



    {{--<table>--}}
    {{--<tr>--}}
    {{--@foreach($tasks as $task)--}}
    {{--<a style="text-decoration: none" href="{{ route('task', $task->id) }}">{{$task->task}}</a>: {{$task->date}}--}}
    {{--@endforeach--}}
    {{--</tr>--}}
    {{--</table>--}}

    <table>
        <tr>

            <th>ticket</th>
            <th>Priority</th>
            <th>Status</th>

            <th>Developer</th>
            <th>Description</th>
            <th>Type</th>
            <th>date_created</th>
            <th>complete</th>
        </tr>
            <tr>
                <td style="text-align: center"><p><b>{{$ticket->name}}</b></p></td>
                {{--priority--}}

                @if($ticket->priority == 1 )
                    <td style="text-align: center">Low</td>
                @elseif($ticket->priority == 2)
                    <td style="text-align: center">Medium</td>
                @elseif($ticket->priority == 3)
                    <td style="text-align: center">High</td>
                @endif

                {{--status--}}

                @if($ticket->status == 1 )
                    <td style="text-align: center">Not assigned</td>
                @elseif($ticket->status == 2)
                    <td style="text-align: center">Active</td>
                @elseif($ticket->status == 3)
                    <td style="text-align: center">Closed</td>
                @endif

                <td style="text-align: center">{{$ticket->find($ticket->id)->user->name}}</td>
                <td style="text-align: center">{{$ticket->remark}}</td>

                {{--type--}}

                @if($ticket->type == 1 )
                    <td style="text-align: center">Bug</td>
                @elseif($ticket->type == 2)
                    <td style="text-align: center">Task</td>
                @elseif($ticket->type == 3)
                    <td style="text-align: center">Improvement</td>
                @elseif($ticket->type == 4)
                    <td style="text-align: center">Media</td>
                @elseif($ticket->type == 5)
                    <td style="text-align: center">Other</td>
                @endif
                <td style="text-align: center">{{$ticket->created_at}}</td>
                {{--<td class="edit_button"><a href="{{url('/task/'.$ticket->id.'/delete')}}">Geserveerd</a></td>--}}
                <td style="text-align: center"> <a href="{{url('/task/'.$ticket->id.'/details')}}"><button class="btn btn-primary">Afronden</button></a></td>
            </tr>
    </table>
</div>
<script>

    var RootUrl = '@Url.Content("~/")';
    function fetchdata(){
        $.ajax({
            url: 'index',
            type: 'get',
            success: function(response){
                location.reload();
                // Perform operation on the return value
            }
        });
    }

    $(document).ready(function(){
        setInterval(fetchdata,10000);
    });
</script>
</body>
</html>