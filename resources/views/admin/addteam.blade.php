@extends('layouts/admin')
@section('title', 'Add Team Member')

@section('content')

    <div class="flex items-center gap-3 mb-6">
        <a href="/admin/showteam" class="text-gray-400 hover:text-gray-600 no-underline">
            <i data-feather="arrow-left" style="width:20px;height:20px;"></i>
        </a>
        <h1 class="text-xl font-semibold text-gray-800">Add Team Member</h1>
    </div>

    <div class="max-w-xl">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <form method="post" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Profile Image</label>
                    <input type="file" name="image"
                        class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 cursor-pointer">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Full Name</label>
                    <input type="text" name="name" placeholder="Enter full name"
                        class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Designation</label>
                    <input type="text" name="dsg" placeholder="e.g. Manager, Receptionist"
                        class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all">
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit"
                        class="inline-flex items-center gap-2 bg-gray-900 text-white text-sm font-medium px-5 py-2.5 rounded-lg hover:bg-gray-700 transition-colors cursor-pointer">
                        <i data-feather="check" style="width:16px;height:16px;stroke-width:2.5;"></i> Save Member
                    </button>
                    <a href="/admin/showteam"
                        class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 px-4 py-2.5 rounded-lg hover:bg-gray-100 transition-colors no-underline">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection