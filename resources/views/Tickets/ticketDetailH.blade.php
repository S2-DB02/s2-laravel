@extends('layouts.master')
@section('title')
    {{ $ticket->id }} | {{ $ticket->name }}
@endsection
@section('content')
   @if (session('error'))
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
          {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
<div class="content">

    <!-- In case of validation errors, they appear here -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form  action="/ticket/{{$ticket->id}}" method="POST">
    @method('PUT')
    @csrf

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-2">
                <a href="/ticket"><button type="button" class="btn btn-outline-dark">Back</button></a>
            </div>
        <div class="col-md-6 col-xs-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Ticket NR: {{$ticket->id}}
                      <input type="text" class="form-control" name="name" id="name"value="{{$ticket->name}}">
                    </h5>
                    <div class="form-group">
                      <label for="Priority">Priority</label>
                      <select class="form-control" name="priority" id="Priority">
                        <option value="1" @if ($ticket->priority == 1)
                            selected
                        @endif>Low</option>
                        <option value="2"@if ($ticket->priority == 2)
                            selected
                        @endif>Medium</option>
                        <option value="3"@if ($ticket->priority == 3)
                            selected
                        @endif>High</option>
                      </select>
                    </div>
                    <p class="font-weight-bold"> Status: {{--status--}}
                        <div class="form-group">
                          <label for="status">Status</label>
                          <select class="form-control" name="status" id="status">
                            <option value="1"@if ($ticket->status == 1)
                                selected
                            @endif>Not assigned</option>
                            <option value="2"@if ($ticket->status == 2)
                                selected
                            @endif>Active</option>
                            <option value="3"@if ($ticket->status == 3)
                                selected
                            @endif>Closed</option>
                          </select>
                        </div>
                    </p>
                    <div class="form-group">
                      <label for="type">Type</label>
                      <select class="form-control" name="type" id="type">
                        <option value="1"@if ($ticket->type == 1)
                            selected
                        @endif>Media</option>
                        <option value="2"@if ($ticket->type == 2)
                            selected
                        @endif>Lay-out</option>
                        <option value="3"@if ($ticket->type == 3)
                            selected
                        @endif>Translation</option>
                        <option value="4"@if ($ticket->type == 4)
                            selected
                        @endif>Markup</option>
                        <option value="5"@if ($ticket->type == 5)
                            selected
                        @endif>Other</option>
                      </select>
                    </div>
                    <p class="font-weight-bold">Assign to:
                        <select name="developer" id="department" class="form-control">
                            <option value=""> -- Select One --</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </p>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="form-group">
                    <label for="remark">Description</label>
                    <textarea class="form-control area " name="remark" id="remark" rows="15">{{$ticket->remark}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Information</h5>
                    <p  class="font-weight-bold">Reported by:
                        <a class="font-weight-normal" href="mailto:{{$ticket->find($ticket->id)->madeByUser->email}}">{{$ticket->find($ticket->id)->madeByUser->name}}</a>
                    </p>
                    <p  class="font-weight-bold">Created at:
                        <a class="font-weight-normal">{{$ticket->created_at}}</a>
                    </p>
                    <a href="{{$ticket->URL}}" target="_blank" class="btn btn-outline-info btn-sm">Page link</a>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Screenshot</h5>
                    <a href="{{$ticket->URL}}">
                        <img alt="Screenshot Ticket" class="img col-12" src="{{$ticket->photo}}">
                    </a>
                </div>
            </div>
        <button type="submit" class="btn btn-success float-right">Save</button>

        </div>

    </div>
</div>
</form>
@endsection
