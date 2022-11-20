<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process with User model</title>
</head>
<body>
    <p>Users with some includes fields:</p>
    <table border="1">
        <tr>
            <th>id</th>
            @for($i=0;$i<count($includes);$i++)
                <th>{{ $includes[$i] }}</th>
            @endfor
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            @for($i=0;$i<count($includes);$i++)
                @if($user->{ $includes[$i] })
                    <td>{{ $user->{$includes[$i]} }}</td>
                @else
                    <td> null </td>
                @endif
            @endfor
        </tr>
        @endforeach
    </table>
</body>
</html>
