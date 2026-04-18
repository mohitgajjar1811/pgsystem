@extends('layouts/admin')

@section('title', 'Dashboard')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0" style="font-size: 1.25rem; font-weight: 600; color: #111827;">Overview | Sunrise Admin</h1>
</div>

<div class="row g-3 mb-4">
    @php
        $cards = [
            ['title' => 'Teams',         'count' => $stats['teams'],         'link' => '/admin/showteam',         'icon' => 'users',         'bg' => '#eff6ff', 'color' => '#3b82f6'],
            ['title' => 'Rooms',         'count' => $stats['rooms'],         'link' => '/admin/showroom',         'icon' => 'home',          'bg' => '#f0fdf4', 'color' => '#22c55e'],
            ['title' => 'Testimonials',  'count' => $stats['testimonials'],  'link' => '/admin/showtest',         'icon' => 'star',          'bg' => '#fdf4ff', 'color' => '#a855f7'],
            ['title' => 'Contact Us',    'count' => $stats['contacts'],      'link' => '/admin/showcontact',      'icon' => 'mail',          'bg' => '#fefce8', 'color' => '#eab308'],
            ['title' => 'Appointments',  'count' => $stats['appointments'],  'link' => '/admin/showappointment',  'icon' => 'calendar',      'bg' => '#fff1f2', 'color' => '#f43f5e'],
            ['title' => 'Bookings',      'count' => $stats['bookings'],      'link' => '/admin/showbooking',      'icon' => 'list',          'bg' => '#f8fafc', 'color' => '#64748b'],
            ['title' => 'Registrations', 'count' => $stats['registrations'], 'link' => '/admin/showregistration','icon' => 'user-plus',     'bg' => '#f5f3ff', 'color' => '#7c3aed'],
            ['title' => 'Newsletter',    'count' => $stats['newsletter'],    'link' => '/admin/shownews',         'icon' => 'send',          'bg' => '#ecfdf5', 'color' => '#10b981'],
            ['title' => 'Orders',        'count' => $stats['orders'],        'link' => '/admin/showorder',        'icon' => 'shopping-cart', 'bg' => '#fff7ed', 'color' => '#f97316'],
        ];
    @endphp

    @foreach($cards as $card)
    <div class="col-12 col-sm-6 col-md-4">
        <a href="{{ $card['link'] }}" class="text-decoration-none d-block">
            <div class="bg-white rounded-3 p-4 virja-card" style="box-shadow: 0 1px 3px 0 rgba(0,0,0,0.1), 0 1px 2px -1px rgba(0,0,0,0.1);">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 48px; height: 48px; background-color: {{ $card['bg'] }};">
                        <i data-feather="{{ $card['icon'] }}" style="width: 22px; height: 22px; color: {{ $card['color'] }}; stroke-width: 2;"></i>
                    </div>
                    <div>
                        <p class="mb-1" style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: #6b7280;">TOTAL {{ $card['title'] }}</p>
                        <p class="mb-0" style="font-size: 1.5rem; font-weight: 700; color: #111827; line-height: 1;">{{ $card['count'] }}</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

<div class="mt-4 mb-3">
    <h2 style="font-size: 1rem; font-weight: 600; color: #111827;">Quick Actions</h2>
</div>

<div class="row g-3">
    @php
        $actions = [
            ['title' => 'Add New Team',       'link' => '/admin/addteam'],
            ['title' => 'Add New Room',        'link' => '/admin/addroom'],
            ['title' => 'Add New Testimonial', 'link' => '/admin/addtest'],
        ];
    @endphp

    @foreach($actions as $action)
    <div class="col-12 col-sm-6 col-md-4">
        <a href="{{ $action['link'] }}" class="text-decoration-none d-block">
            <div class="virja-action-tile text-center" style="background: #fff; border: 2px dashed #d1d5db; border-radius: 12px; padding: 1.5rem 1rem;">
                <div class="mx-auto mb-2 rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: #f9fafb; border: 1px solid #e5e7eb;">
                    <i data-feather="plus" style="width: 16px; height: 16px; color: #9ca3af; stroke-width: 2.5;"></i>
                </div>
                <p class="mb-0" style="font-size: 0.875rem; font-weight: 500; color: #374151;">{{ $action['title'] }}</p>
            </div>
        </a>
    </div>
    @endforeach
</div>

<style>
    .virja-card { transition: box-shadow 0.15s ease, transform 0.15s ease; cursor: pointer; }
    .virja-card:hover { box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -2px rgba(0,0,0,0.1) !important; transform: translateY(-1px); }
    .virja-action-tile { transition: border-color 0.15s ease, background-color 0.15s ease; cursor: pointer; }
    .virja-action-tile:hover { border-color: #3b82f6 !important; background-color: #eff6ff !important; }
</style>

@endsection
