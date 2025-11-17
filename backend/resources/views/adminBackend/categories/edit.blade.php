@extends('layouts.app')

@section('main_content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <!-- Page Header with Breadcrumb -->
    <div class="mb-8 fade-in-item">
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm">
                <li>
                    <a href="{{ url('/dashboard') }}" class="text-secondary hover:text-primary transition-colors">Dashboard</a>
                </li>
                <li class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-muted mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <a href="{{ url('/categories') }}" class="text-secondary hover:text-primary transition-colors">Categories</a>
                </li>
                <li class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-muted mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-primary font-medium">Edit {{ $category->name }}</span>
                </li>
            </ol>
        </nav>

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center mb-4 lg:mb-0">
                <div class="p-3 rounded-xl bg-accent-glow mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-primary">Edit Category</h1>
                    <p class="text-secondary mt-1">Update "{{ $category->name }}" category details</p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="flex space-x-3">
                <button type="button" class="px-4 py-2 border border-border-color rounded-lg text-secondary hover:text-primary hover:bg-bg-tertiary transition-all flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    <span>Export</span>
                </button>
                <a href="{{ route('categories.create') }}" class="btn-primary flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>New Category</span>
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Form -->
        <div class="lg:col-span-2">
            <!-- Form Card -->
            <div class="glass-card rounded-2xl p-6 lg:p-8 fade-in-item" style="animation-delay: 0.2s">
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6" x-data="categoryForm()">
                    @csrf
                    @method('PUT')

                    <!-- Category Name Field -->
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <label class="block text-lg font-semibold text-primary">
                                Category Name
                                <span class="text-danger text-sm ml-1">*</span>
                            </label>
                            <div class="text-sm text-muted" x-text="`${nameLength}/50`" :class="nameLength > 50 ? 'text-danger' : ''"></div>
                        </div>

                        <p class="text-sm text-secondary">
                            Choose a clear, descriptive name that represents your content category.
                        </p>

                        <div class="relative group">
                            <input
                                type="text"
                                name="name"
                                x-model="categoryName"
                                x-ref="nameInput"
                                value="{{ old('name', $category->name) }}"
                                placeholder="e.g., Technology, Lifestyle, Business"
                                class="w-full px-4 py-4 bg-bg-secondary border-2 border-border-color rounded-xl text-primary placeholder-text-muted focus:outline-none focus:ring-2 focus:ring-accent-color focus:border-accent-color transition-all duration-300 text-lg theme-safe-input"
                                required
                                maxlength="50"
                                @input="updateNameLength()"
                                @focus="focusedField = 'name'"
                            >
                            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 transition-opacity duration-300" :class="focusedField === 'name' ? 'opacity-100' : 'opacity-70'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>

                            <!-- Validation Indicator -->
                            <div class="absolute -right-2 -top-2">
                                <div x-show="nameLength > 0 && nameLength <= 50" class="w-6 h-6 bg-success rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div x-show="nameLength > 50" class="w-6 h-6 bg-danger rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Character Guidance -->
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 text-xs text-muted">
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
                            <div class="text-sm text-muted" x-text="imageFile ? imageFile.name : '{{ $category->image ? 'Current image set' : 'No file chosen' }}'"></div>
                        </div>

                        <p class="text-sm text-secondary">
                            Upload a representative image for this category. Recommended: 400x400px, JPG/PNG format.
                        </p>

                        <!-- Current Image Preview -->
                        @if($category->image)
                        <div class="mb-4 p-4 bg-bg-secondary rounded-xl border border-border-color">
                            <p class="text-sm text-muted mb-3">Current Image:</p>
                            <div class="flex items-center space-x-4">
                                <img
                                    src="/storage/{{ $category->image }}"
                                    alt="Current category image"
                                    class="w-20 h-20 rounded-lg object-cover shadow-md"
                                >
                                <div class="flex-1">
                                    <p class="text-primary font-medium">Current image is set</p>
                                    <p class="text-sm text-muted">Upload a new image to replace the current one</p>
                                </div>
                                <button
                                    type="button"
                                    @click="removeCurrentImage = true"
                                    class="px-3 py-2 bg-danger/20 text-danger rounded-lg hover:bg-danger/30 transition-colors text-sm font-medium"
                                >
                                    Remove
                                </button>
                                <input type="hidden" name="remove_image" x-model="removeCurrentImage">
                            </div>
                        </div>
                        @endif

                        <!-- Image Upload Area -->
                        <div
                            class="border-2 border-dashed border-border-color rounded-2xl p-8 text-center transition-all duration-300 hover:border-accent-color hover:bg-accent-glow/20 cursor-pointer"
                            @click="$refs.imageInput.click()"
                            @drop="handleDrop($event)"
                            @dragover="handleDragOver($event)"
                            @dragleave="handleDragLeave($event)"
                            :class="isDragging ? 'border-accent-color bg-accent-glow/30' : ''"
                        >
                            <input
                                type="file"
                                name="image"
                                x-ref="imageInput"
                                accept="image/*"
                                class="hidden"
                                @change="handleImageSelect($event)"
                            >

                            <div x-show="!imagePreview && !currentImage">
                                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-bg-tertiary flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <p class="text-primary font-medium mb-2">Drop your image here or click to browse</p>
                                <p class="text-sm text-muted">Supports JPG, PNG, WEBP • Max 5MB</p>
                            </div>

                            <!-- New Image Preview -->
                            <div x-show="imagePreview" class="space-y-4">
                                <div class="relative inline-block">
                                    <img
                                        :src="imagePreview"
                                        alt="New category image preview"
                                        class="w-32 h-32 rounded-xl object-cover mx-auto shadow-lg"
                                    >
                                    <button
                                        type="button"
                                        @click="removeImage()"
                                        class="absolute -top-2 -right-2 w-6 h-6 bg-danger text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-sm text-success font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    New image ready for upload
                                </p>
                            </div>

                            <!-- Current Image Indicator -->
                            <div x-show="currentImage && !imagePreview" class="space-y-4">
                                <div class="relative inline-block">
                                    <img
                                        src="/storage/{{ $category->image }}"
                                        alt="Current category image"
                                        class="w-32 h-32 rounded-xl object-cover mx-auto shadow-lg opacity-60"
                                    >
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <span class="bg-bg-primary text-primary px-3 py-1 rounded-full text-sm font-medium shadow-lg">
                                            Current Image
                                        </span>
                                    </div>
                                </div>
                                <p class="text-sm text-muted">
                                    Click to upload a new image or use remove button above
                                </p>
                            </div>
                        </div>

                        <!-- Image Requirements -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs text-muted">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Max file size: 5MB</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Formats: JPG, PNG, WEBP</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Optimal: 400×400px</span>
                            </div>
                        </div>
                    </div>

                    <!-- Slug Field -->
                    <div class="space-y-3">
                        <label class="block font-medium text-primary">
                            URL Slug
                            <span class="text-muted text-sm font-normal">(auto-generated from name)</span>
                        </label>
                        <div class="relative">
                            <input
                                type="text"
                                name="slug"
                                x-model="generateSlug()"
                                value="{{ old('slug', $category->slug) }}"
                                class="w-full px-4 py-3 bg-bg-secondary border border-border-color rounded-xl text-primary theme-safe-input focus:outline-none focus:ring-2 focus:ring-accent-color focus:border-accent-color transition-all duration-300"
                                :readonly="!editSlug"
                                :class="editSlug ? 'bg-bg-secondary' : 'bg-bg-tertiary opacity-80'"
                            >
                            <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                <button type="button" @click="editSlug = !editSlug" class="text-accent-color hover:text-accent-hover transition-colors" :title="editSlug ? 'Lock slug' : 'Edit slug'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path x-show="!editSlug" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        <path x-show="editSlug" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <p class="text-xs text-muted" x-show="!editSlug">Click the edit icon to manually modify the slug</p>
                    </div>



                    <!-- Status Field -->
                    <div class="space-y-3 pt-4">
                        <label class="block font-medium text-primary">Status</label>
                        <div class="flex space-x-4">
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input
                                    type="radio"
                                    name="is_active"
                                    value="1"
                                    {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                                    class="text-accent-color focus:ring-accent-color"
                                >
                                <span class="text-primary">Active</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input
                                    type="radio"
                                    name="is_active"
                                    value="0"
                                    {{ !old('is_active', $category->is_active) ? 'checked' : '' }}
                                    class="text-accent-color focus:ring-accent-color"
                                >
                                <span class="text-primary">Inactive</span>
                            </label>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <label class="block font-medium text-primary">Description</label>
                            <div class="text-sm text-muted" x-text="`${descLength}/200`"></div>
                        </div>
                        <textarea
                            name="description"
                            x-model="description"
                            @input="updateDescLength()"
                            placeholder="Brief description of this category's purpose and content..."
                            rows="4"
                            class="w-full px-4 py-3 bg-bg-secondary border border-border-color rounded-xl text-primary placeholder-text-muted focus:outline-none focus:ring-2 focus:ring-accent-color focus:border-accent-color transition-all duration-300 resize-none theme-safe-input"
                            maxlength="200"
                        >{{ old('description', $category->description) }}</textarea>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-border-color">
                        <button
                            type="submit"
                            class="btn-primary flex-1 flex items-center justify-center space-x-2 py-4 text-lg font-semibold"
                            :disabled="nameLength < 3 || nameLength > 50"
                            :class="(nameLength < 3 || nameLength > 50) ? 'opacity-50 cursor-not-allowed' : ''"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Update Category</span>
                        </button>

                        <a
                            href="{{ url()->previous() }}"
                            class="px-6 py-4 border-2 border-border-color text-primary rounded-xl font-semibold text-center hover:bg-bg-tertiary transition-all duration-300 flex items-center justify-center space-x-2"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span>Cancel</span>
                        </a>

                        <!-- Delete Button -->
                        <button
                            type="button"
                            @click="showDeleteConfirm = true"
                            class="px-6 py-4 bg-danger/20 text-danger border-2 border-danger/30 rounded-xl font-semibold text-center hover:bg-danger/30 transition-all duration-300 flex items-center justify-center space-x-2"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            <span>Delete</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Quick Tips -->
            <div class="glass-card rounded-2xl p-6 fade-in-item" style="animation-delay: 0.3s">
                <div class="flex items-start mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-info mr-3 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="font-semibold text-primary text-lg">Editing Tips</h3>
                </div>
                <ul class="text-sm space-y-3">
                    <li class="flex items-start">
                        <div class="w-5 h-5 bg-info/20 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-secondary">Changing the slug may affect existing URLs</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-5 h-5 bg-info/20 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-secondary">Inactive categories won't appear in listings</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-5 h-5 bg-info/20 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-secondary">Update images to keep your content fresh</span>
                    </li>
                </ul>
            </div>

            <!-- Preview Card -->
            <div class="glass-card rounded-2xl p-6 fade-in-item" style="animation-delay: 0.4s">
                <h3 class="font-semibold text-primary text-lg mb-4">Live Preview</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-secondary">Name:</span>
                        <span class="text-primary font-medium" x-text="categoryName || '{{ $category->name }}'"></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-secondary">Slug:</span>
                        <span class="text-primary font-mono" x-text="generateSlug() || '{{ $category->slug }}'"></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-secondary">Image:</span>
                        <span x-show="imagePreview" class="text-success text-xs font-medium">New image set</span>
                        <span x-show="!imagePreview && currentImage" class="text-info text-xs">Current image</span>
                        <span x-show="!imagePreview && !currentImage" class="text-muted text-xs">No image</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-secondary">Status:</span>
                        <span class="text-success font-medium" x-text="isActive ? 'Active' : 'Inactive'"></span>
                    </div>
                </div>

                <!-- Image Preview in Sidebar -->
                <div x-show="imagePreview || currentImage" class="mt-4 p-3 bg-bg-secondary rounded-lg">
                    <p class="text-xs text-muted mb-2" x-text="imagePreview ? 'New Image Preview:' : 'Current Image:'"></p>
                    <img
                        :src="imagePreview || '{{ $category->image ? '/storage/' . $category->image : '' }}'"
                        alt="Preview"
                        class="w-full h-20 object-cover rounded"
                        x-show="imagePreview || currentImage"
                    >
                </div>
            </div>

            <!-- Category Stats -->
            <div class="glass-card rounded-2xl p-6 fade-in-item" style="animation-delay: 0.5s">
                <h3 class="font-semibold text-primary text-lg mb-4">Category Stats</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-secondary">Created:</span>
                        <span class="text-primary">{{ $category->created_at->format('M j, Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-secondary">Last Updated:</span>
                        <span class="text-primary">{{ $category->updated_at->format('M j, Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-secondary">Posts Count:</span>
                        <span class="text-primary">{{ $category->posts_count ?? 0 }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-secondary">Subcategories:</span>
                        <span class="text-primary">{{ $category->children_count ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div x-data="{ showDeleteConfirm: false }" x-show="showDeleteConfirm" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
    <div class="glass-card rounded-2xl p-6 max-w-md w-full">
        <div class="text-center">
            <div class="w-16 h-16 mx-auto mb-4 bg-danger/20 rounded-full flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-danger" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-primary mb-2">Delete Category</h3>
            <p class="text-secondary mb-6">Are you sure you want to delete "{{ $category->name }}"? This action cannot be undone.</p>

            <div class="flex space-x-3">
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-danger text-white py-3 rounded-xl font-semibold hover:bg-red-700 transition-colors">
                        Delete Category
                    </button>
                </form>
                <button @click="showDeleteConfirm = false" class="flex-1 bg-bg-tertiary text-primary py-3 rounded-xl font-semibold hover:bg-bg-secondary transition-colors">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Styles for Edit Page -->
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

    /* Ensure all text elements are theme-safe */
    .text-primary { color: var(--text-primary) !important; }
    .text-secondary { color: var(--text-secondary) !important; }
    .text-muted { color: var(--text-muted) !important; }

    /* Radio button styling */
    input[type="radio"] {
        accent-color: var(--accent-color);
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
    }

    @media (max-width: 640px) {
        .grid-cols-2 {
            grid-template-columns: 1fr !important;
        }

        .grid-cols-3 {
            grid-template-columns: 1fr !important;
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
    document.addEventListener('alpine:init', () => {
        Alpine.data('categoryForm', () => ({
            categoryName: '{{ old('name', $category->name) }}',
            description: '{{ old('description', $category->description) }}',
            nameLength: {{ strlen($category->name) }},
            descLength: {{ strlen($category->description) }},
            focusedField: '',
            editSlug: false,
            imageFile: null,
            imagePreview: null,
            isDragging: false,
            removeCurrentImage: false,
            currentImage: {{ $category->image ? 'true' : 'false' }},
            isActive: {{ $category->is_active ? 'true' : 'false' }},
            showDeleteConfirm: false,

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
                if (this.editSlug) {
                    return this.categoryName;
                }
                if (this.categoryName.length < 3) return '{{ $category->slug }}';
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
                this.currentImage = false;

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
