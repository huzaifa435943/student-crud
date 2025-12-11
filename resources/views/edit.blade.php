<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-lg">
        
        <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">
            ✏️ Edit Student
        </h2>

        <!-- FORM -->
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('POST')

            <!-- Name Input -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1 font-medium">Name</label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ $student->name }}" 
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 
                           focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            <!-- Age Input -->
            <div class="mb-6">
                <label class="block text-gray-700 mb-1 font-medium">Age</label>
                <input 
                    type="number" 
                    name="age" 
                    value="{{ $student->age }}" 
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:ring-2 
                           focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center">

                <a href="{{ route('students') }}"
                   class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-md text-sm font-medium">
                    ⬅ Back
                </a>

                <button type="submit"
                        class="px-5 py-2 bg-blue-600 text-white rounded-md text-sm font-semibold 
                               hover:bg-blue-700">
                    Update
                </button>

            </div>
        </form>
    </div>

</body>
</html>
