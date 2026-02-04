<template>
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <router-link to="/" class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900">Serra<span class="text-primary-600">Innova</span></span>
                    </router-link>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex md:items-center md:space-x-6">
                    <router-link
                        v-for="item in navigation"
                        :key="item.name"
                        :to="item.to"
                        class="text-gray-600 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors"
                        :class="{ 'text-primary-600': $route.path === item.to || $route.path.startsWith(item.to + '/') }"
                    >
                        {{ item.name }}
                    </router-link>
                    <router-link
                        to="/calculadora"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-primary-600 hover:bg-primary-700 transition-colors"
                    >
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        Calculadora CO2
                    </router-link>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100"
                    >
                        <svg v-if="!mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg v-else class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile menu -->
            <transition
                enter-active-class="transition ease-out duration-200"
                enter-from-class="opacity-0 -translate-y-1"
                enter-to-class="opacity-100 translate-y-0"
                leave-active-class="transition ease-in duration-150"
                leave-from-class="opacity-100 translate-y-0"
                leave-to-class="opacity-0 -translate-y-1"
            >
                <div v-if="mobileMenuOpen" class="md:hidden pb-4">
                    <div class="space-y-1">
                        <router-link
                            v-for="item in navigation"
                            :key="item.name"
                            :to="item.to"
                            @click="mobileMenuOpen = false"
                            class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-primary-600 hover:bg-gray-50 rounded-md"
                        >
                            {{ item.name }}
                        </router-link>
                        <router-link
                            to="/calculadora"
                            @click="mobileMenuOpen = false"
                            class="block px-3 py-2 text-base font-medium text-primary-600 bg-primary-50 rounded-md"
                        >
                            Calculadora CO2
                        </router-link>
                    </div>
                </div>
            </transition>
        </nav>
    </header>
</template>

<script setup>
import { ref } from 'vue';

const mobileMenuOpen = ref(false);

const navigation = [
    { name: 'Inicio', to: '/' },
    { name: 'Propiedades', to: '/propiedades' },
    { name: 'Servicios', to: '/servicios' },
    { name: 'Blog', to: '/blog' },
    { name: 'Quiénes Somos', to: '/quienes-somos' },
    { name: 'Contacto', to: '/contacto' },
    { name: 'Admin', to: '/admin' }
];
</script>
