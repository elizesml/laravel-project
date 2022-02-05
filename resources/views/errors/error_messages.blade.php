
@if ($errors->any())
    <div class="m-auto text-center mt-10">
        <div class="m-auto text-lg bg-red-300 bold mb-8 w-2/6 italic">
            Submission unsuccessful!
        </div>

        @foreach ($errors->all() as $error)
            <li class="text-sm text-red-500 list-none italic flex justify-center">
                {{ $error }}
            </li>
        @endforeach
    </div>
@endif