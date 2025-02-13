<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1>Hello !!! </h1>

   {{$data}}


   <form action="/savedata" method="post">
        @csrf
        <label for="username">Username</label>
        <input type="text" name = "username"><br>
        <label for="password">Password</label>
        <input type="password" name = "password"><br>

        <input type="submit" value="Submit">
   </form>

   <table class="table table-bordered" style="width: 50%; border:solid;margin:1rem;">
    <tr>
        <th>Name</th>
        <th>Password</th>
    </tr>
    @forelse ($users as $user)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $user->pass }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="2">No users found.</td>
        </tr>
    @endforelse
</table>


<form action="/deletedata" method="post">
    @csrf
    <label for="username">Username</label>
    <input type="text" name = "username"><br>
    

    <input type="submit" value="Delete">

</form>

<form action="/updatepassword" method="post">
    @csrf
    <label for="username">Username</label>
    <input type="text" name = "username"><br>
    <label for="password">Password</label>
    <input type="password" name = "password"><br>

    <input type="submit" value="Submit">
</form>
</body>
</html>