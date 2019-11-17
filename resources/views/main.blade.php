<!DOCTYPE html>
<html lang="en">
<head>
@include ("Partials._head")
</head>
<body>
@include("Partials._nav")
<div class="container">
@include("partials._messages")
@yield("content")
</div>
@include("Partials._footer")
</body>
</html>
