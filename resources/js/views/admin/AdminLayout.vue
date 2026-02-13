<template>
    <div class="min-h-screen bg-gray-50 flex">
        <!-- Mobile Sidebar Overlay -->
        <div
            v-if="sidebarOpen"
            class="fixed inset-0 bg-gray-900/50 z-20 lg:hidden backdrop-blur-sm transition-opacity"
            @click="sidebarOpen = false"
        ></div>

        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 left-0 w-64 bg-slate-900 text-white flex flex-col shadow-2xl z-30 transition-transform duration-300 lg:static lg:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        >
            <!-- Brand -->
            <div
                class="h-20 flex items-center px-6 bg-slate-950 border-b border-slate-800"
            >
                <router-link to="/admin" class="flex items-center gap-3">
                    <img
                        src="/favicon.png"
                        alt="SerraInnova Logo"
                        class="h-10 w-auto"
                    />
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
                <!-- Close Button (Mobile) -->
                <button
                    @click="sidebarOpen = false"
                    class="ml-auto lg:hidden text-slate-400 hover:text-white"
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
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
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
                    @click="sidebarOpen = false"
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
                    @click="sidebarOpen = false"
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
                    @click="sidebarOpen = false"
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

                <p
                    class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mt-8 mb-2"
                >
                    Sistema
                </p>

                <router-link
                    to="/admin/usuarios/crear"
                    @click="sidebarOpen = false"
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

            <!-- User Profile & Actions -->
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

                <div class="space-y-2">
                    <router-link
                        to="/"
                        class="flex items-center justify-center px-4 py-2 w-full border border-slate-700 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800 transition-colors text-sm"
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
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                            />
                        </svg>
                        Ver sitio web
                    </router-link>

                    <button
                        @click="handleLogout"
                        class="flex items-center justify-center px-4 py-2 w-full border border-red-500/30 text-red-400 rounded-lg hover:bg-red-500/10 hover:text-red-300 transition-colors text-sm"
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
                        Cerrar Sesión
                    </button>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col h-screen overflow-hidden">
            <!-- Header -->
            <header
                class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-4 lg:px-8 shadow-sm z-10"
            >
                <div class="flex items-center gap-4">
                    <!-- Mobile sidebar toggle -->
                    <button
                        @click="sidebarOpen = true"
                        class="lg:hidden text-gray-500 hover:text-gray-700"
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
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                        </svg>
                    </button>

                    <h1
                        class="text-lg lg:text-xl font-bold text-gray-800 truncate"
                    >
                        {{ pageTitle }}
                    </h1>
                </div>

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
                    </button>
                    <div
                        class="h-8 w-px bg-gray-200 mx-2 hidden sm:block"
                    ></div>
                    <span
                        class="text-sm font-medium text-gray-600 hidden sm:block"
                        >{{ currentDate }}</span
                    >
                </div>
            </header>

            <!-- Scrollable Content -->
            <div class="flex-1 overflow-auto p-4 lg:p-8 bg-gray-50">
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
import { computed, ref } from "vue";
import { useRoute, useRouter } from "vue-router";

const route = useRoute();
const router = useRouter();
const sidebarOpen = ref(false);

const isActive = (path) => {
    if (path === "/admin") {
        return route.path === "/admin";
    }
    return route.path.startsWith(path);
};

const handleLogout = () => {
    sessionStorage.removeItem("isAdminAuthenticated");
    sessionStorage.removeItem("adminUser");
    router.push("/login");
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
