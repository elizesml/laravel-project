@extends('layouts.app')

@section('content')
    @include('layouts.promotions_header')

    @forelse ($active_campaigns as $active_campaign)
        <div class="flex justify-center text-3xl py-5 mt-16 font-serif">
            {{ $active_campaign->name }}            
        </div>

        <div class="flex justify-center">
            <a href="/user/{{ $customer_id }}/enter/{{ $active_campaign->id }}">
                @if ($active_campaign->image_path != null)
                    <img src="{{ asset('images/' . $active_campaign->image_path ) }}" 
                        width="500" alt="Promotion" class="mb-10 py-2 px-2">
                @else
                    <div class="text-lg text-blue-700 hover:text-red-500 mt-12 mb-16 py-2 px-2">
                        Click here to enter
                    </div>
                @endif
            </a>
        </div>
    @empty
        <div class="flex justify-center text-2xl text-red-500 py-10 italic mt-20">
            No active campaigns or promotions found!
        </div>
    @endforelse

@endsection