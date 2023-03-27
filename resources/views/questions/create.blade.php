<x-layout>
    <x-slot:title>
        ADD A NEW QUESTION
    </x-slot:title>

    <div class="col-8 mx-auto">
        <x-panel class="bg-light">
            <form action="/questions" method="post">
                @csrf
                <div class="row mb-4">
                    <div class="col ">
                        <label for="question" class="ms-3 form-label">Enter Question</label>
                        <textarea class="form-control" rows="3" id="question" name="question"></textarea>
                        @error('questions')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mt-4 mb-4">
                    <div class="col">
                        <select class="form-select" name="difficulty">
                            <option selected>Select Difficulty</option>
                            <option value="easy">Easy</option>
                            <option value="medium">Medium</option>
                            <option value="hard">Hard</option>
                        </select>
                        @error('difficulty')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col">
                        <select class="form-select" id="type" name="type">
                            <option selected>Select Question Type</option>
                            <option value="programming">Programming</option>
                            <option value="mcq">MCQ</option>
                        </select>
                        @error('type')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col">
                        <select class="form-select" name="category_id">
                            <option selected>Select Category</option>
                            {{-- category --}}
                            @php
                                $categories = \App\Models\Category::all();
                            @endphp
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div id="optionContainer" style="display:none" class="row">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary add-option-btn">Add Option <svg width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-plus-circle align-text-bottom" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg></button>
                    </div>
                </div>
                <div id="answerColumn" style="display:none">
                    <div class="col form-group">
                        <label for="answerGuidelines" class="ms-3 form-label">Write guidelines for answer</label>
                        <textarea class="form-control" rows="3" id="answerGuidelines" name="answerGuidelines"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </x-panel>

    </div>
    <script>
        $(function() {

            $('#optionContainer').hide();
            $('#answerColumn').hide();

            $('#type').change(function() {
                var type = $(this).val();

                if (type === 'mcq') {
                    $('#optionContainer').show();
                    $('#answerColumn').hide();
                } else {
                    $('#answerColumn').show();
                    $('#optionContainer').hide();
                }
            });

            var optionIndex = 0;

            $('.add-option-btn').click(function() {
                optionIndex++;

                var optionHtml = `
            <div class="form-group option-group my-2 row">
                <input type="text" class="form-control col mx-3 text-end bg-transparent border-0" name="choice[${optionIndex}][text]" placeholder="${optionIndex}" disabled>
                <input type="text" class="form-control col mx-3" name="choice[${optionIndex}]" placeholder="Option value">
                <button type="button" class=" col btn btn-danger remove-option-btn mx-3">Remove</button>
            </div>`;
                $('#optionContainer').append(optionHtml);
            });

            $('#optionContainer').on('click', '.remove-option-btn', function() {
                $(this).closest('.option-group').remove();
            });
        });
    </script>

</x-layout>
