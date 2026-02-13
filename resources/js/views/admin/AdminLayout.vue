<template>
    <div class="min-h-screen bg-gray-50 flex">
        <!-- Sidebar -->
        <aside
            class="w-64 bg-slate-900 text-white flex flex-col shadow-2xl z-20 transition-all duration-300"
        >
            <!-- Brand -->
            <div
                class="h-20 flex items-center px-6 bg-slate-950 border-b border-slate-800"
            >
                <router-link to="/admin" class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/20"
                    >
                        <svg
                            class="w-6 h-6 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                            />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-lg font-bold tracking-tight"
                            >SerraInnova</span
                        >
                        <span
                            class="block text-[10px] text-slate-400 uppercase tracking-wider font-semibold"
                            >Admin Panel</span
                        >
                    </div>
                </router-link>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto py-6 px-3 space-y-1">
                <p
                    class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2"
                >
                    Principal
                </p>

                <router-link
                    to="/admin"
                    class="flex items-center px-3 py-2.5 rounded-xl transition-all duration-200 group"
                    :class="
                        isActive('/admin') && !isActive('/admin/')
                            ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-600/20'
                            : 'text-slate-400 hover:bg-slate-800 hover:text-white'
                    "
                >
                    <svg
                        class="w-5 h-5 mr-3 transition-colors"
                        :class="
                            isActive('/admin') && !isActive('/admin/')
                                ? 'text-white'
                                : 'text-slate-500 group-hover:text-white'
                        "
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                        />
                    </svg>
                    Dashboard
                </router-link>

                <p
                    class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mt-8 mb-2"
                >
                    Gestión
                </p>

                <router-link
                    to="/admin/propiedades"
                    class="flex items-center px-3 py-2.5 rounded-xl transition-all duration-200 group"
                    :class="
                        isActive('/admin/propiedades')
                            ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-600/20'
                            : 'text-slate-400 hover:bg-slate-800 hover:text-white'
                    "
                >
                    <svg
                        class="w-5 h-5 mr-3 transition-colors"
                        :class="
                            isActive('/admin/propiedades')
                                ? 'text-white'
                                : 'text-slate-500 group-hover:text-white'
                        "
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                        />
                    </svg>
                    Propiedades
                </router-link>

                <router-link
                    to="/admin/blog"
                    class="flex items-center px-3 py-2.5 rounded-xl transition-all duration-200 group"
                    :class="
                        isActive('/admin/blog')
                            ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-600/20'
                            : 'text-slate-400 hover:bg-slate-800 hover:text-white'
                    "
                >
                    <svg
                        class="w-5 h-5 mr-3 transition-colors"
                        :class="
                            isActive('/admin/blog')
                                ? 'text-white'
                                : 'text-slate-500 group-hover:text-white'
                        "
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
                        />
                    </svg>
                    Blog
                </router-link>
                <router-link
                    to="/admin/usuarios/crear"
                    class="flex items-center px-3 py-2.5 rounded-xl transition-all duration-200 group"
                    :class="
                        isActive('/admin/usuarios')
                            ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-600/20'
                            : 'text-slate-400 hover:bg-slate-800 hover:text-white'
                    "
                >
                    <svg
                        class="w-5 h-5 mr-3 transition-colors"
                        :class="
                            isActive('/admin/usuarios')
                                ? 'text-white'
                                : 'text-slate-500 group-hover:text-white'
                        "
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                        />
                    </svg>
                    Usuarios
                </router-link>
            </nav>

            <!-- User Profile -->
            <div class="p-4 border-t border-slate-800 bg-slate-900">
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-10 h-10 rounded-full bg-slate-700 flex items-center justify-center text-white font-bold"
                    >
                        A
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white">Admin</p>
                        <p class="text-xs text-slate-400">
                            admin@serrainnova.es
                        </p>
                    </div>
                </div>

                <router-link
                    to="/"
                    class="flex items-center justify-center px-4 py-2 border border-slate-700 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800 transition-colors text-sm w-full"
                >
                    <svg
                        class="w-4 h-4 mr-2"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                        />
                    </svg>
                    Volver al sitio web
                </router-link>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col h-screen overflow-hidden">
            <!-- Header -->
            <header
                class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 shadow-sm z-10"
            >
                <h1 class="text-xl font-bold text-gray-800">{{ pageTitle }}</h1>
                <div class="flex items-center gap-4">
                    <button
                        class="p-2 text-gray-400 hover:text-gray-600 transition-colors relative"
                    >
                        <svg
                            class="w-6 h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                            />
                        </svg>
                        <span
                            class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border border-white"
                        ></span>
                    </button>
                    <div class="h-8 w-px bg-gray-200 mx-2"></div>
                    <span class="text-sm font-medium text-gray-600">{{
                        currentDate
                    }}</span>
                </div>
            </header>

            <!-- Scrollable Content -->
            <div class="flex-1 overflow-auto p-8 bg-gray-50">
                <router-view v-slot="{ Component }">
                    <transition
                        enter-active-class="transition ease-out duration-200"
                        enter-from-class="opacity-0 translate-y-2"
                        enter-to-class="opacity-100 translate-y-0"
                        leave-active-class="transition ease-in duration-150"
                        leave-from-class="opacity-100 translate-y-0"
                        leave-to-class="opacity-0 translate-y-2"
                        mode="out-in"
                    >
                        <component :is="Component" />
                    </transition>
                </router-view>
            </div>
        </main>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { useRoute } from "vue-router";

const route = useRoute();

const isActive = (path) => {
    if (path === "/admin") {
        return route.path === "/admin";
    }
    return route.path.startsWith(path);
};

const pageTitle = computed(() => {
    switch (route.name) {
        case "admin-dashboard":
            return "Panel de Control";
        case "admin-properties":
            return "Gestión de Propiedades";
        case "admin-property-create":
            return "Nueva Propiedad";
        case "admin-property-edit":
            return "Editar Propiedad";
        case "admin-blog":
            return "Gestión del Blog";
        case "admin-blog-create":
            return "Nuevo Artículo";
        case "admin-blog-edit":
            return "Editar Artículo";
        case "admin-user-create":
            return "Crear Usuario";
        default:
            return "Admin Panel";
    }
});

const currentDate = new Date().toLocaleDateString("es-ES", {
    weekday: "long",
    day: "numeric",
    month: "long",
});
</script>
