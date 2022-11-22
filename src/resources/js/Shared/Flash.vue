<template>
    <div class="container mx-auto">
        <div
            v-if="$page.props.flash.success"
            class="bg-green-600 text-white p-2 text-center font-bold"
        >
            {{ $page.props.flash.success }}
        </div>
    </div>
</template>

<script setup></script>
