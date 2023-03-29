<x-layout>
    <x-slot:title>
        Category
    </x-slot:title>

    <x-panel class="w-75 mx-auto bg-warning bg-opacity-25">
        <div class="d-flex justify-content-between mb-5">
            <h3>All Category</h3>
            <a class="btn btn-success me-3" href="{{ route('categories.create') }} "> Add New Category</a>

        </div>
        <div class="list-group">


        @foreach ($category as $item)
            <li class="list-group-item list-group-item-action border border-dark bg-secondary bg-opacity-25 w-75 mx-auto d-flex gap-3 py-3  "
                aria-current="true">

                <div class="d-flex gap-2 w-75 justify-content-between">
                    <div>

                        <h6 class="mb-0 ms-5 h6 text-decoration-none fs-3">{{ $item->name }} </h6>

                    </div>

                </div>
                <div class="d-flex flex-row-reverse w-25 gap-3 mx-3 align-items-center">
                    <div>

                        <form class="dropdown-item text-center" action="{{ route('categories.destroy', $item->id) }}"
                            method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this item?');"
                                class="btn btn-danger fw-bold w-100 text-decoration-none ">Delete</button>

                        </form>

                    </div>
                    <div>
                        <a href="/categories/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                    </div>

                </div>
            </li>
        @endforeach
    </div>
    </x-panel>
    <x-flash />
</x-layout>
