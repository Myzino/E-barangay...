<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
            <x-btn-link class="ml-4 float-right" href="{{ route('users.create') }}">Add Users</x-btn-link>
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table table-bordered" style="width: 100%; text-align:center;">
   
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                          <tr >
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                              @foreach($user->roles as $role)
                              {{ $role -> name }} {{ $loop -> last ? '': ','}}
                            
                            @endforeach
                            </td>
                            <td class="px-6 py-4">
                              <x-btn-link href="{{ route('users.edit', $user->id)}}">Edit</x-btn-link>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
    </div>
</x-tenant-app-layout>
