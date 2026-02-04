<template>
    <div>
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Propiedades</h1>
            <router-link
                to="/admin/propiedades/crear"
                class="inline-flex items-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nueva propiedad
            </router-link>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
            <div class="flex flex-wrap gap-4">
                <input
                    v-model="search"
                    type="text"
                    placeholder="Buscar propiedades..."
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                />
                <select
                    v-model="statusFilter"
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                >
                    <option value="">Todos los estados</option>
                    <option value="disponible">Disponible</option>
                    <option value="reservada">Reservada</option>
                    <option value="vendida">Vendida</option>
                </select>
                <button
                    @click="loadProperties"
                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors"
                >
                    Filtrar
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Propiedad</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Energía</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Destacada</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="property in properties" :key="property.id" class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-12 w-12 flex-shrink-0">
                                    <img
                                        :src="property.images?.[0] || '/images/placeholder-property.jpg'"
                                        class="h-12 w-12 rounded-lg object-cover"
                                    />
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ property.title }}</div>
                                    <div class="text-sm text-gray-500">{{ property.location }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ formatPrice(property.price) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 py-1 text-xs font-bold rounded text-white"
                                :class="getEnergyClass(property.energy_rating)"
                            >
                                {{ property.energy_rating }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 py-1 text-xs font-medium rounded-full"
                                :class="getStatusClass(property.status)"
                            >
                                {{ property.status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button
                                @click="toggleFeatured(property)"
                                class="text-gray-400 hover:text-yellow-500"
                            >
                                <svg
                                    class="w-5 h-5"
                                    :class="{ 'text-yellow-500': property.is_featured }"
                                    :fill="property.is_featured ? 'currentColor' : 'none'"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            </button>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <router-link
                                :to="`/admin/propiedades/${property.id}/editar`"
                                class="text-primary-600 hover:text-primary-900 mr-4"
                            >
                                Editar
                            </router-link>
                            <button
                                @click="deleteProperty(property.id)"
                                class="text-red-600 hover:text-red-900"
                            >
                                Eliminar
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Empty state -->
            <div v-if="properties.length === 0" class="text-center py-12">
                <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <p class="text-gray-500">No hay propiedades</p>
            </div>

            <!-- Pagination -->
            <div v-if="pagination.last_page > 1" class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-gray-500">
                        Mostrando {{ pagination.from }} - {{ pagination.to }} de {{ pagination.total }}
                    </p>
                    <div class="flex gap-2">
                        <button
                            @click="changePage(pagination.current_page - 1)"
                            :disabled="pagination.current_page === 1"
                            class="px-3 py-1 border border-gray-300 rounded text-sm disabled:opacity-50"
                        >
                            Anterior
                        </button>
                        <button
                            @click="changePage(pagination.current_page + 1)"
                            :disabled="pagination.current_page === pagination.last_page"
                            class="px-3 py-1 border border-gray-300 rounded text-sm disabled:opacity-50"
                        >
                            Siguiente
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const properties = ref([]);
const search = ref('');
const statusFilter = ref('');
const pagination = ref({
    current_page: 1,
    last_page: 1,
    from: 0,
    to: 0,
    total: 0
});

onMounted(() => {
    loadProperties();
});

const loadProperties = async (page = 1) => {
    try {
        const params = { page };
        if (search.value) params.search = search.value;
        if (statusFilter.value) params.status = statusFilter.value;

        const response = await axios.get('/api/admin/properties', { params });
        properties.value = response.data.data;
        pagination.value = {
            current_page: response.data.current_page,
            last_page: response.data.last_page,
            from: response.data.from,
            to: response.data.to,
            total: response.data.total
        };
    } catch (error) {
        console.error('Error loading properties:', error);
    }
};

const changePage = (page) => {
    loadProperties(page);
};

const formatPrice = (price) => {
    return new Intl.NumberFormat('es-ES', {
        style: 'currency',
        currency: 'EUR',
        maximumFractionDigits: 0
    }).format(price);
};

const getEnergyClass = (rating) => {
    const classes = {
        'A': 'bg-green-600',
        'B': 'bg-green-500',
        'C': 'bg-lime-500',
        'D': 'bg-yellow-500',
        'E': 'bg-orange-500',
        'F': 'bg-red-500',
        'G': 'bg-red-700'
    };
    return classes[rating] || 'bg-gray-500';
};

const getStatusClass = (status) => {
    const classes = {
        'disponible': 'bg-green-100 text-green-800',
        'reservada': 'bg-yellow-100 text-yellow-800',
        'vendida': 'bg-gray-100 text-gray-800'
    };
    return classes[status] || 'bg-gray-100 text-gray-800';
};

const toggleFeatured = async (property) => {
    try {
        await axios.post(`/api/admin/properties/${property.id}`, {
            is_featured: !property.is_featured
        });
        property.is_featured = !property.is_featured;
    } catch (error) {
        console.error('Error toggling featured:', error);
    }
};

const deleteProperty = async (id) => {
    if (!confirm('¿Estás seguro de eliminar esta propiedad?')) return;

    try {
        await axios.delete(`/api/admin/properties/${id}`);
        properties.value = properties.value.filter(p => p.id !== id);
    } catch (error) {
        console.error('Error deleting property:', error);
    }
};
</script>
