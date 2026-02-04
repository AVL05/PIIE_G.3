<template>
    <div class="bg-gray-50 min-h-screen">
        <!-- Header -->
        <div class="bg-primary-700 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Propiedades Sostenibles</h1>
                <p class="text-primary-100 text-lg">Encuentra tu hogar ideal con las mejores certificaciones energéticas</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="lg:flex lg:gap-8">
                <!-- Filters Sidebar -->
                <aside class="lg:w-72 flex-shrink-0">
                    <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg font-semibold text-gray-900">Filtros</h2>
                            <button
                                v-if="store.hasFilters"
                                @click="clearFilters"
                                class="text-sm text-primary-600 hover:text-primary-700"
                            >
                                Limpiar
                            </button>
                        </div>

                        <!-- Search -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Buscar</label>
                            <input
                                v-model="filters.search"
                                type="text"
                                placeholder="Buscar propiedades..."
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                            />
                        </div>

                        <!-- Energy Rating -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Certificación Energética</label>
                            <select
                                v-model="filters.energy_rating"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                            >
                                <option value="">Todas</option>
                                <option value="A">A - Muy eficiente</option>
                                <option value="B">B - Eficiente</option>
                                <option value="C">C - Moderada</option>
                                <option value="D">D - Normal</option>
                                <option value="E">E - Baja</option>
                                <option value="F">F - Muy baja</option>
                                <option value="G">G - Mínima</option>
                            </select>
                        </div>

                        <!-- Energy Type -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Energía</label>
                            <select
                                v-model="filters.energy_type"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                            >
                                <option value="">Todas</option>
                                <option value="aerotermia">Aerotermia</option>
                                <option value="solar">Solar</option>
                                <option value="biomasa">Biomasa</option>
                                <option value="geotermia">Geotermia</option>
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Rango de Precio</label>
                            <div class="flex gap-2">
                                <input
                                    v-model="filters.min_price"
                                    type="number"
                                    placeholder="Min"
                                    class="w-1/2 px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                                />
                                <input
                                    v-model="filters.max_price"
                                    type="number"
                                    placeholder="Max"
                                    class="w-1/2 px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                                />
                            </div>
                        </div>

                        <!-- Rooms -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Habitaciones</label>
                            <select
                                v-model="filters.rooms"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                            >
                                <option value="">Todas</option>
                                <option value="1">1 habitación</option>
                                <option value="2">2 habitaciones</option>
                                <option value="3">3 habitaciones</option>
                                <option value="4">4 habitaciones</option>
                                <option value="5">5+ habitaciones</option>
                            </select>
                        </div>

                        <!-- Location -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ubicación</label>
                            <input
                                v-model="filters.location"
                                type="text"
                                placeholder="Ciudad o zona"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                            />
                        </div>

                        <button
                            @click="applyFilters"
                            class="w-full py-2 px-4 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors"
                        >
                            Aplicar Filtros
                        </button>
                    </div>
                </aside>

                <!-- Properties Grid -->
                <main class="flex-1 mt-8 lg:mt-0">
                    <!-- Results info -->
                    <div class="flex items-center justify-between mb-6">
                        <p class="text-gray-600">
                            {{ store.pagination.total }} propiedades encontradas
                        </p>
                        <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
                            <option>Más recientes</option>
                            <option>Precio: menor a mayor</option>
                            <option>Precio: mayor a menor</option>
                            <option>Mejor certificación</option>
                        </select>
                    </div>

                    <!-- Loading -->
                    <div v-if="store.loading" class="flex justify-center py-12">
                        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary-600"></div>
                    </div>

                    <!-- Error -->
                    <div v-else-if="store.error" class="bg-red-50 text-red-700 p-4 rounded-lg">
                        {{ store.error }}
                    </div>

                    <!-- Properties -->
                    <div v-else>
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                            <PropertyCard
                                v-for="property in store.properties"
                                :key="property.id"
                                :property="property"
                            />
                        </div>

                        <!-- Empty state -->
                        <div v-if="store.properties.length === 0" class="text-center py-12">
                            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No se encontraron propiedades</h3>
                            <p class="text-gray-600">Intenta ajustar los filtros de búsqueda</p>
                        </div>

                        <!-- Pagination -->
                        <div v-if="store.pagination.last_page > 1" class="mt-8 flex justify-center">
                            <nav class="flex items-center gap-2">
                                <button
                                    @click="changePage(store.pagination.current_page - 1)"
                                    :disabled="store.pagination.current_page === 1"
                                    class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                                >
                                    Anterior
                                </button>

                                <span class="px-4 py-2 text-gray-600">
                                    Página {{ store.pagination.current_page }} de {{ store.pagination.last_page }}
                                </span>

                                <button
                                    @click="changePage(store.pagination.current_page + 1)"
                                    :disabled="store.pagination.current_page === store.pagination.last_page"
                                    class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                                >
                                    Siguiente
                                </button>
                            </nav>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive, onMounted, watch } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import PropertyCard from '@/components/properties/PropertyCard.vue';
import { usePropertiesStore } from '@/stores/properties';

const store = usePropertiesStore();
const route = useRoute();
const router = useRouter();

const filters = reactive({
    search: '',
    energy_rating: '',
    energy_type: '',
    min_price: '',
    max_price: '',
    rooms: '',
    location: ''
});

onMounted(() => {
    // Load filters from URL
    Object.keys(filters).forEach(key => {
        if (route.query[key]) {
            filters[key] = route.query[key];
            store.setFilter(key, route.query[key]);
        }
    });

    store.fetchProperties(route.query.page || 1);
});

const applyFilters = () => {
    Object.keys(filters).forEach(key => {
        store.setFilter(key, filters[key]);
    });

    // Update URL
    router.push({
        query: {
            ...filters,
            page: 1
        }
    });

    store.fetchProperties(1);
};

const clearFilters = () => {
    Object.keys(filters).forEach(key => {
        filters[key] = '';
    });
    store.clearFilters();
    router.push({ query: {} });
    store.fetchProperties(1);
};

const changePage = (page) => {
    router.push({
        query: {
            ...route.query,
            page
        }
    });
    store.fetchProperties(page);
};
</script>
