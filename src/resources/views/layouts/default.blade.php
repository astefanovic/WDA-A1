<!DOCTYPE html>
<html>
<head>
    <title> @yield('title') </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
@include('shared.navbar')
@yield('content')
<footer>
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-xs-12">Copyright © 2017 RMIT University |
                <a href="http://www.rmit.edu.au/utilities/disclaimer/" target="_blank">Disclaimer</a> |
                <a href="http://www.rmit.edu.au/utilities/privacy/" target="_blank">Privacy</a> |
                <a href="http://www.rmit.edu.au/utilities/website-feedback/" target="_blank">Website feedback</a> |
                ABN 49 781 030 034 | CRICOS provider number: 00122A
            </div>
        </div>
    </div>
</footer>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>