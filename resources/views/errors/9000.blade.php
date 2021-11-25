@extends('layouts.master-api')

@section('title')
    Whoopsie!
@endsection
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->
<div style="height: 550px;">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <h1 class="text-center">
                    Oh no...</h1>
                <h2 class="text-center">  Something went wrong! :(</h2>
                <h2 class="text-center">  Message:  </h2>
                <h3 class="text-center text-danger">
                    @foreach($errors->get('email') as $error)
                      - {{$error}}<br>
                    @endforeach
                </h3>
                <div class="error-details">
                    <p class="text-center">You can try again or contact an admin for further support.</p>
                </div>
                <br />
                <div class="error-details">
                    <p class="text-center">You can close this window to try again.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
