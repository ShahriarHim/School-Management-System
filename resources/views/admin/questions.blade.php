<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/salauddin.css')}}">
</head>
<body>

    <div class="questions-margin">

        <div class="questions-header">
            <h1>Questions list</h1>
        </div>

        <div class="questions-list-table" style="overflow-x:auto;">
            <table class="quesitons-table" >

                <tr>
                    <th> First Name  </th>
                    <th> Last Name  </th>
                    <th> Email  </th>
                    <th> Phone  </th>
                    <th> Location  </th>
                    <th> Question  </th>
                </tr>

                @foreach($questions as $question)
                    <tr>
                        <td>{{$question->fname}}</td>
                        <td>{{$question->lname}}</td>
                        <td>{{$question->email}}</td>
                        <td>{{$question->phone}}</td>
                        <td>{{$question->location}}</td>
                        <td class="questions">{{$question->question}}</td>
                    </tr>
                @endforeach



            </table>
        </div>

    </div>

</body>
</html>