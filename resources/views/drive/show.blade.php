<x-layout>
    <x-slot:title>
        View Drive
    </x-slot:title>
    <x-panel class="border-top-0 border-3 shadow-sm bg-success bg-opacity-10">
        <div class="container">
            <div class="row">
                <div class="col ">
                    <span class="fw-bold fs-4">
                        {{ $drive->name }}
                    </span>
                </div>
                <div class="col">

                    <span class="fs-4">
                        {{ date('d-m-Y', strtotime($drive->created_at)) }}
                    </span>
                </div>
                <div class="col text-end">
                    <span class="fs-5">
                        {{ $drive->drive_type }}

                    </span>
                </div>
            </div>
        </div>
    </x-panel>
    <x-panel class="mt-5 border-2 border-danger-subtle">
        <div class="d-flex justify-content-between mb-5">
            <h3></h3>
            <a class="btn btn-success me-3" href="{{-- route('categories.create') --}} "> Add New Test</a>

        </div>
    </x-panel>
</x-layout>
