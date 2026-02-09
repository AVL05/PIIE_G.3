<template>
    <div>
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-gray-900">
                {{ isEdit ? 'Editar Propiedad' : 'Nueva Propiedad' }}
            </h1>
            <router-link
                to="/admin/propiedades"
                class="text-gray-600 hover:text-gray-900"
            >
                Volver al listado
            </router-link>
        </div>

        <form @submit.prevent="submitForm" class="space-y-8">
            <!-- Basic Info -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Información básica</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Título *</label>
                        <input
                            v-model="form.title"
                            type="text"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                            placeholder="Ej: Piso sostenible con certificación A en Valencia"
                        />
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Descripción *</label>
                        <textarea
                            v-model="form.description"
                            rows="4"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                            placeholder="Descripción detallada de la propiedad..."
                        ></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Precio (€) *</label>
                        <input
                            v-model.number="form.price"
                            type="number"
                            required
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tipo de propiedad *</label>
                        <select
                            v-model="form.property_type"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        >
                            <option value="">Selecciona...</option>
                            <option value="piso">Piso</option>
                            <option value="casa">Casa</option>
                            <option value="chalet">Chalet</option>
                            <option value="adosado">Adosado</option>
                            <option value="atico">Ático</option>
                            <option value="duplex">Dúplex</option>
                            <option value="estudio">Estudio</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ubicación *</label>
                        <input
                            v-model="form.location"
                            type="text"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                            placeholder="Valencia, Ruzafa"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Dirección completa</label>
                        <input
                            v-model="form.address"
                            type="text"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Superficie (m²) *</label>
                        <input
                            v-model.number="form.surface"
                            type="number"
                            required
                            min="1"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Habitaciones *</label>
                        <input
                            v-model.number="form.rooms"
                            type="number"
                            required
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Baños *</label>
                        <input
                            v-model.number="form.bathrooms"
                            type="number"
                            required
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Año construcción</label>
                        <input
                            v-model.number="form.year_built"
                            type="number"
                            min="1800"
                            :max="new Date().getFullYear()"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Estado *</label>
                        <select
                            v-model="form.status"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        >
                            <option value="disponible">Disponible</option>
                            <option value="reservada">Reservada</option>
                            <option value="vendida">Vendida</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Energy & Sustainability -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Eficiencia energética y sostenibilidad</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Certificación energética *</label>
                        <select
                            v-model="form.energy_rating"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        >
                            <option value="">Selecciona...</option>
                            <option value="A">A - Muy eficiente</option>
                            <option value="B">B - Eficiente</option>
                            <option value="C">C - Moderada</option>
                            <option value="D">D - Normal</option>
                            <option value="E">E - Baja</option>
                            <option value="F">F - Muy baja</option>
                            <option value="G">G - Mínima</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tipo de energía principal</label>
                        <select
                            v-model="form.energy_type"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        >
                            <option value="">Selecciona...</option>
                            <option value="aerotermia">Aerotermia</option>
                            <option value="solar">Solar</option>
                            <option value="biomasa">Biomasa</option>
                            <option value="geotermia">Geotermia</option>
                            <option value="gas">Gas natural</option>
                            <option value="electrica">Eléctrica</option>
                            <option value="mixta">Mixta</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Emisiones CO2 (kg/año)</label>
                        <input
                            v-model.number="form.co2_emissions"
                            type="number"
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ahorro CO2 vs estándar (kg/año)</label>
                        <input
                            v-model.number="form.co2_savings"
                            type="number"
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        />
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Características de sostenibilidad</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <label v-for="feature in sustainabilityOptions" :key="feature.value" class="flex items-center">
                                <input
                                    type="checkbox"
                                    :value="feature.value"
                                    v-model="form.sustainability_features"
                                    class="rounded text-primary-600 focus:ring-primary-500"
                                />
                                <span class="ml-2 text-sm text-gray-700">{{ feature.label }}</span>
                            </label>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Certificaciones externas</label>
                        <div class="flex flex-wrap gap-3">
                            <label v-for="cert in certificationOptions" :key="cert" class="flex items-center">
                                <input
                                    type="checkbox"
                                    :value="cert"
                                    v-model="form.certifications"
                                    class="rounded text-primary-600 focus:ring-primary-500"
                                />
                                <span class="ml-2 text-sm text-gray-700">{{ cert }}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Images -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Imágenes</h2>

                <div class="mb-4">
                    <input
                        type="file"
                        multiple
                        accept="image/*"
                        @change="handleImages"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100"
                    />
                </div>

                <div v-if="imagePreview.length" class="grid grid-cols-4 gap-4">
                    <div v-for="(img, idx) in imagePreview" :key="idx" class="relative">
                        <img :src="img" class="w-full h-24 object-cover rounded-lg" />
                        <button
                            type="button"
                            @click="removeImage(idx)"
                            class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full text-xs"
                        >
                            ×
                        </button>
                    </div>
                </div>
            </div>

            <!-- Options -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <label class="flex items-center">
                    <input
                        type="checkbox"
                        v-model="form.is_featured"
                        class="rounded text-primary-600 focus:ring-primary-500"
                    />
                    <span class="ml-2 text-gray-700">Destacar esta propiedad en la página principal</span>
                </label>
            </div>

            <!-- Submit -->
            <div class="flex justify-end gap-4">
                <router-link
                    to="/admin/propiedades"
                    class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50"
                >
                    Cancelar
                </router-link>
                <button
                    type="submit"
                    :disabled="saving"
                    class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 disabled:opacity-50"
                >
                    {{ saving ? 'Guardando...' : (isEdit ? 'Actualizar' : 'Crear propiedad') }}
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { ref, reactive, computed, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import axios from 'axios';

const route = useRoute();
const router = useRouter();

const isEdit = computed(() => !!route.params.id);
const saving = ref(false);
const imageFiles = ref([]);
const imagePreview = ref([]);

const form = reactive({
    title: '',
    description: '',
    price: null,
    property_type: '',
    location: '',
    address: '',
    surface: null,
    rooms: null,
    bathrooms: null,
    year_built: null,
    status: 'disponible',
    energy_rating: '',
    energy_type: '',
    co2_emissions: null,
    co2_savings: null,
    sustainability_features: [],
    certifications: [],
    is_featured: false
});

const sustainabilityOptions = [
    { value: 'thermal_insulation', label: 'Aislamiento térmico' },
    { value: 'double_glazing', label: 'Ventanas Climalit' },
    { value: 'sate', label: 'Sistema SATE' },
    { value: 'aerothermy', label: 'Aerotermia' },
    { value: 'solar_panels', label: 'Placas solares' },
    { value: 'rainwater_recovery', label: 'Recuperación pluviales' },
    { value: 'certified_wood', label: 'Maderas certificadas' },
    { value: 'eco_paints', label: 'Pinturas ecológicas' }
];

const certificationOptions = ['BREEAM', 'LEED', 'Passivhaus', 'VERDE', 'WELL'];

onMounted(async () => {
    if (isEdit.value) {
        try {
            const response = await axios.get(`/api/admin/properties/${route.params.id}`);
            Object.assign(form, response.data);
            if (response.data.images) {
                imagePreview.value = [...response.data.images];
            }
        } catch (error) {
            console.error('Error loading property:', error);
        }
    }
});

const handleImages = (event) => {
    const files = event.target.files;
    imageFiles.value = [...files];

    for (const file of files) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value.push(e.target.result);
        };
        reader.readAsDataURL(file);
    }
};

const removeImage = (idx) => {
    imagePreview.value.splice(idx, 1);
    if (idx < imageFiles.value.length) {
        imageFiles.value.splice(idx, 1);
    }
};

const submitForm = async () => {
    saving.value = true;

    try {
        const formData = new FormData();

        Object.keys(form).forEach(key => {
            if (form[key] !== null && form[key] !== '') {
                if (Array.isArray(form[key])) {
                    formData.append(key, JSON.stringify(form[key]));
                } else {
                    formData.append(key, form[key]);
                }
            }
        });

        imageFiles.value.forEach(file => {
            formData.append('images[]', file);
        });

        if (isEdit.value) {
            await axios.post(`/api/admin/properties/${route.params.id}`, formData);
        } else {
            await axios.post('/api/admin/properties', formData);
        }

        router.push('/admin/propiedades');
    } catch (error) {
        console.error('Error saving property:', error);
        alert('Error al guardar la propiedad');
    } finally {
        saving.value = false;
    }
};
</script>
