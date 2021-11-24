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
                <h2 class="text-center">
                    @dd($errors)
                    {{--@foreach($errors->messages as $error)--}}

                        {{--@foreach($error->messages as $yeet)--}}
                            {{--<p>{{$yeet->email}}</p>--}}
                        {{--@endforeach--}}
                    {{--@endforeach--}}
                        <p>AHHHHHHHHHHHHhh</p>
                    Something went wrong! :(</h2>
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
