<x-app-layout>

    <div className="overflow-x-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200">


<div class="container mx-auto mt-5">
    <div class="grid grid-cols-1">
        <div class="col-span-1">

            @if ($errors->any())
            <ul class="bg-yellow-200 border border-yellow-500 rounded p-4 mb-4">
                @foreach ($errors->all() as $error)
                <li class="text-yellow-800">{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-lg font-semibold">Edit User</h4>
                    <a href="{{ url('users') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Back</a>
                </div>
                <form action="{{ url('users/'.$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="text" name="email" id="email" readonly value="{{ $user->email }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        @error('email') <span class="text-red-600">{{ $message }}</span> @enderror

                    </div>
                    <div class="mb-4">
                        <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                        <select name="roles[]" id="roles" multiple class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="" disabled>Select Role</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role }}" @if(in_array($role, $userRoles)) selected @endif>{{ $role }}</option>
                            @endforeach
                        </select>
                        @error('roles') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

</x-app-layout>

