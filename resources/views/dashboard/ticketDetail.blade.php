<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$ticket->name}} | {{$ticket->id}}</title>
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
        </br>
        <h1>Open tickets</h1>
    </header>



    {{--<table>--}}
    {{--<tr>--}}
    {{--@foreach($tasks as $task)--}}
    {{--<a style="text-decoration: none" href="{{ route('task', $task->id) }}">{{$task->task}}</a>: {{$task->date}}--}}
    {{--@endforeach--}}
    {{--</tr>--}}
    {{--</table>--}}


</br>
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-3">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title font-weight-bold"">{{$ticket->id}} | {{$ticket->name}}</h5>
            <p class="font-weight-bold"> Priority: {{--priority--}}

                @if($ticket->priority == 1 )
                    <a class="font-weight-normal badge badge-pill badge-success">Low</a>
                @elseif($ticket->priority == 2)
                    <a class="font-weight-normal badge badge-pill badge-warning">Medium</a>
                @elseif($ticket->priority == 3)
                    <a class="font-weight-normal badge badge-pill badge-danger">High</a>
                @endif
            </p>
            <p class="font-weight-bold"> Status: {{--status--}}

                @if($ticket->status == 1 )
                    <a class="font-weight-normal badge badge-pill badge-secondary">Not assigned</a>
                @elseif($ticket->status == 2)
                    <a class="font-weight-normal badge badge-pill badge-warning">Active</a>
                @elseif($ticket->status == 3)
                    <a class="font-weight-normal badge badge-pill badge-closed">Closed</a>
                @endif
            </p>
            <p class="font-weight-bold"> Type: {{--type--}}

            @if($ticket->type == 1 )
                <a class="font-weight-normal">Bug</a>
            @elseif($ticket->type == 2)
                <a class="font-weight-normal">Task</a>
            @elseif($ticket->type == 3)
                <a class="font-weight-normal">Improvement</a>
            @elseif($ticket->type == 4)
                <a class="font-weight-normal">Media</a>
            @elseif($ticket->type == 5)
                <a class="font-weight-normal">Other</a>
            @endif
            <p class="font-weight-bold">Assigned to: 
                <a class="font-weight-normal">{{$ticket->find($ticket->id)->developer->name ?? 'Unknown'}}</a>
            </p>
            
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title font-weight-bold">Description</h5>
            <p class="card-text">{{$ticket->remark}}</p>
        </div>
        </div>
    </div>
    </div>
</div>
</br>
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-3">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title font-weight-bold"">Information</h5>
            <p  class="font-weight-bold">Reported by: 
                <a class="font-weight-normal" href="mailto:{{$ticket->find($ticket->id)->madeByUser->email}}">{{$ticket->find($ticket->id)->madeByUser->name}}</a>
            </p>
            <p  class="font-weight-bold">Created at:
                <a class="font-weight-normal">{{$ticket->created_at}}</a>
            </p>
            <a href="{{$ticket->URL}}" target="_blank" class="btn btn-outline-info btn-sm">Page link</a>
            
        </div>
        </div>
    </br>
        <a href="{{url('/task/'.$ticket->id.'/details')}}"><button class="btn btn-primary">Afronden</button></a>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title font-weight-bold">Screenshot</h5>
            <a href="{{$ticket->URL}}">
                <img alt="Screenshot Ticket" src="{{$ticket->photo}}">
             </a>
        </div>
        </div>
    </div>
    </div>
    
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