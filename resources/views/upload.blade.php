<!DOCTYPE html>
<html>
<head>
    <title>File Upload in Laravel</title>
</head>
<body>
    <h2>Upload a File</h2>
    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Upload</button>
    </form>
</body>
</html>
