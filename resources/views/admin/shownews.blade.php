@extends('layouts/admin')
@section('title', 'Newsletter')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Newsletter Subscribers</h1>
    <span class="text-sm text-gray-400">{{ count($data10) }} subscriber{{ count($data10) !== 1 ? 's' : '' }}</span>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-100">
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">#</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Email Address</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($data10 as $index => $i)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-3 text-gray-400 text-xs">{{ $index + 1 }}</td>
                <td class="px-6 py-3 text-gray-700">{{ $i->email }}</td>
                <td class="px-6 py-3">
                    <a href="/admin/deletenews/{{ $i->id }}" class="inline-flex items-center gap-1 text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md no-underline transition-colors"
                       onclick="return confirm('Remove this subscriber?')">
                        <i data-feather="trash-2" style="width:12px;height:12px;"></i> Remove
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if(count($data10) === 0)
    <div class="text-center py-12 text-gray-400">
        <p class="text-sm">No subscribers yet.</p>
    </div>
    @endif
</div>

@endsection
