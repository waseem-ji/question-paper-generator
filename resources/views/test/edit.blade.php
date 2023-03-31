<x-layout>
    <x-slot:title>
        Edit Drive Details
    </x-slot:title>
    <x-panel class="w-75 mx-auto border-3 border-secondary">
        <form action="{{ route('tests.update', $test->id) }} " method="post">
            @csrf
            @method('PATCH')
            <div class="row mb-4 ">
                <div class="row  pt-4">
                    <label for="category" class="ms-3 form-label col-auto">Edit Test Name</label>
                    <input type="text" name="name" id="category" class="form-control w-50 col"
                        value="{{ $test->name }}">
                    @error('name')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-4 ">
                <div class="row  pt-4">
                    <label for="duration" class="ms-3 form-label col-auto">Test
                        Duration</label>
                    <input type="text" id="duration" name="duration" class="form-control w-50 col"
                        placeholder="Enter duration in minutes" value="{{$test->duration}}">
                    @error('duration')
                        <span class="text-danger fs-6">{{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-4 ">
                <div class="row  pt-4">
                    <textarea class="form-control" name="instructions" placeholder="Leave a comment here" id="floatingTextarea"
                        style="height: 300px">{{ $test->instructions }} </textarea>
                    <label for="floatingTextarea" class="fw-lighter">Edit Text Instructions
                        Here</label>
                    @error('instructions')
                        <span class="text-danger fs-6">{{ $message }} </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('tests.index') }} "
                        class="mt-3 text-decoration-none btn btn-danger ms-3">Cancel</a>
                    <button type="submit" class="btn btn-success mt-3 me-4">Edit</button>
                </div>
            </div>
        </form>
    </x-panel>
</x-layout>
