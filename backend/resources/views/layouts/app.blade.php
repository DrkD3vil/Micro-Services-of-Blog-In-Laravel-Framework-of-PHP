<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogSphere Admin - Modern Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- @yield('styles') --}}
    @include('layouts.assets.style.style')
</head>

<body class="flex h-screen overflow-hidden">

    {{-- @yield('sidebar') --}}
    @include('layouts.components.sidebar')
    @include('layouts.components.mobile_sidebar')


    <!-- Main Content Area -->
    <div class="flex flex-col flex-1 overflow-y-auto overflow-x-hidden custom-scrollbar">


        @include('layouts.components.navbar')

        <!-- Main Content -->
        <main class="p-6 md:p-8 main-content">



            @yield('main_content')
        </main>
    </div>
    @include('layouts.components.mobile_bottom')
    @include('layouts.assets.js.js')



</body>

</html>
