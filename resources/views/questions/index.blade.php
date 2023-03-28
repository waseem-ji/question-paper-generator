<x-layout>
    <x-slot:title>
        Questions
    </x-slot:title>
    <div class="list-group w-auto">

        <x-panel>
            <div class="d-flex justify-content-between mb-2">
                <h3>All Questions</h3>
                <a class="btn btn-success me-3" href="/questions/create"> New Question</a>

            </div>
            @foreach ($questions as $question)
                <li onclick="location.href='/questions/{{ $question->id }}' "
                    class="list-group-item list-group-item-action d-flex gap-3 py-3 " aria-current="true">

                    <div class="d-flex gap-2 w-75 justify-content-between">
                        <div>
                            <p></p>
                            <h6  class="mb-0 h6 text-decoration-none">{{ $question->question }} <span
                                    class="badge bg-primary ms-3 p-2">
                                    {{ $question->category->name }}</span> </h6>
                            <p class="mb-0 opacity-75 mt-2">
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
                                <span class="badge bg-info p-2 ms-2"> {{ $question->type }} </span>
                            </p>
                        </div>

                    </div>
                    <div class="d-flex flex-row-reverse w-25 gap-3 mx-3 align-items-center">
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
                </li>
            @endforeach
            <div class="mt-3">
                {{ $questions->links() }}

            </div>

        </x-panel>

    </div>

    <x-flash />
</x-layout>
