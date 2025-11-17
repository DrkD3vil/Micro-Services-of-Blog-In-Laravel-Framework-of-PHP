@extends('layouts.app')

@section('main_content')
    <div class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="mb-8 fade-in-item">
            <h1 class="text-3xl font-bold text-primary mb-2">Approved Authors</h1>
            <p class="text-secondary">Manage and view all approved authors in the system</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="glass-card stat-card rounded-xl p-6 fade-in-item" style="animation-delay: 0.1s">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-muted text-sm font-medium">Total Authors</p>
                        <h3 class="text-2xl font-bold mt-1">{{ count($authors) }}</h3>
                    </div>
                    <div class="p-3 rounded-full bg-accent-glow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent-color" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    <span>All authors are approved</span>
                </div>
            </div>

            <div class="glass-card stat-card rounded-xl p-6 fade-in-item" style="animation-delay: 0.2s">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-muted text-sm font-medium">Active This Month</p>
                        <h3 class="text-2xl font-bold mt-1">{{ count($authors) > 5 ? '5+' : count($authors) }}</h3>
                    </div>
                    <div class="p-3 rounded-full bg-accent-glow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-info" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-muted">
                    <span>Based on recent activity</span>
                </div>
            </div>

            <div class="glass-card stat-card rounded-xl p-6 fade-in-item" style="animation-delay: 0.3s">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-muted text-sm font-medium">New This Week</p>
                        <h3 class="text-2xl font-bold mt-1">{{ count($authors) > 2 ? '2+' : count($authors) }}</h3>
                    </div>
                    <div class="p-3 rounded-full bg-accent-glow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-warning" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-muted">
                    <span>Recently approved authors</span>
                </div>
            </div>
        </div>

        <!-- Authors Table -->
        <div class="glass-card rounded-xl overflow-hidden fade-in-item" style="animation-delay: 0.4s">
            <div class="p-6 border-b border-border-color">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <h2 class="text-xl font-semibold mb-4 md:mb-0">Author Details</h2>
                    <div class="flex space-x-3">
                        <div class="relative">
                            <input type="text" placeholder="Search authors..."
                                class="bg-bg-secondary border border-border-color rounded-lg pl-10 pr-4 py-2 w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-accent-color focus:border-transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-muted absolute left-3 top-2.5"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <button class="btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Add Author
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table for larger screens -->
            <div class="hidden md:block overflow-x-auto custom-scrollbar">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-border-color">
                            <th class="text-left py-4 px-6 text-muted font-medium">ID</th>
                            <th class="text-left py-4 px-6 text-muted font-medium">Author</th>
                            <th class="text-left py-4 px-6 text-muted font-medium">Email</th>
                            <th class="text-left py-4 px-6 text-muted font-medium">Status</th>
                            <th class="text-left py-4 px-6 text-muted font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $user)
                            <tr class="table-row border-b border-border-color last:border-0">
                                <td class="py-4 px-6">
                                    <span class="font-mono text-muted">#{{ $user->id }}</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="h-10 w-10 rounded-full bg-bg-tertiary flex items-center justify-center mr-3">
                                            <span class="font-medium text-primary">{{ substr($user->name, 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <p class="font-medium">{{ $user->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-primary">{{ $user->email }}</p>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-success/20 text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        {{ $user->author_status }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex space-x-2">
                                        <button class="p-2 rounded-lg hover:bg-bg-tertiary transition-colors"
                                            title="View Profile">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        <button class="p-2 rounded-lg hover:bg-bg-tertiary transition-colors"
                                            title="Send Message">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-accent-color"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </button>
                                        <button class="p-2 rounded-lg hover:bg-bg-tertiary transition-colors"
                                            title="More Options">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-muted"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Cards for mobile view -->
            <div class="md:hidden">
                @foreach ($authors as $user)
                    <div class="border-b border-border-color last:border-0 p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center">
                                <div class="h-12 w-12 rounded-full bg-bg-tertiary flex items-center justify-center mr-3">
                                    <span class="font-medium text-primary">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="font-medium">{{ $user->name }}</p>
                                    <p class="text-sm text-muted">#{{ $user->id }}</p>
                                </div>
                            </div>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-success/20 text-success">
                                {{ $user->author_status }}
                            </span>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-muted mb-1">Email</p>
                            <p class="text-primary">{{ $user->email }}</p>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button class="p-2 rounded-lg hover:bg-bg-tertiary transition-colors" title="View Profile">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            <button class="p-2 rounded-lg hover:bg-bg-tertiary transition-colors" title="Send Message">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-accent-color" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </button>
                            <button class="p-2 rounded-lg hover:bg-bg-tertiary transition-colors" title="More Options">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-muted" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Table Footer -->
            <div class="p-4 border-t border-border-color flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-muted mb-4 md:mb-0">Showing {{ count($authors) }} approved authors</p>
                <div class="flex space-x-2">
                    <button
                        class="px-4 py-2 rounded-lg border border-border-color hover:bg-bg-tertiary transition-colors text-sm">
                        Previous
                    </button>
                    <button
                        class="px-4 py-2 rounded-lg border border-border-color bg-accent-color text-white hover:bg-accent-hover transition-colors text-sm">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
