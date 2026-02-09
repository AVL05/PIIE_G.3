<template>
    <div class="bg-gray-50 min-h-screen">
        <!-- Hero -->
        <section class="bg-primary-700 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Calculadora de Impacto Ambiental</h1>
                <p class="text-primary-100 text-lg max-w-2xl">
                    Descubre cuánto CO2 emite tu vivienda actual y qué mejoras puedes implementar para reducir tu huella de carbono.
                </p>
            </div>
        </section>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Calculator Form -->
            <div v-if="!showResults" class="bg-white rounded-2xl shadow-sm p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Datos de tu vivienda</h2>

                <form @submit.prevent="calculateImpact" class="space-y-6">
                    <!-- Surface -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Superficie de la vivienda (m²)
                        </label>
                        <input
                            v-model.number="form.surface"
                            type="number"
                            min="20"
                            max="1000"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                            placeholder="Ej: 90"
                        />
                    </div>

                    <!-- Year Built -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Año de construcción
                        </label>
                        <select
                            v-model="form.yearBuilt"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        >
                            <option value="">Selecciona...</option>
                            <option value="pre1980">Antes de 1980</option>
                            <option value="1980-2000">1980 - 2000</option>
                            <option value="2000-2010">2000 - 2010</option>
                            <option value="2010-2020">2010 - 2020</option>
                            <option value="post2020">Después de 2020</option>
                        </select>
                    </div>

                    <!-- Energy Type -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tipo de calefacción principal
                        </label>
                        <select
                            v-model="form.heatingType"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        >
                            <option value="">Selecciona...</option>
                            <option value="gas">Gas natural</option>
                            <option value="electric">Eléctrica convencional</option>
                            <option value="oil">Gasoil/Fuel</option>
                            <option value="aerothermy">Aerotermia</option>
                            <option value="biomass">Biomasa/Pellets</option>
                            <option value="none">Sin calefacción</option>
                        </select>
                    </div>

                    <!-- Hot Water -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Sistema de agua caliente
                        </label>
                        <select
                            v-model="form.hotWater"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        >
                            <option value="">Selecciona...</option>
                            <option value="gas">Calentador de gas</option>
                            <option value="electric">Termo eléctrico</option>
                            <option value="solar">Placas solares térmicas</option>
                            <option value="aerothermy">Aerotermia</option>
                        </select>
                    </div>

                    <!-- Monthly Consumption -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Consumo eléctrico mensual (kWh)
                            </label>
                            <input
                                v-model.number="form.electricConsumption"
                                type="number"
                                min="0"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Ej: 250"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Consumo gas mensual (m³)
                            </label>
                            <input
                                v-model.number="form.gasConsumption"
                                type="number"
                                min="0"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Ej: 50"
                            />
                        </div>
                    </div>

                    <!-- Insulation -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">
                            Características de aislamiento
                        </label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input v-model="form.features.doubleGlazing" type="checkbox" class="rounded text-primary-600 focus:ring-primary-500" />
                                <span class="ml-2 text-gray-700">Ventanas de doble acristalamiento</span>
                            </label>
                            <label class="flex items-center">
                                <input v-model="form.features.wallInsulation" type="checkbox" class="rounded text-primary-600 focus:ring-primary-500" />
                                <span class="ml-2 text-gray-700">Aislamiento en paredes (SATE u otro)</span>
                            </label>
                            <label class="flex items-center">
                                <input v-model="form.features.roofInsulation" type="checkbox" class="rounded text-primary-600 focus:ring-primary-500" />
                                <span class="ml-2 text-gray-700">Aislamiento en tejado/cubierta</span>
                            </label>
                            <label class="flex items-center">
                                <input v-model="form.features.solarPanels" type="checkbox" class="rounded text-primary-600 focus:ring-primary-500" />
                                <span class="ml-2 text-gray-700">Placas solares fotovoltaicas</span>
                            </label>
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="w-full py-4 px-6 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors text-lg"
                    >
                        Calcular mi huella de carbono
                    </button>
                </form>
            </div>

            <!-- Results -->
            <div v-else class="space-y-6">
                <!-- Summary Card -->
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Resultados de tu vivienda</h2>

                    <div class="grid md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-red-50 rounded-xl p-6 text-center">
                            <div class="text-4xl font-bold text-red-600 mb-2">{{ results.currentEmissions }}</div>
                            <div class="text-gray-600">kg CO2/año actuales</div>
                        </div>
                        <div class="bg-green-50 rounded-xl p-6 text-center">
                            <div class="text-4xl font-bold text-green-600 mb-2">{{ results.potentialEmissions }}</div>
                            <div class="text-gray-600">kg CO2/año potenciales</div>
                        </div>
                        <div class="bg-primary-50 rounded-xl p-6 text-center">
                            <div class="text-4xl font-bold text-primary-600 mb-2">{{ results.savingsPercent }}%</div>
                            <div class="text-gray-600">ahorro posible</div>
                        </div>
                    </div>

                    <!-- Energy Rating -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Tu certificación energética estimada</h3>
                        <div class="flex items-center gap-4">
                            <div class="flex flex-1">
                                <div
                                    v-for="letter in ['A', 'B', 'C', 'D', 'E', 'F', 'G']"
                                    :key="letter"
                                    class="flex-1 h-10 flex items-center justify-center text-white font-bold"
                                    :class="[
                                        getEnergyColor(letter),
                                        results.currentRating === letter ? 'ring-4 ring-offset-2 ring-gray-900 scale-110 z-10' : ''
                                    ]"
                                >
                                    {{ letter }}
                                </div>
                            </div>
                            <div class="text-gray-600">
                                Actual: <span class="font-bold">{{ results.currentRating }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Comparison with average -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Comparación con la media</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Tu vivienda</span>
                                    <span>{{ results.currentEmissions }} kg CO2/año</span>
                                </div>
                                <div class="h-3 bg-gray-200 rounded-full">
                                    <div
                                        class="h-full bg-red-500 rounded-full"
                                        :style="{ width: `${Math.min(results.comparisonPercent, 100)}%` }"
                                    ></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Media española</span>
                                    <span>{{ results.averageEmissions }} kg CO2/año</span>
                                </div>
                                <div class="h-3 bg-gray-200 rounded-full">
                                    <div class="h-full bg-yellow-500 rounded-full w-full"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Vivienda eficiente (A)</span>
                                    <span>{{ results.efficientEmissions }} kg CO2/año</span>
                                </div>
                                <div class="h-3 bg-gray-200 rounded-full">
                                    <div
                                        class="h-full bg-green-500 rounded-full"
                                        :style="{ width: `${(results.efficientEmissions / results.averageEmissions) * 100}%` }"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommendations -->
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Recomendaciones de mejora</h2>

                    <div class="space-y-4">
                        <div
                            v-for="rec in results.recommendations"
                            :key="rec.id"
                            class="border border-gray-200 rounded-xl p-6"
                        >
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ rec.title }}</h3>
                                    <p class="text-gray-600 mb-3">{{ rec.description }}</p>
                                    <div class="flex items-center gap-4 text-sm">
                                        <span class="text-green-600 font-medium">
                                            Ahorro: {{ rec.savings }} kg CO2/año
                                        </span>
                                        <span class="text-gray-500">
                                            Inversión estimada: {{ formatPrice(rec.investment) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 ml-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-sm font-medium"
                                        :class="getPriorityClass(rec.priority)"
                                    >
                                        {{ rec.priority }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA -->
                <div class="bg-primary-700 rounded-2xl p-8 text-white text-center">
                    <h2 class="text-2xl font-bold mb-4">¿Quieres mejorar la eficiencia de tu hogar?</h2>
                    <p class="text-primary-100 mb-6">
                        Nuestros expertos pueden ayudarte a implementar estas mejoras y gestionar las subvenciones disponibles.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <router-link
                            to="/contacto"
                            class="px-6 py-3 bg-white text-primary-700 font-medium rounded-lg hover:bg-primary-50 transition-colors"
                        >
                            Solicitar asesoramiento
                        </router-link>
                        <button
                            @click="resetCalculator"
                            class="px-6 py-3 border-2 border-white text-white font-medium rounded-lg hover:bg-white/10 transition-colors"
                        >
                            Hacer otro cálculo
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';

const showResults = ref(false);

const form = reactive({
    surface: null,
    yearBuilt: '',
    heatingType: '',
    hotWater: '',
    electricConsumption: null,
    gasConsumption: null,
    features: {
        doubleGlazing: false,
        wallInsulation: false,
        roofInsulation: false,
        solarPanels: false
    }
});

const results = reactive({
    currentEmissions: 0,
    potentialEmissions: 0,
    savingsPercent: 0,
    currentRating: 'E',
    averageEmissions: 2500,
    efficientEmissions: 500,
    comparisonPercent: 100,
    recommendations: []
});

const calculateImpact = () => {
    // Base emissions calculation
    let baseEmissions = form.surface * 25; // Base: 25 kg CO2/m²/año

    // Adjust by year built
    const yearFactors = {
        'pre1980': 1.5,
        '1980-2000': 1.3,
        '2000-2010': 1.1,
        '2010-2020': 0.9,
        'post2020': 0.7
    };
    baseEmissions *= yearFactors[form.yearBuilt] || 1;

    // Adjust by heating type
    const heatingFactors = {
        'gas': 1.0,
        'electric': 1.2,
        'oil': 1.5,
        'aerothermy': 0.4,
        'biomass': 0.3,
        'none': 0.5
    };
    baseEmissions *= heatingFactors[form.heatingType] || 1;

    // Reduce by features
    if (form.features.doubleGlazing) baseEmissions *= 0.85;
    if (form.features.wallInsulation) baseEmissions *= 0.75;
    if (form.features.roofInsulation) baseEmissions *= 0.9;
    if (form.features.solarPanels) baseEmissions *= 0.6;

    // Calculate potential (if all improvements applied)
    let potentialEmissions = form.surface * 8; // Efficient home baseline

    results.currentEmissions = Math.round(baseEmissions);
    results.potentialEmissions = Math.round(potentialEmissions);
    results.savingsPercent = Math.round(((baseEmissions - potentialEmissions) / baseEmissions) * 100);
    results.comparisonPercent = Math.round((baseEmissions / results.averageEmissions) * 100);

    // Determine rating
    const emissionsPerM2 = baseEmissions / form.surface;
    if (emissionsPerM2 < 10) results.currentRating = 'A';
    else if (emissionsPerM2 < 15) results.currentRating = 'B';
    else if (emissionsPerM2 < 20) results.currentRating = 'C';
    else if (emissionsPerM2 < 30) results.currentRating = 'D';
    else if (emissionsPerM2 < 45) results.currentRating = 'E';
    else if (emissionsPerM2 < 60) results.currentRating = 'F';
    else results.currentRating = 'G';

    // Generate recommendations
    results.recommendations = [];

    if (!form.features.solarPanels) {
        results.recommendations.push({
            id: 1,
            title: 'Instalación de placas solares fotovoltaicas',
            description: 'Reduce tu consumo eléctrico de la red hasta un 70% y genera tu propia energía limpia.',
            savings: Math.round(baseEmissions * 0.4),
            investment: form.surface * 80,
            priority: 'Alta'
        });
    }

    if (form.heatingType !== 'aerothermy' && form.heatingType !== 'biomass') {
        results.recommendations.push({
            id: 2,
            title: 'Cambio a aerotermia',
            description: 'Sistema de climatización eficiente que consume hasta un 75% menos de energía.',
            savings: Math.round(baseEmissions * 0.35),
            investment: 8000 + form.surface * 30,
            priority: 'Alta'
        });
    }

    if (!form.features.wallInsulation) {
        results.recommendations.push({
            id: 3,
            title: 'Sistema de aislamiento SATE',
            description: 'Aislamiento térmico exterior que reduce las pérdidas de calor/frío hasta un 40%.',
            savings: Math.round(baseEmissions * 0.25),
            investment: form.surface * 60,
            priority: 'Media'
        });
    }

    if (!form.features.doubleGlazing) {
        results.recommendations.push({
            id: 4,
            title: 'Ventanas de doble acristalamiento',
            description: 'Mejora el aislamiento térmico y acústico de tu vivienda.',
            savings: Math.round(baseEmissions * 0.15),
            investment: 4000 + form.surface * 20,
            priority: 'Media'
        });
    }

    if (!form.features.roofInsulation && form.yearBuilt !== 'post2020') {
        results.recommendations.push({
            id: 5,
            title: 'Aislamiento de cubierta',
            description: 'Evita pérdidas de energía a través del tejado.',
            savings: Math.round(baseEmissions * 0.1),
            investment: form.surface * 25,
            priority: 'Baja'
        });
    }

    showResults.value = true;
};

const resetCalculator = () => {
    showResults.value = false;
    form.surface = null;
    form.yearBuilt = '';
    form.heatingType = '';
    form.hotWater = '';
    form.electricConsumption = null;
    form.gasConsumption = null;
    form.features = {
        doubleGlazing: false,
        wallInsulation: false,
        roofInsulation: false,
        solarPanels: false
    };
};

const getEnergyColor = (letter) => {
    const colors = {
        'A': 'bg-[#00a651]',
        'B': 'bg-[#50b848]',
        'C': 'bg-[#b5d333]',
        'D': 'bg-[#fff200] text-gray-800',
        'E': 'bg-[#f7941d]',
        'F': 'bg-[#ed1c24]',
        'G': 'bg-[#990000]'
    };
    return colors[letter];
};

const getPriorityClass = (priority) => {
    const classes = {
        'Alta': 'bg-red-100 text-red-700',
        'Media': 'bg-yellow-100 text-yellow-700',
        'Baja': 'bg-green-100 text-green-700'
    };
    return classes[priority];
};

const formatPrice = (price) => {
    return new Intl.NumberFormat('es-ES', {
        style: 'currency',
        currency: 'EUR',
        maximumFractionDigits: 0
    }).format(price);
};
</script>
