<template>
    <router-link
        :to="`/propiedades/${property.id}`"
        class="group block bg-white rounded-3xl shadow-sm overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2"
    >
        <!-- Image Container -->
        <div class="relative h-56 overflow-hidden">
            <!-- Image with overlay -->
            <img
                :src="property.images?.[0] || '/images/placeholder-property.jpg'"
                :alt="property.title"
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
            />
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

            <!-- Top Badges -->
            <div class="absolute top-4 left-4 flex items-center gap-2">
                <EnergyLabel :rating="property.energy_rating" class="shadow-lg" />
                <span v-if="property.featured" class="px-3 py-1 bg-secondary-500 text-white text-xs font-bold rounded-full shadow-lg flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    Destacada
                </span>
            </div>

            <!-- Status Badge -->
            <div v-if="property.status === 'vendida'" class="absolute top-4 right-4">
                <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full shadow-lg">
                    Vendida
                </span>
            </div>

            <!-- Price Tag -->
            <div class="absolute bottom-4 right-4 transform translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                <span class="px-4 py-2 bg-white text-gray-900 font-bold text-lg rounded-xl shadow-xl">
                    {{ formatPrice(property.price) }}
                </span>
            </div>

            <!-- Quick View Button -->
            <div class="absolute bottom-4 left-4 transform translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 delay-75">
                <span class="inline-flex items-center px-4 py-2 bg-primary-500 text-white text-sm font-semibold rounded-xl shadow-xl">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    Ver detalles
                </span>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <!-- Price (mobile) -->
            <div class="lg:hidden mb-3">
                <span class="text-2xl font-bold text-gradient">
                    {{ formatPrice(property.price) }}
                </span>
            </div>

            <!-- Title -->
            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary-600 transition-colors line-clamp-1">
                {{ property.title }}
            </h3>

            <!-- Location -->
            <p class="text-gray-500 text-sm mb-4 flex items-center">
                <svg class="w-4 h-4 mr-2 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                {{ property.location }}
            </p>

            <!-- Features Grid -->
            <div class="grid grid-cols-3 gap-3 mb-4">
                <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl group-hover:bg-primary-50 transition-colors">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-primary-500 mb-1 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                    </svg>
                    <span class="text-sm font-semibold text-gray-700">{{ property.surface }} m²</span>
                </div>
                <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl group-hover:bg-primary-50 transition-colors">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-primary-500 mb-1 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="text-sm font-semibold text-gray-700">{{ property.rooms }} hab.</span>
                </div>
                <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl group-hover:bg-primary-50 transition-colors">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-primary-500 mb-1 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                    </svg>
                    <span class="text-sm font-semibold text-gray-700">{{ property.bathrooms }} baños</span>
                </div>
            </div>

            <!-- Sustainability Features -->
            <div class="flex flex-wrap gap-2 mb-4">
                <span
                    v-for="feature in property.sustainability_features?.slice(0, 2)"
                    :key="feature"
                    class="inline-flex items-center px-3 py-1 bg-primary-50 text-primary-700 text-xs font-medium rounded-full border border-primary-100"
                >
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    {{ feature }}
                </span>
                <span
                    v-if="property.sustainability_features?.length > 2"
                    class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full"
                >
                    +{{ property.sustainability_features.length - 2 }} más
                </span>
            </div>

            <!-- CO2 Savings Footer -->
            <div v-if="property.co2_savings" class="pt-4 border-t border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center text-sm">
                        <div class="w-8 h-8 bg-gradient-to-br from-primary-100 to-accent-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs">Ahorro anual</p>
                            <p class="text-primary-600 font-semibold">{{ property.co2_savings }} kg CO₂</p>
                        </div>
                    </div>
                    <div class="hidden lg:block">
                        <span class="text-2xl font-bold text-gradient">
                            {{ formatPrice(property.price) }}
                        </span>
                    </div>
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
