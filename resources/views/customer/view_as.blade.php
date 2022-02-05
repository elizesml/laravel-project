@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <h1 class="text-3xl bold text-center font-serif italic">
            View as Customer
        </h1>
        <div class="text-center italic text-sm mt-3 py-2">
            Select a customer name below to view from:
        </div>
        <div class="text-center italic text-sm">
            (details displayed in dropdown list)
        </div>
    </div>

    <div class="text-center italic text-sm py-2 underline">
        Dropdown List
    </div>
    <div class="flex justify-center mb-16">
        <select name="customers" class="font-sans">
            @foreach ($customer_details as $customer)
                <div>
                    <option value="{{ $customer['customer_id'] }}">
                        {{ $customer['customer_id'] . 
                            ') ' . $customer['first_name'] . 
                            ' ' . $customer['last_name'] . 
                            ' - ' . $customer['Transaction_count'] . ' transactions (last 30 days)' .
                            ' - $' . $customer['total_spent']
                            }}
                    </option>
                </div>
            @endforeach
        </select>
    </div>

    @foreach ($customer_details as $customer)
        <table class='flex justify-center'>
            <tr class="text-center">
                <td class="text-sm hover:text-blue-700 border-gray-300 w-48">
                    <a href="{{ '/user/' . $customer['customer_id'] }}">
                        {{ $customer['customer_id'] . ') ' . $customer['first_name'] . ' '. $customer['last_name'] }}
                    </a>
                </td>
            </tr>
        </table>
    @endforeach

@endsection
