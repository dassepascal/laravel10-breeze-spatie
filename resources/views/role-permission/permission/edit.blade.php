<div class="container mx-auto mt-5">
    <div class="grid grid-cols-1">
        <div class="col-span-1">

            @if ($errors->any())
            <ul class="bg-yellow-200 p-4">
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-lg font-semibold">Edit Permission</h4>
                    <a href="{{ url('permissions') }}" class="btn btn-danger">Back</a>
                </div>
                <div class="space-y-4">
                    <form action="{{ url('permissions/'.$permission->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block">Permission Name</label>
                            <input type="text" name="name" value="{{ $permission->name }}" id="name" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-400" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

