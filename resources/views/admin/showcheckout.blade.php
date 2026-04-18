@extends('layouts/admin')
@section('title', 'Checkouts')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Checkouts</h1>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-100">
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Room Name</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Bed</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Price / Bed</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Total</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($data14 as $i)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-3 font-medium text-gray-800">{{ $i->roomname }}</td>
                <td class="px-6 py-3 text-gray-600">{{ $i->bed }}</td>
                <td class="px-6 py-3 text-gray-600">₹{{ $i->priceperb }}</td>
                <td class="px-6 py-3 font-semibold text-gray-800">₹{{ $i->total }}</td>
                <td class="px-6 py-3">
                    <a href="/admin/deletecheckout/{{ $i->id }}" class="inline-flex items-center gap-1 text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md no-underline transition-colors"
                       onclick="return confirm('Delete?')">
                        <i data-feather="trash-2" style="width:12px;height:12px;"></i> Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
