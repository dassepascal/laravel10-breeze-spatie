<x-app-layout>
<div class="container mx-auto mt-5">
    <a href="{{ url('roles') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-1">Roles</a>
    <a href="{{ url('permissions') }}" class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mx-1">Permissions</a>
    <a href="{{ url('users') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mx-1">Users</a>
</div>

<div class="container mx-auto mt-2">
    <div class="grid grid-cols-1">
        <div class="col-span-1">

            @if (session('status'))
                <div class="bg-green-500 text-white font-bold rounded-lg p-4 mb-4">{{ session('status') }}</div>
            @endif

            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-lg font-semibold">Users</h4>
                        @can('create user')
                        <a href="{{ url('users/create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Add User</a>
                        @endcan
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Roles</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $rolename)
                                        <span class="bg-blue-200 text-blue-800 rounded-full px-2 py-1 text-xs font-semibold">{{ $rolename }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @can('update user')
                                <a href="{{ url('users/'.$user->id.'/edit') }}" class="text-green-600 hover:text-green-900 mr-2">Edit</a>
                                @endcan
                                @can('delete user')
                                <a href="{{ url('users/'.$user->id.'/delete') }}" class="text-red-600 hover:text-red-900">Delete</a>
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
</x-app-layout>
