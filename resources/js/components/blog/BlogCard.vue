<template>
    <router-link
        :to="`/blog/${post.slug}`"
        class="group bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-shadow"
    >
        <!-- Image -->
        <div class="relative h-48 overflow-hidden">
            <img
                :src="post.image || '/images/placeholder-blog.jpg'"
                :alt="post.title"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
            />
            <!-- Category Badge -->
            <div class="absolute top-3 left-3">
                <span class="px-2 py-1 bg-primary-600 text-white text-xs font-medium rounded">
                    {{ post.category }}
                </span>
            </div>
        </div>

        <!-- Content -->
        <div class="p-4">
            <div class="text-sm text-gray-500 mb-2">
                {{ formatDate(post.published_at) }}
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-primary-600 transition-colors line-clamp-2">
                {{ post.title }}
            </h3>
            <p class="text-gray-600 text-sm line-clamp-3">
                {{ post.excerpt }}
            </p>
        </div>
    </router-link>
</template>

<script setup>
defineProps({
    post: {
        type: Object,
        required: true
    }
});

const formatDate = (date) => {
    return new Date(date).toLocaleDateString('es-ES', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
};
</script>
