<x-layout>
    <x-slot:title>
        Add Question
    </x-slot:title>
    <x-panel>
        Add a new question form
        <div class="row">
            <h2>Test ID:{{ $test_id }} </h2>
        </div>
    </x-panel>
    <x-panel class="mt-3  border-2 border-secondary col-9 mx-auto">

        <div class="col mb-3">
            <div class="input-group mb-3">
                <label class="input-group-text" for="questionType">Question Type</label>
                <select class="form-select" id="questionType" name="questionType">
                    <option selected value="">Choose...</option>
                    <option value="1">Random Question</option>
                    <option value="2">Specific Question</option>

                </select>
            </div>
            @error('questionType')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <a href="{{ route('tests.show', $test_id) }}" class="btn btn-primary">Go Back</a>
        </div>

        <div id="randomContainer" style="display:none" class="row">
            <div class="col-6">
                <div class="form-group">
                    <form action="{{ route('storeRandom', $test_id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="test_id" value="{{ $test_id }}">
                        <div class="row">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="category">Select Category</label>
                                <select class="form-select" id="category" name="category_id">
                                    <option selected value="">Choose...</option>
                                    @php
                                        $categories = \App\Models\Category::all();
                                    @endphp
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @error('category_id')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="difficulty">Difficulty</label>
                                <select class="form-select" id="difficulty" name="difficulty">
                                    <option selected value="">Choose...</option>
                                    <option value="easy">Easy</option>
                                    <option value="medium">Medium</option>
                                    <option value="hard">Hard</option>

                                </select>
                            </div>
                            @error('difficulty')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Number</span>
                                <input type="number" class="form-control" placeholder="Enter number of questions"
                                    name="number_of_questions">
                                @error('number_of_questions')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-info">Add Questions</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        @error('error')
            <p class="text-danger"> {{ $message }}</p>
        @enderror
        <div id="specificContainer" style="display:none">
            <div class="col">
                <input type="text" id="search-bar" class="form-control" placeholder="Search for a question...">

            </div>
            <div class="col">
                <div id="search-results">

                </div>
            </div>
        </div>
    </x-panel>
    <x-flash />
    <script>
        $(function() {

            $('#questionType').change(function() {
                var type = $(this).val();

                if (type === '1') {
                    $('#randomContainer').show();
                    $('#specificContainer').hide();
                } else if (type == '2') {
                    $('#specificContainer').show();
                    $('#randomContainer').hide();
                } else {
                    $('#specificContainer').hide();
                    $('#randomContainer').hide();
                }
            });
        });

        $(document).ready(function() {
            $('#search-bar').on('input', function() {
                var query = $(this).val().trim();

                if (query.length > 3) {
                    $.ajax({
                        url: '/search',
                        method: 'GET',
                        data: {
                            query: query,
                        },
                        success: function(response) {
                            // console.log(query.length);
                            // console.log(response);
                            var results = '';
                            if (response.length > 0) {
                                results += '<ul class="list-group mt-5">';
                                $.each(response, function(key, value) {
                                    results += '<li class="list-group-item">' + value
                                        .question +
                                        ' <form method="POST" action="{{ route('storeSpecific') }}"> @csrf <input type=hidden name="test_id" value={{ $test_id }}> <input type="hidden" name="question_id" value=' +
                                        value
                                        .id +
                                        ' > <button type="submit" class="btn btn-success my-2">Select</button> </form> </li>';

                                });
                                results += '</ul>';
                            } else {
                                results = '<p>No results found.</p>';
                            }
                            $('#search-results').html(results);

                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });
        });
    </script>

</x-layout>
