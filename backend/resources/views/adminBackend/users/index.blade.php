@extends('layouts.app')

@section('main_content')
<div class="min-h-screen bg-primary transition-colors duration-300 py-6 px-4 sm:px-6 lg:px-8">
    <!-- Header Section -->
    <div class="max-w-7xl mx-auto mb-6">
        <div class="glass-card rounded-xl border border-border-color">
            <div class="p-5">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-primary mb-1">
                            User Management
                        </h1>
                        <p class="text-secondary flex items-center">
                            <span class="w-2 h-2 bg-success rounded-full animate-pulse mr-2"></span>
                            Manage all users in the system
                        </p>
                    </div>
                    <a href="{{ route('admin.users.create') }}" class="btn-primary group">
                        <svg class="w-4 h-4 mr-2 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add New User
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto mb-6">
            <div class="glass-card border border-success/30 rounded-xl animate-fade-in">
                <div class="p-4 flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-success mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-primary font-medium">
                            {{ session('success') }}
                        </p>
                        @if(session('temp_password'))
                            <div class="mt-3 p-3 bg-secondary/20 rounded-lg border border-success/20">
                                <p class="text-primary text-sm">
                                    <strong>Temporary Password:</strong>
                                    <code class="bg-success/10 px-2 py-1 rounded ml-2 font-mono text-sm">
                                        {{ session('temp_password') }}
                                    </code>
                                </p>
                                <p class="text-secondary text-xs mt-2">
                                    Save this password and provide it to the user
                                </p>
                            </div>
                        @endif
                    </div>
                    <button type="button" class="flex-shrink-0 ml-4 text-secondary hover:text-primary" onclick="this.parentElement.remove()">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto mb-6">
            <div class="glass-card border border-danger/30 rounded-xl animate-fade-in">
                <div class="p-4 flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-danger mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-primary font-medium">
                            {{ session('error') }}
                        </p>
                    </div>
                    <button type="button" class="flex-shrink-0 ml-4 text-secondary hover:text-primary" onclick="this.parentElement.remove()">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Users Table Card -->
    <div class="max-w-7xl mx-auto">
        <div class="glass-card rounded-xl border border-border-color">
            <div class="p-5 border-b border-border-color">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-xl font-bold text-primary">
                        All Users
                    </h2>
                    <div class="flex items-center gap-3 mt-3 sm:mt-0">
                        <span class="text-secondary text-sm">
                            Total: {{ $users->total() }} users
                        </span>
                        <div class="relative">
                            <input type="text" placeholder="Search users..."
                                   class="search-input pl-9 pr-4 py-2">
                            <svg class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-0">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-border-color">
                                <th class="px-5 py-4 text-left text-sm font-semibold text-secondary">
                                    User
                                </th>
                                <th class="px-5 py-4 text-left text-sm font-semibold text-secondary">
                                    Contact
                                </th>
                                <th class="px-5 py-4 text-left text-sm font-semibold text-secondary">
                                    Role
                                </th>
                                <th class="px-5 py-4 text-left text-sm font-semibold text-secondary">
                                    Status
                                </th>
                                <th class="px-5 py-4 text-left text-sm font-semibold text-secondary">
                                    Joined
                                </th>
                                <th class="px-5 py-4 text-left text-sm font-semibold text-secondary">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr class="table-row border-b border-border-color/50 hover:bg-secondary/20 transition-all duration-300 group">
                                <td class="px-5 py-4">
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/default-avatar.png') }}"
                                                 alt="{{ $user->name }}"
                                                 class="w-10 h-10 rounded-lg object-cover border border-border-color">
                                            <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-success rounded-full border-2 border-bg-secondary"></div>
                                        </div>
                                        <div class="ml-3">
                                            <div class="font-semibold text-primary group-hover:text-accent-color transition-colors">
                                                {{ $user->name }}
                                            </div>
                                            <div class="text-xs text-muted">ID: {{ $user->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="text-primary">{{ $user->email }}</div>
                                    @if($user->phone)
                                    <div class="text-xs text-secondary">{{ $user->phone }}</div>
                                    @endif
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex flex-wrap gap-1">
                                        <span class="profile-badge {{ $user->is_admin ? 'badge-admin' : 'badge-user' }}">
                                            {{ $user->is_admin ? 'Admin' : 'User' }}
                                        </span>
                                        <span class="profile-badge {{ $user->author_status ? 'badge-success' : 'badge-warning' }}">
                                            {{ $user->author_status ? 'Author' : 'Reader' }}
                                        </span>
                                        @if($user->role)
                                        <span class="profile-badge badge-info">
                                            {{ $user->role }}
                                        </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    @if($user->email_verified_at)
                                    <span class="profile-badge badge-success">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                        Verified
                                    </span>
                                    @else
                                    <span class="profile-badge badge-danger">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                        Unverified
                                    </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4">
                                    <div class="text-sm text-secondary">
                                        {{ $user->created_at->format('M j, Y') }}
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-2">
                                        <!-- View Button -->
                                        <a href="{{ route('admin.users.show', $user) }}"
                                           class="action-btn view group"
                                           title="View Profile">
                                            <svg class="w-4 h-4 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                           class="action-btn edit group"
                                           title="Edit User">
                                            <svg class="w-4 h-4 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>

                                        <!-- Quick Actions Dropdown -->
                                        <div class="relative">
                                            <button class="action-btn more group dropdown-toggle"
                                                    data-user-id="{{ $user->id }}"
                                                    title="More Actions">
                                                <svg class="w-4 h-4 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                                </svg>
                                            </button>

                                            <!-- Dropdown Menu -->
                                            <div class="dropdown-menu hidden absolute right-0 top-full mt-1 w-56 glass-card rounded-lg border border-border-color shadow-lg z-10 backdrop-blur-xl">
                                                <div class="p-2 space-y-1">
                                                    <!-- Impersonate -->
                                                    <form method="POST" action="{{ route('admin.users.impersonate', $user) }}" class="w-full">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item group w-full text-left">
                                                            <svg class="w-4 h-4 mr-3 text-purple-500 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                                                            </svg>
                                                            Impersonate User
                                                        </button>
                                                    </form>

                                                    <!-- Reset Password -->
                                                    <form method="POST" action="{{ route('admin.users.reset-password', $user) }}" class="w-full">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item warning group w-full text-left">
                                                            <svg class="w-4 h-4 mr-3 text-amber-500 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                                            </svg>
                                                            Reset Password
                                                        </button>
                                                    </form>

                                                    <div class="border-t border-border-color my-1"></div>

                                                    <!-- Admin Actions -->
                                                    @if($user->is_admin)
                                                    <form method="POST" action="{{ route('admin.users.remove-admin', $user) }}" class="w-full">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="dropdown-item warning group w-full text-left">
                                                            <svg class="w-4 h-4 mr-3 text-amber-500 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6"/>
                                                            </svg>
                                                            Remove Admin
                                                        </button>
                                                    </form>
                                                    @else
                                                    <form method="POST" action="{{ route('admin.users.make-admin', $user) }}" class="w-full">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="dropdown-item success group w-full text-left">
                                                            <svg class="w-4 h-4 mr-3 text-green-500 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                                            </svg>
                                                            Make Admin
                                                        </button>
                                                    </form>
                                                    @endif

                                                    <!-- Email Verification -->
                                                    @if($user->email_verified_at)
                                                    <form method="POST" action="{{ route('admin.users.unverify-email', $user) }}" class="w-full">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item warning group w-full text-left">
                                                            <svg class="w-4 h-4 mr-3 text-amber-500 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                            </svg>
                                                            Unverify Email
                                                        </button>
                                                    </form>
                                                    @else
                                                    <form method="POST" action="{{ route('admin.users.verify-email', $user) }}" class="w-full">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item success group w-full text-left">
                                                            <svg class="w-4 h-4 mr-3 text-green-500 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                                            </svg>
                                                            Verify Email
                                                        </button>
                                                    </form>
                                                    @endif

                                                    <div class="border-t border-border-color my-1"></div>

                                                    <!-- Delete -->
                                                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                                          class="w-full delete-form"
                                                          onsubmit="return confirm('Are you sure you want to delete {{ $user->name }}? This action cannot be undone.')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item danger group w-full text-left">
                                                            <svg class="w-4 h-4 mr-3 text-red-500 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                            </svg>
                                                            Delete User
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-5 py-8 text-center">
                                    <div class="text-center py-8">
                                        <svg class="w-12 h-12 text-secondary mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                        </svg>
                                        <p class="text-secondary text-lg">No users found</p>
                                        <p class="text-muted text-sm mt-1">Get started by creating your first user</p>
                                        <a href="{{ route('admin.users.create') }}" class="btn-primary inline-flex items-center mt-4">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            Add New User
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table Footer with Custom Pagination -->
            @if($users->count() > 0)
            <div class="p-6 border-t border-border-color flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-muted mb-4 md:mb-0">
                    Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} users
                </p>
                <div class="custom-pagination">
                    {{ $users->links('vendor.pagination.custom') }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* Custom styles for user management */
    .search-input {
        background: var(--bg-secondary);
        border: 1px solid var(--border-color);
        border-radius: 0.5rem;
        color: var(--text-primary);
        font-size: 0.875rem;
        transition: all 0.3s ease;
        width: 250px;
    }

    .search-input:focus {
        outline: none;
        border-color: var(--accent-color);
        box-shadow: 0 0 0 2px var(--accent-glow);
    }

    .search-input::placeholder {
        color: var(--text-muted);
    }

    /* Action Buttons - Enhanced for better visibility */
    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        border: 1px solid var(--border-color);
        background: var(--bg-secondary);
        color: var(--text-secondary);
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        font-size: 0.875rem;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    /* Specific button types with better color contrast */
    .action-btn.view {
        background: var(--info);
        color: white;
        border-color: var(--info);
    }

    .action-btn.view:hover {
        background: #2563eb;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .action-btn.edit {
        background: var(--accent-color);
        color: white;
        border-color: var(--accent-color);
    }

    .action-btn.edit:hover {
        background: var(--accent-hover);
        box-shadow: 0 4px 12px var(--accent-glow);
    }

    .action-btn.more {
        background: var(--bg-tertiary);
        color: var(--text-primary);
        border-color: var(--border-color);
    }

    .action-btn.more:hover {
        background: var(--bg-secondary);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Dropdown Menu */
    .dropdown-menu {
        backdrop-filter: blur(16px);
        background: var(--glass-base);
        border: 1px solid var(--border-color);
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 0.625rem 0.75rem;
        border-radius: 0.375rem;
        color: var(--text-primary);
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        background: transparent;
        cursor: pointer;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .dropdown-item:hover {
        background: var(--bg-tertiary);
        transform: translateX(4px);
    }

    .dropdown-item.warning:hover {
        background: var(--warning);
        color: white;
    }

    .dropdown-item.success:hover {
        background: var(--success);
        color: white;
    }

    .dropdown-item.danger:hover {
        background: var(--danger);
        color: white;
    }

    /* Table Styles */
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 0.75rem 1.25rem;
        text-align: left;
    }

    .table-row:hover {
        background: var(--bg-tertiary);
        transform: translateX(4px);
    }

    /* Profile Badges */
    .profile-badge {
        padding: 0.25rem 0.5rem;
        border-radius: 0.75rem;
        font-size: 0.75rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .badge-admin {
        background: var(--accent-color);
        color: white;
    }

    .badge-user {
        background: var(--bg-tertiary);
        color: var(--text-primary);
    }

    .badge-success {
        background: var(--success);
        color: white;
    }

    .badge-warning {
        background: var(--warning);
        color: white;
    }

    .badge-danger {
        background: var(--danger);
        color: white;
    }

    .badge-info {
        background: var(--info);
        color: white;
    }

    /* Button Base Styles */
    .btn-primary {
        background-color: var(--accent-color);
        color: white;
        padding: 0.625rem 1.25rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: none;
        cursor: pointer;
        text-decoration: none;
        font-size: 0.875rem;
    }

    .btn-primary:hover {
        background-color: var(--accent-hover);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px var(--accent-glow);
    }

    /* Custom Pagination Styles */
    .custom-pagination .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        gap: 4px;
    }

    .custom-pagination .pagination li {
        margin: 0;
    }

    .custom-pagination .pagination li a,
    .custom-pagination .pagination li span {
        display: block;
        padding: 8px 12px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        color: var(--text-primary);
        text-decoration: none;
        transition: all 0.3s ease;
        background: var(--bg-secondary);
        min-width: 40px;
        text-align: center;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .custom-pagination .pagination li a:hover {
        background-color: var(--bg-tertiary);
        border-color: var(--accent-color);
        transform: translateY(-1px);
    }

    .custom-pagination .pagination li.active span {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
        color: white;
        box-shadow: 0 2px 8px var(--accent-glow);
    }

    .custom-pagination .pagination li.disabled span {
        opacity: 0.5;
        cursor: not-allowed;
        background: var(--bg-tertiary);
    }

    /* Animations */
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 0.3s ease-out;
    }

    /* Ensure smooth transitions */
    * {
        transition: background-color 0.3s, color 0.3s, border-color 0.3s, transform 0.3s;
    }

    /* Icon visibility enhancement */
    .action-btn svg {
        width: 16px;
        height: 16px;
    }

    .dropdown-item svg {
        width: 16px;
        height: 16px;
        flex-shrink: 0;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Dropdown functionality
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.stopPropagation();
                const dropdown = this.nextElementSibling;
                const isVisible = !dropdown.classList.contains('hidden');

                // Close all other dropdowns
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });

                // Toggle current dropdown
                if (!isVisible) {
                    dropdown.classList.remove('hidden');
                }
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function() {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        });

        // Table row animations
        const tableRows = document.querySelectorAll('.table-row');
        tableRows.forEach((row, index) => {
            row.style.opacity = '0';
            row.style.transform = 'translateX(-20px)';

            setTimeout(() => {
                row.style.transition = 'all 0.4s ease-out';
                row.style.opacity = '1';
                row.style.transform = 'translateX(0)';
            }, index * 50);
        });

        // Search functionality (basic)
        const searchInput = document.querySelector('.search-input');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = document.querySelectorAll('.table-row');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }

        // Enhanced hover effects for action buttons
        const actionButtons = document.querySelectorAll('.action-btn');
        actionButtons.forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px) scale(1.05)';
            });

            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    });
</script>
@endsection
