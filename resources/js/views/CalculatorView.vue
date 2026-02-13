<template>
    <div class="bg-gray-50 min-h-screen -mt-20">
        <!-- Hero -->
        <section class="bg-primary-700 text-white pt-32 pb-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">
                    Calculadora de Impacto Ambiental
                </h1>
                <p class="text-primary-100 text-lg max-w-2xl">
                    Descubre cuánto CO2 emite tu vivienda actual y qué mejoras
                    puedes implementar para reducir tu huella de carbono.
                </p>
            </div>
        </section>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Calculator Form -->
            <div v-if="!showResults" class="bg-white rounded-2xl shadow-sm p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">
                    Datos de tu vivienda
                </h2>

                <form @submit.prevent="calculateImpact" class="space-y-6">
                    <!-- Surface -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-2"
                        >
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
                        <label
                            class="block text-sm font-medium text-gray-700 mb-2"
                        >
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
                        <label
                            class="block text-sm font-medium text-gray-700 mb-2"
                        >
                            Tipo de calefacción principal
                        </label>
                        <select
                            v-model="form.heatingType"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        >
                            <option value="">Selecciona...</option>
                            <option value="gas">Gas natural</option>
                            <option value="electric">
                                Eléctrica convencional
                            </option>
                            <option value="oil">Gasoil/Fuel</option>
                            <option value="aerothermy">Aerotermia</option>
                            <option value="biomass">Biomasa/Pellets</option>
                            <option value="none">Sin calefacción</option>
                        </select>
                    </div>

                    <!-- Hot Water -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-2"
                        >
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
                            <option value="solar">
                                Placas solares térmicas
                            </option>
                            <option value="aerothermy">Aerotermia</option>
                        </select>
                    </div>

                    <!-- Monthly Consumption -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
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
                            <label
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
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
                        <label
                            class="block text-sm font-medium text-gray-700 mb-3"
                        >
                            Características de aislamiento
                        </label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input
                                    v-model="form.features.doubleGlazing"
                                    type="checkbox"
                                    class="rounded text-primary-600 focus:ring-primary-500"
                                />
                                <span class="ml-2 text-gray-700"
                                    >Ventanas de doble acristalamiento</span
                                >
                            </label>
                            <label class="flex items-center">
                                <input
                                    v-model="form.features.wallInsulation"
                                    type="checkbox"
                                    class="rounded text-primary-600 focus:ring-primary-500"
                                />
                                <span class="ml-2 text-gray-700"
                                    >Aislamiento en paredes (SATE u otro)</span
                                >
                            </label>
                            <label class="flex items-center">
                                <input
                                    v-model="form.features.roofInsulation"
                                    type="checkbox"
                                    class="rounded text-primary-600 focus:ring-primary-500"
                                />
                                <span class="ml-2 text-gray-700"
                                    >Aislamiento en tejado/cubierta</span
                                >
                            </label>
                            <label class="flex items-center">
                                <input
                                    v-model="form.features.solarPanels"
                                    type="checkbox"
                                    class="rounded text-primary-600 focus:ring-primary-500"
                                />
                                <span class="ml-2 text-gray-700"
                                    >Placas solares fotovoltaicas</span
                                >
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
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">
                        Resultados de tu vivienda
                    </h2>

                    <div class="grid md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-red-50 rounded-xl p-6 text-center">
                            <div class="text-4xl font-bold text-red-600 mb-2">
                                {{ results.currentEmissions }}
                            </div>
                            <div class="text-gray-600">kg CO2/año actuales</div>
                        </div>
                        <div class="bg-green-50 rounded-xl p-6 text-center">
                            <div class="text-4xl font-bold text-green-600 mb-2">
                                {{ results.potentialEmissions }}
                            </div>
                            <div class="text-gray-600">
                                kg CO2/año potenciales
                            </div>
                        </div>
                        <div class="bg-primary-50 rounded-xl p-6 text-center">
                            <div
                                class="text-4xl font-bold text-primary-600 mb-2"
                            >
                                {{ results.savingsPercent }}%
                            </div>
                            <div class="text-gray-600">ahorro posible</div>
                        </div>
                    </div>

                    <!-- Energy Rating -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            Tu certificación energética estimada
                        </h3>
                        <div class="flex items-center gap-4">
                            <div class="flex flex-1">
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
                                    class="flex-1 h-10 flex items-center justify-center text-white font-bold"
                                    :class="[
                                        getEnergyColor(letter),
                                        results.currentRating === letter
                                            ? 'ring-4 ring-offset-2 ring-gray-900 scale-110 z-10'
                                            : '',
                                    ]"
                                >
                                    {{ letter }}
                                </div>
                            </div>
                            <div class="text-gray-600">
                                Actual:
                                <span class="font-bold">{{
                                    results.currentRating
                                }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Comparison with average -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            Comparación con la media
                        </h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Tu vivienda</span>
                                    <span
                                        >{{ results.currentEmissions }} kg
                                        CO2/año</span
                                    >
                                </div>
                                <div class="h-3 bg-gray-200 rounded-full">
                                    <div
                                        class="h-full bg-red-500 rounded-full"
                                        :style="{
                                            width: `${Math.min(results.comparisonPercent, 100)}%`,
                                        }"
                                    ></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Media española</span>
                                    <span
                                        >{{ results.averageEmissions }} kg
                                        CO2/año</span
                                    >
                                </div>
                                <div class="h-3 bg-gray-200 rounded-full">
                                    <div
                                        class="h-full bg-yellow-500 rounded-full w-full"
                                    ></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Vivienda eficiente (A)</span>
                                    <span
                                        >{{ results.efficientEmissions }} kg
                                        CO2/año</span
                                    >
                                </div>
                                <div class="h-3 bg-gray-200 rounded-full">
                                    <div
                                        class="h-full bg-green-500 rounded-full"
                                        :style="{
                                            width: `${(results.efficientEmissions / results.averageEmissions) * 100}%`,
                                        }"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommendations -->
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">
                        Recomendaciones de mejora
                    </h2>

                    <div class="space-y-4">
                        <div
                            v-for="rec in results.recommendations"
                            :key="rec.id"
                            class="border border-gray-200 rounded-xl p-6"
                        >
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3
                                        class="text-lg font-semibold text-gray-900 mb-2"
                                    >
                                        {{ rec.title }}
                                    </h3>
                                    <p class="text-gray-600 mb-3">
                                        {{ rec.description }}
                                    </p>
                                    <div
                                        class="flex items-center gap-4 text-sm"
                                    >
                                        <span
                                            class="text-green-600 font-medium"
                                        >
                                            Ahorro: {{ rec.savings }} kg CO2/año
                                        </span>
                                        <span class="text-gray-500">
                                            Inversión estimada:
                                            {{ formatPrice(rec.investment) }}
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
                <div
                    class="bg-primary-700 rounded-2xl p-8 text-white text-center"
                >
                    <h2 class="text-2xl font-bold mb-4">
                        ¿Quieres mejorar la eficiencia de tu hogar?
                    </h2>
                    <p class="text-primary-100 mb-6">
                        Nuestros expertos pueden ayudarte a implementar estas
                        mejoras y gestionar las subvenciones disponibles.
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
import { reactive, ref } from "vue";

const showResults = ref(false);

const form = reactive({
    surface: null,
    yearBuilt: "",
    heatingType: "",
    hotWater: "",
    electricConsumption: null,
    gasConsumption: null,
    features: {
        doubleGlazing: false,
        wallInsulation: false,
        roofInsulation: false,
        solarPanels: false,
    },
});

const results = reactive({
    currentEmissions: 0,
    potentialEmissions: 0,
    savingsPercent: 0,
    currentRating: "E",
    averageEmissions: 2500,
    efficientEmissions: 500,
    comparisonPercent: 100,
    recommendations: [],
});

const calculateImpact = () => {
    // 1. Calculate Baseline Emissions (Current State)
    let electricCO2 = 0;
    let gasCO2 = 0;
    let estimatedElectricC = 0;
    let estimatedGasC = 0;

    // Emission Factors (Spain Average)
    const FACTOR_ELECTRIC = 0.259; // kg CO2 per kWh
    const FACTOR_GAS = 2.52; // kg CO2 per m3 (approx 11.6 kWh/m3 * 0.217 kg/kWh)

    // A. Use actual consumption if provided
    if (form.electricConsumption > 0) {
        electricCO2 = form.electricConsumption * 12 * FACTOR_ELECTRIC;
    } else {
        // B. Estimate based on Surface + Year + People (assumed 3)
        // Avg consumption: ~70 kWh/m2/year for old, ~30 for new
        let efficiency = 1.0;
        if (form.yearBuilt === "pre1980") efficiency = 1.4;
        if (form.yearBuilt === "1980-2000") efficiency = 1.2;
        if (form.yearBuilt === "2000-2010") efficiency = 1.0;
        if (form.yearBuilt === "2010-2020") efficiency = 0.8;
        if (form.yearBuilt === "post2020") efficiency = 0.6;

        estimatedElectricC = form.surface * 60 * efficiency; // Base demand
        electricCO2 = estimatedElectricC * FACTOR_ELECTRIC;
    }

    if (form.gasConsumption > 0) {
        gasCO2 = form.gasConsumption * 12 * FACTOR_GAS;
    } else if (form.heatingType === "gas" || form.hotWater === "gas") {
        // Estimate gas if used for heating/water
        let gasEfficiency = 1.2; // Older boilers are less efficient
        if (form.yearBuilt === "post2020") gasEfficiency = 0.9;

        // Avg demand ~100 kWh/m2/year for heating -> / 11.6 kWh/m3 = ~8.6 m3/m2/year
        const heatingDemand = form.surface * 10 * gasEfficiency;
        estimatedGasC = heatingDemand;
        gasCO2 = estimatedGasC * FACTOR_GAS;
    }

    // Adjust for heating source efficiency if not using gas but using other non-electric sources
    if (form.heatingType === "oil") {
        electricCO2 *= 1.1; // Placeholder for oil emissions (usually tracked separately, adding to total)
    }

    // Total Current Emissions
    let totalEmissions = electricCO2 + gasCO2;

    // Apply existing features adjustment (if estimates were used)
    if (!form.electricConsumption && !form.gasConsumption) {
        if (form.features.doubleGlazing) totalEmissions *= 0.9;
        if (form.features.wallInsulation) totalEmissions *= 0.85;
        if (form.features.roofInsulation) totalEmissions *= 0.95;
        if (form.features.solarPanels) totalEmissions *= 0.6; // Big reduction
    }

    results.currentEmissions = Math.round(totalEmissions);

    // 2. Calculate Recommendations & Savings
    results.recommendations = [];
    let potentialSavings = 0;

    // Recommendation 1: Solar Panels
    if (!form.features.solarPanels) {
        // Estimate 40% reduction in electric impact
        const savings = Math.round(electricCO2 * 0.6); // 60% coverage typically
        if (savings > 0) {
            results.recommendations.push({
                id: 1,
                title: "Instalación de Autoconsumo (Placas Solares)",
                description:
                    "Genera tu propia energía verde y reduce drásticamente tu factura eléctrica.",
                savings: savings,
                investment: 4000 + (form.surface / 10) * 200, // Roughly 4000 base + scale
                priority: "Alta",
            });
            potentialSavings += savings;
        }
    }

    // Recommendation 2: Aerothermy (if using Gas or Oil or standard Electric)
    if (["gas", "oil", "electric"].includes(form.heatingType)) {
        // Aerothermy is ~400% efficient (COP 4) vs Gas (0.9) or Regular Electric (1.0)
        let heatSavings = 0;
        if (form.heatingType === "gas") {
            heatSavings = Math.round(gasCO2 * 0.7); // 70% reduction converting gas to efficient electric
        } else if (form.heatingType === "electric") {
            heatSavings = Math.round(electricCO2 * 0.6 * 0.75); // Heating part of electric bill reduced by 75%
        } else if (form.heatingType === "oil") {
            heatSavings = Math.round(totalEmissions * 0.5); // Crude estimate
        }

        results.recommendations.push({
            id: 2,
            title: "Aerotermia (Bomba de Calor)",
            description:
                "La tecnología más eficiente para calefacción y agua caliente.",
            savings: heatSavings,
            investment: 6000 + form.surface * 40,
            priority: "Alta",
        });
        potentialSavings += heatSavings * 0.8; // Apply factor to avoid double counting overlap
    }

    // Recommendation 3: Windows (Double Glazing)
    if (!form.features.doubleGlazing) {
        const winSavings = Math.round(totalEmissions * 0.15); // ~15% heat loss through windows
        results.recommendations.push({
            id: 3,
            title: "Ventanas de PVC con Doble Acristalamiento",
            description:
                "Mejora el confort térmico y reduce la pérdida de energía.",
            savings: winSavings,
            investment: form.surface * 0.2 * 400, // Window area estimate ~20% of floor, 400€/m2
            priority: "Media",
        });
        potentialSavings += winSavings;
    }

    // Recommendation 4: SATE (Insulation)
    if (!form.features.wallInsulation) {
        const sateSavings = Math.round(totalEmissions * 0.25); // ~25% heat loss through walls
        results.recommendations.push({
            id: 4,
            title: "Aislamiento SATE",
            description:
                "Aislamiento térmico exterior para eliminar puentes térmicos.",
            savings: sateSavings,
            investment: form.surface * 1.5 * 60, // Wall area approx 1.5x floor, 60€/m2
            priority: "Media",
        });
        potentialSavings += sateSavings;
    }

    // 3. Final Results
    // Cap potential emissions (cannot be negative)
    const realisticPotential = Math.max(
        0,
        results.currentEmissions - potentialSavings,
    );

    results.potentialEmissions = Math.round(realisticPotential);
    results.savingsPercent =
        Math.round(
            ((results.currentEmissions - realisticPotential) /
                results.currentEmissions) *
                100,
        ) || 0;

    // Average comparison (Average Spanish Household ~2.5 Tonnes = 2500kg)
    results.averageEmissions = 2500;
    results.efficientEmissions = Math.round(2500 * 0.2); // Target A rating (~20% of avg)
    results.comparisonPercent = Math.round(
        (results.currentEmissions / results.averageEmissions) * 100,
    );

    // 4. Rating Calculation (kgCO2 / m2 / year)
    const ratio = results.currentEmissions / form.surface;
    if (ratio < 10) results.currentRating = "A";
    else if (ratio < 20) results.currentRating = "B";
    else if (ratio < 35) results.currentRating = "C";
    else if (ratio < 55) results.currentRating = "D";
    else if (ratio < 80) results.currentRating = "E";
    else if (ratio < 110) results.currentRating = "F";
    else results.currentRating = "G";

    showResults.value = true;
};

const resetCalculator = () => {
    showResults.value = false;
    form.surface = null;
    form.yearBuilt = "";
    form.heatingType = "";
    form.hotWater = "";
    form.electricConsumption = null;
    form.gasConsumption = null;
    form.features = {
        doubleGlazing: false,
        wallInsulation: false,
        roofInsulation: false,
        solarPanels: false,
    };
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

const getPriorityClass = (priority) => {
    const classes = {
        Alta: "bg-red-100 text-red-700",
        Media: "bg-yellow-100 text-yellow-700",
        Baja: "bg-green-100 text-green-700",
    };
    return classes[priority];
};

const formatPrice = (price) => {
    return new Intl.NumberFormat("es-ES", {
        style: "currency",
        currency: "EUR",
        maximumFractionDigits: 0,
    }).format(price);
};
</script>
