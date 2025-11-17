@extends('layouts.app')

@section('main_content')
<div class="container mx-auto px-4 py-8">
    <!-- Page Header -->
    <div class="mb-8 fade-in-item">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center mb-4 lg:mb-0">
                <div class="p-3 rounded-xl bg-accent-glow mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-primary">Categories</h1>
                    <p class="text-secondary mt-1">Manage and organize your content categories</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative">
                    <input
                        type="text"
                        placeholder="Search categories..."
                        class="pl-10 pr-4 py-2 bg-bg-secondary border border-border-color rounded-xl text-primary placeholder-text-muted focus:outline-none focus:ring-2 focus:ring-accent-color focus:border-accent-color transition-all duration-300 w-full sm:w-64 theme-safe-input"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-muted absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <a href="{{ route('categories.create') }}" class="btn-primary flex items-center justify-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>New Category</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="glass-card rounded-xl p-4 mb-6 border-l-4 border-success bg-success/10 fade-in-item">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-success font-medium">{{ session('success') }}</span>
        </div>
    </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="glass-card stat-card rounded-xl p-6 fade-in-item" style="animation-delay: 0.1s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-muted text-sm font-medium">Total Categories</p>
                    <h3 class="text-2xl font-bold mt-1">{{ $categories->total() }}</h3>
                </div>
                <div class="p-3 rounded-full bg-accent-glow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="glass-card stat-card rounded-xl p-6 fade-in-item" style="animation-delay: 0.2s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-muted text-sm font-medium">Active</p>
                    <h3 class="text-2xl font-bold mt-1">{{ $categories->where('is_active', true)->count() }}</h3>
                </div>
                <div class="p-3 rounded-full bg-success/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="glass-card stat-card rounded-xl p-6 fade-in-item" style="animation-delay: 0.3s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-muted text-sm font-medium">Inactive</p>
                    <h3 class="text-2xl font-bold mt-1">{{ $categories->where('is_active', false)->count() }}</h3>
                </div>
                <div class="p-3 rounded-full bg-warning/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-warning" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="glass-card stat-card rounded-xl p-6 fade-in-item" style="animation-delay: 0.4s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-muted text-sm font-medium">With Images</p>
                    <h3 class="text-2xl font-bold mt-1">{{ $categories->whereNotNull('image')->count() }}</h3>
                </div>
                <div class="p-3 rounded-full bg-info/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Table -->
    <div class="glass-card rounded-2xl overflow-hidden fade-in-item" style="animation-delay: 0.5s">
        <!-- Table Header -->
        <div class="p-6 border-b border-border-color">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <h2 class="text-xl font-semibold text-primary mb-4 md:mb-0">All Categories</h2>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-muted">Filter:</span>
                        <select class="bg-bg-secondary border border-border-color rounded-lg px-3 py-2 text-primary text-sm focus:outline-none focus:ring-2 focus:ring-accent-color theme-safe-input">
                            <option value="all">All Categories</option>
                            <option value="active">Active Only</option>
                            <option value="inactive">Inactive Only</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-muted">Sort:</span>
                        <select class="bg-bg-secondary border border-border-color rounded-lg px-3 py-2 text-primary text-sm focus:outline-none focus:ring-2 focus:ring-accent-color theme-safe-input">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="name">Name A-Z</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        @if($categories->count() > 0)
            <!-- Desktop Table -->
            <div class="hidden md:block overflow-x-auto custom-scrollbar">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-border-color">
                            <th class="text-left py-4 px-6 text-muted font-medium">Category</th>
                            <th class="text-left py-4 px-6 text-muted font-medium">Slug</th>
                            <th class="text-left py-4 px-6 text-muted font-medium">Posts</th>
                            <th class="text-left py-4 px-6 text-muted font-medium">Status</th>
                            <th class="text-left py-4 px-6 text-muted font-medium">Last Updated</th>
                            <th class="text-left py-4 px-6 text-muted font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $cat)
                        <tr class="table-row border-b border-border-color last:border-0 group">
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        @if($cat->image)
                                            <img src="/storage/{{ $cat->image }}" alt="{{ $cat->name }}" class="w-12 h-12 rounded-xl object-cover shadow-md">
                                        @else
                                            <div class="w-12 h-12 rounded-xl bg-bg-tertiary flex items-center justify-center shadow-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-semibold text-primary">{{ $cat->name }}</p>
                                        @if($cat->description)
                                            <p class="text-sm text-muted mt-1 line-clamp-1">{{ $cat->description }}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <code class="text-sm text-muted bg-bg-tertiary px-2 py-1 rounded">{{ $cat->slug }}</code>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-primary font-medium">{{ $cat->posts_count ?? 0 }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $cat->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }}">
                                    <span class="w-2 h-2 rounded-full {{ $cat->is_active ? 'bg-success' : 'bg-warning' }} mr-2"></span>
                                    {{ $cat->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-sm text-muted">{{ $cat->updated_at->diffForHumans() }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <a
                                        href="{{ route('categories.edit', $cat->id) }}"
                                        class="p-2 rounded-lg bg-info/20 text-info hover:bg-info/30 transition-colors"
                                        title="Edit Category"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="button"
                                            onclick="confirmDelete('{{ $cat->name }}', this)"
                                            class="p-2 rounded-lg bg-danger/20 text-danger hover:bg-danger/30 transition-colors"
                                            title="Delete Category"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                    <a
                                        href="#"
                                        class="p-2 rounded-lg bg-bg-tertiary text-muted hover:bg-bg-secondary transition-colors"
                                        title="View Posts"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile Cards -->
            <div class="md:hidden space-y-4 p-6">
                @foreach($categories as $cat)
                <div class="glass-card rounded-xl p-6 border border-border-color">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center space-x-4">
                            @if($cat->image)
                                <img src="/storage/{{ $cat->image }}" alt="{{ $cat->name }}" class="w-16 h-16 rounded-xl object-cover shadow-md">
                            @else
                                <div class="w-16 h-16 rounded-xl bg-bg-tertiary flex items-center justify-center shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                            @endif
                            <div>
                                <h3 class="font-semibold text-primary text-lg">{{ $cat->name }}</h3>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $cat->is_active ? 'bg-success/20 text-success' : 'bg-warning/20 text-warning' }} mt-1">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $cat->is_active ? 'bg-success' : 'bg-warning' }} mr-1"></span>
                                    {{ $cat->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 text-sm mb-4">
                        <div>
                            <p class="text-muted">Slug</p>
                            <p class="text-primary font-mono">{{ $cat->slug }}</p>
                        </div>
                        <div>
                            <p class="text-muted">Posts</p>
                            <p class="text-primary font-medium">{{ $cat->posts_count ?? 0 }}</p>
                        </div>
                    </div>

                    @if($cat->description)
                    <div class="mb-4">
                        <p class="text-sm text-muted">Description</p>
                        <p class="text-primary text-sm">{{ $cat->description }}</p>
                    </div>
                    @endif

                    <div class="flex items-center justify-between pt-4 border-t border-border-color">
                        <span class="text-xs text-muted">Updated {{ $cat->updated_at->diffForHumans() }}</span>
                        <div class="flex space-x-2">
                            <a
                                href="{{ route('categories.edit', $cat->id) }}"
                                class="p-2 rounded-lg bg-info/20 text-info hover:bg-info/30 transition-colors"
                                title="Edit"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="button"
                                    onclick="confirmDelete('{{ $cat->name }}', this)"
                                    class="p-2 rounded-lg bg-danger/20 text-danger hover:bg-danger/30 transition-colors"
                                    title="Delete"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="p-12 text-center">
                <div class="max-w-md mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-muted mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <h3 class="text-xl font-semibold text-primary mb-2">No Categories Found</h3>
                    <p class="text-muted mb-6">Get started by creating your first category to organize your content.</p>
                    <a href="{{ route('categories.create') }}" class="btn-primary inline-flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span>Create First Category</span>
                    </a>
                </div>
            </div>
        @endif

        <!-- Table Footer -->
        @if($categories->count() > 0)
        <div class="p-6 border-t border-border-color flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm text-muted mb-4 md:mb-0">
                Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} categories
            </p>
            <div class="flex items-center space-x-2">
                {{ $categories->links('vendor.pagination.custom') }}
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4 hidden">
    <div class="glass-card rounded-2xl p-6 max-w-md w-full">
        <div class="text-center">
            <div class="w-16 h-16 mx-auto mb-4 bg-danger/20 rounded-full flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-danger" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-primary mb-2" id="deleteModalTitle">Delete Category</h3>
            <p class="text-secondary mb-6" id="deleteModalMessage">Are you sure you want to delete this category?</p>

            <div class="flex space-x-3">
                <form id="deleteForm" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-danger text-white py-3 rounded-xl font-semibold hover:bg-red-700 transition-colors">
                        Delete Category
                    </button>
                </form>
                <button onclick="closeDeleteModal()" class="flex-1 bg-bg-tertiary text-primary py-3 rounded-xl font-semibold hover:bg-bg-secondary transition-colors">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Styles -->
<style>
    /* Theme-Safe Text Input System */
    .theme-safe-input {
        color: var(--text-primary) !important;
        background-color: var(--bg-secondary) !important;
        border-color: var(--border-color) !important;
    }

    .theme-safe-input:focus {
        color: var(--text-primary) !important;
        background-color: var(--bg-secondary) !important;
        border-color: var(--accent-color) !important;
        box-shadow: 0 0 0 3px var(--accent-glow) !important;
    }

    /* Text truncation */
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Ensure all text elements are theme-safe */
    .text-primary { color: var(--text-primary) !important; }
    .text-secondary { color: var(--text-secondary) !important; }
    .text-muted { color: var(--text-muted) !important; }

    /* Custom pagination styles */
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination li {
        margin: 0 2px;
    }

    .pagination li a,
    .pagination li span {
        display: block;
        padding: 8px 12px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        color: var(--text-primary);
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .pagination li a:hover {
        background-color: var(--bg-tertiary);
        border-color: var(--accent-color);
    }

    .pagination li.active span {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
        color: white;
    }

    .pagination li.disabled span {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Enhanced responsive design */
    @media (max-width: 768px) {
        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .glass-card {
            padding: 1.5rem !important;
        }
    }

    @media (max-width: 640px) {
        .grid-cols-2 {
            grid-template-columns: 1fr !important;
        }

        .grid-cols-4 {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }

    /* Smooth transitions for theme switching */
    .theme-safe-input,
    .text-primary,
    .text-secondary,
    .text-muted {
        transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease;
    }
</style>

<script>
    function confirmDelete(categoryName, button) {
        const form = button.closest('form');
        const modal = document.getElementById('deleteModal');
        const title = document.getElementById('deleteModalTitle');
        const message = document.getElementById('deleteModalMessage');
        const deleteForm = document.getElementById('deleteForm');

        title.textContent = `Delete ${categoryName}`;
        message.textContent = `Are you sure you want to delete "${categoryName}"? This action cannot be undone and all associated posts will be affected.`;
        deleteForm.action = form.action;

        modal.classList.remove('hidden');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
    }

    // Close modal when clicking outside
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });
</script>

<!-- Custom Pagination View (create this file in resources/views/vendor/pagination/custom.blade.php) -->

@endsection
