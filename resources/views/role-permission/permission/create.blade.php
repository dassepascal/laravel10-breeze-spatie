
<div class="container mx-auto mt-5">
    <div class="grid grid-cols-1">
        <div class="col-span-1">

            @if ($errors->any())
            <ul class="bg-yellow-200 p-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-lg font-semibold">Create Permission</h4>
                    <a href="{{ url('permissions') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Back</a>
                </div>
                <div class="space-y-4">
                    <form action="{{ url('permissions') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block">Permission Name</label>
                            <input type="text" name="name" id="name" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-400" />
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

