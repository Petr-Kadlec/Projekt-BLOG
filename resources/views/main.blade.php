<!DOCTYPE html>
<html lang="en">
<head>
@include ("Partials._head")
</head>
<body>
@include("Partials._nav")
<div class="container">
@yield("content")
</div>
@include("Partials._footer")
</body>
</html>
