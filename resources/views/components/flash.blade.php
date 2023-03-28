@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="position-fixed bottom-0 end-0 m-3 btn btn-success">
        <p class="m-0 p-1"> {{ session('success') }}</p>
    </div>
@endif

@if (session()->has('danger'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="position-fixed bottom-0 end-0 m-3 btn btn-danger">
        <p class="m-0 p-1"> {{ session('danger') }}</p>
    </div>
@endif

@if (session()->has('info'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="position-fixed bottom-0 end-0 m-3 btn btn-info">
        <p class="m-0 p-1"> {{ session('info') }}</p>
    </div>
@endif
