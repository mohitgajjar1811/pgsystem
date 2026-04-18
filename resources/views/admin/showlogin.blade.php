@extends('layouts/admin')
@section('title', 'Login Records')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Login Records</h1>
</div>

@include('admin.partials.filters')

<div id="admin-table-container">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Email</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Password</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($data13 as $i)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-3 text-gray-700 font-medium">{{ $i->email }}</td>
                    <td class="px-6 py-3 text-gray-400 tracking-widest">••••••••</td>
                    <td class="px-6 py-3 text-right">
                        <a href="/admin/deleteregistration/{{ $i->id }}" class="inline-flex items-center gap-1 text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md no-underline transition-colors"
                           onclick="return confirm('Delete this record?')">
                            <i data-feather="trash-2" style="width:12px;height:12px;"></i> Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="px-6 py-4 border-t border-gray-50">
            {{ $data13->links() }}
        </div>
    </div>
</div>

@endsection
