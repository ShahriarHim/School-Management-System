<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="school-margin">
        <div class="school-header">
            <h1>School Info</h1>
        </div>
    </div>



    @if(isset($school))

        <div class="school-info">
            <p> School Name : {{$school->school_name }}</p>   <br>
            <p> Address : {{$school->address }}</p>   <br>
            <p> Email : {{$school->email }}</p>   <br>
            <p> Phone : {{$school->phone }}</p>   <br>
            <p> Fax : {{$school->fax }}</p>   <br>
            <p> Facebook : {{$school->facebook }}</p>   <br>
            <p> Linkedin : {{$school->linkedin }}</p>   <br>
            <p> Youtube : {{$school->youtube}}</p>   <br>
            <p> Twitter : {{$school->twitter }}</p>   <br>
            <p> Instagram : {{$school->instagram }}</p>   
            
        </div>


    @else
        <div class="school-info-not-found">
            <h1>Not found</h1>
        </div>

    @endif
    
</body>
</html>