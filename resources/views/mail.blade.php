{{-- resources/views/mail.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Contact Us</h2>

            {{-- Form Start --}}
            <form action="{{ route('submit.mail') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                    <input type="email" name="email" id="email" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                    @error('email')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-600">Message</label>
                    <textarea name="message" id="message" rows="4" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required></textarea>
                    @error('message')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-md text-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Send Message
                    </button>
                </div>
            </form>
            {{-- Form End --}}

        </div>
    </div>

</body>
</html>
