     @extends('layouts.app')

     @section('main_content')
         <!-- Welcome Section -->
         <div class="mb-8 fade-in-item" style="animation-delay: 0s;">
             <h2 class="text-2xl font-bold mb-2">Welcome back, Alex!</h2>
             <p class="text-slate-400">Here's what's happening with your blog today.</p>
         </div>

         <!-- Stats Grid -->
         <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
             <div class="glass-card stat-card p-6 rounded-2xl fade-in-item" style="animation-delay: 0.1s;">
                 <div class="flex items-center justify-between mb-4">
                     <div class="p-3 rounded-xl bg-purple-500/10">
                         <i data-lucide="eye" class="w-6 h-6 text-purple-500"></i>
                     </div>
                     <span
                         class="text-xs font-semibold text-green-400 bg-green-400/10 px-2 py-1 rounded-full flex items-center">
                         <i data-lucide="trending-up" class="w-3 h-3 mr-1"></i>
                         +18.5%
                     </span>
                 </div>
                 <p class="text-sm text-slate-400">Monthly Views</p>
                 <h3 class="text-2xl font-bold mt-1">45,901</h3>
                 <div class="w-full bg-slate-700 rounded-full h-2 mt-3">
                     <div class="bg-purple-500 h-2 rounded-full" style="width: 75%"></div>
                 </div>
             </div>

             <div class="glass-card stat-card p-6 rounded-2xl fade-in-item" style="animation-delay: 0.2s;">
                 <div class="flex items-center justify-between mb-4">
                     <div class="p-3 rounded-xl bg-green-500/10">
                         <i data-lucide="file-text" class="w-6 h-6 text-green-500"></i>
                     </div>
                     <span
                         class="text-xs font-semibold text-green-400 bg-green-400/10 px-2 py-1 rounded-full flex items-center">
                         <i data-lucide="plus" class="w-3 h-3 mr-1"></i>
                         +4
                     </span>
                 </div>
                 <p class="text-sm text-slate-400">Total Posts</p>
                 <h3 class="text-2xl font-bold mt-1">875</h3>
                 <div class="w-full bg-slate-700 rounded-full h-2 mt-3">
                     <div class="bg-green-500 h-2 rounded-full" style="width: 62%"></div>
                 </div>
             </div>

             <div class="glass-card stat-card p-6 rounded-2xl fade-in-item" style="animation-delay: 0.3s;">
                 <div class="flex items-center justify-between mb-4">
                     <div class="p-3 rounded-xl bg-blue-500/10">
                         <i data-lucide="clock" class="w-6 h-6 text-blue-500"></i>
                     </div>
                     <span
                         class="text-xs font-semibold text-red-400 bg-red-400/10 px-2 py-1 rounded-full flex items-center">
                         <i data-lucide="trending-down" class="w-3 h-3 mr-1"></i>
                         -0.3 min
                     </span>
                 </div>
                 <p class="text-sm text-slate-400">Avg. Read Time</p>
                 <h3 class="text-2xl font-bold mt-1">4.2 min</h3>
                 <div class="w-full bg-slate-700 rounded-full h-2 mt-3">
                     <div class="bg-blue-500 h-2 rounded-full" style="width: 84%"></div>
                 </div>
             </div>

             <div class="glass-card stat-card p-6 rounded-2xl fade-in-item" style="animation-delay: 0.4s;">
                 <div class="flex items-center justify-between mb-4">
                     <div class="p-3 rounded-xl bg-yellow-500/10">
                         <i data-lucide="users" class="w-6 h-6 text-yellow-500"></i>
                     </div>
                     <span
                         class="text-xs font-semibold text-green-400 bg-green-400/10 px-2 py-1 rounded-full flex items-center">
                         <i data-lucide="trending-up" class="w-3 h-3 mr-1"></i>
                         +3.1%
                     </span>
                 </div>
                 <p class="text-sm text-slate-400">Subscribers</p>
                 <h3 class="text-2xl font-bold mt-1">18,456</h3>
                 <div class="w-full bg-slate-700 rounded-full h-2 mt-3">
                     <div class="bg-yellow-500 h-2 rounded-full" style="width: 68%"></div>
                 </div>
             </div>
         </section>

         <!-- Charts Section -->
         <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
             <div class="glass-card p-6 rounded-2xl fade-in-item" style="animation-delay: 0.5s;">
                 <div class="flex items-center justify-between mb-6">
                     <h3 class="text-lg font-semibold">Traffic Overview</h3>
                     <div class="flex space-x-2">
                         <button class="text-xs px-3 py-1 rounded-full bg-accent-color text-white">Week</button>
                         <button class="text-xs px-3 py-1 rounded-full bg-slate-700 text-slate-300">Month</button>
                         <button class="text-xs px-3 py-1 rounded-full bg-slate-700 text-slate-300">Year</button>
                     </div>
                 </div>
                 <div class="h-80 flex items-center justify-center rounded-xl border-2 border-dashed"
                     style="border-color: var(--border-color);">
                     <div class="text-center">
                         <i data-lucide="bar-chart-3" class="w-12 h-12 mx-auto mb-3" style="color: var(--text-muted);"></i>
                         <p class="text-sm" style="color: var(--text-secondary);">
                             Traffic visualization chart
                         </p>
                         <p class="text-xs mt-1" style="color: var(--text-muted);">
                             Shows visits, page views, and bounce rate
                         </p>
                     </div>
                 </div>
             </div>

             <div class="glass-card p-6 rounded-2xl fade-in-item" style="animation-delay: 0.6s;">
                 <div class="flex items-center justify-between mb-6">
                     <h3 class="text-lg font-semibold">Audience Demographics</h3>
                     <button class="text-xs px-3 py-1 rounded-full bg-slate-700 text-slate-300 flex items-center">
                         <i data-lucide="download" class="w-3 h-3 mr-1"></i>
                         Export
                     </button>
                 </div>
                 <div class="h-80 flex items-center justify-center rounded-xl border-2 border-dashed"
                     style="border-color: var(--border-color);">
                     <div class="text-center">
                         <i data-lucide="pie-chart" class="w-12 h-12 mx-auto mb-3" style="color: var(--text-muted);"></i>
                         <p class="text-sm" style="color: var(--text-secondary);">
                             Audience demographics chart
                         </p>
                         <p class="text-xs mt-1" style="color: var(--text-muted);">
                             Shows age, location, and interests
                         </p>
                     </div>
                 </div>
             </div>
         </section>

         <!-- Recent Posts Table -->
         <section class="fade-in-item" style="animation-delay: 0.7s;">
             <div class="glass-card p-6 rounded-2xl">
                 <div class="flex items-center justify-between mb-6">
                     <h3 class="text-lg font-semibold">Recent Posts</h3>
                     <button class="text-sm text-accent-color hover:underline flex items-center">
                         View All
                         <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                     </button>
                 </div>

                 <div class="overflow-x-auto">
                     <table class="w-full text-left">
                         <thead class="text-xs uppercase text-slate-400 border-b"
                             style="border-color: var(--border-color);">
                             <tr>
                                 <th scope="col" class="py-3 px-4">Title</th>
                                 <th scope="col" class="py-3 px-4 hidden sm:table-cell">Status</th>
                                 <th scope="col" class="py-3 px-4">Views</th>
                                 <th scope="col" class="py-3 px-4 hidden md:table-cell">Date</th>
                                 <th scope="col" class="py-3 px-4">Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr class="table-row border-b" style="border-color: var(--border-color);">
                                 <th scope="row" class="py-4 px-4 font-medium">
                                     <div class="flex items-center">
                                         <div
                                             class="w-10 h-10 rounded-md bg-purple-500/10 flex items-center justify-center mr-3">
                                             <i data-lucide="file-text" class="w-4 h-4 text-purple-500"></i>
                                         </div>
                                         <div>
                                             <div>The Future of AI in Web Development</div>
                                             <div class="text-xs text-slate-400 mt-1">Tech • 8 min read</div>
                                         </div>
                                     </div>
                                 </th>
                                 <td class="py-4 px-4 hidden sm:table-cell">
                                     <span
                                         class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-500">Published</span>
                                 </td>
                                 <td class="py-4 px-4 font-semibold text-purple-500">12,500</td>
                                 <td class="py-4 px-4 hidden md:table-cell text-slate-400">May 15, 2023</td>
                                 <td class="py-4 px-4">
                                     <button class="text-accent-color hover:underline text-sm flex items-center">
                                         Edit
                                         <i data-lucide="edit" class="w-3 h-3 ml-1"></i>
                                     </button>
                                 </td>
                             </tr>
                             <tr class="table-row border-b" style="border-color: var(--border-color);">
                                 <th scope="row" class="py-4 px-4 font-medium">
                                     <div class="flex items-center">
                                         <div
                                             class="w-10 h-10 rounded-md bg-blue-500/10 flex items-center justify-center mr-3">
                                             <i data-lucide="file-text" class="w-4 h-4 text-blue-500"></i>
                                         </div>
                                         <div>
                                             <div>Mastering Tailwind CSS Grid</div>
                                             <div class="text-xs text-slate-400 mt-1">Design • 6 min read</div>
                                         </div>
                                     </div>
                                 </th>
                                 <td class="py-4 px-4 hidden sm:table-cell">
                                     <span
                                         class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-500">Published</span>
                                 </td>
                                 <td class="py-4 px-4 font-semibold text-blue-500">8,900</td>
                                 <td class="py-4 px-4 hidden md:table-cell text-slate-400">May 10, 2023</td>
                                 <td class="py-4 px-4">
                                     <button class="text-accent-color hover:underline text-sm flex items-center">
                                         Edit
                                         <i data-lucide="edit" class="w-3 h-3 ml-1"></i>
                                     </button>
                                 </td>
                             </tr>
                             <tr class="table-row border-b" style="border-color: var(--border-color);">
                                 <th scope="row" class="py-4 px-4 font-medium">
                                     <div class="flex items-center">
                                         <div
                                             class="w-10 h-10 rounded-md bg-yellow-500/10 flex items-center justify-center mr-3">
                                             <i data-lucide="file-text" class="w-4 h-4 text-yellow-500"></i>
                                         </div>
                                         <div>
                                             <div>Best Practices for React Hooks</div>
                                             <div class="text-xs text-slate-400 mt-1">Development • 10 min read
                                             </div>
                                         </div>
                                     </div>
                                 </th>
                                 <td class="py-4 px-4 hidden sm:table-cell">
                                     <span
                                         class="px-2 py-1 text-xs rounded-full bg-yellow-500/20 text-yellow-500">Draft</span>
                                 </td>
                                 <td class="py-4 px-4 font-semibold text-yellow-500">-</td>
                                 <td class="py-4 px-4 hidden md:table-cell text-slate-400">May 5, 2023</td>
                                 <td class="py-4 px-4">
                                     <button class="text-accent-color hover:underline text-sm flex items-center">
                                         Edit
                                         <i data-lucide="edit" class="w-3 h-3 ml-1"></i>
                                     </button>
                                 </td>
                             </tr>
                             <tr class="table-row">
                                 <th scope="row" class="py-4 px-4 font-medium">
                                     <div class="flex items-center">
                                         <div
                                             class="w-10 h-10 rounded-md bg-green-500/10 flex items-center justify-center mr-3">
                                             <i data-lucide="file-text" class="w-4 h-4 text-green-500"></i>
                                         </div>
                                         <div>
                                             <div>CSS Variables vs Preprocessor Variables</div>
                                             <div class="text-xs text-slate-400 mt-1">CSS • 7 min read</div>
                                         </div>
                                     </div>
                                 </th>
                                 <td class="py-4 px-4 hidden sm:table-cell">
                                     <span
                                         class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-500">Published</span>
                                 </td>
                                 <td class="py-4 px-4 font-semibold text-green-500">5,600</td>
                                 <td class="py-4 px-4 hidden md:table-cell text-slate-400">Apr 28, 2023</td>
                                 <td class="py-4 px-4">
                                     <button class="text-accent-color hover:underline text-sm flex items-center">
                                         Edit
                                         <i data-lucide="edit" class="w-3 h-3 ml-1"></i>
                                     </button>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </section>
     @endsection
