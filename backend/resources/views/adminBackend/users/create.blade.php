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
                            Create New User
                        </h1>
                        <p class="text-secondary flex items-center">
                            <span class="w-2 h-2 bg-accent-color rounded-full animate-pulse mr-2"></span>
                            Add a new user to the system
                        </p>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="btn-secondary group">
                        <svg class="w-4 h-4 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Users
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto">
        <div class="glass-card rounded-xl border border-border-color hover:translate-y-[-2px] transition-all duration-300">
            <div class="p-6 border-b border-border-color">
                <h2 class="text-xl font-bold text-primary flex items-center">
                    <svg class="w-5 h-5 mr-2 text-accent-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                    </svg>
                    New User Information
                </h2>
            </div>

            <div class="p-6">
                <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Personal Information Section -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-primary border-b border-border-color pb-2">
                            Personal Information
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Name Field -->
                            <div class="form-group">
                                <label for="name" class="form-label">
                                    <svg class="w-4 h-4 mr-2 inline text-accent-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Full Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-input @error('name') form-input-error @enderror"
                                       id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="form-group">
                                <label for="email" class="form-label">
                                    <svg class="w-4 h-4 mr-2 inline text-accent-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    Email Address <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-input @error('email') form-input-error @enderror"
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Phone Field -->
                            <div class="form-group">
                                <label for="phone" class="form-label">
                                    <svg class="w-4 h-4 mr-2 inline text-accent-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    Phone Number
                                </label>
                                <input type="tel" class="form-input @error('phone') form-input-error @enderror"
                                       id="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Role Field -->
                            <div class="form-group">
                                <label for="role" class="form-label">
                                    <svg class="w-4 h-4 mr-2 inline text-accent-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    Role
                                </label>
                                <input type="text" class="form-input @error('role') form-input-error @enderror"
                                       id="role" name="role" value="{{ old('role') }}">
                                @error('role')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information Section -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-primary border-b border-border-color pb-2">
                            Additional Information
                        </h3>

                        <!-- Address Field -->
                        <div class="form-group">
                            <label for="address" class="form-label">
                                <svg class="w-4 h-4 mr-2 inline text-accent-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Address
                            </label>
                            <textarea class="form-textarea @error('address') form-input-error @enderror"
                                      id="address" name="address" rows="3">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Account Settings Section -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-primary border-b border-border-color pb-2">
                            Account Settings
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Account Type -->
                            <div class="form-group">
                                <label class="form-label">
                                    <svg class="w-4 h-4 mr-2 inline text-accent-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    Account Type
                                </label>
                                <div class="space-y-3 mt-2">
                                    <div class="checkbox-group">
                                        <input class="checkbox-input" type="checkbox" id="is_admin"
                                               name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
                                        <label class="checkbox-label" for="is_admin">
                                            Administrator
                                        </label>
                                    </div>
                                    <div class="checkbox-group">
                                        <input class="checkbox-input" type="checkbox" id="author_status"
                                               name="author_status" value="1" {{ old('author_status') ? 'checked' : '' }}>
                                        <label class="checkbox-label" for="author_status">
                                            Author Status
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Profile Image -->
                            <div class="form-group">
                                <label for="image" class="form-label">
                                    <svg class="w-4 h-4 mr-2 inline text-accent-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Profile Image
                                </label>
                                <input class="form-file @error('image') form-input-error @enderror"
                                       type="file" id="image" name="image" accept="image/*">
                                @error('image')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Security Section -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-primary border-b border-border-color pb-2">
                            Security
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Password Field -->
                            <div class="form-group">
                                <label for="password" class="form-label">
                                    <svg class="w-4 h-4 mr-2 inline text-accent-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    Password <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-input @error('password') form-input-error @enderror"
                                       id="password" name="password" required>
                                @error('password')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">
                                    <svg class="w-4 h-4 mr-2 inline text-accent-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                    Confirm Password <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-input"
                                       id="password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-6 border-t border-border-color">
                        <a href="{{ route('admin.users.index') }}" class="btn-secondary group w-full sm:w-auto justify-center">
                            <svg class="w-4 h-4 mr-2 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Cancel
                        </a>
                        <button type="submit" class="btn-primary group w-full sm:w-auto justify-center">
                            <svg class="w-4 h-4 mr-2 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Create User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Form Styles */
    .form-group {
        @apply space-y-2;
    }

    .form-label {
        @apply block text-sm font-medium text-primary flex items-center;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        border: 2px solid var(--border-color);
        background: transparent;
        color: var(--text-primary);
        font-size: 0.875rem;
        transition: all 0.3s ease;
        outline: none;
    }

    .form-input::placeholder {
        color: var(--text-muted);
    }

    .form-input:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 3px var(--accent-glow);
        outline: none;
    }

    .form-input-error {
        border-color: var(--danger);
    }

    .form-input-error:focus {
        border-color: var(--danger);
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2);
    }

    .form-textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        border: 2px solid var(--border-color);
        background: transparent;
        color: var(--text-primary);
        font-size: 0.875rem;
        transition: all 0.3s ease;
        outline: none;
        resize: vertical;
        min-height: 80px;
    }

    .form-textarea::placeholder {
        color: var(--text-muted);
    }

    .form-textarea:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 3px var(--accent-glow);
        outline: none;
    }

    .form-file {
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        border: 2px solid var(--border-color);
        background: transparent;
        color: var(--text-primary);
        font-size: 0.875rem;
        transition: all 0.3s ease;
        outline: none;
    }

    .form-file:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 3px var(--accent-glow);
        outline: none;
    }

    .form-error {
        @apply text-sm text-danger mt-1 flex items-center;
        color: var(--danger);
    }

    /* Checkbox Styles */
    .checkbox-group {
        @apply flex items-center space-x-3;
    }

    .checkbox-input {
        width: 1rem;
        height: 1rem;
        color: var(--accent-color);
        background: transparent;
        border: 2px solid var(--border-color);
        border-radius: 0.25rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .checkbox-input:focus {
        outline: none;
        border-color: var(--accent-color);
        box-shadow: 0 0 0 3px var(--accent-glow);
    }

    .checkbox-input:checked {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
    }

    .checkbox-label {
        font-size: 0.875rem;
        color: var(--text-primary);
        cursor: pointer;
    }

    /* Button Styles */
    .btn-primary {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background-color: var(--accent-color);
        color: white;
        border-radius: 0.5rem;
        font-weight: 500;
        font-size: 0.875rem;
        border: none;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: var(--accent-hover);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px var(--accent-glow);
    }

    .btn-primary:focus {
        outline: none;
        box-shadow: 0 0 0 3px var(--accent-glow);
    }

    .btn-secondary {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background: transparent;
        color: var(--text-primary);
        border: 2px solid var(--border-color);
        border-radius: 0.5rem;
        font-weight: 500;
        font-size: 0.875rem;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: var(--bg-tertiary);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .btn-secondary:focus {
        outline: none;
        border-color: var(--accent-color);
        box-shadow: 0 0 0 3px var(--accent-glow);
    }

    /* Glass Card */
    .glass-card {
        background: var(--glass-base);
        backdrop-filter: blur(12px);
        border: 1px solid var(--border-color);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.06);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Text Colors */
    .text-primary {
        color: var(--text-primary);
    }

    .text-secondary {
        color: var(--text-secondary);
    }

    .text-muted {
        color: var(--text-muted);
    }

    .text-danger {
        color: var(--danger);
    }

    .text-accent-color {
        color: var(--accent-color);
    }

    /* Background Colors */
    .bg-primary {
        background-color: var(--bg-primary);
    }

    .bg-secondary {
        background-color: var(--bg-secondary);
    }

    .bg-tertiary {
        background-color: var(--bg-tertiary);
    }

    /* Border Colors */
    .border-border-color {
        border-color: var(--border-color);
    }

    /* Ensure smooth transitions */
    * {
        transition: background-color 0.3s, color 0.3s, border-color 0.3s, transform 0.3s;
    }

    /* Focus states */
    input:focus, textarea:focus, select:focus {
        outline: none;
    }

    /* Custom file input styling */
    input[type="file"]::-webkit-file-upload-button {
        background-color: var(--accent-color);
        color: white;
        border: none;
        border-radius: 0.375rem;
        padding: 0.5rem 1rem;
        margin-right: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="file"]::-webkit-file-upload-button:hover {
        background-color: var(--accent-hover);
    }

    input[type="file"]::file-selector-button {
        background-color: var(--accent-color);
        color: white;
        border: none;
        border-radius: 0.375rem;
        padding: 0.5rem 1rem;
        margin-right: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="file"]::file-selector-button:hover {
        background-color: var(--accent-hover);
    }

    /* Animation for form groups */
    .form-group {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.5s ease-out forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Stagger animation for form groups */
    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .form-group:nth-child(4) { animation-delay: 0.4s; }
    .form-group:nth-child(5) { animation-delay: 0.5s; }
    .form-group:nth-child(6) { animation-delay: 0.6s; }
    .form-group:nth-child(7) { animation-delay: 0.7s; }
    .form-group:nth-child(8) { animation-delay: 0.8s; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add focus effects to form elements
        const formInputs = document.querySelectorAll('.form-input, .form-textarea, .form-file');

        formInputs.forEach(input => {
            // Add focus class on focus
            input.addEventListener('focus', function() {
                this.style.borderColor = 'var(--accent-color)';
                this.style.boxShadow = '0 0 0 3px var(--accent-glow)';
            });

            // Remove focus class on blur
            input.addEventListener('blur', function() {
                this.style.borderColor = 'var(--border-color)';
                this.style.boxShadow = 'none';
            });
        });

        // Image preview for file input
        const imageInput = document.getElementById('image');
        if (imageInput) {
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Remove existing preview if any
                        const existingPreview = document.querySelector('.image-preview');
                        if (existingPreview) {
                            existingPreview.remove();
                        }

                        // Create and insert preview
                        const preview = document.createElement('div');
                        preview.className = 'image-preview mt-2 flex items-center gap-3';
                        preview.innerHTML = `
                            <span class="text-sm text-secondary">Selected image:</span>
                            <img src="${e.target.result}" alt="Image preview"
                                 class="w-10 h-10 rounded-lg border border-border-color object-cover">
                        `;

                        imageInput.parentNode.appendChild(preview);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Add animation to form elements
        const formGroups = document.querySelectorAll('.form-group');
        formGroups.forEach((group, index) => {
            group.style.animationDelay = `${(index + 1) * 0.1}s`;
        });

        // Theme-based input styling
        function updateInputStyles() {
            const inputs = document.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                input.style.color = 'var(--text-primary)';
                input.style.backgroundColor = 'transparent';
                input.style.borderColor = 'var(--border-color)';
            });
        }

        // Update styles on theme change
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'data-theme') {
                    updateInputStyles();
                }
            });
        });

        observer.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['data-theme']
        });

        // Initial style update
        updateInputStyles();

        // Password strength indicator (optional enhancement)
        const passwordInput = document.getElementById('password');
        if (passwordInput) {
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                const strengthIndicator = document.getElementById('password-strength') || createPasswordStrengthIndicator();

                const strength = calculatePasswordStrength(password);
                updateStrengthIndicator(strengthIndicator, strength);
            });
        }

        function createPasswordStrengthIndicator() {
            const indicator = document.createElement('div');
            indicator.id = 'password-strength';
            indicator.className = 'password-strength mt-2';
            passwordInput.parentNode.appendChild(indicator);
            return indicator;
        }

        function calculatePasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
            if (password.match(/\d/)) strength++;
            if (password.match(/[^a-zA-Z\d]/)) strength++;
            return strength;
        }

        function updateStrengthIndicator(indicator, strength) {
            const levels = ['Very Weak', 'Weak', 'Fair', 'Strong', 'Very Strong'];
            const colors = ['text-danger', 'text-warning', 'text-warning', 'text-success', 'text-success'];

            indicator.innerHTML = `
                <div class="text-sm ${colors[strength]}">
                    Password Strength: ${levels[strength]}
                </div>
            `;
        }
    });
</script>
@endsection
