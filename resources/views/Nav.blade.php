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
<!-- Nav tabs -->
<ul class="nav nav-pills" id="navId">
    <li class="nav-item">
        <a href="#tab1Id" class="nav-link active">Active</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#tab2Id">Action</a>
            <a class="dropdown-item" href="#tab3Id">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#tab4Id">Action</a>
        </div>
    </li>
    <li class="nav-item">
        <a href="#tab5Id" class="nav-link">Another link</a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link disabled">Disabled</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
</div>

<script>
    $('#navId a').click(e => {
        e.preventDefault();
        $(this).tab('show');
    });
</script>
<!-- Navigation Bar -->
{{-- <nav class="navbar navbar-expand-lg  navbar-dark" style="background-color: #1c3f94;">
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
</nav> --}}
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
