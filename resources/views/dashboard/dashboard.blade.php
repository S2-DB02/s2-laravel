{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--<meta charset="UTF-8">--}}
{{--<meta name="viewport"--}}
{{--content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--<link rel="stylesheet" href="../../public/css/app.css">--}}
{{--<title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<form action=""method="post" >--}}
{{--@csrf--}}
{{--<input type="text" name="name" placeholder="Name">--}}
{{--<input type="number" name="price" placeholder="Price">--}}
{{--<input type="number" name="category_id" placeholder="Category">--}}
{{--<input type="number" name="quantity" placeholder="Quantity">--}}
{{--<input type="submit" name="submit" value="Verstuur" >--}}
{{--</form>--}}
{{--</body>--}}
{{--</html>--}}
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserveringen</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
        @foreach($ticket as $items)
                <tr>
                    <td style="text-align: center"><p><b>{{$items->name}}</b></p></td>
                    {{--priority--}}

                    @if($items->priority == 1 )
                        <td style="text-align: center">Low</td>
                    @elseif($items->priority == 2)
                        <td style="text-align: center">Medium</td>
                    @elseif($items->priority == 3)
                        <td style="text-align: center">High</td>
                    @endif

                    {{--status--}}

                    @if($items->status == 1 )
                        <td style="text-align: center">Not assigned</td>
                    @elseif($items->status == 2)
                        <td style="text-align: center">Active</td>
                    @elseif($items->status == 3)
                        <td style="text-align: center">Closed</td>
                    @endif

                    <td style="text-align: center">{{$items->find($items->id)->user->name}}</td>
                    <td style="text-align: center">{{$items->remark}}</td>

                    {{--type--}}

                    @if($items->type == 1 )
                        <td style="text-align: center">Bug</td>
                    @elseif($items->type == 2)
                        <td style="text-align: center">Task</td>
                    @elseif($items->type == 3)
                        <td style="text-align: center">Improvement</td>
                    @endif
                    <td style="text-align: center">{{$items->created_at}}</td>
                    {{--<td class="edit_button"><a href="{{url('/task/'.$items->id.'/delete')}}">Geserveerd</a></td>--}}
                    <td style="text-align: center"> <a href="{{url('/task/'.$items->id.'/delete')}}"><button class="btn btn-primary">Afronden</button></a></td>
                </tr>

        @endforeach
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