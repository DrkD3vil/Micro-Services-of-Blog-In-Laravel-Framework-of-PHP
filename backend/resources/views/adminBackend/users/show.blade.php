@extends('layouts.app')

@section('main_content')
<div class="min-h-screen bg-primary transition-colors duration-300 py-6 px-4 sm:px-6 lg:px-8">
    <!-- Admin Navigation Header -->
    <div class="max-w-7xl mx-auto mb-6">
        <div class="glass-card rounded-xl border border-border-color">
            <div class="p-5">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-primary mb-1">
                            Admin View: {{ $user->name }}'s Profile
                        </h1>
                        <p class="text-secondary flex items-center">
                            <span class="w-2 h-2 bg-success rounded-full animate-pulse mr-2"></span>
                            You are viewing this profile as an administrator
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('admin.users.index') }}"
                           class="btn-secondary group">
                            <i class="fas fa-arrow-left mr-2 transition-transform group-hover:-translate-x-1"></i>
                            Back to Users
                        </a>
                        <a href="{{ route('admin.users.edit', $user) }}"
                           class="btn-primary group">
                            <i class="fas fa-edit mr-2 transition-transform group-hover:scale-110"></i>
                            Edit User
                        </a>
                        <a href=""
                           class="btn-info group">
                            <i class="fas fa-user mr-2 transition-transform group-hover:scale-110"></i>
                            My Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 xl:grid-cols-4 gap-6">
            <!-- Sidebar Navigation -->
            <div class="xl:col-span-1 space-y-6">
                <!-- Profile Card -->
                <div class="glass-card rounded-xl border border-border-color hover:translate-y-[-5px] transition-all duration-300">
                    <div class="p-5 text-center">
                        <div class="relative inline-block mb-4">
                            <div class="relative">
                                <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/default-avatar.png') }}"
                                     alt="Profile Picture"
                                     class="w-20 h-20 rounded-xl object-cover border-2 border-border-color shadow-lg">
                                <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-accent-color/20 to-info/20"></div>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-success rounded-full border-2 border-bg-secondary flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                        </div>

                        <h2 class="text-lg font-semibold text-primary mb-1">{{ $user->name }}</h2>
                        <p class="text-secondary text-sm mb-3">{{ $user->email }}</p>

                        <div class="flex flex-wrap justify-center gap-1">
                            <span class="profile-badge {{ $user->is_admin ? 'badge-admin' : 'badge-user' }}">
                                <i class="fas {{ $user->is_admin ? 'fa-crown' : 'fa-user' }} mr-1"></i>
                                {{ $user->is_admin ? 'Admin' : 'User' }}
                            </span>
                            <span class="profile-badge {{ $user->author_status ? 'badge-success' : 'badge-warning' }}">
                                <i class="fas {{ $user->author_status ? 'fa-pen-nib' : 'fa-book-reader' }} mr-1"></i>
                                {{ $user->author_status ? 'Author' : 'Reader' }}
                            </span>
                            <span class="profile-badge {{ $user->email_verified_at ? 'badge-success' : 'badge-danger' }}">
                                <i class="fas {{ $user->email_verified_at ? 'fa-shield-check' : 'fa-shield-exclamation' }} mr-1"></i>
                                {{ $user->email_verified_at ? 'Verified' : 'Unverified' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="glass-card rounded-xl border border-border-color">
                    <div class="p-4 border-b border-border-color">
                        <h3 class="font-semibold text-primary flex items-center">
                            <i class="fas fa-chart-line mr-2 text-accent-color"></i>
                            Quick Stats
                        </h3>
                    </div>
                    <div class="p-4 space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-secondary text-sm">Member since:</span>
                            <span class="font-medium text-primary">{{ $user->created_at->format('M j, Y') }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-secondary text-sm">Last updated:</span>
                            <span class="font-medium text-primary">{{ $user->updated_at->format('M j, Y') }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-secondary text-sm">Status:</span>
                            <span class="font-medium {{ $user->email_verified_at ? 'text-success' : 'text-danger' }}">
                                {{ $user->email_verified_at ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Admin Actions -->
                <div class="glass-card rounded-xl border border-border-color">
                    <div class="p-4 border-b border-border-color">
                        <h3 class="font-semibold text-primary flex items-center">
                            <i class="fas fa-tools mr-2 text-accent-color"></i>
                            Admin Actions
                        </h3>
                    </div>
                    <div class="p-4 space-y-2">
                        <form method="POST" action="{{ route('admin.users.impersonate', $user) }}" class="w-full">
                            @csrf
                            <button type="submit" class="admin-btn action w-full group">
                                <i class="fas fa-user-secret mr-2 transition-transform group-hover:scale-110"></i>
                                Impersonate User
                            </button>
                        </form>

                        <form method="POST" action="{{ route('admin.users.reset-password', $user) }}" class="w-full">
                            @csrf
                            <button type="submit" class="admin-btn warning w-full group">
                                <i class="fas fa-key mr-2 transition-transform group-hover:rotate-12"></i>
                                Reset Password
                            </button>
                        </form>

                        @if($user->email_verified_at)
                        <form method="POST" action="{{ route('admin.users.unverify-email', $user) }}" class="w-full">
                            @csrf
                            <button type="submit" class="admin-btn warning w-full group">
                                <i class="fas fa-envelope mr-2 transition-transform group-hover:scale-110"></i>
                                Unverify Email
                            </button>
                        </form>
                        @else
                        <form method="POST" action="{{ route('admin.users.verify-email', $user) }}" class="w-full">
                            @csrf
                            <button type="submit" class="admin-btn success w-full group">
                                <i class="fas fa-envelope mr-2 transition-transform group-hover:scale-110"></i>
                                Verify Email
                            </button>
                        </form>
                        @endif

                        @if($user->is_admin)
                        <form method="POST" action="{{ route('admin.users.remove-admin', $user) }}" class="w-full">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="admin-btn warning w-full group">
                                <i class="fas fa-user-times mr-2 transition-transform group-hover:scale-110"></i>
                                Remove Admin
                            </button>
                        </form>
                        @else
                        <form method="POST" action="{{ route('admin.users.make-admin', $user) }}" class="w-full">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="admin-btn success w-full group">
                                <i class="fas fa-user-shield mr-2 transition-transform group-hover:scale-110"></i>
                                Make Admin
                            </button>
                        </form>
                        @endif

                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                              class="w-full delete-form"
                              onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="admin-btn danger w-full group">
                                <i class="fas fa-trash mr-2 transition-transform group-hover:scale-110"></i>
                                Delete User
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="xl:col-span-3">
                <!-- Success/Error Messages -->
                @if(session('success'))
                    <div class="glass-card border border-success/30 rounded-xl mb-6 animate-fade-in">
                        <div class="p-4 flex items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-success text-lg mt-0.5"></i>
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
                            <button type="button" class="flex-shrink-0 ml-4 text-secondary hover:text-primary">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="glass-card border border-danger/30 rounded-xl mb-6 animate-fade-in">
                        <div class="p-4 flex items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-triangle text-danger text-lg mt-0.5"></i>
                            </div>
                            <div class="ml-3 flex-1">
                                <p class="text-primary font-medium">
                                    {{ session('error') }}
                                </p>
                            </div>
                            <button type="button" class="flex-shrink-0 ml-4 text-secondary hover:text-primary">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                @endif

                <!-- User Details Card -->
                <div class="glass-card rounded-xl border border-border-color hover:translate-y-[-2px] transition-all duration-300">
                    <div class="p-5 border-b border-border-color">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-primary">
                                    User Details
                                </h2>
                                <p class="text-secondary mt-1">
                                    Complete information for <span class="font-semibold text-accent-color">{{ $user->name }}</span>
                                </p>
                            </div>
                            <div class="mt-3 sm:mt-0">
                                <span class="profile-badge badge-info">
                                    <i class="fas fa-id-card mr-1"></i>
                                    User Profile
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="p-5">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Personal Information -->
                            <div class="space-y-5">
                                <h3 class="text-lg font-semibold text-primary border-b border-border-color pb-2">
                                    Personal Information
                                </h3>

                                <div class="space-y-1">
                                    <label class="block text-sm font-medium text-secondary">
                                        Full Name
                                    </label>
                                    <div class="info-field">
                                        {{ $user->name }}
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label class="block text-sm font-medium text-secondary">
                                        Email Address
                                    </label>
                                    <div class="info-field">
                                        {{ $user->email }}
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label class="block text-sm font-medium text-secondary">
                                        Phone Number
                                    </label>
                                    <div class="info-field">
                                        {{ $user->phone ?? 'Not provided' }}
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label class="block text-sm font-medium text-secondary">
                                        Role
                                    </label>
                                    <div class="info-field">
                                        {{ $user->role ?? 'Not specified' }}
                                    </div>
                                </div>
                            </div>

                            <!-- Account Information -->
                            <div class="space-y-5">
                                <h3 class="text-lg font-semibold text-primary border-b border-border-color pb-2">
                                    Account Information
                                </h3>

                                <div class="space-y-1">
                                    <label class="block text-sm font-medium text-secondary">
                                        Address
                                    </label>
                                    <div class="info-field min-h-[60px]">
                                        {{ $user->address ?? 'Not provided' }}
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label class="block text-sm font-medium text-secondary">
                                        Additional Information
                                    </label>
                                    <div class="info-field min-h-[80px]">
                                        {{ $user->more_info ?? 'Not provided' }}
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium text-secondary">
                                            Account Created
                                        </label>
                                        <div class="info-field-sm">
                                            {{ $user->created_at->format('M j, Y \\a\\t g:i A') }}
                                        </div>
                                    </div>

                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium text-secondary">
                                            Last Updated
                                        </label>
                                        <div class="info-field-sm">
                                            {{ $user->updated_at->format('M j, Y \\a\\t g:i A') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium text-secondary">
                                            Email Verified
                                        </label>
                                        <div class="info-field-sm">
                                            @if($user->email_verified_at)
                                                <span class="text-success flex items-center">
                                                    <i class="fas fa-check-circle mr-2"></i>
                                                    {{ $user->email_verified_at->format('M j, Y') }}
                                                </span>
                                            @else
                                                <span class="text-danger flex items-center">
                                                    <i class="fas fa-times-circle mr-2"></i>
                                                    Not Verified
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium text-secondary">
                                            User ID / UUID
                                        </label>
                                        <div class="info-field-sm">
                                            <div>ID: {{ $user->id }}</div>
                                            <div class="text-xs text-muted mt-1 font-mono">UUID: {{ $user->uuid }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom styles that work with your CSS variables */
    .btn-primary {
        background-color: var(--accent-color);
        color: white;
        padding: 0.5rem 1rem;
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

    .btn-secondary {
        background-color: var(--bg-tertiary);
        color: var(--text-primary);
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: 1px solid var(--border-color);
        cursor: pointer;
        text-decoration: none;
        font-size: 0.875rem;
    }

    .btn-secondary:hover {
        background-color: var(--bg-secondary);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .btn-info {
        background-color: var(--info);
        color: white;
        padding: 0.5rem 1rem;
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

    .btn-info:hover {
        background-color: var(--info);
        filter: brightness(1.1);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    /* Admin Action Buttons */
    .admin-btn {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        border: 1px solid var(--border-color);
        cursor: pointer;
        text-decoration: none;
        font-size: 0.875rem;
        width: 100%;
        background: var(--bg-secondary);
        color: var(--text-primary);
    }

    .admin-btn.action {
        background: var(--accent-color);
        color: white;
        border-color: var(--accent-color);
    }

    .admin-btn.action:hover {
        background: var(--accent-hover);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px var(--accent-glow);
    }

    .admin-btn.warning {
        background: var(--warning);
        color: white;
        border-color: var(--warning);
    }

    .admin-btn.warning:hover {
        filter: brightness(1.1);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    }

    .admin-btn.success {
        background: var(--success);
        color: white;
        border-color: var(--success);
    }

    .admin-btn.success:hover {
        filter: brightness(1.1);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .admin-btn.danger {
        background: var(--danger);
        color: white;
        border-color: var(--danger);
    }

    .admin-btn.danger:hover {
        filter: brightness(1.1);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    /* Profile Badges */
    .profile-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
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

    /* Information Fields */
    .info-field {
        width: 100%;
        padding: 0.75rem;
        border-radius: 0.5rem;
        background: var(--bg-secondary);
        border: 1px solid var(--border-color);
        color: var(--text-primary);
        transition: all 0.3s ease;
    }

    .info-field-sm {
        width: 100%;
        padding: 0.5rem;
        border-radius: 0.375rem;
        background: var(--bg-secondary);
        border: 1px solid var(--border-color);
        color: var(--text-primary);
        transition: all 0.3s ease;
        font-size: 0.875rem;
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
</style>

<script>
    // Add smooth animations
    document.addEventListener('DOMContentLoaded', function() {
        // Animate cards on load
        const cards = document.querySelectorAll('.glass-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';

            setTimeout(() => {
                card.style.transition = 'all 0.4s ease-out';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });

        // Add hover effects to info fields
        const infoFields = document.querySelectorAll('.info-field, .info-field-sm');
        infoFields.forEach(field => {
            field.addEventListener('mouseenter', function() {
                this.style.borderColor = 'var(--accent-color)';
                this.style.boxShadow = '0 0 0 1px var(--accent-glow)';
            });

            field.addEventListener('mouseleave', function() {
                this.style.borderColor = 'var(--border-color)';
                this.style.boxShadow = 'none';
            });
        });
    });
</script>
@endsection
