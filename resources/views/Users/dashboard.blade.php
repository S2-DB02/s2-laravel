@extends('layouts.master')
@section('title','Users dashboard')
@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-n3">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="container">
    
            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Points</th>
                        <th>Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $items)               
                    <tr>
                        <form action="/user/{{$items->id}}" method="POST">
                            @method('PUT') 
                            @csrf    
                            <td>{{$items->name}}</td>
                            <td><a class="text-muted" href="mailto:{{$items->email}}">{{$items->email}}</a></td>
                            <td><input required type="number" class="form-control" name="points" value="{{$items->points}}" onchange="EnableDisable({{$items->id}})"></td>
                            <input type="hidden" class="form-control" name="hidden" value="{{$items->id}}">
                            <td>
                                <div class="form-group">
                                    <select class="form-control" name="UserRole" onchange="EnableDisable({{$items->id}})">
                                        <option style="text-align: left " @if($items->user_role == 1 ) selected @endif  value="1">Reporter</option>
                                        <option style="text-align: left" @if($items->user_role == 2 )selected @endif value="2" >Developer</option>
                                        <option style="text-align: left" @if($items->user_role == 3 ) selected @endif value="3" >Super-Admin</option>
                                    </select>
                                </div>
                            </td>
                            <td><input disabled type="submit" class="btn btn-success" value="Save" id="save{{$items->id}}"></td>
                        </form>
                        <form action="/user/{{$items->id}}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id" value="{{$items->id}}">
                            <td><input type="submit" class="btn btn-danger" value="Delete"></td>
                        </form>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $users->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    function EnableDisable(id)
    {
        const button = document.getElementById('save' + id);
        button.disabled = false;
    }
</script>
@endsection
