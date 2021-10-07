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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/teststyles.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="font-family: Arial">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Orders Table-->
        <div class="col-lg-8 pb-5">
            <div class="d-flex justify-content-end pb-3">
                <div class="form-inline">
                    <label class="text-muted mr-3" for="order-sort">Sort Orders</label>
                    <select class="form-control" id="order-sort">
                        <option>Tickets</option>
                        <option>Priority - Ascending</option>
                        <option>Status</option>
                        <option>Delayed</option>
                        <option>Canceled</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $ticket->links() }}

            </div>

            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>Ticket</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Prioriteit</th>
                        <th>Datum aangemaakt</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ticket as $items)
                    <tr>

                        <td><a class="navi-link" href="{{url('/ticket/'.$items->id)}}" data-toggle="modal">{{$items->name}}</a></td>
                        <td><span>{{$items->type}}</span></td>

                        <td>{{$items->status}}</td>
                        @if($items->priority == 1 )
                            <td><span class="badge badge-success m-0">Low</span></td>
                        @elseif($items->priority == 2)
                            <td><span class="badge badge-warning m-0">Medium</span></td>
                        @elseif($items->priority == 3)
                            <td><span class="badge badge-danger m-0">High</span></td>
                        @endif
                        <td><span>{{$items->created_at}}</span></td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $ticket->links() }}
    
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
