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
            <li href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3 " aria-current="true">

                <div class="d-flex gap-2 w-75 justify-content-between">
                    <div>
                        <p></p>
                        <h6 class="mb-0">Et cupiditate sed qui quidem.</h6>
                        <p class="mb-0 opacity-75">By Abigale Dooley</p>
                    </div>

                </div>
                <div class="d-flex flex-row-reverse w-25 gap-3 mx-3 align-items-center">
                    <div class="">

                        <form class="dropdown-item text-center" action="admin/5/deletePost" method="post">
                            <input type="hidden" name="_token" value="5qzdJcU9mJN12RJ8hDCX9ekrvXPNu3p2enzQhPvg">
                            <input type="hidden" name="_method" value="DELETE">

                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this item?');"
                                class="btn btn-danger fw-bold w-100 text-decoration-none ">Delete</button>

                        </form>

                    </div>
                    <div class="">
                        <a href="/admin/5/editPost" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </li>

        </x-panel>

    </div>

</x-layout>
