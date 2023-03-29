<x-layout>
    <x-slot:title>
        Edit Drive Details
    </x-slot:title>
    <x-panel class="w-75 mx-auto border-3 border-secondary">
        <form action="{{ route('drives.update',$drive->id) }} " method="post">
            @csrf
            @method('PATCH')
            <div class="row mb-4 ">
                <div class="row  pt-4">
                    <label for="category" class="ms-3 form-label col-auto">Enter Drive Name</label>
                    <input type="text" name="name" id="category" class="form-control w-50 col"
                        value="{{ $drive->name }}">
                    @error('name')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-4 ">
                <div class="row  pt-4">
                    <label for="category" class="ms-3 form-label col-auto">Enter Drive Type</label>
                    <input type="text" name="drive_type" id="category" class="form-control w-50 col"
                        value="{{ $drive->drive_type }}">
                    @error('drive_type')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('drives.index') }} "
                        class="mt-3 text-decoration-none btn btn-danger ms-3">Cancel</a>
                    <button type="submit" class="btn btn-success mt-3 me-4">Submit</button>
                </div>
            </div>
        </form>
    </x-panel>
</x-layout>
