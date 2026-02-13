<template>
    <div class="bg-gray-50 min-h-screen -mt-20">
        <!-- Loading -->
        <div
            v-if="store.loading"
            class="flex justify-center items-center min-h-screen"
        >
            <div
                class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary-600"
            ></div>
        </div>

        <!-- Error -->
        <div v-else-if="store.error" class="max-w-7xl mx-auto px-4 py-12">
            <div class="bg-red-50 text-red-700 p-4 rounded-lg">
                {{ store.error }}
            </div>
        </div>

        <!-- Content -->
        <div v-else-if="property">
            <!-- Image Gallery -->
            <div class="relative h-[50vh] md:h-[60vh] bg-gray-200">
                <img
                    :src="currentImage"
                    :alt="property.title"
                    @error="
                        $event.target.src = '/images/placeholder-property.jpg'
                    "
                    class="w-full h-full object-cover"
                />
                <!-- Navigation arrows -->
                <button
                    v-if="property.images?.length > 1"
                    @click="prevImage"
                    class="absolute left-4 top-1/2 -translate-y-1/2 p-2 bg-white/80 rounded-full hover:bg-white"
                >
                    <svg
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>
                </button>
                <button
                    v-if="property.images?.length > 1"
                    @click="nextImage"
                    class="absolute right-4 top-1/2 -translate-y-1/2 p-2 bg-white/80 rounded-full hover:bg-white"
                >
                    <svg
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"
                        />
                    </svg>
                </button>
                <!-- Thumbnails -->
                <div
                    v-if="property.images?.length > 1"
                    class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2"
                >
                    <button
                        v-for="(img, idx) in property.images"
                        :key="idx"
                        @click="currentImageIndex = idx"
                        class="w-16 h-12 rounded overflow-hidden border-2 transition-colors"
                        :class="
                            currentImageIndex === idx
                                ? 'border-primary-500'
                                : 'border-white/50'
                        "
                    >
                        <img
                            :src="img"
                            @error="
                                $event.target.src =
                                    '/images/placeholder-property.jpg'
                            "
                            class="w-full h-full object-cover"
                        />
                    </button>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="lg:flex lg:gap-8">
                    <!-- Main Content -->
                    <div class="lg:flex-1">
                        <!-- Header -->
                        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h1
                                        class="text-2xl md:text-3xl font-bold text-gray-900 mb-2"
                                    >
                                        {{ property.title }}
                                    </h1>
                                    <p class="text-gray-500 flex items-center">
                                        <svg
                                            class="w-5 h-5 mr-1"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                            />
                                        </svg>
                                        {{ property.location }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <div
                                        class="text-3xl font-bold text-primary-600"
                                    >
                                        {{ formatPrice(property.price) }}
                                    </div>
                                    <EnergyLabel
                                        :rating="property.energy_rating"
                                        class="mt-2"
                                    />
                                </div>
                            </div>

                            <!-- Quick Stats -->
                            <div
                                class="grid grid-cols-4 gap-4 py-4 border-t border-b border-gray-100"
                            >
                                <div class="text-center">
                                    <div
                                        class="text-2xl font-bold text-gray-900"
                                    >
                                        {{ property.surface }}
                                    </div>
                                    <div class="text-sm text-gray-500">m²</div>
                                </div>
                                <div class="text-center">
                                    <div
                                        class="text-2xl font-bold text-gray-900"
                                    >
                                        {{ property.rooms }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        Habitaciones
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div
                                        class="text-2xl font-bold text-gray-900"
                                    >
                                        {{ property.bathrooms }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        Baños
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div
                                        class="text-2xl font-bold text-gray-900"
                                    >
                                        {{ property.year_built }}
                                    </div>
                                    <div class="text-sm text-gray-500">Año</div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mt-6">
                                <h2
                                    class="text-lg font-semibold text-gray-900 mb-3"
                                >
                                    Descripción
                                </h2>
                                <p class="text-gray-600 whitespace-pre-line">
                                    {{ property.description }}
                                </p>
                            </div>
                        </div>

                        <!-- Ficha Técnica Verde -->
                        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                            <h2
                                class="text-lg font-semibold text-gray-900 mb-4 flex items-center"
                            >
                                <svg
                                    class="w-6 h-6 mr-2 text-primary-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                    />
                                </svg>
                                Ficha Técnica Verde
                            </h2>

                            <!-- Energy Rating Detail -->
                            <div class="mb-6">
                                <h3
                                    class="text-sm font-medium text-gray-700 mb-3"
                                >
                                    Certificación Energética
                                </h3>
                                <div class="flex items-center gap-4">
                                    <div class="flex-1">
                                        <div class="flex">
                                            <div
                                                v-for="letter in [
                                                    'A',
                                                    'B',
                                                    'C',
                                                    'D',
                                                    'E',
                                                    'F',
                                                    'G',
                                                ]"
                                                :key="letter"
                                                class="flex-1 h-8 flex items-center justify-center text-white text-sm font-bold"
                                                :class="[
                                                    getEnergyColor(letter),
                                                    property.energy_rating ===
                                                    letter
                                                        ? 'ring-2 ring-offset-2 ring-gray-900 scale-110 z-10'
                                                        : '',
                                                ]"
                                            >
                                                {{ letter }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CO2 Emissions -->
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="bg-primary-50 rounded-lg p-4">
                                    <div class="text-sm text-gray-600 mb-1">
                                        Huella de Carbono Anual
                                    </div>
                                    <div
                                        class="text-2xl font-bold text-primary-700"
                                    >
                                        {{ property.co2_emissions }} kg CO2/año
                                    </div>
                                </div>
                                <div class="bg-green-50 rounded-lg p-4">
                                    <div class="text-sm text-gray-600 mb-1">
                                        Ahorro vs. Vivienda Estándar
                                    </div>
                                    <div
                                        class="text-2xl font-bold text-green-700"
                                    >
                                        -{{ property.co2_savings }} kg CO2/año
                                    </div>
                                </div>
                            </div>

                            <!-- Sustainability Checklist -->
                            <div>
                                <h3
                                    class="text-sm font-medium text-gray-700 mb-3"
                                >
                                    Características de Sostenibilidad
                                </h3>
                                <div class="grid grid-cols-2 gap-3">
                                    <div
                                        v-for="feature in sustainabilityChecklist"
                                        :key="feature.key"
                                        class="flex items-center"
                                    >
                                        <div
                                            class="w-5 h-5 rounded-full mr-2 flex items-center justify-center"
                                            :class="
                                                hasFeature(feature.key)
                                                    ? 'bg-primary-100 text-primary-600'
                                                    : 'bg-gray-100 text-gray-400'
                                            "
                                        >
                                            <svg
                                                v-if="hasFeature(feature.key)"
                                                class="w-3 h-3"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                            <svg
                                                v-else
                                                class="w-3 h-3"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </div>
                                        <span
                                            :class="
                                                hasFeature(feature.key)
                                                    ? 'text-gray-900'
                                                    : 'text-gray-400'
                                            "
                                        >
                                            {{ feature.label }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Certifications -->
                            <div
                                v-if="property.certifications?.length"
                                class="mt-6 pt-6 border-t border-gray-100"
                            >
                                <h3
                                    class="text-sm font-medium text-gray-700 mb-3"
                                >
                                    Certificaciones Externas
                                </h3>
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        v-for="cert in property.certifications"
                                        :key="cert"
                                        class="px-3 py-1 bg-primary-100 text-primary-700 rounded-full text-sm font-medium"
                                    >
                                        {{ cert }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <aside class="lg:w-80 mt-6 lg:mt-0">
                        <!-- Contact Form -->
                        <div
                            class="bg-white rounded-xl shadow-sm p-6 sticky top-24"
                        >
                            <h2
                                class="text-lg font-semibold text-gray-900 mb-4"
                            >
                                ¿Interesado en esta propiedad?
                            </h2>

                            <form
                                @submit.prevent="submitContact"
                                class="space-y-4"
                            >
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 mb-1"
                                        >Nombre</label
                                    >
                                    <input
                                        v-model="contactForm.name"
                                        type="text"
                                        required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                                    />
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 mb-1"
                                        >Email</label
                                    >
                                    <input
                                        v-model="contactForm.email"
                                        type="email"
                                        required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                                    />
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 mb-1"
                                        >Teléfono</label
                                    >
                                    <input
                                        v-model="contactForm.phone"
                                        type="tel"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                                    />
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 mb-1"
                                        >Mensaje</label
                                    >
                                    <textarea
                                        v-model="contactForm.message"
                                        rows="3"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Me gustaría recibir más información..."
                                    ></textarea>
                                </div>
                                <button
                                    type="submit"
                                    class="w-full py-3 px-4 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors"
                                >
                                    Solicitar información
                                </button>
                            </form>

                            <div class="mt-6 pt-6 border-t border-gray-100">
                                <a
                                    href="tel:+34963123456"
                                    class="flex items-center justify-center text-primary-600 hover:text-primary-700"
                                >
                                    <svg
                                        class="w-5 h-5 mr-2"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                        />
                                    </svg>
                                    +34 963 123 456
                                </a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import EnergyLabel from "@/components/common/EnergyLabel.vue";
import { usePropertiesStore } from "@/stores/properties";
import { computed, onMounted, reactive, ref } from "vue";
import { useRoute } from "vue-router";

const route = useRoute();
const store = usePropertiesStore();

const currentImageIndex = ref(0);

const contactForm = reactive({
    name: "",
    email: "",
    phone: "",
    message: "",
});

const property = computed(() => store.currentProperty);

const currentImage = computed(() => {
    return (
        property.value?.images?.[currentImageIndex.value] ||
        "/images/placeholder-property.jpg"
    );
});

const sustainabilityChecklist = [
    { key: "thermal_insulation", label: "Aislamiento térmico" },
    { key: "double_glazing", label: "Ventanas Climalit" },
    { key: "sate", label: "Sistema SATE" },
    { key: "aerothermy", label: "Aerotermia" },
    { key: "solar_panels", label: "Placas solares" },
    { key: "rainwater_recovery", label: "Recuperación pluviales" },
    { key: "certified_wood", label: "Maderas certificadas" },
    { key: "eco_paints", label: "Pinturas ecológicas" },
];

onMounted(() => {
    store.fetchProperty(route.params.id);
});

const formatPrice = (price) => {
    return new Intl.NumberFormat("es-ES", {
        style: "currency",
        currency: "EUR",
        maximumFractionDigits: 0,
    }).format(price);
};

const getEnergyColor = (letter) => {
    const colors = {
        A: "bg-[#00a651]",
        B: "bg-[#50b848]",
        C: "bg-[#b5d333]",
        D: "bg-[#fff200] text-gray-800",
        E: "bg-[#f7941d]",
        F: "bg-[#ed1c24]",
        G: "bg-[#990000]",
    };
    return colors[letter];
};

const hasFeature = (key) => {
    return property.value?.sustainability_features?.includes(key);
};

const prevImage = () => {
    if (property.value?.images?.length) {
        currentImageIndex.value =
            (currentImageIndex.value - 1 + property.value.images.length) %
            property.value.images.length;
    }
};

const nextImage = () => {
    if (property.value?.images?.length) {
        currentImageIndex.value =
            (currentImageIndex.value + 1) % property.value.images.length;
    }
};

const submitContact = async () => {
    // TODO: Implement contact form submission
    alert(
        "Mensaje enviado correctamente. Nos pondremos en contacto contigo pronto.",
    );
};
</script>
