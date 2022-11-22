<template>
    <div class="container mx-auto">
        <h4 class="font-bold pb-2 mt-12 border-b border-gray-200">
            Loading... Please Wait
        </h4>
        <div class="mt-8 grid lg:grid-cols-4 gap-10">
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700"
                v-for="n in containersCount"
                :key="n"
            >
                <div class="skeleton skeleton-text" style="height: 130px"></div>

                <div style="padding: 7px">
                    <div class="skeleton skeleton-text"></div>

                    <div
                        class="skeleton skeleton-text skeleton-text__body"
                    ></div>

                    <div
                        class="skeleton skeleton-text skeleton-footer"
                        style="height: 15px"
                    ></div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.skeleton {
    animation: skeleton-loading 1s linear infinite alternate;
}

@keyframes skeleton-loading {
    0% {
        background-color: hsl(200, 20%, 80%);
    }
    100% {
        background-color: hsl(200, 20%, 95%);
    }
}

.skeleton-text {
    width: 100%;
    height: 0.7rem;
    margin-bottom: 0.5rem;
    border-radius: 0.25rem;
}

.skeleton-text__body {
    width: 75%;
}

.skeleton-footer {
    width: 30%;
}
</style>

<script setup>
let containersCount = 4;
</script>
