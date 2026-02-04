<template>
    <router-link
        :to="`/propiedades/${property.id}`"
        class="group bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-shadow"
    >
        <!-- Image -->
        <div class="relative h-48 overflow-hidden">
            <img
                :src="property.images?.[0] || '/images/placeholder-property.jpg'"
                :alt="property.title"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
            />
            <!-- Energy Label -->
            <div class="absolute top-3 left-3">
                <EnergyLabel :rating="property.energy_rating" />
            </div>
            <!-- Status Badge -->
            <div v-if="property.status === 'vendida'" class="absolute top-3 right-3">
                <span class="px-2 py-1 bg-red-500 text-white text-xs font-medium rounded">
                    Vendida
                </span>
            </div>
            <!-- Price -->
            <div class="absolute bottom-3 right-3">
                <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-gray-900 font-bold rounded-lg">
                    {{ formatPrice(property.price) }}
                </span>
            </div>
        </div>

        <!-- Content -->
        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-900 mb-1 group-hover:text-primary-600 transition-colors">
                {{ property.title }}
            </h3>
            <p class="text-gray-500 text-sm mb-3 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                {{ property.location }}
            </p>

            <!-- Features -->
            <div class="flex items-center justify-between text-sm text-gray-600 mb-3">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                    </svg>
                    {{ property.surface }} m²
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    {{ property.rooms }} hab.
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                    </svg>
                    {{ property.bathrooms }} baños
                </span>
            </div>

            <!-- Sustainability Features -->
            <div class="flex flex-wrap gap-1">
                <span
                    v-for="feature in property.sustainability_features?.slice(0, 3)"
                    :key="feature"
                    class="px-2 py-0.5 bg-primary-50 text-primary-700 text-xs rounded-full"
                >
                    {{ feature }}
                </span>
                <span
                    v-if="property.sustainability_features?.length > 3"
                    class="px-2 py-0.5 bg-gray-100 text-gray-600 text-xs rounded-full"
                >
                    +{{ property.sustainability_features.length - 3 }}
                </span>
            </div>

            <!-- CO2 Savings -->
            <div v-if="property.co2_savings" class="mt-3 pt-3 border-t border-gray-100">
                <div class="flex items-center text-sm text-primary-600">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Ahorro de {{ property.co2_savings }} kg CO2/año
                </div>
            </div>
        </div>
    </router-link>
</template>

<script setup>
import EnergyLabel from '@/components/common/EnergyLabel.vue';

defineProps({
    property: {
        type: Object,
        required: true
    }
});

const formatPrice = (price) => {
    return new Intl.NumberFormat('es-ES', {
        style: 'currency',
        currency: 'EUR',
        maximumFractionDigits: 0
    }).format(price);
};
</script>
