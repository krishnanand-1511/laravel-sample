<!DOCTYPE html>
<html>
<head>
    <title>Laravel Form Validation</title>
</head>
<body>
    <h2>Laravel Form Validation Example</h2>
    
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('form.submit') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}"><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>Password:</label>
        <input type="password" name="password"><br><br>

        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation"><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
