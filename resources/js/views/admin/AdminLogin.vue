<template>
    <div
        class="min-h-screen flex items-center justify-center relative overflow-hidden bg-gray-50 -mt-20"
    >
        <!-- Background Elements -->
        <div
            class="absolute inset-0 bg-gradient-to-br from-primary-900 via-primary-800 to-accent-900"
        >
            <div class="absolute inset-0 bg-mesh opacity-60"></div>
            <div class="absolute inset-0 bg-grid opacity-30"></div>

            <!-- Floating Orbs -->
            <div
                class="absolute top-20 left-10 w-72 h-72 bg-primary-500/20 rounded-full blur-3xl animate-float"
            ></div>
            <div
                class="absolute bottom-20 right-10 w-96 h-96 bg-accent-500/20 rounded-full blur-3xl animate-float"
                style="animation-delay: 1s"
            ></div>
        </div>

        <!-- Login Card -->
        <div class="relative w-full max-w-md px-4 animate-scale-in">
            <div
                class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/20 shadow-2xl"
            >
                <!-- Branding -->
                <div class="text-center mb-8">
                    <router-link
                        to="/"
                        class="inline-flex items-center space-x-3 group mb-4"
                    >
                        <img
                            src="/favicon.png"
                            alt="SerraInnova Logo"
                            class="h-12 w-auto"
                        />
                        <span class="text-2xl font-bold text-white">
                            Serra<span class="text-emerald-300">Innova</span>
                        </span>
                    </router-link>
                    <h2 class="text-xl font-medium text-white/90">
                        Acceso Administrativo
                    </h2>
                    <p class="text-sm text-white/60 mt-2">
                        Gestiona tu inmobiliaria sostenible
                    </p>
                </div>

                <!-- Form -->
                <form @submit.prevent="handleSubmit" class="space-y-6">
                    <div>
                        <label
                            for="email"
                            class="block text-sm font-medium text-white/80 mb-2"
                            >Email Corporativo</label
                        >
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                            >
                                <svg
                                    class="h-5 w-5 text-white/50"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                                    />
                                </svg>
                            </div>
                            <input
                                v-model="form.email"
                                type="email"
                                id="email"
                                class="block w-full pl-10 pr-3 py-3 border border-white/20 rounded-xl leading-5 bg-white/5 text-white placeholder-white/40 focus:outline-none focus:bg-white/10 focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 sm:text-sm transition-colors"
                                placeholder="admin@serrainnova.es"
                                required
                            />
                        </div>
                    </div>

                    <div>
                        <label
                            for="password"
                            class="block text-sm font-medium text-white/80 mb-2"
                            >Contraseña</label
                        >
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                            >
                                <svg
                                    class="h-5 w-5 text-white/50"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                    />
                                </svg>
                            </div>
                            <input
                                v-model="form.password"
                                type="password"
                                id="password"
                                class="block w-full pl-10 pr-3 py-3 border border-white/20 rounded-xl leading-5 bg-white/5 text-white placeholder-white/40 focus:outline-none focus:bg-white/10 focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 sm:text-sm transition-colors"
                                placeholder="••••••••"
                                required
                            />
                        </div>
                    </div>

                    <div v-if="isRegistering" class="animate-fade-in">
                        <label
                            for="password_confirmation"
                            class="block text-sm font-medium text-white/80 mb-2"
                            >Confirmar Contraseña</label
                        >
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                            >
                                <svg
                                    class="h-5 w-5 text-white/50"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                    />
                                </svg>
                            </div>
                            <input
                                v-model="form.password_confirmation"
                                type="password"
                                id="password_confirmation"
                                class="block w-full pl-10 pr-3 py-3 border border-white/20 rounded-xl leading-5 bg-white/5 text-white placeholder-white/40 focus:outline-none focus:bg-white/10 focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 sm:text-sm transition-colors"
                                placeholder="••••••••"
                                :required="isRegistering"
                            />
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div
                        v-if="error"
                        class="bg-red-500/20 border border-red-500/50 rounded-lg p-3 flex items-center animate-fade-in"
                    >
                        <svg
                            class="w-5 h-5 text-red-400 mr-2"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                        <span class="text-sm text-red-200">{{ error }}</span>
                    </div>

                    <button
                        type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 shadow-lg shadow-emerald-500/30 transform hover:-translate-y-0.5 transition-all duration-200"
                        :disabled="loading"
                    >
                        <svg
                            v-if="loading"
                            class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
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
                                ? isRegistering
                                    ? "Creando cuenta..."
                                    : "Iniciando sesión..."
                                : isRegistering
                                  ? "Registrarse"
                                  : "Acceder"
                        }}
                    </button>

                    <div class="flex justify-center mt-4">
                        <button
                            type="button"
                            @click="toggleMode"
                            class="text-sm text-emerald-200 hover:text-white transition-colors focus:outline-none"
                        >
                            {{
                                isRegistering
                                    ? "¿Ya tienes cuenta? Inicia sesión"
                                    : "¿No tienes cuenta? Regístrate aquí"
                            }}
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <router-link
                        to="/"
                        class="text-sm text-white/50 hover:text-white transition-colors"
                    >
                        ← Volver a la página principal
                    </router-link>
                </div>
            </div>

            <!-- Safe Badge -->
            <div class="mt-6 flex justify-center">
                <div
                    class="flex items-center px-3 py-1 bg-white/5 rounded-full border border-white/10 backdrop-blur-md"
                >
                    <svg
                        class="w-3 h-3 text-emerald-400 mr-2"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <span class="text-xs text-white/60">Área Segura SSL</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();
const isRegistering = ref(false);
const form = ref({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});
const error = ref(null);
const loading = ref(false);

const toggleMode = () => {
    isRegistering.value = !isRegistering.value;
    error.value = null;
    form.value = {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
    };
};

const handleSubmit = async () => {
    loading.value = true;
    error.value = null;

    // Simulate API delay
    await new Promise((resolve) => setTimeout(resolve, 800));

    if (isRegistering.value) {
        if (form.value.password !== form.value.password_confirmation) {
            error.value = "Las contraseñas no coinciden.";
            loading.value = false;
            return;
        }
        // Mock Registration
        if (form.value.email.includes("@") && form.value.password.length >= 6) {
            sessionStorage.setItem("isAdminAuthenticated", "true");
            // Optionally store user details in sessionStorage to show in dashboard
            sessionStorage.setItem(
                "adminUser",
                JSON.stringify({
                    name: form.value.name,
                    email: form.value.email,
                }),
            );
            router.push("/admin");
        } else {
            error.value = "Por favor, completa todos los campos correctamente.";
            loading.value = false;
        }
    } else {
        // Mock Login
        // In a real app, this would hit the API
        // For now, accept any valid email with the hardcoded password OR the newly registered credentials (conceptually)
        // Since we don't have a backend DB for this mock, we stick to the hardcoded password or just loose validation for demo
        if (
            form.value.password === "contra123" ||
            form.value.password.length >= 6
        ) {
            sessionStorage.setItem("isAdminAuthenticated", "true");
            router.push("/admin");
        } else {
            error.value = "Credenciales incorrectas.";
            loading.value = false;
        }
    }
};
</script>
