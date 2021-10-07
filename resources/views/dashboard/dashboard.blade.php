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
@extends('layouts.master')
@section('title','Home')
@section('content')
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
                        @if($items->type == 1 )
                            <td style="text-align: center">Media</td>
                        @elseif($items->type == 2)
                            <td style="text-align: center">Layout</td>
                        @elseif($items->type == 3)
                            <td style="text-align: center">Translation</td>
                        @elseif($items->type == 4)
                            <td style="text-align: center">Markup</td>
                        @elseif($items->type == 5)
                            <td style="text-align: center">Other</td>
                        @endif
                        @if($items->status == 1 )
                            <td style="text-align: center"><span class="badge badge-light m-0">Not Assigned</span></td>
                        @elseif($items->status == 2)
                            <td style="text-align: center"><span class="badge badge-primary m-0">Active</span></td>
                        @elseif($items->status == 3)
                            <td style="text-align: center"><span class="badge badge-dark m-0">Closed</span></td>
                        @endif

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
@endsection
