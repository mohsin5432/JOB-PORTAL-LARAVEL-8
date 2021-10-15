<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="width:80%;border:solid;border-color:rgb(200,200,200);margin:40px auto;padding:25px;background-color:rgb(240,240,240);">
<h1 style="text-align:center;margin:20px;">Curriculum Vitae</h1>
    <div style="display:flex;justify-content:space-between;">
        <div>
        <h3>NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$employ->user->name}}</h3>
        <h3>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$employ->user->email}}</h3>
        <h3>Phone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:+92{{$employ->phone}}</h3>
        <h3>Address : {{$employ->address}} , {{$employ->city->name}} , {{$employ->state}}</h3>
        <h3>Gender&nbsp;&nbsp;: {{$employ->gender}}</h3>
        </div>
        <div>
        </div>
    </div>
    <hr style="width:70%;margin:30px auto;background-color:black;">
    <h2>Summary :</h2>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$employ->summary}}</p>
    <h1 style="text-align:center;margin:20px;">Educational Details</h1>
    <h3>Qualification: {{$employ->qualification}}<h3>
    <h3>Level Of Education: {{$employ->edu}}</h3>
    <h3>Institution : {{$employ->institution}}</h3>
    <h3>Date Acquired: {{$employ->acquired}}</h3>
</div>
</body>
</html>