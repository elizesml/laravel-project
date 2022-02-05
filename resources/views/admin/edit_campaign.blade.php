@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 mt-16 mb-20 bg-purple-700 bg-opacity-20 shadow-md p-1">
        <div class="text-center">
            <h1 class="text-3xl bold uppercase font-serif">
                Modify Campaign
            </h1>
        </div>
    </div>

    <div class="flex justify-center">
        <form action="/admin/{{ $campaign->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <!-- Campaign Name -->
                <label class="text-sm text-gray-700 px-1">
                    Campaign Name
                </label>
                <div>
                    <input 
                        type="text"
                        class="shadow-lg mb-10 p-1 w-56 italic placeholder-gray-400"
                        name="name"
                        value="{{ $campaign->name }}">
                </div>
                
                <!-- Start Date -->
                <div>
                    <label class="text-sm text-gray-700 px-1">
                        Set a start date (date and time):
                    </label>
                </div>
                <div>
                    <input type="datetime-local" class="shadow-md text-gray-800 mb-5 p-1"
                        name="start_date" value="{{ $campaign->start_date }}">
                </div>

                <!-- End Date -->
                <div>
                    <label class="text-sm text-gray-700 px-1">
                        Set an end date (date and time):
                    </label>
                </div>
                <div>
                    <input type="datetime-local" class="shadow-md text-gray-800 mb-5 p-1"
                        name="end_date" value="{{ $campaign->end_date }}"">
                </div>

                <!-- Image Upload -->
                @include('layouts.upload_image')

                <!-- Active Status -->
                <div class="flex justify-center text-sm text-gray-800 mb-10 p-1">
                    @foreach ($status_code as $key => $value)
                        <input type="radio" name="active_status" value="{{ $key }}">
                        <label class="ml-2 mr-6">{{ $value }}</label>
                    @endforeach
                </div>
                
                <div class="flex justify-center">
                    <button type="submit" class="italic text-sm bg-green-100 bg-gradient-to-l shadow-lg w-16">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Error messages -->
    @include('errors.error_messages')
    
@endsection
