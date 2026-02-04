<template>
    <div class="bg-gray-50 min-h-screen">
        <!-- Hero -->
        <section class="bg-primary-700 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Blog de Sostenibilidad</h1>
                <p class="text-primary-100 text-lg max-w-2xl">
                    Actualidad sobre eficiencia energética, normativas, subvenciones y consejos para un hogar más sostenible.
                </p>
            </div>
        </section>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Categories Filter -->
            <div class="flex flex-wrap gap-2 mb-8">
                <button
                    @click="selectedCategory = ''"
                    :class="[
                        'px-4 py-2 rounded-full text-sm font-medium transition-colors',
                        selectedCategory === '' ? 'bg-primary-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-100'
                    ]"
                >
                    Todos
                </button>
                <button
                    v-for="category in categories"
                    :key="category"
                    @click="selectedCategory = category"
                    :class="[
                        'px-4 py-2 rounded-full text-sm font-medium transition-colors',
                        selectedCategory === category ? 'bg-primary-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-100'
                    ]"
                >
                    {{ category }}
                </button>
            </div>

            <!-- Loading -->
            <div v-if="store.loading" class="flex justify-center py-12">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary-600"></div>
            </div>

            <!-- Posts Grid -->
            <div v-else>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <BlogCard
                        v-for="post in store.posts"
                        :key="post.id"
                        :post="post"
                    />
                </div>

                <!-- Empty state -->
                <div v-if="store.posts.length === 0" class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No hay artículos</h3>
                    <p class="text-gray-600">Próximamente publicaremos contenido en esta categoría</p>
                </div>

                <!-- Pagination -->
                <div v-if="store.pagination.last_page > 1" class="mt-12 flex justify-center">
                    <nav class="flex items-center gap-2">
                        <button
                            @click="changePage(store.pagination.current_page - 1)"
                            :disabled="store.pagination.current_page === 1"
                            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            Anterior
                        </button>

                        <span class="px-4 py-2 text-gray-600">
                            Página {{ store.pagination.current_page }} de {{ store.pagination.last_page }}
                        </span>

                        <button
                            @click="changePage(store.pagination.current_page + 1)"
                            :disabled="store.pagination.current_page === store.pagination.last_page"
                            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            Siguiente
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, watch, onMounted } from 'vue';
import BlogCard from '@/components/blog/BlogCard.vue';
import { useBlogStore } from '@/stores/blog';

const store = useBlogStore();
const selectedCategory = ref('');

const categories = [
    'Eficiencia Energética',
    'Subvenciones',
    'Normativa',
    'Consejos de Ahorro',
    'Agenda 2030',
    'Domótica Verde'
];

onMounted(() => {
    store.fetchPosts();
});

watch(selectedCategory, (newCategory) => {
    store.fetchPosts(1, newCategory);
});

const changePage = (page) => {
    store.fetchPosts(page, selectedCategory.value);
};
</script>
