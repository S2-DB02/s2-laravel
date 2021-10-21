<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
{{-- <style>*{
        padding: 0;
        margin: 0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
    }
    body{
        font-family: montserrat;
    }
    nav{
        background: Black;
        height: 80px;
        width: 100%;
        position: fixed;
        z-index: 99999;
    }
    label.logo{
        color: white;
        font-size: 35px;
        line-height: 80px;
        padding: 0 100px;
        font-weight: bold;
    }
    nav ul{
        float: right;
        margin-right: 20px;
    }
    nav ul li{
        display: inline-block;
        line-height: 80px;
        margin: 0 5px;
    }
    nav ul li a{
        color: white;
        font-size: 17px;
        padding: 7px 13px;
        border-radius: 3px;
        text-transform: uppercase;
    }
    a.active,a:hover{
        background: grey;
        transition: .5s;
    }
    .checkbtn{
        font-size: 30px;
        color: white;
        float: right;
        line-height: 80px;
        margin-right: 40px;
        cursor: pointer;
        display: none;
    }
    #check{
        display: none;
    }
    @media (max-width: 952px){
        label.logo{
            font-size: 30px;
            padding-left: 50px;
        }
        nav ul li a{
            font-size: 16px;
        }
    }
    @media (max-width: 858px){
        .checkbtn{
            display: block;
        }
        ul{
            position: fixed;
            width: 100%;
            height: 100vh;
            background: Black;
            top: 80px;
            left: -100%;
            text-align: center;
            transition: all .5s;
        }
        nav ul li{
            display: block;
            margin: 50px 0;
            line-height: 30px;
        }
        nav ul li a{
            font-size: 20px;
        }
        a:hover,a.active{
            background: none;
            color: grey;
        }
        #check:checked ~ ul{
            left: 0;
        }
    }
    section{
        background-size: cover;
        height: calc(100vh - 80px);
    }</style> --}}
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='custom.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/teststyles.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><img class="logo" src="/img/logo.png" width="150" height="17" class="d-inline-block align-top"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/ticket">Tickets</a>
            </li>
          </ul>
        </div>
      </nav>
    {{-- <script>
        $('#navId a').click(e => {
            e.preventDefault();
            $(this).tab('show');
        });
    </script> --}}
    
    {{-- <script>
        $('#navId a').click(e => {
            e.preventDefault();
            $(this).tab('show');
        });
    </script>            --}}
{{-- <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo" ><img class="logo" src="https://www.bastrucks.com/images/logos/BASTrucks.png"></label>
    <ul>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="/ticket">Tickets</a></li>
        <li><a href="#">Something</a></li>
        <li><a href="#">Something</a></li>
        <li><a href="/home">Logout</a></li>
    </ul>
</nav> --}}
<!-- Navigation Bar -->

<!-- footer -->
<style>
    footer {
        background-color: Black;
        position:fixed;
        padding: 10px 10px 0px 10px;
        bottom: 0;
        width: 100%;
        height: 40px;
        color:White;
        text-align: center;
        z-index: 99999;">
    }
</style>
@yield('content')
</body>

<footer>
    <p id="date"></p>
    <script>
        n =  new Date();
        y = n.getFullYear();
        document.getElementById("date").innerHTML = "© Basstrucks " + y;
    </script>

</footer>
<!-- footer -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
