<template>
    <div>
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-gray-900">
                {{ isEdit ? 'Editar Artículo' : 'Nuevo Artículo' }}
            </h1>
            <router-link to="/admin/blog" class="text-gray-600 hover:text-gray-900">
                Volver al listado
            </router-link>
        </div>

        <form @submit.prevent="submitForm" class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Título *</label>
                        <input
                            v-model="form.title"
                            type="text"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Extracto *</label>
                        <textarea
                            v-model="form.excerpt"
                            rows="2"
                            required
                            maxlength="500"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                            placeholder="Breve descripción del artículo..."
                        ></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Contenido *</label>
                        <textarea
                            v-model="form.content"
                            rows="15"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                            placeholder="Contenido completo del artículo (soporta HTML)..."
                        ></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Categoría *</label>
                            <select
                                v-model="form.category"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                            >
                                <option value="">Selecciona...</option>
                                <option value="Eficiencia Energética">Eficiencia Energética</option>
                                <option value="Subvenciones">Subvenciones</option>
                                <option value="Normativa">Normativa</option>
                                <option value="Consejos de Ahorro">Consejos de Ahorro</option>
                                <option value="Agenda 2030">Agenda 2030</option>
                                <option value="Domótica Verde">Domótica Verde</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Imagen destacada</label>
                            <input
                                type="file"
                                accept="image/*"
                                @change="handleImage"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary-50 file:text-primary-700"
                            />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Etiquetas (separadas por comas)</label>
                        <input
                            v-model="tagsInput"
                            type="text"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                            placeholder="sostenibilidad, ahorro, energía"
                        />
                    </div>

                    <div class="flex items-center gap-6">
                        <label class="flex items-center">
                            <input
                                type="checkbox"
                                v-model="form.is_published"
                                class="rounded text-primary-600 focus:ring-primary-500"
                            />
                            <span class="ml-2 text-gray-700">Publicar artículo</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <router-link
                    to="/admin/blog"
                    class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50"
                >
                    Cancelar
                </router-link>
                <button
                    type="submit"
                    :disabled="saving"
                    class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 disabled:opacity-50"
                >
                    {{ saving ? 'Guardando...' : (isEdit ? 'Actualizar' : 'Crear artículo') }}
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
const imageFile = ref(null);
const tagsInput = ref('');

const form = reactive({
    title: '',
    excerpt: '',
    content: '',
    category: '',
    tags: [],
    is_published: false
});

onMounted(async () => {
    if (isEdit.value) {
        try {
            const response = await axios.get(`/api/admin/blog/${route.params.id}`);
            Object.assign(form, response.data);
            if (response.data.tags) {
                tagsInput.value = response.data.tags.join(', ');
            }
        } catch (error) {
            console.error('Error loading post:', error);
        }
    }
});

const handleImage = (event) => {
    imageFile.value = event.target.files[0];
};

const submitForm = async () => {
    saving.value = true;

    try {
        const formData = new FormData();

        formData.append('title', form.title);
        formData.append('excerpt', form.excerpt);
        formData.append('content', form.content);
        formData.append('category', form.category);
        formData.append('is_published', form.is_published ? '1' : '0');

        if (tagsInput.value) {
            const tags = tagsInput.value.split(',').map(t => t.trim()).filter(t => t);
            formData.append('tags', JSON.stringify(tags));
        }

        if (imageFile.value) {
            formData.append('image', imageFile.value);
        }

        if (isEdit.value) {
            await axios.post(`/api/admin/blog/${route.params.id}`, formData);
        } else {
            await axios.post('/api/admin/blog', formData);
        }

        router.push('/admin/blog');
    } catch (error) {
        console.error('Error saving post:', error);
        alert('Error al guardar el artículo');
    } finally {
        saving.value = false;
    }
};
</script>
