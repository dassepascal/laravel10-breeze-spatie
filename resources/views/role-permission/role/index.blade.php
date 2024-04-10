<x-app-layout>
   

    <div class="container mx-auto mt-5 ">
        <div class="flex space-x-1">
            <a href="{{ url('roles') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Roles</a>
            <a href="{{ url('permissions') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Permissions</a>
            <a href="{{ url('users') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Users</a>
        </div>
    </div>

    <div class="container mx-auto mt-2 overflow-x-scroll">
        <div class="grid grid-cols-1">
            <div class="col-span-12">

                @if (session('status'))
                    <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">{{ session('status') }}</div>
                @endif

                <div class="bg-white shadow-md rounded px-4 py-3 mt-3">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-lg font-semibold">Roles</h4>
                            @can('create role')
                            <a href="{{ url('roles/create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Add Role</a>
                            @endcan
                    </div>
                    <div class="p-4">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($roles as $role)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $role->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $role->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="text-yellow-600 hover:text-yellow-900">Add / Edit Role Permission</a>

                                        @can('update role')
                                        <a href="{{ url('roles/'.$role->id.'/edit') }}" class="text-green-600 hover:text-green-900 ml-2">Edit</a>
                                        @endcan

                                        @can('delete role')
                                        <a href="{{ url('roles/'.$role->id.'/delete') }}" class="text-red-600 hover:text-red-900 ml-2">Delete</a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
