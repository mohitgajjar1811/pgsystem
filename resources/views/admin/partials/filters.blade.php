<div class="flex flex-col md:flex-row items-center gap-4 mb-6 bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
    <form action="" method="GET" id="admin-filter-form" class="flex flex-1 flex-col md:flex-row items-center gap-4 w-full">
        <!-- Search Input -->
        <div class="relative flex-1 w-full">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                <i data-feather="search" style="width:16px;height:16px;"></i>
            </span>
            <input type="text" name="search" id="admin-search-input" value="{{ request('search') }}" placeholder="Search here..." 
                   class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm transition-all"
                   autocomplete="off">
        </div>

        <!-- Sort Column -->
        <div class="w-full md:w-48">
            <select name="sort" id="admin-sort-select" class="block w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 text-sm transition-all bg-white cursor-pointer">
                <option value="id" {{ request('sort') == 'id' ? 'selected' : '' }}>Sort by ID</option>
                @foreach($sortOptions as $value => $label)
                    <option value="{{ $value }}" {{ request('sort') == $value ? 'selected' : '' }}>Sort by {{ $label }}</option>
                @endforeach
            </select>
        </div>

        <!-- Sort Direction -->
        <div class="w-full md:w-40">
            <select name="direction" id="admin-direction-select" class="block w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 text-sm transition-all bg-white cursor-pointer">
                <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Newest First</option>
                <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Oldest First</option>
            </select>
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-2 w-full md:w-auto">
            <button type="submit" class="flex-1 md:flex-none inline-flex items-center justify-center gap-2 bg-gray-900 text-white text-sm font-medium px-5 py-2 rounded-lg hover:bg-gray-700 transition-colors cursor-pointer">
                Filter
            </button>
            @if(request()->has('search') || request()->has('sort'))
                <a href="{{ url()->current() }}" class="flex-1 md:flex-none inline-flex items-center justify-center gap-2 bg-gray-100 text-gray-600 text-sm font-medium px-5 py-2 rounded-lg hover:bg-gray-200 transition-colors no-underline">
                    Reset
                </a>
            @endif
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('admin-search-input');
    const sortSelect = document.getElementById('admin-sort-select');
    const directionSelect = document.getElementById('admin-direction-select');
    const container = document.getElementById('admin-table-container');
    const form = document.getElementById('admin-filter-form');
    
    let timeout = null;

    function performSearch() {
        const url = new URL(window.location.href);
        const params = new URLSearchParams(new FormData(form));
        
        // Update URL bar
        window.history.replaceState({}, '', `${url.pathname}?${params.toString()}`);

        // Show loading state
        if (container) container.style.opacity = '0.5';

        fetch(`${url.pathname}?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newContent = doc.getElementById('admin-table-container');
            
            if (newContent && container) {
                container.innerHTML = newContent.innerHTML;
                feather.replace(); // Re-init icons
            }
            container.style.opacity = '1';
        })
        .catch(err => {
            console.error('Search failed:', err);
            container.style.opacity = '1';
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(timeout);
            timeout = setTimeout(performSearch, 300);
        });
    }

    [sortSelect, directionSelect].forEach(el => {
        if (el) {
            el.addEventListener('change', performSearch);
        }
    });

    // Prevent default form submission to handle it via JS
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        performSearch();
    });
});
</script>
