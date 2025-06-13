<!-- resources/views/profile/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold mb-6">Edit Profile</h1>
        <form action="{{ route('user.profile.edit') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ auth()->user()->name }}"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                />
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ auth()->user()->email }}"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                />
            </div>

            {{-- Username (non modifiable) --}}
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-medium mb-1">Username</label>
                <input
                    type="text"
                    id="username"
                    value="{{ auth()->user()->username }}"
                    disabled
                    class="w-full px-4 py-2 border bg-gray-100 rounded-lg cursor-not-allowed"
                />
            </div>

            {{-- Submit --}}
            <button
                type="submit"
                class="mt-4 px-6 py-3 bg-indigo-600 text-white rounded-full font-medium hover:bg-indigo-700 transition"
            >
                Save Changes
            </button>
        </form>
    </div>

    <script>
        const input = document.getElementById('profile_image');
        const preview = document.getElementById('profileImagePreview');
        input.addEventListener('change', () => {
            const [file] = input.files;
            if (file) {
                preview.src = URL.createObjectURL(file);
            }
        });
    </script>
@endsection
