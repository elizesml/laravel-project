@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-4xl bold font-serif">
                {{ $campaign->name }}
            </h1>
        </div>
        <div class="py-10 text-center">
            <table class='flex justify-center'>
                {{-- Table Header --}}
                <tr class="bg-blue-100 bg-opacity-10 bg-gradient-to-bl from-green-300 to-blue-300">
                    <th class="border-2 border-gray-500 w-48 px-2">
                        Campaign Name
                    </th>
                    <th class="border-2 border-gray-500 w-24 px-2">
                        Vouchers
                    </th>
                    <th class="border-2 border-gray-500 w-40 px-2">
                        Start Date
                    </th>
                    <th class="border-2 border-gray-500 w-40 px-2">
                        End Date
                    </th>
                    <th class="border-2 border-gray-500 px-5">
                        Image
                    </th>
                    <th class="border-2 border-gray-500 w-24 px-2">
                        Status
                    </th>
                </tr>

                {{-- Table Record --}}
                <tr class="text-center from-yellow-100">
                    <td class="border-2 border-gray-500">
                        {{ $campaign->name }}
                    </td>

                    <td class="border-2 border-gray-500">
                        {{ $campaign->voucherCodes()->count() }}
                    </td>

                    <td class="border-2 border-gray-500">
                        {{ $campaign->start_date }}
                    </td>

                    <td class="border-2 border-gray-500">
                        {{ $campaign->end_date }}
                    </td>

                    <td class="border-2 border-gray-500">
                        @if ($campaign->image_path != null)
                            <img src="{{ asset('images/' . $campaign->image_path) }}" width="80" alt="Promotion">
                        @else
                            None
                        @endif

                    </td>


                    <td class="border-2 border-gray-500">
                        @if ($campaign->active == 1)
                            Active
                        @else
                            <a href="/admin/{{ $campaign->id }}/edit" class="text-blue-800 hover:text-red-500 underline bold">
                                Enable
                            </a>
                        @endif
                    </td>
                </tr>
            </table>

            {{-- Edit and Delete --}}
            <div class="mt-40">
                <a 
                    class="inline px-10 border-b-2 pb-2 border-dotted italic text-green-500"
                    href="/admin/{{ $campaign->id }}/edit">
                        Edit &rarr;
                </a>

            <form action="/admin/{{ $campaign->id }}" class="inline px-10 pt-3" method='POST'>
                @csrf
                @method('delete')
                <button 
                    type="submit"
                    class="border-b-2 pb-2 border-dotted italic text-red-500">
                        Delete &rarr;
                </button>
            </form>
            </div>
            
            {{-- Generate vouchers --}}
            <div class="m-auto py-5">
                <form action="/admin/{{ $campaign->id }}/generate" method="POST">
                    @csrf
                    @method('PUT')
                    <button 
                        type="submit"
                        class="bg-purple-300 bg-opacity-70 hover:bg-green-800 hover:bg-opacity-50 text-white font-bold py-1 px-3 rounded-full">
                            Generate Vouchers &rarr;
                    </button>            
                </form>
            </div>
        </div>
    </div>
@endsection