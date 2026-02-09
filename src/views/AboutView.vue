<template>
    <div>
        <!-- Hero -->
        <section class="bg-primary-700 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Quiénes Somos</h1>
                <p class="text-primary-100 text-lg max-w-2xl">
                    Líderes en inmobiliaria sostenible, comprometidos con el medio ambiente y el futuro de las nuevas generaciones.
                </p>
            </div>
        </section>

        <!-- Mission, Vision, Values -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center p-8 bg-primary-50 rounded-2xl">
                        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-3">Misión</h2>
                        <p class="text-gray-600">
                            Facilitar el acceso a viviendas sostenibles y eficientes energéticamente, contribuyendo a un futuro más verde para todos.
                        </p>
                    </div>

                    <div class="text-center p-8 bg-primary-50 rounded-2xl">
                        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-3">Visión</h2>
                        <p class="text-gray-600">
                            Ser referentes en el sector inmobiliario sostenible en España, liderando la transición hacia un modelo de vivienda respetuoso con el medio ambiente.
                        </p>
                    </div>

                    <div class="text-center p-8 bg-primary-50 rounded-2xl">
                        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-3">Valores</h2>
                        <p class="text-gray-600">
                            Sostenibilidad, transparencia, innovación, compromiso social y excelencia en el servicio al cliente.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Impact Numbers -->
        <section class="py-16 bg-gray-900 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4">Nuestro Impacto</h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">
                        Cada vivienda sostenible que vendemos contribuye a reducir la huella de carbono global
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-primary-400 mb-2">1.2M</div>
                        <div class="text-gray-400">Toneladas de CO2 ahorradas</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-primary-400 mb-2">500+</div>
                        <div class="text-gray-400">Viviendas sostenibles vendidas</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-primary-400 mb-2">150</div>
                        <div class="text-gray-400">Rehabilitaciones energéticas</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-primary-400 mb-2">15</div>
                        <div class="text-gray-400">Años de experiencia</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ODS Section -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Comprometidos con los ODS</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Nuestra actividad contribuye activamente a los Objetivos de Desarrollo Sostenible de la Agenda 2030
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- ODS 7 -->
                    <div class="bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-2xl p-6 text-white">
                        <div class="text-6xl font-bold mb-4">7</div>
                        <h3 class="text-xl font-bold mb-2">Energía Asequible y No Contaminante</h3>
                        <p class="text-white/90">
                            Promovemos viviendas con energías renovables y alta eficiencia energética, facilitando el acceso a energía limpia.
                        </p>
                    </div>

                    <!-- ODS 11 -->
                    <div class="bg-gradient-to-br from-orange-400 to-orange-500 rounded-2xl p-6 text-white">
                        <div class="text-6xl font-bold mb-4">11</div>
                        <h3 class="text-xl font-bold mb-2">Ciudades y Comunidades Sostenibles</h3>
                        <p class="text-white/90">
                            Contribuimos a crear ciudades más sostenibles y resilientes a través de la promoción de edificios eficientes.
                        </p>
                    </div>

                    <!-- ODS 13 -->
                    <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white">
                        <div class="text-6xl font-bold mb-4">13</div>
                        <h3 class="text-xl font-bold mb-2">Acción por el Clima</h3>
                        <p class="text-white/90">
                            Cada vivienda sostenible vendida reduce las emisiones de CO2 y contribuye a la lucha contra el cambio climático.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Certifications -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Certificaciones y Sellos</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Trabajamos con los estándares más exigentes en sostenibilidad y eficiencia energética
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-gray-700">BREEAM</span>
                        </div>
                        <h3 class="font-semibold text-gray-900">BREEAM</h3>
                        <p class="text-sm text-gray-600">Certificación medioambiental</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-gray-700">LEED</span>
                        </div>
                        <h3 class="font-semibold text-gray-900">LEED</h3>
                        <p class="text-sm text-gray-600">Liderazgo en Energía y Diseño Ambiental</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-lg font-bold text-gray-700">Passiv<br/>haus</span>
                        </div>
                        <h3 class="font-semibold text-gray-900">Passivhaus</h3>
                        <p class="text-sm text-gray-600">Estándar de casa pasiva</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-3xl font-bold text-green-600">A</span>
                        </div>
                        <h3 class="font-semibold text-gray-900">Certificación A</h3>
                        <p class="text-sm text-gray-600">Máxima eficiencia energética</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team (Optional) -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Nuestro Equipo</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Profesionales comprometidos con la sostenibilidad y la excelencia en el servicio
                    </p>
                </div>

                <div class="grid md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-32 h-32 bg-gray-200 rounded-full mx-auto mb-4"></div>
                        <h3 class="font-semibold text-gray-900">María García</h3>
                        <p class="text-sm text-gray-600">Directora General</p>
                    </div>
                    <div class="text-center">
                        <div class="w-32 h-32 bg-gray-200 rounded-full mx-auto mb-4"></div>
                        <h3 class="font-semibold text-gray-900">Carlos López</h3>
                        <p class="text-sm text-gray-600">Director Técnico</p>
                    </div>
                    <div class="text-center">
                        <div class="w-32 h-32 bg-gray-200 rounded-full mx-auto mb-4"></div>
                        <h3 class="font-semibold text-gray-900">Ana Martínez</h3>
                        <p class="text-sm text-gray-600">Responsable Sostenibilidad</p>
                    </div>
                    <div class="text-center">
                        <div class="w-32 h-32 bg-gray-200 rounded-full mx-auto mb-4"></div>
                        <h3 class="font-semibold text-gray-900">Pedro Sánchez</h3>
                        <p class="text-sm text-gray-600">Asesor Energético</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="py-16 bg-primary-700 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold mb-4">¿Quieres formar parte del cambio?</h2>
                <p class="text-primary-100 text-lg mb-8 max-w-2xl mx-auto">
                    Descubre cómo podemos ayudarte a encontrar tu hogar sostenible ideal o mejorar la eficiencia de tu vivienda actual.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <router-link
                        to="/propiedades"
                        class="px-8 py-4 bg-white text-primary-700 font-medium rounded-lg hover:bg-primary-50 transition-colors"
                    >
                        Ver propiedades
                    </router-link>
                    <router-link
                        to="/contacto"
                        class="px-8 py-4 border-2 border-white text-white font-medium rounded-lg hover:bg-white/10 transition-colors"
                    >
                        Contactar
                    </router-link>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
</script>
