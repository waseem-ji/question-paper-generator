<x-layout>
    <x-slot:title>
        <h3>All Questions</h3>
        <a class="btn btn-success me-3" href="/questions/create">Add New Question</a>
    </x-slot:title>
    <div>
        <table class="table table-bordered table-hover table-light ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Question</th>
                    <th scope="col">Category</th>
                    <th scope="col">Difficulty</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody class="table-group-divider border-1">
                @foreach ($questions as $key=>$question)
                    <tr>
                        <th scope="row">{{ $questions->firstItem()+$key }}</th>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->category->name }}</td>
                        <td>{{ $question->difficulty }}</td>
                        <td>{{ $question->type }}</td>
                        <td>
                            <div class="d-flex gap-3 ">
                                <div>
                                    <a href='/questions/{{ $question->id }}' class="btn btn-primary">View</a>
                                </div>
                                <div>
                                    <a href="/questions/{{ $question->id }}/edit" class="btn btn-warning">Edit</a>
                                </div>
                                <div>

                                    <form class="dropdown-item text-center" action="{{ route('questions.destroy', $question->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this question?');"
                                            class="btn btn-danger fw-bold w-100 text-decoration-none ">Delete</button>

                                    </form>

                                </div>


                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $questions->links()}}

    </div>
    <x-flash />
</x-layout>
