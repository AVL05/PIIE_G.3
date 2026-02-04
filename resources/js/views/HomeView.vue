<template>
    <div>
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 text-white">
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
                <div class="max-w-3xl">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                        Tu hogar sostenible te espera
                    </h1>
                    <p class="text-xl md:text-2xl text-primary-100 mb-8">
                        Encuentra propiedades con certificación energética, materiales ecológicos y tecnologías que cuidan el planeta.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <router-link
                            to="/propiedades"
                            class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-primary-700 bg-white hover:bg-primary-50 transition-colors"
                        >
                            Ver Propiedades
                        </router-link>
                        <router-link
                            to="/calculadora"
                            class="inline-flex items-center justify-center px-6 py-3 border-2 border-white text-base font-medium rounded-lg text-white hover:bg-white/10 transition-colors"
                        >
                            Calcular mi huella CO2
                        </router-link>
                    </div>
                </div>
            </div>
            <!-- Decorative element -->
            <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-gray-50 to-transparent"></div>
        </section>

        <!-- Estadísticas -->
        <section class="py-12 bg-white -mt-8 relative z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="text-center p-6 bg-primary-50 rounded-xl">
                        <div class="text-3xl md:text-4xl font-bold text-primary-600">500+</div>
                        <div class="text-gray-600">Propiedades sostenibles</div>
                    </div>
                    <div class="text-center p-6 bg-primary-50 rounded-xl">
                        <div class="text-3xl md:text-4xl font-bold text-primary-600">1.2M</div>
                        <div class="text-gray-600">Toneladas CO2 ahorradas</div>
                    </div>
                    <div class="text-center p-6 bg-primary-50 rounded-xl">
                        <div class="text-3xl md:text-4xl font-bold text-primary-600">98%</div>
                        <div class="text-gray-600">Clientes satisfechos</div>
                    </div>
                    <div class="text-center p-6 bg-primary-50 rounded-xl">
                        <div class="text-3xl md:text-4xl font-bold text-primary-600">15</div>
                        <div class="text-gray-600">Años de experiencia</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Propiedades Destacadas -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Propiedades Destacadas</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Descubre nuestras viviendas con las mejores certificaciones energéticas y características sostenibles.
                    </p>
                </div>

                <div v-if="loading" class="flex justify-center">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary-600"></div>
                </div>

                <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <PropertyCard
                        v-for="property in featuredProperties"
                        :key="property.id"
                        :property="property"
                    />
                </div>

                <div class="text-center mt-10">
                    <router-link
                        to="/propiedades"
                        class="inline-flex items-center px-6 py-3 border border-primary-600 text-base font-medium rounded-lg text-primary-600 hover:bg-primary-50 transition-colors"
                    >
                        Ver todas las propiedades
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </router-link>
                </div>
            </div>
        </section>

        <!-- Por qué elegirnos -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">¿Por qué SerraInnova?</h2>
                    <p class="text-lg text-gray-600">Líderes en inmobiliaria sostenible y eficiencia energética</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Certificación Garantizada</h3>
                        <p class="text-gray-600">Todas nuestras propiedades cuentan con certificación energética verificada y sellos como BREEAM, LEED o Passivhaus.</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Eficiencia Energética</h3>
                        <p class="text-gray-600">Aerotermia, placas solares, aislamiento térmico avanzado. Ahorra hasta un 80% en tu factura energética.</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Compromiso Ambiental</h3>
                        <p class="text-gray-600">Contribuimos activamente a los ODS y la Agenda 2030. Cada venta reduce la huella de carbono.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Servicios -->
        <section class="py-16 bg-gray-900 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Nuestros Servicios</h2>
                    <p class="text-lg text-gray-400">Más que una inmobiliaria, somos tu partner en sostenibilidad</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-gray-800 rounded-xl p-6 hover:bg-gray-750 transition-colors">
                        <div class="w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Compra y Venta</h3>
                        <p class="text-gray-400">Propiedades con certificación energética A y B. Encuentra tu hogar sostenible ideal.</p>
                    </div>

                    <div class="bg-gray-800 rounded-xl p-6 hover:bg-gray-750 transition-colors">
                        <div class="w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Auditorías Energéticas</h3>
                        <p class="text-gray-400">Analizamos tu vivienda actual y te proponemos mejoras para reducir el consumo.</p>
                    </div>

                    <div class="bg-gray-800 rounded-xl p-6 hover:bg-gray-750 transition-colors">
                        <div class="w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Gestión de Subvenciones</h3>
                        <p class="text-gray-400">Te ayudamos con los fondos Next Generation y otras ayudas para rehabilitación energética.</p>
                    </div>
                </div>

                <div class="text-center mt-10">
                    <router-link
                        to="/servicios"
                        class="inline-flex items-center px-6 py-3 border border-primary-500 text-base font-medium rounded-lg text-primary-400 hover:bg-primary-500/10 transition-colors"
                    >
                        Conocer todos los servicios
                    </router-link>
                </div>
            </div>
        </section>

        <!-- CTA Calculadora -->
        <section class="py-16 bg-gradient-to-r from-primary-600 to-primary-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    ¿Cuánto CO2 emite tu vivienda actual?
                </h2>
                <p class="text-xl text-primary-100 mb-8 max-w-2xl mx-auto">
                    Usa nuestra calculadora de impacto ambiental y descubre cómo mejorar la eficiencia de tu hogar.
                </p>
                <router-link
                    to="/calculadora"
                    class="inline-flex items-center px-8 py-4 border border-transparent text-lg font-medium rounded-lg text-primary-700 bg-white hover:bg-primary-50 transition-colors"
                >
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Calcular ahora
                </router-link>
            </div>
        </section>

        <!-- Blog Preview -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Últimas Noticias</h2>
                    <p class="text-lg text-gray-600">Actualidad sobre sostenibilidad, normativas y consejos de ahorro</p>
                </div>

                <div v-if="loadingPosts" class="flex justify-center">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary-600"></div>
                </div>

                <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <BlogCard
                        v-for="post in latestPosts"
                        :key="post.id"
                        :post="post"
                    />
                </div>

                <div class="text-center mt-10">
                    <router-link
                        to="/blog"
                        class="inline-flex items-center px-6 py-3 border border-primary-600 text-base font-medium rounded-lg text-primary-600 hover:bg-primary-50 transition-colors"
                    >
                        Ver todas las noticias
                    </router-link>
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
