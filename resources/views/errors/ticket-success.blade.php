@extends('layouts.master-api')

@section('title')
    Success!
@endsection
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->
<body onload="autoClose()">
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
                    Success!</h1>
                <h2 class="text-center">
                    Your ticket has been created!</h2>
                <div class="error-details">
                    <p class="text-center">This page will close in within 5 seconds.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    //sets a random absolute position to a html element; receives the html element
    function moveElmRand(elm){
    elm.style.position ='absolute';
    elm.style.top = Math.floor(Math.random()*90+5)+'%';
    elm.style.left = Math.floor(Math.random()*90+5)+'%';
    }
    //get the #bug
    var bug = document.querySelector('#bug');

    //register to call moveElmRand() on mouseenter event to #bug
    bug.addEventListener('mouseenter', function(e){ moveElmRand(e.target);});

    //register click to #bug
    bug.addEventListener('click', function(e){ alert('You are Good.');});
</script>
<script>
    function autoClose() {
        setTimeout("window.close()",5000)
    }
    </script>
@endsection
