@extends('layouts.master')

@section('title', __('Server Error'))
@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div style="height: 610px;">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <h1 class="text-center">
                    Oops!</h1>
                <h2 class="text-center">
                    Error 500 Server Error</h2>
                <div class="error-details">
                    <p class="text-center">Sorry, an error has occured!</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection