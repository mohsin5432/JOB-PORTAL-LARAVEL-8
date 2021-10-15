<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    h3{
        text-align:center;
    }
    </style>
</head>
<body>
<div style="width:100%;height:50px;text-align:center;color:black;font-size:50px;">
        <h1>TACFOREST</h1>
    </div>
   <h3> Name:  {{$details['name']}}
   <br>
    Email: {{$details['email']}}
    <br>
    {{$details['msg']}}
    <br>
</body>
</html>