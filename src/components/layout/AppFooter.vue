<template>
    <footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-primary-900 text-white relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 bg-grid opacity-5"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-600/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-accent-600/10 rounded-full blur-3xl"></div>

        <!-- Main Footer -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Brand Section -->
                <div class="lg:col-span-1">
                    <router-link to="/" class="flex items-center space-x-3 mb-6 group">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary-400 via-primary-500 to-accent-500 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-primary-500/30 transition-all duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-2xl font-bold">Serra<span class="text-gradient">Innova</span></span>
                            <p class="text-xs text-gray-400 tracking-wider">Inmobiliaria Sostenible</p>
                        </div>
                    </router-link>
                    <p class="text-gray-400 mb-6 leading-relaxed">
                        Líderes en inmobiliaria sostenible. Encontramos tu hogar ideal respetando el medio ambiente y apostando por la eficiencia energética.
                    </p>

                    <!-- Social Links -->
                    <div class="flex space-x-3">
                        <a href="#" class="w-10 h-10 bg-white/5 hover:bg-primary-500 rounded-xl flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300 group">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/5 hover:bg-gradient-to-br hover:from-pink-500 hover:to-purple-500 rounded-xl flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/5 hover:bg-blue-600 rounded-xl flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/5 hover:bg-red-600 rounded-xl flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold text-white mb-6 flex items-center">
                        <span class="w-8 h-0.5 bg-gradient-to-r from-primary-400 to-accent-400 mr-3"></span>
                        Navegación
                    </h3>
                    <ul class="space-y-3">
                        <li>
                            <router-link to="/propiedades" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-primary-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Propiedades
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/servicios" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-primary-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Servicios
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/calculadora" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-primary-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Calculadora CO₂
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/blog" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-primary-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Blog
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/quienes-somos" class="text-gray-400 hover:text-white transition-colors flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-primary-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Quiénes Somos
                            </router-link>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold text-white mb-6 flex items-center">
                        <span class="w-8 h-0.5 bg-gradient-to-r from-primary-400 to-accent-400 mr-3"></span>
                        Contacto
                    </h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="https://maps.google.com" target="_blank" class="flex items-start group">
                                <div class="w-10 h-10 bg-white/5 rounded-xl flex items-center justify-center mr-3 group-hover:bg-primary-500/20 transition-colors">
                                    <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white font-medium">Dirección</p>
                                    <p class="text-gray-400 text-sm">Valencia, España</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:info@serrainnova.es" class="flex items-start group">
                                <div class="w-10 h-10 bg-white/5 rounded-xl flex items-center justify-center mr-3 group-hover:bg-primary-500/20 transition-colors">
                                    <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white font-medium">Email</p>
                                    <p class="text-gray-400 text-sm">info@serrainnova.es</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="tel:+34963123456" class="flex items-start group">
                                <div class="w-10 h-10 bg-white/5 rounded-xl flex items-center justify-center mr-3 group-hover:bg-primary-500/20 transition-colors">
                                    <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white font-medium">Teléfono</p>
                                    <p class="text-gray-400 text-sm">+34 963 123 456</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter / ODS -->
                <div>
                    <h3 class="text-lg font-bold text-white mb-6 flex items-center">
                        <span class="w-8 h-0.5 bg-gradient-to-r from-primary-400 to-accent-400 mr-3"></span>
                        Comprometidos
                    </h3>
                    <p class="text-gray-400 text-sm mb-4">
                        Trabajamos alineados con los Objetivos de Desarrollo Sostenible de la ONU.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-2 bg-gradient-to-r from-yellow-500 to-orange-500 text-white text-xs font-bold rounded-lg flex items-center">
                            <span class="w-5 h-5 bg-white/20 rounded mr-2 flex items-center justify-center text-[10px]">7</span>
                            Energía
                        </span>
                        <span class="px-3 py-2 bg-gradient-to-r from-orange-500 to-amber-500 text-white text-xs font-bold rounded-lg flex items-center">
                            <span class="w-5 h-5 bg-white/20 rounded mr-2 flex items-center justify-center text-[10px]">11</span>
                            Ciudades
                        </span>
                        <span class="px-3 py-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-xs font-bold rounded-lg flex items-center">
                            <span class="w-5 h-5 bg-white/20 rounded mr-2 flex items-center justify-center text-[10px]">13</span>
                            Clima
                        </span>
                    </div>

                    <!-- Certifications -->
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center" title="BREEAM">
                            <span class="text-xs font-bold text-primary-400">BREEAM</span>
                        </div>
                        <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center" title="LEED">
                            <span class="text-xs font-bold text-accent-400">LEED</span>
                        </div>
                        <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center" title="Passivhaus">
                            <span class="text-[10px] font-bold text-secondary-400">PH</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="pt-8 border-t border-white/10">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-gray-400 text-sm text-center md:text-left">
                        &copy; {{ currentYear }} SerraInnova. Todos los derechos reservados.
                    </p>
                    <div class="flex items-center gap-6 text-sm">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">Política de privacidad</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">Aviso legal</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">Cookies</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { computed } from 'vue';

const currentYear = computed(() => new Date().getFullYear());
</script>
