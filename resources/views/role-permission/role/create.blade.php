<x-app-layout>
    <div class="container mx-auto mt-5 overflow-x-scroll">
        <div class="grid grid-cols-1">
            <div class="col-span-12">

                @if ($errors->any())
                <ul class="bg-yellow-200 border border-yellow-500 rounded p-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <div class="bg-white shadow-md rounded px-4 py-3">
                    <div class="flex justify-between items-center border-b mb-4 pb-2">
                        <h4 class="text-lg font-semibold">Create Role</h4>
                        <a href="{{ url('roles') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Back</a>
                    </div>
                    <div class="p-4">
                        <form action="{{ url('roles') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Role Name</label>
                                <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" />
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
