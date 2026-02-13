<template>
    <header
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
        :class="
            scrolled
                ? 'bg-white/95 backdrop-blur-lg shadow-lg'
                : 'bg-transparent'
        "
    >
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <router-link
                        to="/"
                        class="flex items-center space-x-3 group"
                    >
                        <div class="relative">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-primary-400 via-primary-500 to-accent-500 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-primary-500/30 transition-all duration-300 group-hover:scale-105"
                            >
                                <svg
                                    class="w-7 h-7 text-white"
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
                            <div
                                class="absolute -bottom-1 -right-1 w-4 h-4 bg-secondary-400 rounded-full border-2 border-white flex items-center justify-center"
                            >
                                <svg
                                    class="w-2 h-2 text-white"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path d="M5 3l10 7-10 7V3z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <span
                                class="text-2xl font-bold tracking-tight"
                                :class="
                                    scrolled ? 'text-gray-900' : 'text-white'
                                "
                            >
                                Serra<span class="text-gradient">Innova</span>
                            </span>
                            <span
                                class="text-[10px] font-medium tracking-widest uppercase"
                                :class="
                                    scrolled ? 'text-gray-500' : 'text-white/70'
                                "
                            >
                                Inmobiliaria Sostenible
                            </span>
                        </div>
                    </router-link>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex lg:items-center lg:space-x-1">
                    <router-link
                        v-for="item in navigation"
                        :key="item.name"
                        :to="item.to"
                        class="relative px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300 group"
                        :class="[
                            isActive(item.to)
                                ? scrolled
                                    ? 'text-primary-600'
                                    : 'text-white'
                                : scrolled
                                  ? 'text-gray-600 hover:text-primary-600'
                                  : 'text-white/80 hover:text-white',
                        ]"
                    >
                        {{ item.name }}
                        <span
                            class="absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-gradient-to-r from-primary-400 to-accent-400 transition-all duration-300 rounded-full"
                            :class="
                                isActive(item.to)
                                    ? 'w-6'
                                    : 'w-0 group-hover:w-6'
                            "
                        ></span>
                    </router-link>

                    <!-- Admin Link (Desktop) -->
                    <button
                        @click="handleAdminAccess"
                        class="relative px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300 group flex items-center gap-2"
                        :class="[
                            isActive('/admin')
                                ? scrolled
                                    ? 'text-primary-600'
                                    : 'text-white'
                                : scrolled
                                  ? 'text-gray-600 hover:text-primary-600'
                                  : 'text-white/80 hover:text-white',
                        ]"
                    >
                        <svg
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                            />
                        </svg>
                        Admin
                    </button>

                    <!-- CTA Button -->
                    <router-link
                        to="/calculadora"
                        class="ml-4 inline-flex items-center px-5 py-2.5 text-sm font-semibold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl group"
                        :class="
                            scrolled
                                ? 'bg-gradient-to-r from-primary-500 to-accent-500 text-white hover:from-primary-600 hover:to-accent-600'
                                : 'bg-white text-primary-600 hover:bg-primary-50'
                        "
                    >
                        <svg
                            class="w-5 h-5 mr-2 transition-transform group-hover:scale-110"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                            />
                        </svg>
                        Calculadora CO₂
                        <span
                            class="ml-2 px-2 py-0.5 text-xs rounded-full"
                            :class="
                                scrolled
                                    ? 'bg-white/20'
                                    : 'bg-primary-100 text-primary-700'
                            "
                        >
                            Gratis
                        </span>
                    </router-link>
                </div>

                <!-- Mobile menu button -->
                <div class="lg:hidden flex items-center">
                    <button
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        class="relative inline-flex items-center justify-center w-12 h-12 rounded-xl transition-all duration-300"
                        :class="
                            scrolled
                                ? 'text-gray-700 hover:bg-gray-100'
                                : 'text-white hover:bg-white/10'
                        "
                    >
                        <span class="sr-only">Toggle menu</span>
                        <div
                            class="w-6 h-5 relative flex flex-col justify-between"
                        >
                            <span
                                class="w-full h-0.5 rounded-full transition-all duration-300 transform origin-center"
                                :class="[
                                    scrolled ? 'bg-gray-700' : 'bg-white',
                                    mobileMenuOpen
                                        ? 'rotate-45 translate-y-2'
                                        : '',
                                ]"
                            ></span>
                            <span
                                class="w-full h-0.5 rounded-full transition-all duration-300"
                                :class="[
                                    scrolled ? 'bg-gray-700' : 'bg-white',
                                    mobileMenuOpen
                                        ? 'opacity-0 scale-0'
                                        : 'opacity-100',
                                ]"
                            ></span>
                            <span
                                class="w-full h-0.5 rounded-full transition-all duration-300 transform origin-center"
                                :class="[
                                    scrolled ? 'bg-gray-700' : 'bg-white',
                                    mobileMenuOpen
                                        ? '-rotate-45 -translate-y-2'
                                        : '',
                                ]"
                            ></span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Mobile menu -->
            <transition
                enter-active-class="transition ease-out duration-300"
                enter-from-class="opacity-0 -translate-y-4 scale-95"
                enter-to-class="opacity-100 translate-y-0 scale-100"
                leave-active-class="transition ease-in duration-200"
                leave-from-class="opacity-100 translate-y-0 scale-100"
                leave-to-class="opacity-0 -translate-y-4 scale-95"
            >
                <div
                    v-if="mobileMenuOpen"
                    class="lg:hidden absolute left-4 right-4 top-full mt-2 bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100"
                >
                    <div class="p-4 space-y-1">
                        <router-link
                            v-for="item in navigation"
                            :key="item.name"
                            :to="item.to"
                            @click="mobileMenuOpen = false"
                            class="flex items-center px-4 py-3 text-base font-medium rounded-xl transition-all duration-200"
                            :class="
                                isActive(item.to)
                                    ? 'bg-primary-50 text-primary-600'
                                    : 'text-gray-700 hover:bg-gray-50 hover:text-primary-600'
                            "
                        >
                            <span
                                class="w-2 h-2 rounded-full mr-3 transition-all duration-200"
                                :class="
                                    isActive(item.to)
                                        ? 'bg-primary-500'
                                        : 'bg-gray-300'
                                "
                            ></span>
                            {{ item.name }}
                        </router-link>

                        <!-- Admin Link (Mobile) -->
                        <button
                            @click="
                                () => {
                                    mobileMenuOpen = false;
                                    handleAdminAccess();
                                }
                            "
                            class="w-full flex items-center px-4 py-3 text-base font-medium rounded-xl transition-all duration-200"
                            :class="
                                isActive('/admin')
                                    ? 'bg-primary-50 text-primary-600'
                                    : 'text-gray-700 hover:bg-gray-50 hover:text-primary-600'
                            "
                        >
                            <span
                                class="w-2 h-2 rounded-full mr-3 transition-all duration-200"
                                :class="
                                    isActive('/admin')
                                        ? 'bg-primary-500'
                                        : 'bg-gray-300'
                                "
                            ></span>
                            <svg
                                class="w-5 h-5 mr-3"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                />
                            </svg>
                            Admin
                        </button>
                    </div>

                    <div
                        class="p-4 bg-gradient-to-r from-primary-500 to-accent-500"
                    >
                        <router-link
                            to="/calculadora"
                            @click="mobileMenuOpen = false"
                            class="flex items-center justify-center px-4 py-3 text-base font-semibold text-white bg-white/10 backdrop-blur rounded-xl hover:bg-white/20 transition-all"
                        >
                            <svg
                                class="w-5 h-5 mr-2"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                                />
                            </svg>
                            Calcular mi huella CO₂
                        </router-link>
                    </div>
                </div>
            </transition>
        </nav>
    </header>

    <!-- Spacer for fixed header -->
    <div class="h-20"></div>
</template>

<script setup>
import { onMounted, onUnmounted, ref } from "vue";
import { useRoute, useRouter } from "vue-router";

const route = useRoute();
const router = useRouter();
const mobileMenuOpen = ref(false);
const scrolled = ref(false);

const navigation = [
    { name: "Inicio", to: "/" },
    { name: "Propiedades", to: "/propiedades" },
    { name: "Servicios", to: "/servicios" },
    { name: "Blog", to: "/blog" },
    { name: "Nosotros", to: "/quienes-somos" },
    { name: "Contacto", to: "/contacto" },
];

const isActive = (to) => {
    if (to === "/") return route.path === "/";
    return route.path === to || route.path.startsWith(to + "/");
};

const handleAdminAccess = () => {
    if (sessionStorage.getItem("isAdminAuthenticated")) {
        router.push("/admin");
    } else {
        router.push("/login");
    }
};

const handleScroll = () => {
    scrolled.value = window.scrollY > 50;
};

onMounted(() => {
    window.addEventListener("scroll", handleScroll);
    handleScroll();
});

onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
});
</script>
