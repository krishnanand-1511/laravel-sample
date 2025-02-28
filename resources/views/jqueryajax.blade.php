
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AJAX Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <h2>AJAX Form Submission</h2>
    <form id="ajaxForm">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" id="name"><br><br>

        <label>Email:</label>
        <input type="text" name="email" id="email"><br><br>

        <label>Message:</label>
        <textarea name="message" id="message"></textarea><br><br>

        <button type="submit">Submit</button>
    </form>

    <div id="response"></div>

    <script>
        $(document).ready(function () {
            $('#ajaxForm').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    url: "/ajaxPost",
                    type: "post",
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        $('#response').html('<p style="color: green;">' + response.success + '</p>');
                        $('#ajaxForm')[0].reset();
                    },
                    error: function (xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMsg = "<ul style='color: red;'>";
                        $.each(errors, function (key, value) {
                            errorMsg += "<li>" + value + "</li>";
                        });
                        errorMsg += "</ul>";
                        $('#response').html(errorMsg);
                    }
                });
            });
        });
    </script>

</body>
</html>