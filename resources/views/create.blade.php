<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-500 min-h-screen flex items-center justify-center">

    <div class="bg-black p-5 rounded-8xl shadow-md w-full max-w-md">
        <div class="flex justify-between items-center mb-10">
            <h2 class="text-2xl font-semibold text-teal-700">Add New Student</h2>
            <a href="{{ route('students') }}" 
               class="text-red-500 hover:underline text-sm font-medium">
               ← Back to List
            </a>
        </div>

        <!-- @if ($errors->any())
            <div class="bg-red-50 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->

        <form action="{{ route('students.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-gray-600 font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="age" class="block text-gray-600 font-medium mb-2">Age</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg">
                    Save
                </button>
            </div>
        </form>   
    </div>

</body>
</html>
