@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false,4000)" x-show="show"
        class="position-fixed bottom-0 end-0 m-3 btn btn-primary">
        <p class="m-0 p-1"> {{session('success')}}</p>
    </div>
@endif
