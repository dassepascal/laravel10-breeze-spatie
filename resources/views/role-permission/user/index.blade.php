<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>
    <div class="container mx-auto mt-5 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex space-x-1">
                    <a href="{{ url('roles') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Roles</a>
                    <a href="{{ url('permissions') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Permissions</a>
                    <a href="{{ url('users') }}"
                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Users</a>

            </div>
        </div>


            <div class="overflow-x-auto mt-6">
                @if (session('status'))
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">{{ session('status') }}</div>
                @endif
                <div class="flex justify-around items-center mb-4">
                <h4 class="text-lg font-semibold">Users</h4>
                    @can('create role')
                    <a href="{{ url('roles/create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Add Role</a>
                    @endcan
                </div>
                <div class="p-4">
                <table class="table-auto border-collapse w-full">
                    <thead>
                        <tr class="bg-gray-300">
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Roles</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-normal text-gray-700">
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

            {{-- <div id="pagination" class="w-full flex justify-center border-t border-gray-100 pt-4 items-center">

                <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9 12C9 12.2652 9.10536 12.5196 9.29289 12.7071L13.2929 16.7072C13.6834 17.0977 14.3166 17.0977 14.7071 16.7072C15.0977 16.3167 15.0977 15.6835 14.7071 15.293L11.4142 12L14.7071 8.70712C15.0977 8.31659 15.0977 7.68343 14.7071 7.29289C14.3166 6.90237 13.6834 6.90237 13.2929 7.29289L9.29289 11.2929C9.10536 11.4804 9 11.7348 9 12Z"
                            fill="#2C2C2C" />
                    </g>
                </svg>

                <p class="leading-relaxed cursor-pointer mx-2 text-blue-600 hover:text-blue-600 text-sm">1</p>
                <p class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600">2</p>
                <p class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600"> 3 </p>
                <p class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600"> 4 </p>
                <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M15 12C15 11.7348 14.8946 11.4804 14.7071 11.2929L10.7071 7.2929C10.3166 6.9024 9.6834 6.9024 9.2929 7.2929C8.9024 7.6834 8.9024 8.3166 9.2929 8.7071L12.5858 12L9.2929 15.2929C8.9024 15.6834 8.9024 16.3166 9.2929 16.7071C9.6834 17.0976 10.3166 17.0976 10.7071 16.7071L14.7071 12.7071C14.8946 12.5196 15 12.2652 15 12Z"
                        fill="#18A0FB" />
                </svg>

            </div> --}}
        </div>
    </div>

    <style>
        thead tr th:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        thead tr th:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        tbody tr td:first-child {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 0px;
        }

        tbody tr td:last-child {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 0px;
        }
    </style>
</x-app-layout>
