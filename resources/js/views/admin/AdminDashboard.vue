<template>
    <div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Properties Stats -->
            <router-link
                to="/admin/propiedades"
                class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col justify-between hover:shadow-lg transition-transform hover:-translate-y-1 duration-300 group cursor-pointer"
            >
                <div class="flex items-start justify-between">
                    <div>
                        <p
                            class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1"
                        >
                            Propiedades
                        </p>
                        <h3
                            class="text-3xl font-bold text-slate-800 group-hover:text-primary-600 transition-colors"
                        >
                            {{ stats.properties }}
                        </h3>
                    </div>
                    <div
                        class="p-3 bg-blue-50 rounded-xl text-blue-600 group-hover:bg-blue-100 transition-colors"
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
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                            />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-slate-500">
                    <span>Gestionar catálogo inmobiliario →</span>
                </div>
            </router-link>

            <!-- Blog Posts -->
            <router-link
                to="/admin/blog"
                class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col justify-between hover:shadow-lg transition-transform hover:-translate-y-1 duration-300 group cursor-pointer"
            >
                <div class="flex items-start justify-between">
                    <div>
                        <p
                            class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1"
                        >
                            Artículos
                        </p>
                        <h3
                            class="text-3xl font-bold text-slate-800 group-hover:text-purple-600 transition-colors"
                        >
                            {{ stats.posts }}
                        </h3>
                    </div>
                    <div
                        class="p-3 bg-purple-50 rounded-xl text-purple-600 group-hover:bg-purple-100 transition-colors"
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
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
                            />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-slate-500">
                    <span>Gestionar noticias y blog →</span>
                </div>
            </router-link>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Quick Actions -->
            <div
                class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6"
            >
                <h3
                    class="text-lg font-bold text-slate-800 mb-6 flex items-center"
                >
                    <svg
                        class="w-5 h-5 mr-2 text-slate-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"
                        />
                    </svg>
                    Acciones Rápidas
                </h3>
                <div class="space-y-4">
                    <router-link
                        to="/admin/propiedades/crear"
                        class="group flex items-center p-4 rounded-xl border border-slate-100 bg-slate-50 hover:bg-blue-50 hover:border-blue-100 transition-all duration-200"
                    >
                        <div
                            class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"
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
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                />
                            </svg>
                        </div>
                        <div>
                            <h4
                                class="font-semibold text-slate-800 group-hover:text-blue-700"
                            >
                                Nueva Propiedad
                            </h4>
                            <p class="text-xs text-slate-500">
                                Añadir inmueble al catálogo
                            </p>
                        </div>
                        <svg
                            class="w-5 h-5 ml-auto text-slate-300 group-hover:text-blue-400 transform group-hover:translate-x-1 transition-all"
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
                    </router-link>

                    <router-link
                        to="/admin/blog/crear"
                        class="group flex items-center p-4 rounded-xl border border-slate-100 bg-slate-50 hover:bg-purple-50 hover:border-purple-100 transition-all duration-200"
                    >
                        <div
                            class="w-10 h-10 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center mr-4 group-hover:scale-110 transition-transform"
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
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                />
                            </svg>
                        </div>
                        <div>
                            <h4
                                class="font-semibold text-slate-800 group-hover:text-purple-700"
                            >
                                Nuevo Artículo
                            </h4>
                            <p class="text-xs text-slate-500">
                                Publicar en el blog
                            </p>
                        </div>
                        <svg
                            class="w-5 h-5 ml-auto text-slate-300 group-hover:text-purple-400 transform group-hover:translate-x-1 transition-all"
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
                    </router-link>
                </div>
            </div>

            <!-- Recent Activity (Items < 24h) -->
            <div
                class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-100 p-6"
            >
                <div class="flex items-center justify-between mb-6">
                    <h3
                        class="text-lg font-bold text-slate-800 flex items-center"
                    >
                        <svg
                            class="w-5 h-5 mr-2 text-slate-400"
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
                        Novedades (Últimas 24h)
                    </h3>
                </div>

                <div
                    class="relative pl-6 border-l-2 border-slate-100 space-y-8"
                >
                    <div
                        v-if="recentItems.length === 0"
                        class="text-center py-8"
                    >
                        <p class="text-slate-400">
                            No hay contenido nuevo en las últimas 24 horas.
                        </p>
                    </div>

                    <div
                        v-for="(item, index) in recentItems"
                        :key="item.id + item.type"
                        class="relative"
                    >
                        <div
                            class="absolute -left-[29px] top-1 w-4 h-4 rounded-full border-2 border-white ring-1 ring-slate-200"
                            :class="
                                item.type === 'Propiedad'
                                    ? 'bg-blue-500'
                                    : 'bg-purple-500'
                            "
                        ></div>

                        <div
                            class="bg-slate-50 rounded-xl p-4 hover:bg-slate-100 transition-colors"
                        >
                            <div class="flex justify-between items-start mb-1">
                                <span
                                    class="text-sm font-semibold text-slate-800"
                                    >{{ item.title }}</span
                                >
                                <span class="text-xs text-slate-400">{{
                                    formatDate(item.created_at)
                                }}</span>
                            </div>
                            <div class="mt-2 flex items-center gap-2">
                                <span
                                    class="text-[10px] uppercase font-bold text-white px-2 py-0.5 rounded"
                                    :class="
                                        item.type === 'Propiedad'
                                            ? 'bg-blue-500'
                                            : 'bg-purple-500'
                                    "
                                    >{{ item.type }}</span
                                >
                                <span
                                    v-if="item.subtitle"
                                    class="text-[10px] font-medium text-slate-500"
                                    >{{ item.subtitle }}</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";

const stats = ref({
    properties: 0,
    posts: 0,
});

const recentItems = ref([]);

onMounted(async () => {
    try {
        const now = new Date();
        const oneDayAgo = new Date(now.getTime() - 24 * 60 * 60 * 1000);

        // Fetch Properties
        const propertiesRes = await axios.get("/api/admin/properties");
        const properties = propertiesRes.data.data;
        stats.value.properties = propertiesRes.data.total;

        // Fetch Blog Posts
        const postsRes = await axios.get("/api/blog"); // Using public endpoint as admin might not have separate list endpoint yet, or use /api/admin/blog if exists. let's check store... store uses /api/blog. Let's use /api/admin/blog but if it fails revert. Actually the store used /api/blog for fetchPosts. Admin store actions use /api/admin/blog for mutations. Let's try /api/blog for list as it likely returns all for now.
        // Wait, the AdminProperties.vue uses /api/admin/properties.
        // The Blog store uses /api/blog. Let's use /api/blog for posts.
        const posts = postsRes.data.data;
        stats.value.posts = postsRes.data.total;

        // Filter Recent Properties
        const recentProperties = properties
            .filter((p) => new Date(p.created_at) > oneDayAgo)
            .map((p) => ({
                id: p.id,
                title: p.title,
                type: "Propiedad",
                subtitle: `${p.status} - ${formatNumber(p.price)}€`,
                created_at: p.created_at,
            }));

        // Filter Recent Posts
        const recentPosts = posts
            .filter((p) => new Date(p.created_at) > oneDayAgo)
            .map((p) => ({
                id: p.id,
                title: p.title,
                type: "Artículo",
                subtitle: `Categoría: ${p.category}`,
                created_at: p.created_at,
            }));

        // Combine and Sort
        const allRecent = [...recentProperties, ...recentPosts].sort(
            (a, b) => new Date(b.created_at) - new Date(a.created_at),
        );

        // Take top 5 if too many
        recentItems.value = allRecent.slice(0, 10);
    } catch (error) {
        console.error("Error loading dashboard data:", error);
    }
});

const formatDate = (date) => {
    if (!date) return "";
    return new Date(date).toLocaleDateString("es-ES", {
        day: "numeric",
        month: "short",
        hour: "2-digit",
        minute: "2-digit",
    });
};

const formatNumber = (num) => {
    return new Intl.NumberFormat("es-ES").format(num);
};
</script>
