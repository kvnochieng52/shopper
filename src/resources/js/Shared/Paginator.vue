<template>
    <li>
        <template v-for="(link, linkKey) in Links" :key="linkKey">
            <Link
                :href="link.url"
                v-html="link.label"
                class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                :class="{
                    'bg-gray-800': link.active == true,
                }"
            >
            </Link>
        </template>
    </li>
</template>
<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    Links: Array,
});
</script>
