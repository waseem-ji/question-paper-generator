<x-layout>
    <x-slot:title>
        View Questions
    </x-slot:title>
    <x-panel>

        <div class="card w-75 mx-auto m-5">
            <div class="card-header">
                Question {{ $question->id }}
                <span class="badge bg-primary ms-3 p-2">
                    {{ $question->category->name }}</span>
                <span
                    class="badge < class= p-2 '
                                    @php switch ($question->difficulty) {
                                        case 'hard':
                                            echo 'bg-danger';
                                            break;
                                        case 'medium':
                                            echo 'bg-warning';
                                            break;
                                        case 'easy':
                                            echo 'bg-success';
                                            break;
                                    } @endphp
                                    ' >
                                {{ $question->text }}
                            ">
                    {{ $question->difficulty }} </span>

                <span class="badge bg-info p-2 "> {{ $question->type }} </span>

            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{ $question->question }} </p>

                    @isset($question->choice)
                        {{-- Answer guidelines printed here --}}
                        <div class="list-group">

                            <div class="d-flex gap-2 w-100 justify-content-between">
                                <div>
                                    {{-- <h6 class="mb-0">sdad</h6> --}}
                                    @foreach ($choice as $key => $item)
                                        <div>
                                            <span class="fw-bold me-2"> {{ $key }} </span>
                                            {{ $item }}
                                        </div>
                                    @endforeach

                                </div>

                            </div>

                        </div>

                    @endisset

                </blockquote>

            </div>
            <div class="card-footer text-body-secondary">
                <div class="d-flex flex-row-reverse w-25 gap-3 align-items-center">
                    <div>

                        <form class="dropdown-item text-center" action="{{ route('questions.destroy', $question->id) }}"
                            method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this item?');"
                                class="btn btn-danger fw-bold w-100 text-decoration-none ">Delete</button>

                        </form>

                    </div>
                    <div>
                        <a href="/questions/{{ $question->id }}/edit" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </x-panel>
</x-layout>
