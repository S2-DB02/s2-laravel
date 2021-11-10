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

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Orders Table-->
        <div class="col-lg-8 pb-5">
            <div class="d-flex justify-content-end pb-3">
                <div class="form-inline">
                    <label class="text-muted mr-3" for="order-sort">Sort Tickets</label>
                    <select class="form-control" id="order-sort" onchange="fetchdData(this.value)">
                        <option value="tickets" hidden>Order by...</option>
                        <option value="tickets">Tickets</option>
                        <option value="PriorityDesc">Priority-Descending</option>
                        <option value="priorityAsc">Priority-Ascending</option>
                        <option value="status">Status</option>
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
                        <th class="text-center">Ticket</th>
                        <th class="text-center">Priority</th>
                        <th class="text-center">                         
                            <div class="btn-group">                         
                                <div class="dropdown">   
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Type</button>   
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">     
                                                 <a class="dropdown-item" href="#">Media</a>     
                                                 <a class="dropdown-item" href="#"> Layout</a>     
                                                 <a class="dropdown-item" href="#">Translation</a>     
                                                 <a class="dropdown-item" href="#">Markup</a>
                                                <a class="dropdown-item" href="#">Other</a>
                                            </div> 
                                        </div> 
                            </th>
                        <th class="text-center">
                        <div class="btn-group">                         
                                <div class="dropdown">   
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status</button>   
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">     
                                                 <a class="dropdown-item" href="#">Not Assigned</a>     
                                                 <a class="dropdown-item" href="#">Active</a>     
                                                 <a class="dropdown-item" href="#">Closed</a>     
                                            </div> 
                                        </div> 
                        </th>
                        <th class="text-center"><button style="border: none;" onclick="fetchdData(this.value)" value="dateCreated">Date Created</button></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ticket as $items)
                    <tr>

                        <td><a href="/ticket/{{$items->id}}">{{$items->id}} || {{$items->name}}</a></td>
                        @if($items->priority == 1 )
                        <td  class="badge badge-success d-flex justify-content-center">Low</td>
                        @elseif($items->priority == 2)
                            <td class="badge badge-warning d-flex justify-content-center">Medium</td>
                        @elseif($items->priority == 3)
                            <td class="badge badge-danger d-flex justify-content-center">High</td>
                        @endif
                        @if($items->type == 1 )
                            <td class="text-center"><i class="fas fa-hashtag"></i> Media</td>
                        @elseif($items->type == 2)
                            <td class="text-center"><i class="fas fa-brush"></i> Layout</td>
                        @elseif($items->type == 3)
                            <td class="text-center"><i class="fas fa-language"></i> Translation</td>
                        @elseif($items->type == 4)
                            <td class="text-center"><i class="fas fa-paint-brush"></i> Markup</td>
                        @elseif($items->type == 5)
                            <td class="text-center"><i class="far fa-question-circle"></i> Other</td>
                        @endif
                        @if($items->status == 1 )
                            <td class="badge badge-light d-flex justify-content-center">Not Assigned</td>
                        @elseif($items->status == 2)
                            <td class="badge badge-primary d-flex justify-content-center">Active</td>
                        @elseif($items->status == 3)
                            <td class="badge badge-dark d-flex justify-content-center">Closed</td>
                        @endif
                        <div></div>

                        <td class="text-center"><span>{{$items->created_at}}</span></td>

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
<script>
    function fetchdData($value){
        var url = new URL(location);

        if($value === "priorityAsc"){
        location.replace("ticket?order=priorityasc&page="+ url.searchParams.getAll('page'))
    }
    if($value === "PriorityDesc"){
        location.replace("ticket?order=prioritydesc&page="+ url.searchParams.getAll('page'))
    }
    if($value === "tickets"){
        location.replace("ticket?order=tickets&page="+ url.searchParams.getAll('page'))
    }
    if($value === "status"){
        location.replace("ticket?order=status&page="+ url.searchParams.getAll('page'))
    }
    if($value === "NotAssigned"){
            location.replace("ticket?order=NotAssigned&page="+ url.searchParams.getAll('page'))
    }
    if($value === "Active"){
        location.replace("ticket?order=Active&page="+ url.searchParams.getAll('page'))
    }
    if($value === "Closed"){
        location.replace("ticket?order=Closed&page="+ url.searchParams.getAll('page'))
    }
    if($value === "dateCreated"){
        location.replace("ticket?order=dateCreated&page="+ url.searchParams.getAll('page'))
    }}



</script>
@endsection
