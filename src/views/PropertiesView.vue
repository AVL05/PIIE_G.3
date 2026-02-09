<template>
    <div class="bg-gray-50 min-h-screen -mt-20">
        <!-- Hero Header -->
        <section class="relative pt-32 pb-20 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-primary-900 via-primary-800 to-accent-900">
                <div class="absolute inset-0 bg-mesh opacity-40"></div>
                <div class="absolute inset-0 bg-grid opacity-20"></div>
            </div>
            <div class="absolute top-20 right-20 w-72 h-72 bg-primary-500/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-20 w-96 h-96 bg-accent-500/20 rounded-full blur-3xl"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl">
                    <span class="inline-flex items-center px-4 py-1.5 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-white/90 text-sm mb-6">
                        <span class="w-2 h-2 bg-primary-400 rounded-full mr-2 animate-pulse"></span>
                        {{ store.pagination.total || 0 }} propiedades disponibles
                    </span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                        Propiedades <span class="text-gradient">Sostenibles</span>
                    </h1>
                    <p class="text-xl text-white/80">
                        Encuentra tu hogar ideal con las mejores certificaciones energéticas y características eco-friendly.
                    </p>
                </div>
            </div>
        </section>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="lg:flex lg:gap-8">
                <!-- Filters Sidebar -->
                <aside class="lg:w-80 flex-shrink-0 mb-8 lg:mb-0">
                    <div class="bg-white rounded-3xl shadow-xl p-6 sticky top-24 border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-gray-900 flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-accent-500 rounded-xl flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                    </svg>
                                </div>
                                Filtros
                            </h2>
                            <button
                                v-if="store.hasFilters"
                                @click="clearFilters"
                                class="text-sm text-primary-600 hover:text-primary-700 font-medium flex items-center"
                            >
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Limpiar
                            </button>
                        </div>

                        <!-- Search -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Buscar</label>
                            <div class="relative">
                                <input
                                    v-model="filters.search"
                                    type="text"
                                    placeholder="Buscar propiedades..."
                                    class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all"
                                />
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Energy Rating -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Certificación Energética</label>
                            <div class="grid grid-cols-7 gap-1">
                                <button
                                    v-for="rating in ['A', 'B', 'C', 'D', 'E', 'F', 'G']"
                                    :key="rating"
                                    @click="filters.energy_rating = filters.energy_rating === rating ? '' : rating"
                                    class="h-10 rounded-lg text-sm font-bold transition-all"
                                    :class="[
                                        filters.energy_rating === rating
                                            ? 'ring-2 ring-offset-2 ring-gray-900 scale-110'
                                            : 'opacity-70 hover:opacity-100',
                                        getEnergyColor(rating)
                                    ]"
                                >
                                    {{ rating }}
                                </button>
                            </div>
                        </div>

                        <!-- Energy Type -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tipo de Energía</label>
                            <div class="flex flex-wrap gap-2">
                                <button
                                    v-for="type in energyTypes"
                                    :key="type.value"
                                    @click="filters.energy_type = filters.energy_type === type.value ? '' : type.value"
                                    class="px-3 py-2 rounded-xl text-sm font-medium transition-all border"
                                    :class="filters.energy_type === type.value
                                        ? 'bg-primary-500 text-white border-primary-500'
                                        : 'bg-gray-50 text-gray-700 border-gray-200 hover:border-primary-300'"
                                >
                                    {{ type.label }}
                                </button>
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Rango de Precio</label>
                            <div class="flex gap-2">
                                <div class="relative flex-1">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">€</span>
                                    <input
                                        v-model="filters.min_price"
                                        type="number"
                                        placeholder="Mín"
                                        class="w-full pl-7 pr-3 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all"
                                    />
                                </div>
                                <span class="flex items-center text-gray-400">-</span>
                                <div class="relative flex-1">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">€</span>
                                    <input
                                        v-model="filters.max_price"
                                        type="number"
                                        placeholder="Máx"
                                        class="w-full pl-7 pr-3 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Rooms -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Habitaciones</label>
                            <div class="flex gap-2">
                                <button
                                    v-for="room in [1, 2, 3, 4, '5+']"
                                    :key="room"
                                    @click="filters.rooms = filters.rooms === String(room) ? '' : String(room)"
                                    class="flex-1 py-3 rounded-xl text-sm font-semibold transition-all border"
                                    :class="filters.rooms === String(room)
                                        ? 'bg-primary-500 text-white border-primary-500'
                                        : 'bg-gray-50 text-gray-700 border-gray-200 hover:border-primary-300'"
                                >
                                    {{ room }}
                                </button>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Ubicación</label>
                            <div class="relative">
                                <input
                                    v-model="filters.location"
                                    type="text"
                                    placeholder="Ciudad o zona"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all"
                                />
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                        </div>

                        <button
                            @click="applyFilters"
                            class="w-full py-4 px-6 bg-gradient-to-r from-primary-500 to-accent-500 text-white font-semibold rounded-xl hover:from-primary-600 hover:to-accent-600 transition-all shadow-lg hover:shadow-xl flex items-center justify-center group"
                        >
                            <svg class="w-5 h-5 mr-2 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Buscar Propiedades
                        </button>
                    </div>
                </aside>

                <!-- Properties Grid -->
                <main class="flex-1">
                    <!-- Results info -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-lg font-bold text-gray-900">{{ store.pagination.total }} propiedades</p>
                                <p class="text-sm text-gray-500">encontradas</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-sm text-gray-500">Ordenar por:</span>
                            <select class="px-4 py-2 border border-gray-200 rounded-xl text-sm font-medium focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
                                <option>Más recientes</option>
                                <option>Precio: menor a mayor</option>
                                <option>Precio: mayor a menor</option>
                                <option>Mejor certificación</option>
                            </select>
                        </div>
                    </div>

                    <!-- Loading -->
                    <div v-if="store.loading" class="flex justify-center py-20">
                        <div class="relative">
                            <div class="w-16 h-16 border-4 border-primary-200 rounded-full"></div>
                            <div class="w-16 h-16 border-4 border-primary-600 rounded-full border-t-transparent animate-spin absolute top-0 left-0"></div>
                        </div>
                    </div>

                    <!-- Error -->
                    <div v-else-if="store.error" class="bg-red-50 text-red-700 p-6 rounded-2xl border border-red-100 flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
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
                        <div v-if="store.properties.length === 0" class="text-center py-20 bg-white rounded-3xl shadow-sm border border-gray-100">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">No se encontraron propiedades</h3>
                            <p class="text-gray-600 mb-6">Intenta ajustar los filtros de búsqueda</p>
                            <button
                                @click="clearFilters"
                                class="inline-flex items-center px-6 py-3 bg-primary-500 text-white font-semibold rounded-xl hover:bg-primary-600 transition-colors"
                            >
                                Limpiar filtros
                            </button>
                        </div>

                        <!-- Pagination -->
                        <div v-if="store.pagination.last_page > 1" class="mt-12 flex justify-center">
                            <nav class="inline-flex items-center gap-2 bg-white rounded-2xl p-2 shadow-sm border border-gray-100">
                                <button
                                    @click="changePage(store.pagination.current_page - 1)"
                                    :disabled="store.pagination.current_page === 1"
                                    class="px-4 py-2 rounded-xl text-gray-700 hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed flex items-center font-medium transition-colors"
                                >
                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                    Anterior
                                </button>

                                <div class="flex items-center gap-1 px-2">
                                    <template v-for="page in paginationPages" :key="page">
                                        <button
                                            v-if="page !== '...'"
                                            @click="changePage(page)"
                                            class="w-10 h-10 rounded-xl font-semibold transition-colors"
                                            :class="page === store.pagination.current_page
                                                ? 'bg-primary-500 text-white'
                                                : 'text-gray-700 hover:bg-gray-100'"
                                        >
                                            {{ page }}
                                        </button>
                                        <span v-else class="px-2 text-gray-400">...</span>
                                    </template>
                                </div>

                                <button
                                    @click="changePage(store.pagination.current_page + 1)"
                                    :disabled="store.pagination.current_page === store.pagination.last_page"
                                    class="px-4 py-2 rounded-xl text-gray-700 hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed flex items-center font-medium transition-colors"
                                >
                                    Siguiente
                                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
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
import { ref, reactive, computed, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import PropertyCard from '@/components/properties/PropertyCard.vue';
import { usePropertiesStore } from '@/stores/properties';

const store = usePropertiesStore();
const route = useRoute();
const router = useRouter();

const energyTypes = [
    { value: 'aerotermia', label: 'Aerotermia' },
    { value: 'solar', label: 'Solar' },
    { value: 'biomasa', label: 'Biomasa' },
    { value: 'geotermia', label: 'Geotermia' },
];

const filters = reactive({
    search: '',
    energy_rating: '',
    energy_type: '',
    min_price: '',
    max_price: '',
    rooms: '',
    location: ''
});

const getEnergyColor = (rating) => {
    const colors = {
        'A': 'bg-energy-a text-white',
        'B': 'bg-energy-b text-white',
        'C': 'bg-energy-c text-gray-900',
        'D': 'bg-energy-d text-gray-900',
        'E': 'bg-energy-e text-white',
        'F': 'bg-energy-f text-white',
        'G': 'bg-energy-g text-white',
    };
    return colors[rating] || 'bg-gray-200';
};

const paginationPages = computed(() => {
    const current = store.pagination.current_page;
    const last = store.pagination.last_page;
    const pages = [];

    if (last <= 7) {
        for (let i = 1; i <= last; i++) pages.push(i);
    } else {
        if (current <= 3) {
            pages.push(1, 2, 3, 4, '...', last);
        } else if (current >= last - 2) {
            pages.push(1, '...', last - 3, last - 2, last - 1, last);
        } else {
            pages.push(1, '...', current - 1, current, current + 1, '...', last);
        }
    }

    return pages;
});

onMounted(() => {
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
    window.scrollTo({ top: 0, behavior: 'smooth' });
};
</script>
