<template>
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
            <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center">
                <div
                    class="w-10 h-10 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center mr-3"
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
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
                        />
                    </svg>
                </div>
                {{ isEditing ? "Editar Usuario" : "Crear Nuevo Usuario" }}
            </h2>

            <form @submit.prevent="handleSubmit" class="space-y-6">
                <!-- Personal Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label
                            class="block text-sm font-medium text-slate-700 mb-2"
                            >Nombre Completo</label
                        >
                        <input
                            v-model="form.name"
                            type="text"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors bg-slate-50 focus:bg-white"
                            placeholder="Ej: Juan Pérez"
                        />
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-slate-700 mb-2"
                            >Email</label
                        >
                        <input
                            v-model="form.email"
                            type="email"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors bg-slate-50 focus:bg-white"
                            placeholder="juan@ejemplo.com"
                        />
                    </div>
                </div>

                <!-- Password -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            {{
                                isEditing
                                    ? "Nueva Contraseña (opcional)"
                                    : "Contraseña"
                            }}
                        </label>
                        <input
                            v-model="form.password"
                            type="password"
                            :required="!isEditing"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors bg-slate-50 focus:bg-white"
                            placeholder="••••••••"
                        />
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-slate-700 mb-2"
                            >Confirmar Contraseña</label
                        >
                        <input
                            v-model="form.password_confirmation"
                            type="password"
                            :required="!isEditing || form.password"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors bg-slate-50 focus:bg-white"
                            placeholder="••••••••"
                        />
                    </div>
                </div>

                <!-- Role & Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label
                            class="block text-sm font-medium text-slate-700 mb-2"
                            >Rol</label
                        >
                        <select
                            v-model="form.role"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors bg-slate-50 focus:bg-white appearance-none"
                        >
                            <option value="user">Usuario</option>
                            <option value="admin">Administrador</option>
                            <option value="editor">Editor</option>
                        </select>
                    </div>
                    <div class="flex items-end pb-3">
                        <label class="flex items-center cursor-pointer">
                            <input
                                type="checkbox"
                                v-model="form.is_active"
                                class="sr-only peer"
                            />
                            <div
                                class="relative w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"
                            ></div>
                            <span
                                class="ms-3 text-sm font-medium text-slate-700"
                                >Usuario Activo</span
                            >
                        </label>
                    </div>
                </div>

                <!-- Actions -->
                <div
                    class="flex items-center justify-end gap-4 pt-6 mt-6 border-t border-slate-100"
                >
                    <router-link
                        to="/admin/usuarios"
                        class="px-6 py-3 rounded-xl text-slate-600 font-medium hover:bg-slate-50 transition-colors"
                    >
                        Cancelar
                    </router-link>
                    <button
                        type="submit"
                        :disabled="loading"
                        class="px-8 py-3 bg-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-emerald-500/30 hover:bg-emerald-700 hover:shadow-emerald-600/40 transform hover:-translate-y-0.5 transition-all disabled:opacity-50 disabled:cursor-not-allowed flex items-center"
                    >
                        <svg
                            v-if="loading"
                            class="animate-spin -ml-1 mr-2 h-4 w-4 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <circle
                                class="opacity-25"
                                cx="12"
                                cy="12"
                                r="10"
                                stroke="currentColor"
                                stroke-width="4"
                            ></circle>
                            <path
                                class="opacity-75"
                                fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                            ></path>
                        </svg>
                        {{
                            loading
                                ? "Guardando..."
                                : isEditing
                                  ? "Actualizar Usuario"
                                  : "Crear Usuario"
                        }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { computed, onMounted, ref } from "vue";
import { useRoute, useRouter } from "vue-router";

const route = useRoute();
const router = useRouter();

const isEditing = computed(() => route.params.id !== undefined);
const loading = ref(false);

const form = ref({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    role: "user",
    is_active: true,
});

onMounted(async () => {
    if (isEditing.value) {
        try {
            loading.value = true;
            const response = await axios.get(
                `/api/admin/users/${route.params.id}`,
            );
            form.value = {
                ...response.data,
                password: "", // Don't fill password on edit
                password_confirmation: "",
            };
        } catch (error) {
            console.error("Error loading user:", error);
            alert("Error al cargar los datos del usuario");
            router.push("/admin/usuarios");
        } finally {
            loading.value = false;
        }
    }
});

const handleSubmit = async () => {
    if (form.value.password !== form.value.password_confirmation) {
        alert("Las contraseñas no coinciden");
        return;
    }

    loading.value = true;
    try {
        if (isEditing.value) {
            await axios.put(`/api/admin/users/${route.params.id}`, form.value);
            alert("Usuario actualizado correctamente");
        } else {
            await axios.post("/api/admin/users", form.value);
            alert("Usuario creado correctamente");
        }
        router.push("/admin/usuarios");
    } catch (error) {
        console.error("Error saving user:", error);
        alert(error.response?.data?.message || "Error al guardar el usuario");
    } finally {
        loading.value = false;
    }
};
</script>
