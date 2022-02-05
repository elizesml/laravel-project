@extends('layouts.app')

@section('content')
    @include('layouts.promotions_header')

    <form action="/user/{{ $customer_id }}/{{ $voucher->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="flex justify-center">
            <input type="hidden" name="voucher_code" value="{{ $voucher->code }}">
            <h1 class="text-2xl py-5 mt-4 font-serif italic">
                Select an image to upload
            </h1>
        </div>
        <div class="px-5 py-4 mt-5 mb-8 flex justify-center">
            <input type="file" class="text-sm mb-6 p-1 w-56 italic placeholder-gray-400"
                name="image">
        </div>


        <!-- Dropdown Box -->
        <div class="m-auto flex justify-center text-sm italic py-2 font-mono">
            For testing purposes, please select True or False
        </div>
        <div class="flex justify-center mb-16 mt-3">
            <select name="img_verified">
                <option value="True">True</option>
                <option value="False">False</option>
            </select>
        </div>
        
        <div class="flex justify-center">
            <button type="submit" class="italic text-sm bg-blue-100 bg-gradient-to-l shadow-lg w-16">
                Submit
            </button>
        </div>
    </form>

    <!-- Error messages -->
    @include('errors.error_messages')

@endsection