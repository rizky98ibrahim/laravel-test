<template>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">
            {{ headerTitle }}
        </h1>
    </div>
</template>

<script setup>
import { useRoute } from "vue-router";
import { computed } from "vue";

const route = useRoute();

const headerTitle = computed(() => {
    const { meta } = route;

    if (meta && meta.title) {
        return meta.title;
    }

    return "Header";
});
</script>
