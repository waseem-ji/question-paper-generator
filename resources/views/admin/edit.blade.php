<x-layout>
    <x-slot:title>
        <h3>Edit Administrator Details</h3>
    </x-slot:title>
    <x-panel class="col-8 mx-auto bg-light border-0">
        <div class=" pb-3">

        </div>

        <form action="{{ route('admin.update', $admin->id) }} " method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="row">
                    <label for="category" class="ms-3 col-4 col-form-label">Enter username</label>
                    <input type="text" name="name" id="category" class="form-control col" required
                        value="{{ old('name') ?? $admin->name }}">
                    @error('name')
                        <p class="text-danger ms-3"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="row mt-1 pt-1">
                    <label for="category" class="ms-3 col-4 col-form-label">Enter Email</label>
                    <input type="email" name="email" id="category" class="form-control col"
                        value="{{ old('email') ?? $admin->email }}" required>
                    @error('email')
                        <p class="text-danger ms-3"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="row mt-1 pt-1 align-items-center">
                    <label for="" class="ms-3 col-4 col-form-label">Role</label>
                    <div class="col">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1"
                            value="admin" @if ($admin->role === 'admin') checked @endif>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Admin
                        </label>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2"
                            value="hr" @if ($admin->role === 'hr') checked @endif>
                        <label class="form-check-label" for="flexRadioDefault2">
                            HR
                        </label>
                    </div>
                    @error('role')
                        <p class="text-danger ms-3"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="row mt-1 pt-1">
                    <label for="category" class="ms-3 col-4 col-form-label">Enter Password</label>
                    <input type="text" name="password" id="category" class="form-control col" required>
                    @error('password')
                        <p class="text-danger ms-3"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="row mt-1 pt-1">
                    <label for="category" class="ms-3 col-4 col-form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="category" class="form-control col"
                        required>
                    @error('password_confirmation')
                        <p class="text-danger ms-3"> {{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.index') }} " class="mt-3 text-decoration-none btn btn-danger ">Cancel</a>
                    <button type="submit" class="btn btn-success mt-3 me-4">Submit</button>
                </div>
            </div>
        </form>
    </x-panel>
</x-layout>
