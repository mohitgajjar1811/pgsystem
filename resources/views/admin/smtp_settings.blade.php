@extends('layouts/admin')
@section('title', 'SMTP Settings')

@section('content')

<div class="flex items-center gap-3 mb-6">
    <a href="/admin" class="text-gray-400 hover:text-gray-600 no-underline">
        <i data-feather="arrow-left" style="width:20px;height:20px;"></i>
    </a>
    <h1 class="text-xl font-semibold text-gray-800">SMTP Email Settings</h1>
</div>

@if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-5 flex items-center gap-2">
        <i data-feather="check-circle" style="width:18px;height:18px;flex-shrink:0;"></i>
        <span class="text-sm font-medium">{{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-5 flex items-center gap-2">
        <i data-feather="alert-circle" style="width:18px;height:18px;flex-shrink:0;"></i>
        <span class="text-sm font-medium">{{ session('error') }}</span>
    </div>
@endif

<div class="max-w-2xl">

    {{-- Info Card --}}
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6 flex gap-3">
        <i data-feather="info" style="width:20px;height:20px;flex-shrink:0;color:#3b82f6;margin-top:1px;"></i>
        <div>
            <p class="text-sm font-semibold text-blue-800 mb-1">Gmail Users</p>
            <p class="text-sm text-blue-700">Use an <strong>App Password</strong> (not your normal Gmail password). Go to: Gmail → Google Account → Security → 2-Step Verification → App Passwords. Host: <code>smtp.gmail.com</code>, Port: <code>587</code>, Encryption: <code>tls</code></p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
            <div class="w-10 h-10 bg-orange-50 rounded-full flex items-center justify-center">
                <i data-feather="mail" style="width:20px;height:20px;color:#FEA116;"></i>
            </div>
            <div>
                <p class="font-semibold text-gray-800">SMTP Configuration</p>
                <p class="text-xs text-gray-500">Configure your email server settings for sending emails</p>
            </div>
        </div>

        <form method="post" action="/admin/smtp-settings" class="space-y-5">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">SMTP Host</label>
                    <input type="text" name="host" placeholder="smtp.gmail.com"
                           value="{{ $smtp->host ?? 'smtp.gmail.com' }}"
                           class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Port</label>
                    <input type="number" name="port" placeholder="587"
                           value="{{ $smtp->port ?? 587 }}"
                           class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Encryption</label>
                <select name="encryption"
                        class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition-all bg-white">
                    <option value="tls" {{ (($smtp->encryption ?? 'tls') == 'tls') ? 'selected' : '' }}>TLS (Recommended)</option>
                    <option value="ssl" {{ (($smtp->encryption ?? '') == 'ssl') ? 'selected' : '' }}>SSL</option>
                    <option value="" {{ (($smtp->encryption ?? '') == '') ? 'selected' : '' }}>None</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">SMTP Username (Email)</label>
                <input type="email" name="username" placeholder="your@gmail.com"
                       value="{{ $smtp->username ?? '' }}"
                       class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition-all">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    SMTP Password
                    <span class="text-gray-400 font-normal">(App Password for Gmail)</span>
                </label>
                <input type="password" name="password" placeholder="Enter SMTP password or App Password"
                       value="{{ $smtp->password ?? '' }}"
                       class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition-all">
            </div>

            <div class="border-t border-gray-100 pt-5">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Sender & Admin Info</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">From Name</label>
                        <input type="text" name="from_name" placeholder="Sunrise PG"
                               value="{{ $smtp->from_name ?? 'Sunrise PG' }}"
                               class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">From Email</label>
                        <input type="email" name="from_email" placeholder="noreply@sunrise.com"
                               value="{{ $smtp->from_email ?? '' }}"
                               class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition-all">
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    Admin Notification Email
                    <span class="text-gray-400 font-normal">(Receives new booking alerts)</span>
                </label>
                <input type="email" name="admin_email" placeholder="admin@sunrise.com"
                       value="{{ $smtp->admin_email ?? '' }}"
                       class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition-all">
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="inline-flex items-center gap-2 bg-gray-900 text-white text-sm font-medium px-6 py-2.5 rounded-lg hover:bg-gray-700 transition-colors cursor-pointer">
                    <i data-feather="save" style="width:16px;height:16px;stroke-width:2.5;"></i>
                    Save Settings
                </button>
                <a href="/admin"
                   class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 px-4 py-2.5 rounded-lg hover:bg-gray-100 transition-colors no-underline">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
