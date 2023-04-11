<x-layout>
    <x-slot:title>

        <h3>All Category</h3>
        <a class="btn btn-success me-3" href="{{ route('categories.create') }} "> Add New Category</a>

    </x-slot:title>
    <div class="col-11 mx-auto">
        <table class="table table-bordered table-hover table-light ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">NUmber of Questions</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody class="table-group-divider border-1">
                @foreach ($category as $key => $item)
                    <tr>
                        <th scope="row">{{ $category->firstItem() + $key }}</th>
                        <td>{{ $item->name }}</td>
                        <td>
                            <p>{{ $item->questions->count() }}</p>
                        </td>
                        <td>
                            <div class="d-flex gap-3 ">
                                <div>
                                    <a href="/categories/{{ $item->id }}/edit"
                                        class="btn btn-warning fw-bold">Edit</a>
                                </div>
                                <div>

                                    <form class="" action="{{ route('categories.destroy', $item->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                            class="btn btn-danger fw-bold  text-decoration-none  ">Delete</button>

                                    </form>

                                </div>

                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $category->links() }}

    </div>
    <x-flash />
</x-layout>
