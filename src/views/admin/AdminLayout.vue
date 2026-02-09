<template>
    <div class="min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-white">
            <div class="p-4 border-b border-gray-800">
                <router-link to="/admin" class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-primary-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <span class="text-lg font-bold">SerraInnova</span>
                </router-link>
            </div>

            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <router-link
                            to="/admin"
                            class="flex items-center px-4 py-2 rounded-lg transition-colors"
                            :class="isActive('/admin') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800'"
                        >
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            to="/admin/propiedades"
                            class="flex items-center px-4 py-2 rounded-lg transition-colors"
                            :class="isActive('/admin/propiedades') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800'"
                        >
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Propiedades
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            to="/admin/blog"
                            class="flex items-center px-4 py-2 rounded-lg transition-colors"
                            :class="isActive('/admin/blog') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800'"
                        >
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                            Blog
                        </router-link>
                    </li>
                </ul>
            </nav>

            <!-- Back to site -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-800">
                <router-link
                    to="/"
                    class="flex items-center px-4 py-2 text-gray-300 hover:text-white transition-colors"
                >
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Volver al sitio
                </router-link>
            </div>
        </aside>

        <!-- Main content -->
        <main class="ml-64 p-8">
            <router-view />
        </main>
    </div>
</template>

<script setup>
import { useRoute } from 'vue-router';

const route = useRoute();

const isActive = (path) => {
    if (path === '/admin') {
        return route.path === '/admin';
    }
    return route.path.startsWith(path);
};
</script>
