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
            <select class="form-control" id="order-sort" onchange="fetchdData(this.value)">
                <option value="tickets" hidden>Order by...</option>
                <option value="tickets">Title (alphabetically)</option>
                <option value="PriorityDesc">Priority-Acending</option>
                <option value="priorityAsc">Priority-Descending</option>
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
                    <th><button class="btn dropdown-toggle font-weight-bold" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ticket</button></th>
                    <th><button class="btn dropdown-toggle font-weight-bold" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Title</button></th>
                    <th>
                        <div class="btn-group">                         
                            <div class="dropdown">
                                <button class="btn dropdown-toggle font-weight-bold" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Priority</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">     
                                        <a class="dropdown-item" href="javascript:fetchdData('Low')">Low</a>
                                        <a class="dropdown-item" href="javascript:fetchdData('Medium')">Medium</a>
                                        <a class="dropdown-item" href="javascript:fetchdData('High')">High</a>                               
                                    </div>
                            </div>
                        </div>
                    </th>
                    <th>                         
                        <div class="btn-group">                         
                            <div class="dropdown">   
                                <button class="btn dropdown-toggle font-weight-bold" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Type</button>   
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">     
                                        <a class="dropdown-item" href="javascript:fetchdData('Media')">Media</a>
                                        <a class="dropdown-item" href="javascript:fetchdData('Layout')">Layout</a>
                                        <a class="dropdown-item" href="javascript:fetchdData('Translation')">Translation</a>
                                        <a class="dropdown-item" href="javascript:fetchdData('Markup')">Markup</a>
                                        <a class="dropdown-item" href="javascript:fetchdData('Other')">Other</a>
                                    </div>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="btn-group">                         
                            <div class="dropdown">   
                                <button class="btn dropdown-toggle font-weight-bold" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">     
                                        <a class="dropdown-item" href="javascript:fetchdData('NotAssigned')">Not Assigned</a>
                                        <a class="dropdown-item"  href="javascript:fetchdData('Active')">Active</a>
                                        <a class="dropdown-item" href="javascript:fetchdData('Closed')">Closed</a>
                                    </div> 
                            </div>
                        </div>
                    </th>
                    <th><button class="btn font-weight-bold" onclick="fetchdData(this.value)" value="dateCreated">Date Created</button></th>

                </tr>
            </thead>

            <tbody>
            @foreach($ticket as $items)
                <tr>
                    <td><a href="/ticket/{{$items->id}}">{{$items->id}}</a></td>
                    <td><a href="/ticket/{{$items->id}}">{{$items->name}}</a></td>
                    @if($items->priority == 1 )
                    <td><i class="fas fa-square" style="color: green;"></i> Low</td>
                    @elseif($items->priority == 2)
                        <td><i class="fas fa-square" style="color: orange;"></i> Medium</td>
                    @elseif($items->priority == 3)
                        <td><i class="fas fa-square" style="color: red;"></i> High</td>
                    @endif
                    @if($items->type == 1 )
                        <td><i class="fas fa-photo-video"></i> Media</td>
                    @elseif($items->type == 2)
                        <td><i class="fas fa-brush"></i> Layout</td>
                    @elseif($items->type == 3)
                        <td><i class="fas fa-language"></i> Translation</td>
                    @elseif($items->type == 4)
                        <td><i class="fas fa-paint-brush"></i> Markup</td>
                    @elseif($items->type == 5)
                        <td><i class="far fa-question-circle"></i> Other</td>
                    @endif
                    @if($items->status == 1 )
                        <td><i class="fas fa-eye-slash" style="color: orange;"></i> Not Assigned</td>
                    @elseif($items->status == 2)
                        <td><i class="fas fa-hourglass-half" style="color: #007bff;"></i> Active</td>
                    @elseif($items->status == 3)
                        <td><i class="fas fa-check" style="color: green;"></i> Closed</td>
                    @endif
                    <div></div>

                    <td><span>{{$items->created_at}}</span></td>

                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{ $ticket->links() }}

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
    if($value === "Priority"){
        location.replace("ticket?order=Priority&page="+ url.searchParams.getAll('page'))
    }
    if($value === "Low"){
        location.replace("ticket?order=Low&page="+ url.searchParams.getAll('page'))
    }
    if($value === "Medium"){
        location.replace("ticket?order=Medium&page="+ url.searchParams.getAll('page'))
    }
    if($value === "High"){
        location.replace("ticket?order=High&page="+ url.searchParams.getAll('page'))
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
    }
    if($value === "Media"){
        location.replace("ticket?order=Media&page="+ url.searchParams.getAll('page'))
    }
    if($value === "Layout"){
        location.replace("ticket?order=Layout&page="+ url.searchParams.getAll('page'))
    }
    if($value === "Translation"){
        location.replace("ticket?order=Translation&page="+ url.searchParams.getAll('page'))
    }
    if($value === "Markup"){
        location.replace("ticket?order=Markup&page="+ url.searchParams.getAll('page'))
    }
    if($value === "Other"){
        location.replace("ticket?order=Other&page="+ url.searchParams.getAll('page'))
    }}  

</script>
@endsection
