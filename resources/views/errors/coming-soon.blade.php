@extends('layouts.master')
@section('title', __('Coming Soon 🦗'))
@section('content')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
<!------ Include the above in your HEAD tag ---------->
<div style="height: 610px;">
<div class="container">
    <a href="/"><button type="button" class="btn btn-outline-dark fas fa-arrow-left"></button></a>
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <h1 class="text-center">
                    Coming Soon!</h1>
                <h2 class="text-center">
                    ---</h2>
                <div class="error-details">
                    <p class="text-center">Sorry, the page or function you are trying to reach is still in development. try again later!</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
