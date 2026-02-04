<template>
    <div
        class="inline-flex items-center px-2 py-1 rounded text-white text-sm font-bold"
        :class="labelClass"
    >
        {{ rating }}
    </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    rating: {
        type: String,
        required: true,
        validator: (value) => ['A', 'B', 'C', 'D', 'E', 'F', 'G'].includes(value.toUpperCase())
    }
});

const labelClass = computed(() => {
    const classes = {
        'A': 'bg-[var(--color-energy-a)]',
        'B': 'bg-[var(--color-energy-b)]',
        'C': 'bg-[var(--color-energy-c)] text-gray-800',
        'D': 'bg-[var(--color-energy-d)] text-gray-800',
        'E': 'bg-[var(--color-energy-e)]',
        'F': 'bg-[var(--color-energy-f)]',
        'G': 'bg-[var(--color-energy-g)]'
    };
    return classes[props.rating.toUpperCase()] || 'bg-gray-500';
});
</script>
