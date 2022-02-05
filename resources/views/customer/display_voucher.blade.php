@extends('layouts.app')

@section('content')
    @include('layouts.promotions_header')

    @if ($verified == 'True')
        <h1 class="flex justify-center text-3xl font-serif py-5 mt-8 text-gray-600 text-opacity-75">
            Voucher Code
        </h1>

        <div class="flex justify-center text-2xl font-mono text-opacity-50 border-2 py-5 mt-12 uppercase">
            {{ $voucher_code }}
        </div>

    @else
        <div class="flex justify-center text-2xl font-mono text-red-500 text-opacity-75 py-5 mt-20 italic">
            Image does not meet the requirements.
        </div>
    @endif
    
@endsection