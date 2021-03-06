@extends('layouts.master')
@section('title')
    {{ $ticket->id }} | {{ $ticket->name }}
@endsection
@section('content')
   @if (session('error'))
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show mt-n3" role="alert">
          {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-n3">
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

    <div class="row">

        <!-- Ticket content card -->
        <div class="col-md-12 col-xs-12 mb-3">
            <div class="card">
                <div class="card-body">

                    <div class="row m-0 mb-2 align-items-center">
                        <a href="/ticket"><button type="button" class="btn btn-outline-dark fas fa-arrow-left"></button></a>
                        <h5 class="card-title font-weight-bold ml-3 mb-0">Ticket NR: {{$ticket->id}}</h5>
                    </div>
                    {{-- @dd($ticket) --}}
                    <form action="/ticket/{{$ticket->id}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            
                            <!-- Left column -->
                            <div class="d-flex flex-column col-md-6 col-xs-12 justify-content-between">
                                
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">Title</label>
                                    <input type="text" class="form-control" name="name" id="name"value="{{$ticket->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="Priority" class="font-weight-bold">Priority</label>
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
                                    <label for="status" class="font-weight-bold">Status</label>
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
                                    <label for="type" class="font-weight-bold">Type</label>
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
                                    <label for="department" class="font-weight-bold">Assign to:</label>
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
                                    <label for="remark" class="font-weight-bold">Description</label>
                                    <textarea class="form-control area" name="remark" id="remark" rows="15">{{$ticket->remark}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end m-0">
                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Screenshot card -->
        {{--<div class="col-12 mb-3">--}}
            {{--<div class="card">--}}
                {{--<div clas="card-body">--}}
                   {{--<a href="{{urldecode(urldecode($ticket->URL))}}">--}}
                        {{--<img src="{{$ticket->photo}}" class="card-img-top" alt="Screenshot of ticket">--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

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

        <!-- Comments card -->
        <div class="col-md-6 col-xs-12 mb-3">
            <div class="card">
                <div class="card-body">

                    <div class="mb-3">
                        <h5 class="card-title font-weight-bold">New comment</h5>
                        <form action="/comment" method="post">
                            @csrf
                            <input type="hidden" name="ticketId" value="{{$ticket->id}}">
                            <div class="form-group">
                                <label hidden for="new-comment" class="font-weight-bold">Enter new comment</label>
                                <textarea class="form-control area" name="commentName" id="commentName" rows="2" placeholder="Your message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm float-right">Send</button>
                        </form>
                    </div>

                    <div>
                        <h5 class="card-title font-weight-bold">Comments ({{$ticket->comments->count()}})</h5>

                        @if ($ticket->comments->isEmpty())
                            <p>This ticket has no comments yet. Go ahead and add one!</p>
                        @else
                            @foreach ($ticket->comments->sortByDesc('created_at') as $comment)
                                <div class="ticketdetail-comment">
                                    <span class="font-weight-bold">{{ $comment->madeBy->name }}:</span>
                                    <p name="comment" class="ticketdetail-comment-text mb-1" id="commentP{{$comment->id}}">
                                        {{ $comment->comment }}
                                    </p>
                                    <form hidden action="/comment/{{ $comment->id }}" method="post" id="editCommentForm{{$comment->id}}">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="commentid" value="{{$comment->id}}">
                                        <textarea name="comment" class="form-control area">{{ $comment->comment }}</textarea>
                                    </form>
                                    <div class="d-flex align-items-center mb-2">
                                        @if($comment->userId == Auth::user()->id or Auth::user()->user_role == 3)
                                            <ul class="list-unstyled list-inline flex-fill mb-0">
                                                <li class="list-inline-item">
                                                    <button class="astext" onclick="ToggleCommentEdit({{$comment->id}})" id="editCommentBtn{{$comment->id}}">
                                                        Edit
                                                    </button>
                                                    <button hidden class="astext" form="editCommentForm{{$comment->id}}" id="putCommentBtn{{$comment->id}}">
                                                        Save
                                                    </button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <form action="/comment/{{ $comment->id }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$comment->id}}">
                                                        <button class="astext" value="Delete">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        @endif
                                        <span class="ticketdetail-comment-time flex-fill text-right">
                                            <i class="fa fa-clock-o"></i>
                                            {{$comment->created_at}} ({{$comment->created_at->diffForHumans()}})
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ticket Delete confirmation box -->
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
        <p>You are about to delete this ticket. Are you certain this is what you would like to do?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <form action="/ticket/{{$ticket->id}}" method="post">
            @method('Delete')
            @csrf
            <input type="hidden" name="id" value="{{$ticket->id}}">
            <td><input type="submit" class="btn btn-danger" value="Delete"></td>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Comment Delete confirmation box -->
@if(isset($comment))
    <div class="modal fade" id="deleteCommentConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteCommentConfirmLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteCommentConfirmLabel">Delete Comment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>You are about to permanently delete this comment. Are you certain this is what you would like to do?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <form action="/comment/{{$comment->id}}" method="post">
                @method('DELETE')
                @csrf
                <input type="hidden" name="id" value="{{$comment->id}}">
                <button class="btn btn-danger btn-sm" type="sumbit">Delete</button>
            </form>
        </div>
        </div>
    </div>
    </div>

@endif

<script>
function ToggleCommentEdit(id){
    document.getElementById("commentP" + id).hidden = true;
    document.getElementById("editCommentForm" + id).hidden = false;

    document.getElementById("editCommentBtn" + id).hidden = true;
    document.getElementById("putCommentBtn" + id).hidden = false;
}
</script>

@endsection
