@extends('layouts.master')
@section('title','Users dashboard')
@section('content')
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
                        <th>Role</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $items)               
                    <tr>
                        <form  action="/user/{{$items->id}}" method="POST">
                            @method('PUT') 
                            @csrf    
                            <td><a href="/user/{{$items->id}}">{{$items->name}}</a></td>
                            <td><a href="mailto:{{$items->email}}">{{$items->email}}</a></td>
                            <input type="hidden" class="form-control" name="hidden" value="{{$items->id}}">
                            <td>
                                <div class="form-group">
                                  <select class="form-control" name="UserRole">
                                    <option style="text-align: left " @if($items->user_role == 1 ) selected @endif  value="1">Reporter</option>
                                    <option style="text-align: left" @if($items->user_role == 2 )selected @endif value="2" >Developer</option>
                                    <option style="text-align: left" @if($items->user_role == 3 ) selected @endif value="3" >Super-Admin</option>
                                </select>
                                </div>
                            </td>
                            <td><input type="submit" class="btn btn-success" value="Edit"></td>
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

@endsection
