<x-candidate-layout>
    @foreach ($questions as $key => $question)
        <div class="container-fluid">
            <div class="row bg-info-subtle">
                <div class="d-flex justify-content-center pt-3">
                    {{ $questions->links() }}
                    @if ($questions->onLastPage())

                    @endif

                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row vh-100">
                <div class="col mt-3">
                    <x-panel class="bg-danger  h-75">
                        <div class="row">
                            <div class="col fw-bold">
                                Question {{ $questions->firstItem() + $key }}
                            </div>
                        </div>
                        <div class="row">
                            <div class=" mt-5 fs-5">
                                {{ $question->question }}
                            </div>
                        </div>
                    </x-panel>
                </div>
                <div class="col border-start mt-3">
                    <x-panel class="h-75">
                        <div class="container">
                            <div class="row mb-5">
                                <div class="col d-flex justify-content-between">
                                    <h4>Select an option</h4>
                                    {{-- <div class="">
                                        <label for="clearResponse">Clear Response</label>
                                        <input type="checkbox" name="deselect" id="clearResponse"
                                            value="Clear Response">

                                    </div> --}}
                                </div>
                            </div>
                            @isset($question->choice)
                                {{-- Answer guidelines printed here --}}
                                <div class="row form-check">
                                    @php
                                        $choice = json_decode($question->choice);
                                    @endphp
                                    @foreach ($choice as $key => $item)
                                        <div class="col border border-1 border-secondary-subtle shadow p-3 fs-5 fw-bold my-4 bg-white bg-opacity-100 rounded-3">
                                            <input type="radio" id="option{{ $key }}" name="answer"
                                                value="{{ $key }}">
                                            <label for="option{{ $key }}">{{ $item }}</label>
                                            {{-- <span class="fw-bold me-2"> {{ $key }} </span>
                                        {{ $item }} --}}
                                        </div>
                                    @endforeach

                                </div>
                            @endisset
                            {{-- <div class="row form-check">
                            <div class="col border border-2 border-primary p-3 fs-5 fw-bold">
                                <input type="radio" id="optionA" name="answer" value="a">
                                <label for="optionA">Option 1</label>
                            </div>
                            <div class="col border border-2 border-primary p-3 fs-5 fw-bold my-3">
                                <input type="radio" id="optionB" name="answer" value="b">
                                <label for="optionB">Option 2</label>
                            </div>
                            <div class="col border border-2 border-primary p-3 fs-5 fw-bold my-3">
                                <input type="radio" id="optionC" name="answer" value="c">
                                <label for="optionC">Option 3</label>
                            </div>
                            <div class="col border border-2 border-primary p-3 fs-5 fw-bold">
                                <input type="radio" id="optionD" name="answer" value="d">
                                <label for="optionD">Option 4</label>
                            </div>
                        </div> --}}
                        </div>
                    </x-panel>
                </div>
            </div>
        </div>
    @endforeach
</x-candidate-layout>
