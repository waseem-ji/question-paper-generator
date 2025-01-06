<x-layout>
    <x-slot:title>
        <h3>Category</h3>
    </x-slot:title>
    <x-panel class="w-50 mx-auto bg-light">
        <div class="d-flex justify-content-between mb-2 border-bottom pb-3">
            <h3> Add New Category</h3>

        </div>

        <form action="{{ route('categories.store') }} " method="post">
            @csrf
            <div class="row mb-4">
                <div class="row mt-3 pt-1">
                    <label for="category" class="ms-3 form-label col">Enter new category</label>
                    <input type="text" name="name" id="category" class="form-control w-50 col">
                    @error('name')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('categories.index') }} "
                        class="mt-3 text-decoration-none btn btn-danger ">Cancel</a>
                    <button type="submit" class="btn btn-success mt-3 me-4">Submit</button>
                </div>
            </div>
        </form>
    </x-panel>
    <x-flash />
</x-layout>
