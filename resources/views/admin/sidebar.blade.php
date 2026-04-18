@extends('layouts/admin')
@section('title', 'Dashboard')

@section('content')

{{-- Page Header --}}
<div class="flex items-center justify-between mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Overview | Sunrise Admin</h1>
</div>

{{-- Stats Grid --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
    @php
        $cards = [
            ['title' => 'Teams',         'count' => $stats['teams'],         'link' => '/admin/showteam',         'icon' => 'users',         'bg' => 'bg-blue-50',   'color' => 'text-blue-500'],
            ['title' => 'Rooms',         'count' => $stats['rooms'],         'link' => '/admin/showroom',         'icon' => 'home',          'bg' => 'bg-green-50',  'color' => 'text-green-500'],
            ['title' => 'Testimonials',  'count' => $stats['testimonials'],  'link' => '/admin/showtest',         'icon' => 'star',          'bg' => 'bg-purple-50', 'color' => 'text-purple-500'],
            ['title' => 'Contact Us',    'count' => $stats['contacts'],      'link' => '/admin/showcontact',      'icon' => 'mail',          'bg' => 'bg-yellow-50', 'color' => 'text-yellow-500'],
            ['title' => 'Appointments',  'count' => $stats['appointments'],  'link' => '/admin/showappointment',  'icon' => 'calendar',      'bg' => 'bg-red-50',    'color' => 'text-red-500'],
            ['title' => 'Bookings',      'count' => $stats['bookings'],      'link' => '/admin/showbooking',      'icon' => 'list',          'bg' => 'bg-slate-50',  'color' => 'text-slate-500'],
            ['title' => 'Registrations', 'count' => $stats['registrations'], 'link' => '/admin/showregistration','icon' => 'user-plus',     'bg' => 'bg-indigo-50', 'color' => 'text-indigo-500'],
            ['title' => 'Newsletter',    'count' => $stats['newsletter'],    'link' => '/admin/shownews',         'icon' => 'send',          'bg' => 'bg-emerald-50','color' => 'text-emerald-500'],
            ['title' => 'Orders',        'count' => $stats['orders'],        'link' => '/admin/showorder',        'icon' => 'shopping-cart', 'bg' => 'bg-orange-50', 'color' => 'text-orange-500'],
        ];
    @endphp

    @foreach($cards as $card)
    <a href="{{ $card['link'] }}" class="no-underline group">
        <div class="bg-white rounded-lg p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-200 cursor-pointer">
            <div class="flex items-center gap-4">
                {{-- Icon Circle --}}
                <div class="w-12 h-12 rounded-full {{ $card['bg'] }} flex items-center justify-center flex-shrink-0">
                    <i data-feather="{{ $card['icon'] }}" class="{{ $card['color'] }}" style="width:22px;height:22px;stroke-width:2;"></i>
                </div>
                {{-- Text --}}
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400 mb-1">TOTAL {{ $card['title'] }}</p>
                    <p class="text-2xl font-bold text-gray-900 leading-none">{{ $card['count'] }}</p>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>

{{-- Quick Actions --}}
<div class="mb-4">
    <h2 class="text-base font-semibold text-gray-800">Quick Actions</h2>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    @php
        $actions = [
            ['title' => 'Add New Team',       'link' => '/admin/addteam'],
            ['title' => 'Add New Room',        'link' => '/admin/addroom'],
            ['title' => 'Add New Testimonial', 'link' => '/admin/addtest'],
        ];
    @endphp

    @foreach($actions as $action)
    <a href="{{ $action['link'] }}" class="no-underline group">
        <div class="bg-white border-2 border-dashed border-gray-200 rounded-lg p-6 text-center hover:border-blue-400 hover:bg-blue-50 transition-colors duration-200 cursor-pointer">
            <div class="w-8 h-8 mx-auto mb-3 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center group-hover:bg-blue-100 group-hover:border-blue-300 transition-colors">
                <i data-feather="plus" class="text-gray-400 group-hover:text-blue-500" style="width:16px;height:16px;stroke-width:2.5;"></i>
            </div>
            <p class="text-sm font-medium text-gray-600 group-hover:text-blue-600">{{ $action['title'] }}</p>
        </div>
    </a>
    @endforeach
</div>

@endsection
