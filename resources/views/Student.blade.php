<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center py-10">

    <div class="bg-white w-full max-w-4xl p-8 rounded-2xl shadow-md">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-700">Student List</h2>

            <a href="{{ route('students.create') }}" 
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md font-semibold text-sm">
                + Create Student
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left px-4 py-2 border-b">#</th>
                    <th class="text-left px-4 py-2 border-b">Name</th>
                    <th class="text-left px-4 py-2 border-b">Age</th>
                    <th class="text-center px-4 py-2 border-b">Actions</th>
                </tr>   
            </thead>

            <tbody>
                @forelse ($students as $index => $student)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b">{{ $student->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $student->age }}</td>

                        <!-- Action Buttons -->
                        <td class="px-4 py-2 border-b text-center flex justify-center gap-2">

                            <!-- Edit Button -->
                            <a href="{{ route('students.edit', $student->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm">
                                Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('students.destroy', $student->id) }}" 
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this student?')">
                                @csrf
                                @method('DELETE')

                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500 py-4">
                            No students found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
