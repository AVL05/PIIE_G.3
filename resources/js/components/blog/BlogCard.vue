<template>
    <router-link
        :to="`/blog/${post.slug}`"
        class="group block bg-white rounded-3xl shadow-sm overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2"
    >
        <!-- Image Container -->
        <div class="relative h-52 overflow-hidden">
            <img
                :src="post.image || '/images/placeholder-blog.jpg'"
                :alt="post.title"
                @error="$event.target.src = '/images/placeholder-blog.jpg'"
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
            />
            <div
                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"
            ></div>

            <!-- Category Badge -->
            <div class="absolute top-4 left-4">
                <span
                    class="px-4 py-1.5 bg-gradient-to-r from-primary-500 to-accent-500 text-white text-xs font-bold rounded-full shadow-lg"
                >
                    {{ post.category }}
                </span>
            </div>

            <!-- Read Time -->
            <div class="absolute top-4 right-4">
                <span
                    class="px-3 py-1.5 bg-white/90 backdrop-blur-sm text-gray-700 text-xs font-medium rounded-full flex items-center"
                >
                    <svg
                        class="w-3 h-3 mr-1"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                    {{ post.read_time || "5" }} min
                </span>
            </div>

            <!-- Date overlay -->
            <div class="absolute bottom-4 left-4">
                <div class="flex items-center text-white/90 text-sm">
                    <svg
                        class="w-4 h-4 mr-2"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                        />
                    </svg>
                    {{ formatDate(post.published_at) }}
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <!-- Title -->
            <h3
                class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary-600 transition-colors line-clamp-2 leading-tight"
            >
                {{ post.title }}
            </h3>

            <!-- Excerpt -->
            <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4">
                {{ post.excerpt }}
            </p>

            <!-- Footer -->
            <div
                class="flex items-center justify-between pt-4 border-t border-gray-100"
            >
                <!-- Author (if available) -->
                <div v-if="post.author" class="flex items-center">
                    <div
                        class="w-8 h-8 bg-gradient-to-br from-primary-400 to-accent-400 rounded-full flex items-center justify-center text-white text-xs font-bold mr-2"
                    >
                        {{ getInitials(post.author) }}
                    </div>
                    <span class="text-sm text-gray-600">{{ post.author }}</span>
                </div>
                <div v-else class="flex items-center">
                    <div
                        class="w-8 h-8 bg-gradient-to-br from-primary-400 to-accent-400 rounded-full flex items-center justify-center text-white text-xs font-bold mr-2"
                    >
                        SI
                    </div>
                    <span class="text-sm text-gray-600">SerraInnova</span>
                </div>

                <!-- Read More Link -->
                <span
                    class="inline-flex items-center text-primary-600 text-sm font-semibold group-hover:text-primary-700 transition-colors"
                >
                    Leer más
                    <svg
                        class="w-4 h-4 ml-1 transition-transform group-hover:translate-x-1"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"
                        />
                    </svg>
                </span>
            </div>
        </div>
    </router-link>
</template>

<script setup>
defineProps({
    post: {
        type: Object,
        required: true,
    },
});

const formatDate = (date) => {
    return new Date(date).toLocaleDateString("es-ES", {
        year: "numeric",
        month: "short",
        day: "numeric",
    });
};

const getInitials = (name) => {
    if (!name) return "SI";
    return name
        .split(" ")
        .map((n) => n[0])
        .join("")
        .toUpperCase()
        .slice(0, 2);
};
</script>
