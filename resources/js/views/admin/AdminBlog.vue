<template>
    <div>
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Artículos del Blog</h1>
            <router-link
                to="/admin/blog/crear"
                class="inline-flex items-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors"
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
                        d="M12 4v16m8-8H4"
                    />
                </svg>
                Nuevo artículo
            </router-link>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Artículo
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Categoría
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Estado
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Fecha
                            </th>
                            <th
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr
                            v-for="post in posts"
                            :key="post.id"
                            class="hover:bg-gray-50"
                        >
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-12 w-12 flex-shrink-0">
                                        <img
                                            :src="
                                                post.image ||
                                                '/images/placeholder-blog.jpg'
                                            "
                                            class="h-12 w-12 rounded-lg object-cover"
                                        />
                                    </div>
                                    <div class="ml-4">
                                        <div
                                            class="text-sm font-medium text-gray-900"
                                        >
                                            {{ post.title }}
                                        </div>
                                        <div
                                            class="text-sm text-gray-500 line-clamp-1"
                                        >
                                            {{ post.excerpt }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 py-1 bg-primary-100 text-primary-700 text-xs rounded-full"
                                >
                                    {{ post.category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 py-1 text-xs font-medium rounded-full"
                                    :class="
                                        post.is_published
                                            ? 'bg-green-100 text-green-800'
                                            : 'bg-yellow-100 text-yellow-800'
                                    "
                                >
                                    {{
                                        post.is_published
                                            ? "Publicado"
                                            : "Borrador"
                                    }}
                                </span>
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{
                                    formatDate(
                                        post.published_at || post.created_at,
                                    )
                                }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                            >
                                <router-link
                                    :to="`/admin/blog/${post.id}/editar`"
                                    class="text-primary-600 hover:text-primary-900 mr-4"
                                >
                                    Editar
                                </router-link>
                                <button
                                    @click="deletePost(post.id)"
                                    class="text-red-600 hover:text-red-900"
                                >
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Empty state -->
            <div v-if="posts.length === 0" class="text-center py-12">
                <svg
                    class="w-12 h-12 mx-auto text-gray-400 mb-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
                    />
                </svg>
                <p class="text-gray-500">No hay artículos</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";

const posts = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get("/api/admin/blog");
        posts.value = response.data.data;
    } catch (error) {
        console.error("Error loading posts:", error);
    }
});

const formatDate = (date) => {
    return new Date(date).toLocaleDateString("es-ES");
};

const deletePost = async (id) => {
    if (!confirm("¿Estás seguro de eliminar este artículo?")) return;

    try {
        await axios.delete(`/api/admin/blog/${id}`);
        posts.value = posts.value.filter((p) => p.id !== id);
    } catch (error) {
        console.error("Error deleting post:", error);
    }
};
</script>
