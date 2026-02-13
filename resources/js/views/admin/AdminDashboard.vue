<template>
    <div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Properties Stats -->
            <div
                class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col justify-between hover:shadow-lg transition-shadow duration-300"
            >
                <div class="flex items-start justify-between">
                    <div>
                        <p
                            class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1"
                        >
                            Propiedades
                        </p>
                        <h3 class="text-3xl font-bold text-slate-800">
                            {{ stats.properties }}
                        </h3>
                    </div>
                    <div class="p-3 bg-blue-50 rounded-xl text-blue-600">
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
                <div
                    class="mt-4 flex items-center text-xs font-medium text-emerald-600 bg-emerald-50 w-fit px-2 py-1 rounded-lg"
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
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"
                        />
                    </svg>
                    <span>+12% vs mes anterior</span>
                </div>
            </div>

            <!-- Blog Posts -->
            <div
                class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col justify-between hover:shadow-lg transition-shadow duration-300"
            >
                <div class="flex items-start justify-between">
                    <div>
                        <p
                            class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1"
                        >
                            Artículos
                        </p>
                        <h3 class="text-3xl font-bold text-slate-800">
                            {{ stats.posts }}
                        </h3>
                    </div>
                    <div class="p-3 bg-purple-50 rounded-xl text-purple-600">
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
                <div
                    class="mt-4 flex items-center text-xs font-medium text-slate-500 bg-slate-50 w-fit px-2 py-1 rounded-lg"
                >
                    <span>3 borradores pendientes</span>
                </div>
            </div>

            <!-- Messages -->
            <div
                class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col justify-between hover:shadow-lg transition-shadow duration-300"
            >
                <div class="flex items-start justify-between">
                    <div>
                        <p
                            class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1"
                        >
                            Mensajes
                        </p>
                        <h3 class="text-3xl font-bold text-slate-800">
                            {{ stats.newContacts }}
                        </h3>
                    </div>
                    <div class="p-3 bg-amber-50 rounded-xl text-amber-600">
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
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                            />
                        </svg>
                    </div>
                </div>
                <div
                    class="mt-4 flex items-center text-xs font-medium text-amber-600 bg-amber-50 w-fit px-2 py-1 rounded-lg"
                >
                    <span>5 sin leer</span>
                </div>
            </div>

            <!-- Sales -->
            <div
                class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col justify-between hover:shadow-lg transition-shadow duration-300"
            >
                <div class="flex items-start justify-between">
                    <div>
                        <p
                            class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1"
                        >
                            Operaciones
                        </p>
                        <h3 class="text-3xl font-bold text-slate-800">
                            {{ stats.salesThisMonth }}
                        </h3>
                    </div>
                    <div class="p-3 bg-emerald-50 rounded-xl text-emerald-600">
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
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                    </div>
                </div>
                <div
                    class="mt-4 flex items-center text-xs font-medium text-emerald-600 bg-emerald-50 w-fit px-2 py-1 rounded-lg"
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
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"
                        />
                    </svg>
                    <span>Objetivo mensual cumplido</span>
                </div>
            </div>
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

            <!-- Recent Activity -->
            <div
                class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-100 p-6"
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
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                    Actividad Reciente
                </h3>

                <div
                    class="relative pl-6 border-l-2 border-slate-100 space-y-8"
                >
                    <div
                        v-if="recentContacts.length === 0"
                        class="text-center py-8"
                    >
                        <p class="text-slate-400">No hay actividad reciente</p>
                    </div>

                    <div
                        v-for="(contact, index) in recentContacts"
                        :key="contact.id || index"
                        class="relative"
                    >
                        <div
                            class="absolute -left-[29px] top-1 w-4 h-4 rounded-full border-2 border-white ring-1 ring-slate-200"
                            :class="
                                index === 0 ? 'bg-emerald-500' : 'bg-slate-300'
                            "
                        ></div>

                        <div
                            class="bg-slate-50 rounded-xl p-4 hover:bg-slate-100 transition-colors cursor-pointer"
                        >
                            <div class="flex justify-between items-start mb-1">
                                <span
                                    class="text-sm font-semibold text-slate-800"
                                    >{{ contact.name }}</span
                                >
                                <span class="text-xs text-slate-400">{{
                                    formatDate(contact.created_at)
                                }}</span>
                            </div>
                            <p class="text-sm text-slate-600 line-clamp-2">
                                {{ contact.message }}
                            </p>
                            <div class="mt-2 flex items-center gap-2">
                                <span
                                    class="text-[10px] uppercase font-bold text-slate-400 bg-white px-2 py-0.5 rounded border border-slate-200"
                                    >Contacto</span
                                >
                                <span
                                    class="text-[10px] font-medium text-slate-500"
                                    >{{ contact.email }}</span
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <button
                        class="text-sm text-emerald-600 font-medium hover:text-emerald-700 transition-colors"
                    >
                        Ver toda la actividad
                    </button>
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
    newContacts: 0,
    salesThisMonth: 0,
});

const recentContacts = ref([]);

onMounted(async () => {
    try {
        const contactStats = await axios.get("/api/admin/contacts/stats");
        stats.value.newContacts = contactStats.data.pending || 0;

        // Mock data for other stats since we don't have endpoints yet
        stats.value.properties = 24;
        stats.value.posts = 12;
        stats.value.salesThisMonth = 3;

        const contacts = await axios.get("/api/admin/contacts?per_page=5");
        recentContacts.value = contacts.data.data?.slice(0, 3) || [];
    } catch (error) {
        console.error("Error loading dashboard data:", error);
        // Fallback data for demo
        recentContacts.value = [
            {
                id: 1,
                name: "María García",
                email: "maria@example.com",
                message: "Estoy interesada en la villa ecológica de Valencia.",
                created_at: new Date(),
            },
            {
                id: 2,
                name: "Juan López",
                email: "juan@example.com",
                message: "¿Realizan certificaciones energéticas?",
                created_at: new Date(Date.now() - 86400000),
            },
        ];
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
</script>
