@extends('layouts.app')

@section('content')
    <div class="m-auto w-1/5 mt-16 mb-20 bg-orange-200 bg-opacity-50 shadow-md p-1">
        <div class="text-center">
            <h1 class="text-xl bold">
                Generate Vouchers
            </h1>
        </div>
    </div>

    <div class="flex justify-center">
        <form action="/admin/{{ $id }}/process" method="POST">
            @csrf
            @method('PUT')
            <div>
                <div>
                    <label class="text-sm text-gray-700 px-1 underline">
                        Amount of Vouchers
                    </label>
                </div>
                <div>
                    <input 
                        type="text"
                        class="shadow-lg mb-10 p-1 w-56 italic placeholder-gray-400"
                        name="amount"
                        placeholder="Amount...">
                </div>

                <div class="flex justify-center mt-12">
                    <button 
                        type="submit" 
                        class="italic text-sm bg-blue-100 bg-gradient-to-l shadow-lg w-24">
                            Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
