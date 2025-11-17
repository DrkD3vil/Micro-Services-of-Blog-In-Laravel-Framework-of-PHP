@extends('layouts.app')

@section('main_content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Page Header with Breadcrumb -->
        <div class="mb-8 fade-in-item">
            <nav class="flex mb-6" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ url('/dashboard') }}"
                            class="text-secondary hover:text-primary transition-colors">Dashboard</a>
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-muted mx-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <a href="{{ url('/categories') }}"
                            class="text-secondary hover:text-primary transition-colors">Categories</a>
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-muted mx-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-primary font-medium">Create New</span>
                    </li>
                </ol>
            </nav>

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex items-center mb-4 lg:mb-0">
                    <div class="p-3 rounded-xl bg-accent-glow mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent-color" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-primary">Create New Category</h1>
                        <p class="text-secondary mt-1">Organize your content with meaningful categories</p>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="flex space-x-3">
                    <button
                        class="px-4 py-2 border border-border-color rounded-lg text-secondary hover:text-primary hover:bg-bg-tertiary transition-all flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>Save Draft</span>
                    </button>
                    <button
                        class="px-4 py-2 border border-border-color rounded-lg text-secondary hover:text-primary hover:bg-bg-tertiary transition-all flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        <span>Import</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Form -->
            <div class="lg:col-span-2">
                <!-- Form Card -->
                <div class="glass-card rounded-2xl p-6 lg:p-8 fade-in-item" style="animation-delay: 0.2s">
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6" x-data="categoryForm()">
                        @csrf

                        <!-- Category Name Field -->
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <label class="block text-lg font-semibold text-primary">
                                    Category Name
                                    <span class="text-danger text-sm ml-1">*</span>
                                </label>
                                <div class="text-sm text-muted" x-text="`${nameLength}/50`"
                                    :class="nameLength > 50 ? 'text-danger' : ''"></div>
                            </div>

                            <p class="text-sm text-secondary">
                                Choose a clear, descriptive name that represents your content category.
                            </p>

                            <div class="relative group">
                                <input type="text" name="name" x-model="categoryName" x-ref="nameInput"
                                    placeholder="e.g., Technology, Lifestyle, Business"
                                    class="w-full px-4 py-4 bg-bg-secondary border-2 border-border-color rounded-xl text-primary placeholder-text-muted focus:outline-none focus:ring-2 focus:ring-accent-color focus:border-accent-color transition-all duration-300 text-lg theme-safe-input"
                                    required maxlength="50" @input="updateNameLength()" @focus="focusedField = 'name'">
                                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 transition-opacity duration-300"
                                    :class="focusedField === 'name' ? 'opacity-100' : 'opacity-70'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-muted" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>

                                <!-- Validation Indicator -->
                                <div class="absolute -right-2 -top-2">
                                    <div x-show="nameLength > 0 && nameLength <= 50"
                                        class="w-6 h-6 bg-success rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <div x-show="nameLength > 50"
                                        class="w-6 h-6 bg-danger rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Character Guidance -->
                            <div
                                class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 text-xs text-muted">
                                <p>Use 3-50 characters. Alphanumeric characters and spaces only.</p>
                                <p x-show="nameLength < 3" class="text-warning">Minimum 3 characters required</p>
                            </div>
                        </div>

                        <!-- Image Upload Field -->
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <label class="block text-lg font-semibold text-primary">
                                    Category Image
                                    <span class="text-muted text-sm font-normal ml-1">(optional)</span>
                                </label>
                                <div class="text-sm text-muted" x-text="imageFile ? imageFile.name : 'No file chosen'">
                                </div>
                            </div>

                            <p class="text-sm text-secondary">
                                Upload a representative image for this category. Recommended: 400x400px, JPG/PNG format.
                            </p>

                            <!-- Image Upload Area -->
                            <div class="border-2 border-dashed border-border-color rounded-2xl p-8 text-center transition-all duration-300 hover:border-accent-color hover:bg-accent-glow/20 cursor-pointer"
                                @click="$refs.imageInput.click()" @drop="handleDrop($event)"
                                @dragover="handleDragOver($event)" @dragleave="handleDragLeave($event)"
                                :class="isDragging ? 'border-accent-color bg-accent-glow/30' : ''">
                                <input type="file" name="image" x-ref="imageInput" accept="image/*" class="hidden"
                                    @change="handleImageSelect($event)">

                                <div x-show="!imagePreview">
                                    <div
                                        class="w-16 h-16 mx-auto mb-4 rounded-full bg-bg-tertiary flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-muted" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <p class="text-primary font-medium mb-2">Drop your image here or click to browse</p>
                                    <p class="text-sm text-muted">Supports JPG, PNG, WEBP • Max 5MB</p>
                                </div>

                                <!-- Image Preview -->
                                <div x-show="imagePreview" class="space-y-4">
                                    <div class="relative inline-block">
                                        <img :src="imagePreview" alt="Category image preview"
                                            class="w-32 h-32 rounded-xl object-cover mx-auto shadow-lg">
                                        <button type="button" @click="removeImage()"
                                            class="absolute -top-2 -right-2 w-6 h-6 bg-danger text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-sm text-success font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        Image ready for upload
                                    </p>
                                </div>
                            </div>

                            <!-- Image Requirements -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs text-muted">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 text-info" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Max file size: 5MB</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 text-info" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Formats: JPG, PNG, WEBP</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 text-info" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Optimal: 400×400px</span>
                                </div>
                            </div>
                        </div>

                        <!-- Slug Field (Auto-generated) -->
                        <div class="space-y-3" x-show="nameLength >= 3">
                            <label class="block font-medium text-primary">
                                URL Slug
                                <span class="text-muted text-sm font-normal">(auto-generated)</span>
                            </label>
                            <div class="relative">
                                <input type="text" x-model="generateSlug()" readonly
                                    class="w-full px-4 py-3 bg-bg-tertiary border border-border-color rounded-xl text-primary theme-safe-input opacity-80 cursor-not-allowed">
                                <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                    <button type="button" @click="editSlug = !editSlug"
                                        class="text-accent-color hover:text-accent-hover transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <!-- Description -->
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <label class="block font-medium text-primary">Description</label>
                                <div class="text-sm text-muted" x-text="`${descLength}/200`"></div>
                            </div>
                            <textarea name="description" x-model="description" @input="updateDescLength()"
                                placeholder="Brief description of this category's purpose and content..." rows="4"
                                class="w-full px-4 py-3 bg-bg-secondary border border-border-color rounded-xl text-primary placeholder-text-muted focus:outline-none focus:ring-2 focus:ring-accent-color focus:border-accent-color transition-all duration-300 resize-none theme-safe-input"
                                maxlength="200">{{ old('description') }}</textarea>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-border-color">
                            <button type="submit"
                                class="btn-primary flex-1 flex items-center justify-center space-x-2 py-4 text-lg font-semibold"
                                :disabled="nameLength < 3 || nameLength > 50"
                                :class="(nameLength < 3 || nameLength > 50) ? 'opacity-50 cursor-not-allowed' : ''">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Create Category</span>
                            </button>

                            <a href="{{ url()->previous() }}"
                                class="px-6 py-4 border-2 border-border-color text-primary rounded-xl font-semibold text-center hover:bg-bg-tertiary transition-all duration-300 flex items-center justify-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span>Cancel</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Quick Tips -->
                <div class="glass-card rounded-2xl p-6 fade-in-item" style="animation-delay: 0.3s">
                    <div class="flex items-start mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-info mr-3 mt-0.5 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="font-semibold text-primary text-lg">Best Practices</h3>
                    </div>
                    <ul class="text-sm space-y-3">
                        <li class="flex items-start">
                            <div
                                class="w-5 h-5 bg-success/20 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-success" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-secondary">Use clear, descriptive names (3-50 chars)</span>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="w-5 h-5 bg-success/20 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-success" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-secondary">Choose relevant images (400×400px recommended)</span>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="w-5 h-5 bg-success/20 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-success" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-secondary">Plan your category hierarchy carefully</span>
                        </li>
                    </ul>
                </div>

                <!-- Preview Card -->
                <div class="glass-card rounded-2xl p-6 fade-in-item" style="animation-delay: 0.4s">
                    <h3 class="font-semibold text-primary text-lg mb-4">Live Preview</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-secondary">Name:</span>
                            <span class="text-primary font-medium" x-text="categoryName || 'Your Category Name'"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-secondary">Slug:</span>
                            <span class="text-primary font-mono" x-text="generateSlug() || 'your-category-name'"></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-secondary">Image:</span>
                            <span x-show="imagePreview" class="text-success text-xs font-medium">✓ Uploaded</span>
                            <span x-show="!imagePreview" class="text-muted text-xs">No image</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-secondary">Status:</span>
                            <span class="text-success font-medium">Active</span>
                        </div>
                    </div>

                    <!-- Image Preview in Sidebar -->
                    <div x-show="imagePreview" class="mt-4 p-3 bg-bg-secondary rounded-lg">
                        <p class="text-xs text-muted mb-2">Image Preview:</p>
                        <img :src="imagePreview" alt="Preview" class="w-full h-20 object-cover rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Styles for Image Upload -->
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

        .theme-safe-input::placeholder {
            color: var(--text-muted) !important;
            opacity: 0.8 !important;
        }

        /* Image Upload Specific Styles */
        .image-upload-area {
            transition: all 0.3s ease;
        }

        .image-upload-area.dragging {
            border-color: var(--accent-color);
            background-color: var(--accent-glow);
        }

        /* Ensure all text elements are theme-safe */
        .text-primary {
            color: var(--text-primary) !important;
        }

        .text-secondary {
            color: var(--text-secondary) !important;
        }

        .text-muted {
            color: var(--text-muted) !important;
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

            .btn-primary {
                padding: 1rem !important;
            }

            .image-upload-area {
                padding: 1.5rem !important;
            }
        }

        @media (max-width: 640px) {
            .grid-cols-2 {
                grid-template-columns: 1fr !important;
            }

            .grid-cols-3 {
                grid-template-columns: 1fr !important;
            }
        }

        /* Color options for category colors */


        /* Enhanced focus states for accessibility */
        button:focus-visible,
        input:focus-visible,
        select:focus-visible,
        textarea:focus-visible {
            outline: 2px solid var(--accent-color);
            outline-offset: 2px;
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
        document.addEventListener('alpine:init', () => {
            Alpine.data('categoryForm', () => ({
                categoryName: '',
                description: '',
                nameLength: 0,
                descLength: 0,
                focusedField: '',
                selectedColor: 1,
                editSlug: false,
                showCustomColor: false,
                imageFile: null,
                imagePreview: null,
                isDragging: false,

                colorOptions: [{
                        id: 1,
                        name: 'Violet',
                        bgClass: 'bg-accent'
                    },
                    {
                        id: 2,
                        name: 'Blue',
                        bgClass: 'bg-info'
                    },
                    {
                        id: 3,
                        name: 'Green',
                        bgClass: 'bg-success'
                    },
                    {
                        id: 4,
                        name: 'Amber',
                        bgClass: 'bg-warning'
                    },
                    {
                        id: 5,
                        name: 'Red',
                        bgClass: 'bg-danger'
                    },
                    {
                        id: 6,
                        name: 'Purple',
                        bgClass: 'bg-purple-500'
                    },
                    {
                        id: 7,
                        name: 'Pink',
                        bgClass: 'bg-pink-500'
                    },
                    {
                        id: 8,
                        name: 'Indigo',
                        bgClass: 'bg-indigo-500'
                    }
                ],

                init() {
                    // Focus the name input on page load
                    this.$nextTick(() => {
                        this.$refs.nameInput.focus();
                    });
                },

                updateNameLength() {
                    this.nameLength = this.categoryName.length;
                },

                updateDescLength() {
                    this.descLength = this.description.length;
                },

                generateSlug() {
                    if (this.categoryName.length < 3) return '';
                    return this.categoryName
                        .toLowerCase()
                        .trim()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/[\s_-]+/g, '-')
                        .replace(/^-+|-+$/g, '');
                },

                handleImageSelect(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.validateAndSetImage(file);
                    }
                },

                handleDrop(event) {
                    event.preventDefault();
                    this.isDragging = false;

                    const files = event.dataTransfer.files;
                    if (files.length > 0) {
                        this.validateAndSetImage(files[0]);
                    }
                },

                handleDragOver(event) {
                    event.preventDefault();
                    this.isDragging = true;
                },

                handleDragLeave(event) {
                    event.preventDefault();
                    this.isDragging = false;
                },

                validateAndSetImage(file) {
                    // Check file type
                    const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
                    if (!validTypes.includes(file.type)) {
                        this.showError('Please select a valid image file (JPG, PNG, WEBP)');
                        return;
                    }

                    // Check file size (5MB max)
                    if (file.size > 5 * 1024 * 1024) {
                        this.showError('Image size must be less than 5MB');
                        return;
                    }

                    this.imageFile = file;

                    // Create preview
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.imagePreview = e.target.result;
                    };
                    reader.readAsDataURL(file);
                },

                removeImage() {
                    this.imageFile = null;
                    this.imagePreview = null;
                    this.$refs.imageInput.value = '';
                },

                showError(message) {
                    // You can implement a toast notification here
                    alert(message);
                }
            }))
        });
    </script>

    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
