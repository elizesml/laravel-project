@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold font-serif">
            Campaigns
        </h1>
    </div>
    <div class="pt-10">
        <a 
            href="/admin/create"
            class="border-b-2 pb-2 border-dotted italic text-gray-500">
                Add a new campaign &rarr;
        </a>
    </div>

    <div class="w-5/6 py-10">
        @foreach ($campaigns as $campaign)
            <div class="m-auto">
                <div class="float-right">
                    <a 
                        class="border-b-2 pb-2 border-dotted italic text-green-500"
                        href="/admin/{{ $campaign->id }}/edit">
                            Edit &rarr;
                    </a>

                    <form action="/admin/{{ $campaign->id }}" class="pt-3" method='POST'>
                        @csrf
                        @method('delete')
                        <button 
                            type="submit"
                            class="absolute right-auto border-b-2 pb-2 border-dotted italic text-red-500">
                                Delete &rarr;
                        </button>
                    </form>
                </div>
                <h2 class="font-serif text-gray-700 text-4xl hover:text-orange-400 shadow-outline text-opacity-75 italic">
                    <a href="/admin/{{ $campaign->id }}">
                        {{ $campaign->name }}
                    </a>
                </h2>

                <div class="mb-10">
                    <form action="/admin/{{ $campaign->id }}/generate" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="font-mono shadow-md w-48 italic bg-orange-100 bg-opacity-25 py-2 mb-16 mt-5 
                            text-indigo-700 text-opacity-7 hover:text-red-500 italic">
                            Generate Vouchers
                        </button>
                        <span class="inline-grid text-sm text-gray-700 ml-5 italic bold underline">
                            @if ($campaign->active == "1")
                                Status: Active
                            @else
                                Status: Disabled
                            @endif
                        </span>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection