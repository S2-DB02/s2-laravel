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

<div class="container">

    <div class="row ml-1 mb-2">
        <a href="/ticket"><button type="button" class="btn btn-outline-dark">< Back</button></a>
    </div>

    <div class="row">

        <!-- Main card with screenshot -->
        <div class="col-md-12 col-xs-12 mb-3">
            <div class="card">
                <img src="{{$ticket->photo}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Ticket NR: {{$ticket->id}}</h5>
                    <form action="/ticket/{{$ticket->id}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            
                            <!-- Left column -->
                            <div class="col-md-6 col-xs-12">
                                
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="name" id="name"value="{{$ticket->name}}">
                                </div>
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
                                <div class="form-group">
                                    <label for="department">Assign to:</label>
                                    <select name="developer" id="department" class="form-control">
                                        <option value=""> -- Select One --</option>

                                        @foreach ($users as $user)
                                            @if ($user->user_role > 1)
                                                <option value="{{$user->id}}" @if ($ticket->developer != null && $user->id == $ticket->find($ticket->id)->developerUser->id)
                                                    selected
                                                @endif>{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Right column -->
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="remark">Description</label>
                                    <textarea class="form-control area " name="remark" id="remark" rows="15">{{$ticket->remark}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm float-right mt-auto">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Description card -->
        <!-- <div class="col-md-6 col-xs-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="remark" class="font-weight-bold">Description</label>
                        <textarea class="form-control area " name="remark" id="remark" rows="15">{{$ticket->remark}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm float-right">Save</button>
                </div>
            </div>
        </div> -->

        <!-- Information card -->
        <div class="col-md-6 col-xs-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Information</h5>
                    <p  class="font-weight-bold">Reported by:
                        <a class="font-weight-normal" href="mailto:{{$ticket->find($ticket->id)->madeByUser->email}}">{{$ticket->find($ticket->id)->madeByUser->name}}</a>
                    </p>
                    @if($ticket->developer != null)
                        <p><span class="font-weight-bold">Assigned to: </span>
                        <a class="font-weight-normal" href="mailto:{{$ticket->find($ticket->id)->developerUser->email}}">{{$ticket->find($ticket->id)->developerUser->name}}</a>
                    </p>
                    @else
                        <p><span class="font-weight-bold">Assigned to: </span> Not yet assigned</p>
                    @endif
                    <p  class="font-weight-bold">Created at:
                        <a class="font-weight-normal">{{$ticket->created_at}}</a>
                    </p>
                    <a href="{{urldecode(urldecode($ticket->URL))}}" target="_blank" class="btn btn-outline-info btn-sm">Page link</a>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteConfirm">
                        Delete
                    </button>

                </div>
            </div>
        </div>

        <!-- Screenshot card -->
        <!-- <div class="col-md-6 col-xs-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Screenshot</h5>
                    <a href="{{urldecode(urldecode($ticket->URL))}}">
                        <img alt="Screenshot Ticket" class="img col-12" src="{{$ticket->photo}}">
                    </a>
                </div>
            </div>
        </div> -->

        <!-- Comments card -->
        <div class="col-md-6 col-xs-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Comments</h5>
                    
                    @if ($comments->isEmpty())
                        <p>This ticket has no comments yet. Go ahead and add one!</p>
                    @else
                        @foreach ($comments as $item)
                            <p><span class="font-weight-bold">{{ $item->madeBy->name }}:</span> {{ $item->comment }}<br>{{$item->created_at}}</p>
                        @endforeach
                    @endif
                    
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="new-comment" class="font-weight-bold">Enter new comment</label>
                            <textarea class="form-control area " name="new-comment" id="new-comment" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm float-right" disabled>Send</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- Delete confirmation box -->
<div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmLabel">Delete ticket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>You are about to permanently delete this ticket. Are you certain this is what you would like to do?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
@endsection
