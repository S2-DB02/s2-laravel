
   @extends('layouts.master')
   @section('title',"{{$ticket->id}} | {{$ticket->name}}")
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
<form  action="/ticket/{{$ticket->id}}" method="POST">
    @method('PUT')
    @csrf

    
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-2">
            <button type="button" class="btn btn-outline-dark">Back</button>
        </div>
    <div class="col-sm-6">
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
              <label for="type">type</label>
              <select class="form-control" name="type" id="type">
                <option value="1"@if ($ticket->type == 1)
                    selected
                @endif>Bug</option>
                <option value="2"@if ($ticket->type == 2)
                    selected
                @endif>Task</option>
                <option value="3"@if ($ticket->type == 3)
                    selected
                @endif>Improvement</option>
                <option value="4"@if ($ticket->type == 4)
                    selected
                @endif>Media</option>
                <option value="5"@if ($ticket->type == 5)
                    selected
                @endif>Other</option>
              </select>
            </div>
            <p class="font-weight-bold">Assigned to: 
                <a class="font-weight-normal">{{$ticket->find($ticket->id)->developer->name ?? 'Unknown'}}</a>
            </p>
            
        </div>
        </div>
    </div>
    <div class="col-sm-6 mh-100">
        <div class="card">
        <div class="card-body">
            <div class="form-group">
              <label for="remark">Description</label>
              <textarea class="form-control" name="remark" id="remark" rows="3">{{$ticket->remark}}</textarea>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-3">
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
    </br>
    <button type="submit" class="btn btn-success">Save</button>
        {{-- <a href="{{url('/task/'.$ticket->id.'/details')}}"><button class="btn btn-primary">Afronden</button></a> --}}
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title font-weight-bold">Screenshot</h5>
            <a href="{{$ticket->URL}}">
                <img alt="Screenshot Ticket" src="{{$ticket->photo}}">
             </a>
        </div>
        </div>
    </div>
    </div>
    
</div>

</form>
@endsection
