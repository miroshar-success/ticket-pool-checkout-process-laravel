<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="" content="TravelX">
    <title>EventRight</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <script>
        window.console = window.console || function(t) {};
    </script>
    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>
    <style>
        .block {
            display: block !important;
        }

        .bg-light {
            background: #e9ecef !important;
        }
    </style>
</head>

<body translate="no" class="bg-light">
    <div class="jumbotron text-center">
        <h1 class="display-3">Thank You!</h1>
        <p class="lead">
            <strong class="block">Thanks for purchase EventRight </strong>
            <br>
            <strong class="block"><b>Getting Started</b></strong>
            <br>
            get your installation key and install database to <strong>Getting Started. </strong>
        </p>
        <hr>
        <p class="lead">
            <a class="btn btn-primary btn-sm" href="{{ url('/installer') }}" role="button">EventRight Installer</a>
        </p>
    </div>

</body>

</html>
