<x-layout>
    <x-slot:title>
        <h3>Create A Test</h3>
    </x-slot:title>
    <div class="contain">
        <div class="row">
            <div class="col fs-1 mb-4 ">

            </div>
            <div class="row">
                <x-panel class="col-10 mx-auto border-2 border-dark">
                    <form action="{{ route('tests.store') }}" method="POST">
                        @csrf
                        <div class="row mb-4 ms-3">
                            <div class="col">
                                <div class="row input-group input-group-lg">
                                    <label for="name"
                                        class="col-auto input-group-text bg-success bg-opacity-25 border-0">Enter
                                        test
                                        name</label>
                                    <input type="text" id="name" name="name"
                                        class="col-4 form-control rounded-end border-1">
                                    @error('name')
                                        <span class="text-danger fs-6">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="row input-group input-group-lg">
                                    <label for="duration"
                                        class="col-auto  input-group-text bg-success bg-opacity-25 border-0 ">Test
                                        Duration</label>
                                    <input type="text" id="duration" name="duration"
                                        class="col-3 form-control rounded-end border-1 " placeholder="Enter duration in minutes">
                                    @error('duration')
                                        <span class="text-danger fs-6">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row mb-4 ms-3">
                            <div class="col">
                                <div class="row input-group input-group-lg">
                                    <label for="duration"
                                        class="col-auto  input-group-text bg-success bg-opacity-25 border-0 ">Test
                                        Duration</label>
                                    <input type="text" id="duration" name="duration"
                                        class="col-3 form-control rounded-end border-1 " placeholder="Enter duration in minutes">
                                    @error('duration')
                                        <span class="text-danger fs-6">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">

                            </div>
                        </div> --}}
                        {{-- INstruction --}}
                        <div class="row mb-3">
                            <div class="col-11 mx-auto">
                                <div class="form-floating">
                                    <label for="floatingTextarea" class="fw-lighter">Enter Text Instructions
                                        Here</label>
                                    <textarea class="form-control" name="instructions" placeholder="Edit Test Instructions" id="floatingTextarea"
                                        style="height: 300px"></textarea>
                                    @error('instructions')
                                        <span class="text-danger fs-6">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mx-5">
                            <a href="{{route('tests.index')}} " class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success">Create Test</button>
                        </div>
                    </form>
                </x-panel>
            </div>

        </div>
    </div>
    <x-flash />
</x-layout>
