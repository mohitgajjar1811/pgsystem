@extends('layouts/admin')
@section('title', 'Registrations')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Registrations</h1>
</div>

@include('admin.partials.filters')

<div id="admin-table-container">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">First Name</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Last Name</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Email</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Phone</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Password</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($data12 as $i)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-3 font-medium text-gray-800">{{ $i->firstname }}</td>
                    <td class="px-6 py-3 text-gray-600">{{ $i->lastname }}</td>
                    <td class="px-6 py-3 text-gray-600">{{ $i->email }}</td>
                    <td class="px-6 py-3 text-gray-600">{{ $i->phoneno }}</td>
                    <td class="px-6 py-3 text-gray-400 tracking-widest">••••••••</td>
                    <td class="px-6 py-3">
                        <a href="/admin/deleteregistration/{{ $i->id }}" class="inline-flex items-center gap-1 text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md no-underline transition-colors"
                           onclick="return confirm('Delete this registration?')">
                            <i data-feather="trash-2" style="width:12px;height:12px;"></i> Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="px-6 py-4 border-t border-gray-50">
            {{ $data12->links() }}
        </div>
    </div>
</div>

@endsection
