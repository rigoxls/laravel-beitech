<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project Test, by Rigoberto Giraldo C</a>
        </div>

         <div class="dropdown pull-right">
            <button class="btn btn-danger dropdown-toggle" type="button"  data-toggle="dropdown">Orders
            <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="/create-order">Create Order</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="/list-orders">List Orders</a></li>
            </ul>
         </div>

         <div class="dropdown pull-right">
            <button class="btn btn-danger dropdown-toggle" type="button"  data-toggle="dropdown">Products
            <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="/create-product">Create Product</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="/list-products">List Pŕoducts</a></li>
            </ul>
         </div>

         <div class="dropdown pull-right">
            <button class="btn btn-danger dropdown-toggle" type="button"  data-toggle="dropdown">Customers
            <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="/create-customer">Create Customer</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="/list-customers">List Customer</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="/link-customer-product">Link Customer - Products</a></li>
            </ul>
         </div>



    </div>
</div>

@yield('content')

<div class="container">
    <hr>

    <footer>
        <p>&copy; Company 2015</p>
    </footer>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>
</body>
</html>