@extends('layouts.app')

@section('main_content')
    <div class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="mb-8 fade-in-item">
            <h1 class="text-3xl font-bold text-primary mb-2">Requested Authors</h1>
            <p class="text-secondary">Review and approve author registration requests</p>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="glass-card rounded-xl p-4 mb-6 border-l-4 border-success bg-success/10 fade-in-item">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-success font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="glass-card stat-card rounded-xl p-6 fade-in-item" style="animation-delay: 0.1s">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-muted text-sm font-medium">Pending Requests</p>
                        <h3 class="text-2xl font-bold mt-1">{{ count($pending) }}</h3>
                    </div>
                    <div class="p-3 rounded-full bg-warning/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-warning" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                    <span>Awaiting approval</span>
                </div>
            </div>

            <div class="glass-card stat-card rounded-xl p-6 fade-in-item" style="animation-delay: 0.2s">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-muted text-sm font-medium">This Week</p>
                        <h3 class="text-2xl font-bold mt-1">{{ count($pending) > 3 ? '3+' : count($pending) }}</h3>
                    </div>
                    <div class="p-3 rounded-full bg-info/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-info" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-muted">
                    <span>New requests this week</span>
                </div>
            </div>

            <div class="glass-card stat-card rounded-xl p-6 fade-in-item" style="animation-delay: 0.3s">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-muted text-sm font-medium">Avg. Response</p>
                        <h3 class="text-2xl font-bold mt-1">
                            < 24h</h3>
                    </div>
                    <div class="p-3 rounded-full bg-success/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-success" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-muted">
                    <span>Average approval time</span>
                </div>
            </div>
        </div>

        <!-- Pending Authors Table -->
        <div class="glass-card rounded-xl overflow-hidden fade-in-item" style="animation-delay: 0.4s">
            <div class="p-6 border-b border-border-color">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <h2 class="text-xl font-semibold mb-4 md:mb-0">Pending Approval Requests</h2>
                    <div class="flex space-x-3">
                        <div class="relative">
                            <input type="text" placeholder="Search requests..."
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
                            Export List
                        </button>
                    </div>
                </div>
            </div>

            @if (count($pending) > 0)
                <!-- Table for larger screens -->
                <div class="hidden md:block overflow-x-auto custom-scrollbar">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-border-color">
                                <th class="text-left py-4 px-6 text-muted font-medium">ID</th>
                                <th class="text-left py-4 px-6 text-muted font-medium">Applicant</th>
                                <th class="text-left py-4 px-6 text-muted font-medium">Email</th>
                                <th class="text-left py-4 px-6 text-muted font-medium">Status</th>
                                <th class="text-left py-4 px-6 text-muted font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pending as $user)
                                <tr class="table-row border-b border-border-color last:border-0">
                                    <td class="py-4 px-6">
                                        <span class="font-mono text-muted">#{{ $user->id }}</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div
                                                class="h-10 w-10 rounded-full bg-bg-tertiary flex items-center justify-center mr-3">
                                                <span
                                                    class="font-medium text-primary">{{ substr($user->name, 0, 1) }}</span>
                                            </div>
                                            <div>
                                                <p class="font-medium">{{ $user->name }}</p>
                                                <p class="text-sm text-muted">Applied
                                                    {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-primary">{{ $user->email }}</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-warning/20 text-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $user->author_status }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex space-x-2">
                                            <div class="flex space-x-2">
                                                <form action="{{ url('/approve-author/' . $user->id) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn-primary flex items-center space-x-2 px-4 py-2 rounded-xl hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-accent-glow"
                                                        title="Approve Author">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                        <span class="text-sm font-medium">Approve</span>
                                                    </button>
                                                </form>

<button
    onclick="window.location='{{ route('admin.users.show', $user) }}'"
    class="p-2 rounded-xl border border-border-color bg-bg-secondary
           hover:bg-bg-tertiary transition-all duration-200 hover:scale-105 group"
    title="View User Profile"
>
    <svg xmlns="http://www.w3.org/2000/svg"
         class="h-5 w-5 text-info group-hover:text-primary transition-colors"
         fill="none" viewBox="0 0 24 24" stroke="currentColor">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
               d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
               d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
    </svg>
</button>

                                                <form action="{{ url('/reject-author/' . $user->id) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    <button type="submit"
                                                        class="flex items-center space-x-2 px-4 py-2 rounded-xl bg-danger/20 text-danger border border-danger/30 hover:bg-danger/30 hover:scale-105 transition-all duration-200 shadow-lg"
                                                        title="Reject Request"
                                                        onclick="return confirm('Are you sure you want to reject this author request?')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        <span class="text-sm font-medium">Reject</span>
                                                    </button>
                                                </form>
                                            </div>



                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Cards for mobile view -->
                <div class="md:hidden">
                    @foreach ($pending as $user)
                        <div class="border-b border-border-color last:border-0 p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-center">
                                    <div
                                        class="h-12 w-12 rounded-full bg-bg-tertiary flex items-center justify-center mr-3">
                                        <span class="font-medium text-primary">{{ substr($user->name, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <p class="font-medium">{{ $user->name }}</p>
                                        <p class="text-sm text-muted">#{{ $user->id }}</p>
                                    </div>
                                </div>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-warning/20 text-warning">
                                    {{ $user->author_status }}
                                </span>
                            </div>
                            <div class="mb-4">
                                <p class="text-sm text-muted mb-1">Email</p>
                                <p class="text-primary">{{ $user->email }}</p>
                            </div>
                            <div class="mb-4">
                                <p class="text-sm text-muted mb-1">Applied</p>
                                <p class="text-sm text-primary">
                                    {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</p>
                            </div>
                            <div class="flex justify-between space-x-2">

                                <!-- Approve Author -->
                                <form action="{{ url('/approve-author/' . $user->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    <button type="submit"
                                        class="btn-primary w-full flex items-center justify-center space-x-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Approve</span>
                                    </button>
                                </form>



                                <!-- View Details (optional) -->
                                <button
                                    class="p-2 rounded-lg border border-border-color hover:bg-bg-tertiary transition-colors flex-1 flex items-center justify-center"
                                    title="View Details">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>

                                <!-- Reject Author -->

                                <form action="{{ url('/reject-author/' . $user->id) }}" method="POST" class="flex-1"
                                    onsubmit="return confirm('Are you sure you want to reject this author?');">
                                    @csrf
                                    <button type="submit"
                                        class="btn-primary w-full flex items-center justify-center space-x-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        <span>Reject</span>
                                    </button>
                                </form>


                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="p-12 text-center">
                    <div class="max-w-md mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-muted mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                        <h3 class="text-xl font-semibold text-primary mb-2">No Pending Requests</h3>
                        <p class="text-muted mb-6">All author requests have been processed. New requests will appear here.
                        </p>
                        <button class="btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Refresh Page
                        </button>
                    </div>
                </div>
            @endif

            <!-- Table Footer -->
            @if (count($pending) > 0)
                <div class="p-4 border-t border-border-color flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-muted mb-4 md:mb-0">Showing {{ count($pending) }} pending approval requests</p>
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
            @endif
        </div>
    </div>
@endsection
