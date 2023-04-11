<x-layout>
    <x-slot:title>
        <h3>Admin Panel</h3>
        <a class="btn btn-success me-3" href="{{ route('admin.create') }} "> Add New User</a>
    </x-slot:title>
    <div class="col-11 mx-auto">
        <table class="table table-bordered table-hover table-light ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Email</th>
                    {{-- <th scope="col">Password</th> --}}
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider border-1">
                @foreach ($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $users->firstItem() + $key }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->email }} </td>
                        {{-- <td>{{$user->password}} </td> --}}
                        <td>
                            <div class="d-flex gap-3 ">
                                <div>
                                    <a href="{{ route('admin.edit', $user->id) }}"
                                        class="btn btn-warning fw-bold">Edit</a>
                                </div>
                                <div>

                                    <form class="" action="{{ route('admin.destroy', $user->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this user?');"
                                            class="btn btn-danger fw-bold  text-decoration-none  ">Delete</button>

                                    </form>

                                </div>

                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $users->links() }}

    </div>
    <x-flash />
</x-layout>
