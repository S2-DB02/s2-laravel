<!doctype html>
<html lang="en">
<head>
    <title>Nav</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='custom.css' rel='stylesheet' type='text/css'>
    <style>
        footer {
            background-color: #1c3f94;
            position: fixed;
            padding: 10px 10px 0px 10px;
            bottom: 0;
            width: 100%;
            height: 40px;
            color:white;
            text-align: center;
        }
    </style>
// Extra small devices (portrait phones, less than 576px)
// No media query since this is the default in Bootstrap

// Small devices (landscape phones, 576px and up)
@media (min-width: 576px) { ... }

// Medium devices (tablets, 768px and up)
@media (min-width: 768px) { ... }

// Large devices (desktops, 992px and up)
@media (min-width: 992px) { ... }

// Extra large devices (large desktops, 1200px and up)
@media (min-width: 1200px) { ... }
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg  navbar-dark" style="background-color: #1c3f94;">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" style="float: left">
            <li class="image">
                <img class="logo" src="https://www.bastrucks.com/images/logos/BASTrucks.png">
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ticket">Ticket</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Something</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Something</a>
            </li>
            <div class="logout" style="float:right">
                 <a class="nav-link" href="/home">Logout</a>
            </div>
        </ul>
    </div>
</nav>
<!-- Navigation Bar -->

<!-- footer -->
<footer>
    <p id="date"></p>
    <script>
        n =  new Date();
        y = n.getFullYear();
        document.getElementById("date").innerHTML = "© Basstrucks " + y;
    </script>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
            })
    </script>

</footer>
<!-- footer -->

</body>
</html>
