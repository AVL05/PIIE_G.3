<template>
    <div>
        <h1 class="text-2xl font-bold text-gray-900 mb-8">Dashboard</h1>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Propiedades</p>
                        <p class="text-2xl font-bold text-gray-900">{{ stats.properties }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Artículos</p>
                        <p class="text-2xl font-bold text-gray-900">{{ stats.posts }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Mensajes nuevos</p>
                        <p class="text-2xl font-bold text-gray-900">{{ stats.newContacts }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Ventas este mes</p>
                        <p class="text-2xl font-bold text-gray-900">{{ stats.salesThisMonth }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Acciones rápidas</h2>
                <div class="space-y-3">
                    <router-link
                        to="/admin/propiedades/crear"
                        class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-primary-50 transition-colors"
                    >
                        <svg class="w-5 h-5 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="text-gray-700">Nueva propiedad</span>
                    </router-link>
                    <router-link
                        to="/admin/blog/crear"
                        class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-primary-50 transition-colors"
                    >
                        <svg class="w-5 h-5 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="text-gray-700">Nuevo artículo</span>
                    </router-link>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Últimos mensajes</h2>
                <div v-if="recentContacts.length" class="space-y-3">
                    <div
                        v-for="contact in recentContacts"
                        :key="contact.id"
                        class="flex items-center justify-between p-3 bg-gray-50 rounded-lg"
                    >
                        <div>
                            <p class="font-medium text-gray-900">{{ contact.name }}</p>
                            <p class="text-sm text-gray-500">{{ contact.subject }}</p>
                        </div>
                        <span class="text-xs text-gray-400">{{ formatDate(contact.created_at) }}</span>
                    </div>
                </div>
                <p v-else class="text-gray-500 text-center py-4">No hay mensajes recientes</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const stats = ref({
    properties: 0,
    posts: 0,
    newContacts: 0,
    salesThisMonth: 0
});

const recentContacts = ref([]);

onMounted(async () => {
    try {
        // Fetch contact stats
        const contactStats = await axios.get('/api/admin/contacts/stats');
        stats.value.newContacts = contactStats.data.pending;

        // Fetch recent contacts
        const contacts = await axios.get('/api/admin/contacts?per_page=5');
        recentContacts.value = contacts.data.data?.slice(0, 3) || [];
    } catch (error) {
        console.error('Error loading dashboard data:', error);
    }
});

const formatDate = (date) => {
    return new Date(date).toLocaleDateString('es-ES');
};
</script>
