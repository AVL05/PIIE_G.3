<template>
    <div class="-mt-20">
        <!-- Hero Section -->
        <section class="relative min-h-screen flex items-center overflow-hidden">
            <!-- Animated Background -->
            <div class="absolute inset-0 bg-gradient-to-br from-primary-900 via-primary-800 to-accent-900">
                <div class="absolute inset-0 bg-mesh opacity-60"></div>
                <div class="absolute inset-0 bg-grid opacity-30"></div>
                <!-- Floating Elements -->
                <div class="absolute top-20 left-10 w-72 h-72 bg-primary-500/20 rounded-full blur-3xl animate-float"></div>
                <div class="absolute bottom-20 right-10 w-96 h-96 bg-accent-500/20 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>
                <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-secondary-500/10 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
            </div>

            <!-- Content -->
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 pt-40">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="text-center lg:text-left">
                        <!-- Badge -->
                        <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white/90 text-sm mb-6 animate-fade-in">
                            <span class="w-2 h-2 bg-primary-400 rounded-full mr-2 animate-pulse"></span>
                            Líderes en inmobiliaria sostenible
                        </div>

                        <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold text-white mb-6 leading-tight animate-slide-up">
                            Tu hogar
                            <span class="relative">
                                <span class="text-gradient">sostenible</span>
                                <svg class="absolute -bottom-2 left-0 w-full" viewBox="0 0 200 12" fill="none">
                                    <path d="M2 10C50 2 150 2 198 10" stroke="url(#gradient)" stroke-width="3" stroke-linecap="round"/>
                                    <defs>
                                        <linearGradient id="gradient" x1="0" y1="0" x2="200" y2="0">
                                            <stop offset="0%" stop-color="#34d399"/>
                                            <stop offset="100%" stop-color="#2dd4bf"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </span>
                            <br>te espera
                        </h1>

                        <p class="text-lg sm:text-xl text-white/80 mb-8 max-w-xl mx-auto lg:mx-0 animate-slide-up" style="animation-delay: 0.2s;">
                            Encuentra propiedades con certificación energética A, materiales ecológicos y tecnologías que cuidan el planeta mientras reduces tu huella de carbono.
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start animate-slide-up" style="animation-delay: 0.4s;">
                            <router-link
                                to="/propiedades"
                                class="group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold rounded-2xl bg-white text-primary-700 hover:bg-primary-50 transition-all duration-300 shadow-xl hover:shadow-2xl hover:-translate-y-1"
                            >
                                Ver Propiedades
                                <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </router-link>
                            <router-link
                                to="/calculadora"
                                class="group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold rounded-2xl border-2 border-white/30 text-white hover:bg-white/10 backdrop-blur-sm transition-all duration-300"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                Calcular huella CO₂
                            </router-link>
                        </div>

                        <!-- Trust Badges -->
                        <div class="mt-12 flex flex-wrap items-center justify-center lg:justify-start gap-6 animate-fade-in" style="animation-delay: 0.6s;">
                            <div class="flex items-center text-white/60">
                                <svg class="w-5 h-5 mr-2 text-primary-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Certificación BREEAM
                            </div>
                            <div class="flex items-center text-white/60">
                                <svg class="w-5 h-5 mr-2 text-primary-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                LEED Certified
                            </div>
                            <div class="flex items-center text-white/60">
                                <svg class="w-5 h-5 mr-2 text-primary-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Passivhaus
                            </div>
                        </div>
                    </div>

                    <!-- Hero Image/Card -->
                    <div class="hidden lg:block relative animate-scale-in" style="animation-delay: 0.3s;">
                        <div class="relative">
                            <!-- Main Card -->
                            <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/20 shadow-2xl">
                                <div class="aspect-[4/3] rounded-2xl bg-gradient-to-br from-primary-600/50 to-accent-600/50 mb-6 overflow-hidden">
                                    <img
                                        src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                        alt="Casa sostenible moderna"
                                        class="w-full h-full object-cover opacity-90"
                                    />
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-white/60 text-sm">Propiedad destacada</p>
                                        <p class="text-white font-semibold text-lg">Villa Eco Premium</p>
                                    </div>
                                    <div class="px-3 py-1 bg-energy-a text-white text-sm font-bold rounded-lg">
                                        A
                                    </div>
                                </div>
                            </div>

                            <!-- Floating Stats Cards -->
                            <div class="absolute -left-8 top-1/4 bg-white rounded-2xl p-4 shadow-xl animate-float">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 text-xs">Ahorro energético</p>
                                        <p class="text-gray-900 font-bold text-lg">-80%</p>
                                    </div>
                                </div>
                            </div>

                            <div class="absolute -right-8 bottom-1/4 bg-white rounded-2xl p-4 shadow-xl animate-float" style="animation-delay: 1.5s;">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-accent-100 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 text-xs">CO₂ reducido</p>
                                        <p class="text-gray-900 font-bold text-lg">1.2M ton</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
                <div class="w-6 h-10 rounded-full border-2 border-white/30 flex items-start justify-center p-2">
                    <div class="w-1.5 h-3 bg-white/60 rounded-full animate-pulse"></div>
                </div>
            </div>
        </section>

        <!-- Statistics Section -->
        <section class="relative -mt-20 z-10 pb-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                        <div class="text-center group">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="text-3xl md:text-4xl font-bold text-gradient mb-1">500+</div>
                            <div class="text-gray-600 font-medium">Propiedades sostenibles</div>
                        </div>
                        <div class="text-center group">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-accent-100 to-accent-200 rounded-2xl mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                                </svg>
                            </div>
                            <div class="text-3xl md:text-4xl font-bold text-gradient mb-1">1.2M</div>
                            <div class="text-gray-600 font-medium">Toneladas CO₂ ahorradas</div>
                        </div>
                        <div class="text-center group">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-secondary-100 to-secondary-200 rounded-2xl mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="text-3xl md:text-4xl font-bold text-gradient mb-1">98%</div>
                            <div class="text-gray-600 font-medium">Clientes satisfechos</div>
                        </div>
                        <div class="text-center group">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-primary-100 to-accent-100 rounded-2xl mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="text-3xl md:text-4xl font-bold text-gradient mb-1">15</div>
                            <div class="text-gray-600 font-medium">Años de experiencia</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Properties -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12">
                    <div>
                        <span class="inline-block px-4 py-1 bg-primary-100 text-primary-700 text-sm font-semibold rounded-full mb-4">
                            Propiedades Destacadas
                        </span>
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                            Hogares que <span class="text-gradient">marcan la diferencia</span>
                        </h2>
                        <p class="text-lg text-gray-600 max-w-2xl">
                            Descubre viviendas con las mejores certificaciones energéticas y características sostenibles del mercado.
                        </p>
                    </div>
                    <router-link
                        to="/propiedades"
                        class="mt-6 md:mt-0 inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 transition-colors group"
                    >
                        Ver todas
                        <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </router-link>
                </div>

                <div v-if="loading" class="flex justify-center py-20">
                    <div class="relative">
                        <div class="w-16 h-16 border-4 border-primary-200 rounded-full"></div>
                        <div class="w-16 h-16 border-4 border-primary-600 rounded-full border-t-transparent animate-spin absolute top-0 left-0"></div>
                    </div>
                </div>

                <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <PropertyCard
                        v-for="property in featuredProperties"
                        :key="property.id"
                        :property="property"
                    />
                </div>

                <div class="text-center mt-12">
                    <router-link
                        to="/propiedades"
                        class="inline-flex items-center px-8 py-4 bg-white border-2 border-primary-200 text-primary-600 font-semibold rounded-2xl hover:bg-primary-50 hover:border-primary-300 transition-all duration-300 shadow-sm hover:shadow-lg group"
                    >
                        Explorar todas las propiedades
                        <svg class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </router-link>
                </div>
            </div>
        </section>

        <!-- Why Choose Us -->
        <section class="py-20 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <span class="inline-block px-4 py-1 bg-accent-100 text-accent-700 text-sm font-semibold rounded-full mb-4">
                        Por qué elegirnos
                    </span>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                        Líderes en <span class="text-gradient">inmobiliaria sostenible</span>
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Combinamos experiencia inmobiliaria con compromiso ambiental real
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="group relative bg-gradient-to-br from-gray-50 to-white p-8 rounded-3xl border border-gray-100 hover:border-primary-200 transition-all duration-300 hover:shadow-xl">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-primary-100 to-transparent rounded-bl-full opacity-50"></div>
                        <div class="relative">
                            <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-primary-500/30 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Certificación Garantizada</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Todas nuestras propiedades cuentan con certificación energética verificada y sellos BREEAM, LEED o Passivhaus.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="group relative bg-gradient-to-br from-gray-50 to-white p-8 rounded-3xl border border-gray-100 hover:border-accent-200 transition-all duration-300 hover:shadow-xl">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-accent-100 to-transparent rounded-bl-full opacity-50"></div>
                        <div class="relative">
                            <div class="w-16 h-16 bg-gradient-to-br from-accent-500 to-accent-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-accent-500/30 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Eficiencia Energética</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Aerotermia, placas solares, aislamiento térmico avanzado. Ahorra hasta un 80% en tu factura energética.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="group relative bg-gradient-to-br from-gray-50 to-white p-8 rounded-3xl border border-gray-100 hover:border-secondary-200 transition-all duration-300 hover:shadow-xl">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-secondary-100 to-transparent rounded-bl-full opacity-50"></div>
                        <div class="relative">
                            <div class="w-16 h-16 bg-gradient-to-br from-secondary-500 to-secondary-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-secondary-500/30 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Compromiso Ambiental</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Contribuimos activamente a los ODS y la Agenda 2030. Cada venta reduce la huella de carbono global.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section class="py-20 bg-gradient-to-br from-gray-900 via-gray-800 to-primary-900 relative overflow-hidden">
            <div class="absolute inset-0 bg-grid opacity-10"></div>
            <div class="absolute top-0 left-0 w-96 h-96 bg-primary-600/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent-600/20 rounded-full blur-3xl"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <span class="inline-block px-4 py-1 bg-white/10 text-white/80 text-sm font-semibold rounded-full mb-4 backdrop-blur-sm">
                        Nuestros Servicios
                    </span>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                        Más que una inmobiliaria
                    </h2>
                    <p class="text-lg text-white/70 max-w-2xl mx-auto">
                        Somos tu partner integral en sostenibilidad y eficiencia energética
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Service 1 -->
                    <div class="group bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:bg-white/10 hover:border-white/20 transition-all duration-300">
                        <div class="w-14 h-14 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Compra y Venta</h3>
                        <p class="text-white/70 leading-relaxed mb-4">
                            Propiedades con certificación energética A y B. Encuentra tu hogar sostenible ideal.
                        </p>
                        <router-link to="/propiedades" class="inline-flex items-center text-primary-400 hover:text-primary-300 font-medium transition-colors group/link">
                            Ver propiedades
                            <svg class="w-4 h-4 ml-2 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </router-link>
                    </div>

                    <!-- Service 2 -->
                    <div class="group bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:bg-white/10 hover:border-white/20 transition-all duration-300">
                        <div class="w-14 h-14 bg-gradient-to-br from-accent-500 to-accent-600 rounded-xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Auditorías Energéticas</h3>
                        <p class="text-white/70 leading-relaxed mb-4">
                            Analizamos tu vivienda actual y te proponemos mejoras para reducir el consumo.
                        </p>
                        <router-link to="/servicios" class="inline-flex items-center text-accent-400 hover:text-accent-300 font-medium transition-colors group/link">
                            Más información
                            <svg class="w-4 h-4 ml-2 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </router-link>
                    </div>

                    <!-- Service 3 -->
                    <div class="group bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:bg-white/10 hover:border-white/20 transition-all duration-300">
                        <div class="w-14 h-14 bg-gradient-to-br from-secondary-500 to-secondary-600 rounded-xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Gestión de Subvenciones</h3>
                        <p class="text-white/70 leading-relaxed mb-4">
                            Te ayudamos con los fondos Next Generation y otras ayudas para rehabilitación energética.
                        </p>
                        <router-link to="/servicios" class="inline-flex items-center text-secondary-400 hover:text-secondary-300 font-medium transition-colors group/link">
                            Saber más
                            <svg class="w-4 h-4 ml-2 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </router-link>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <router-link
                        to="/servicios"
                        class="inline-flex items-center px-8 py-4 bg-white/10 backdrop-blur-sm border border-white/20 text-white font-semibold rounded-2xl hover:bg-white/20 transition-all duration-300 group"
                    >
                        Conocer todos los servicios
                        <svg class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </router-link>
                </div>
            </div>
        </section>

        <!-- CTA Calculator -->
        <section class="py-20 bg-gradient-to-r from-primary-600 via-primary-500 to-accent-500 relative overflow-hidden">
            <div class="absolute inset-0 bg-mesh opacity-30"></div>
            <div class="absolute top-1/2 left-0 w-72 h-72 bg-white/10 rounded-full blur-3xl -translate-y-1/2"></div>
            <div class="absolute top-1/2 right-0 w-72 h-72 bg-white/10 rounded-full blur-3xl -translate-y-1/2"></div>

            <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/20 backdrop-blur-sm text-white text-sm mb-6">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Herramienta gratuita
                </div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6">
                    ¿Cuánto CO₂ emite tu vivienda actual?
                </h2>
                <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                    Usa nuestra calculadora de impacto ambiental y descubre cómo mejorar la eficiencia de tu hogar y cuánto podrías ahorrar.
                </p>
                <router-link
                    to="/calculadora"
                    class="inline-flex items-center px-10 py-5 bg-white text-primary-700 text-lg font-bold rounded-2xl hover:bg-primary-50 transition-all duration-300 shadow-2xl hover:shadow-xl hover:-translate-y-1 group"
                >
                    <svg class="w-6 h-6 mr-3 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Calcular ahora
                    <svg class="w-5 h-5 ml-3 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </router-link>
            </div>
        </section>

        <!-- Blog Preview -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12">
                    <div>
                        <span class="inline-block px-4 py-1 bg-primary-100 text-primary-700 text-sm font-semibold rounded-full mb-4">
                            Blog
                        </span>
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                            Últimas <span class="text-gradient">noticias</span>
                        </h2>
                        <p class="text-lg text-gray-600 max-w-2xl">
                            Actualidad sobre sostenibilidad, normativas y consejos de ahorro energético
                        </p>
                    </div>
                    <router-link
                        to="/blog"
                        class="mt-6 md:mt-0 inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 transition-colors group"
                    >
                        Ver todas las noticias
                        <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </router-link>
                </div>

                <div v-if="loadingPosts" class="flex justify-center py-20">
                    <div class="relative">
                        <div class="w-16 h-16 border-4 border-primary-200 rounded-full"></div>
                        <div class="w-16 h-16 border-4 border-primary-600 rounded-full border-t-transparent animate-spin absolute top-0 left-0"></div>
                    </div>
                </div>

                <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <BlogCard
                        v-for="post in latestPosts"
                        :key="post.id"
                        :post="post"
                    />
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import PropertyCard from '@/components/properties/PropertyCard.vue';
import BlogCard from '@/components/blog/BlogCard.vue';
import { usePropertiesStore } from '@/stores/properties';
import { useBlogStore } from '@/stores/blog';

const propertiesStore = usePropertiesStore();
const blogStore = useBlogStore();

const loading = ref(true);
const loadingPosts = ref(true);
const featuredProperties = ref([]);
const latestPosts = ref([]);

onMounted(async () => {
    try {
        await propertiesStore.fetchFeatured();
        featuredProperties.value = propertiesStore.featured;
    } catch (error) {
        console.error('Error loading properties:', error);
    } finally {
        loading.value = false;
    }

    try {
        await blogStore.fetchLatest();
        latestPosts.value = blogStore.latest;
    } catch (error) {
        console.error('Error loading posts:', error);
    } finally {
        loadingPosts.value = false;
    }
});
</script>
