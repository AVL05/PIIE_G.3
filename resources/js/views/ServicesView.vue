<template>
    <div>
        <!-- Hero -->
        <section class="bg-primary-700 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Nuestros Servicios</h1>
                <p class="text-primary-100 text-lg max-w-2xl">
                    Más que una inmobiliaria, somos tu partner en sostenibilidad. Te acompañamos en todo el proceso hacia un hogar más eficiente.
                </p>
            </div>
        </section>

        <!-- Services -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid gap-12">
                    <!-- Compra y Venta -->
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden lg:flex">
                        <div class="lg:w-1/2 h-64 lg:h-auto bg-gray-200">
                            <img src="/images/service-buy-sell.jpg" alt="Compra y Venta" class="w-full h-full object-cover" />
                        </div>
                        <div class="lg:w-1/2 p-8 lg:p-12">
                            <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Compra y Venta de Propiedades Sostenibles</h2>
                            <p class="text-gray-600 mb-6">
                                Especializados en inmuebles con altas certificaciones energéticas (A y B). Nuestro catálogo incluye viviendas con aerotermia, placas solares, aislamiento térmico avanzado y materiales ecológicos certificados.
                            </p>
                            <ul class="space-y-2 text-gray-600 mb-6">
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Verificación de certificaciones energéticas
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Asesoramiento sobre ahorro energético
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Informes de huella de carbono
                                </li>
                            </ul>
                            <router-link to="/propiedades" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium">
                                Ver propiedades disponibles
                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </router-link>
                        </div>
                    </div>

                    <!-- Auditorías Energéticas -->
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden lg:flex lg:flex-row-reverse">
                        <div class="lg:w-1/2 h-64 lg:h-auto bg-gray-200">
                            <img src="/images/service-audit.jpg" alt="Auditorías Energéticas" class="w-full h-full object-cover" />
                        </div>
                        <div class="lg:w-1/2 p-8 lg:p-12">
                            <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Auditorías Energéticas</h2>
                            <p class="text-gray-600 mb-6">
                                Analizamos tu vivienda actual para identificar puntos de mejora en eficiencia energética. Nuestros técnicos certificados realizan un estudio completo y te proponen soluciones personalizadas.
                            </p>
                            <ul class="space-y-2 text-gray-600 mb-6">
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Análisis termográfico completo
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Estudio de consumos y facturas
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Propuesta de mejoras con ROI estimado
                                </li>
                            </ul>
                            <router-link to="/contacto" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium">
                                Solicitar auditoría
                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </router-link>
                        </div>
                    </div>

                    <!-- Gestión de Subvenciones -->
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden lg:flex">
                        <div class="lg:w-1/2 h-64 lg:h-auto bg-gray-200">
                            <img src="/images/service-subsidies.jpg" alt="Gestión de Subvenciones" class="w-full h-full object-cover" />
                        </div>
                        <div class="lg:w-1/2 p-8 lg:p-12">
                            <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Gestión de Subvenciones</h2>
                            <p class="text-gray-600 mb-6">
                                Te ayudamos a acceder a los fondos Next Generation y otras ayudas europeas, estatales y autonómicas para rehabilitación energética. Gestionamos todo el proceso por ti.
                            </p>
                            <ul class="space-y-2 text-gray-600 mb-6">
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Fondos Next Generation EU
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Ayudas para placas solares
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Subvenciones autonómicas de la Comunitat Valenciana
                                </li>
                            </ul>
                            <router-link to="/contacto" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium">
                                Consultar subvenciones disponibles
                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </router-link>
                        </div>
                    </div>

                    <!-- Proyectos de Rehabilitación -->
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden lg:flex lg:flex-row-reverse">
                        <div class="lg:w-1/2 h-64 lg:h-auto bg-gray-200">
                            <img src="/images/service-rehabilitation.jpg" alt="Proyectos de Rehabilitación" class="w-full h-full object-cover" />
                        </div>
                        <div class="lg:w-1/2 p-8 lg:p-12">
                            <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Proyectos de Rehabilitación</h2>
                            <p class="text-gray-600 mb-6">
                                Transformamos viviendas antiguas en hogares eficientes. Proyectos integrales que incluyen aislamiento, renovación de ventanas, instalación de sistemas de energía renovable y más.
                            </p>
                            <ul class="space-y-2 text-gray-600 mb-6">
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Instalación de sistemas SATE
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Cambio de ventanas a Climalit
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Instalación de aerotermia y placas solares
                                </li>
                            </ul>
                            <router-link to="/contacto" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium">
                                Solicitar presupuesto
                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="py-16 bg-primary-700 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold mb-4">¿Necesitas asesoramiento personalizado?</h2>
                <p class="text-primary-100 text-lg mb-8 max-w-2xl mx-auto">
                    Nuestro equipo de expertos está aquí para ayudarte a encontrar la mejor solución para tu hogar.
                </p>
                <router-link
                    to="/contacto"
                    class="inline-flex items-center px-8 py-4 bg-white text-primary-700 font-medium rounded-lg hover:bg-primary-50 transition-colors"
                >
                    Contactar ahora
                </router-link>
            </div>
        </section>
    </div>
</template>

<script setup>
</script>
