<template>
    <div class="min-h-screen bg-gray-50">
        <AppHeader v-if="!isAdminRoute" />
        <main>
            <router-view v-slot="{ Component }">
                <transition name="fade" mode="out-in">
                    <component :is="Component" />
                </transition>
            </router-view>
        </main>
        <AppFooter v-if="!isAdminRoute" />
    </div>
</template>

<script setup>
import { computed } from "vue";
import { useRoute } from "vue-router";
import AppFooter from "./components/layout/AppFooter.vue";
import AppHeader from "./components/layout/AppHeader.vue";

const route = useRoute();
const isAdminRoute = computed(() => route.path.startsWith("/admin"));
</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
