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
    <div style="width:100%;height:50px;text-align:center;color:black;margin:30px auto;">
        <h1>TACFOREST</h1>
    </div>
   <h3> Name:  {{$details->name}}
   <br>
    Email: {{$details->email}}
    <br>
    Phone No: {{$details->phone}}
    <br>
    Date of Birth: {{$details->dob}}
    <br>
    Gender: {{$details->gender}}
    <br>
    Address: {{$details->address}}
    <br>
    City: {{$details->city->name}}
    <br>
    State: {{$details->state}}
    <br>
    Highest Education Level: {{$details->edu}}
    <br>
    Date Acquired: {{$details->acquired}}
    <br>
    institution Name: {{$details->institution}}</h3>
</body>
</html>