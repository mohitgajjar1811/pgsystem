@extends('layouts/admin')
@section('title', 'Team Members')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Team Members</h1>
    <a href="/admin/addteam" class="inline-flex items-center gap-2 bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors no-underline">
        <i data-feather="plus" style="width:16px;height:16px;stroke-width:2.5;"></i> Add Team Member
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-100">
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Image</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Name</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Designation</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($data11 as $i)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-3">
                    <img src="{{ asset('img_uploads/' . $i->image) }}" class="h-10 w-10 rounded-full object-cover" alt="{{ $i->name }}">
                </td>
                <td class="px-6 py-3 font-medium text-gray-800">{{ $i->name }}</td>
                <td class="px-6 py-3 text-gray-500">{{ $i->dsg }}</td>
                <td class="px-6 py-3 flex items-center gap-2">
                    <a href="/admin/updateteam/{{ $i->id }}" class="inline-flex items-center gap-1 text-xs font-medium text-blue-600 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-md no-underline transition-colors">
                        <i data-feather="edit-2" style="width:12px;height:12px;"></i> Edit
                    </a>
                    <a href="/admin/deleteteam/{{ $i->id }}" class="inline-flex items-center gap-1 text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md no-underline transition-colors"
                       onclick="return confirm('Delete this member?')">
                        <i data-feather="trash-2" style="width:12px;height:12px;"></i> Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if(count($data11) === 0)
    <div class="text-center py-12 text-gray-400">
        <i data-feather="users" style="width:40px;height:40px;" class="mx-auto mb-3 opacity-40"></i>
        <p class="text-sm">No team members found.</p>
    </div>
    @endif
</div>

@endsection
