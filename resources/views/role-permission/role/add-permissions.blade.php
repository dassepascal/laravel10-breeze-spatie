<x-app-layout>
    <div class="container mx-auto mt-5">
        <div class="grid grid-cols-1">
            <div class="col-span-full">

                @if (session('status'))
                    <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">{{ session('status') }}</div>
                @endif

                <div class="bg-white shadow-md rounded px-4 py-3 mt-3">
                    <div class="border-b mb-4 pb-2">
                        <h4 class="text-lg font-semibold">Role : {{ $role->name }}</h4>
                        <a href="{{ url('roles') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded float-right">Back</a>
                    </div>
                    <div class="p-4">

                        <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                @error('permission')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror

                                <label class="block">Permissions</label>

                                <div class="grid grid-cols-3 gap-4">
                                    @foreach ($permissions as $permission)
                                    <div class="col-span-1">
                                        <label class="flex items-center space-x-2">
                                            <input
                                                type="checkbox"
                                                name="permission[]"
                                                value="{{ $permission->name }}"
                                                class="form-checkbox h-5 w-5 text-indigo-600"
                                                {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                            />
                                            <span>{{ $permission->name }}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="mb-3">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
