<template>
    <Head title="Shopper::Welcome" />

    <div
        class="relative pb-20 pt-25 bg-landing-intro bg-cover bg-center bg-no-repeat"
        style="padding-top: 50px"
    >
        <div class="px-4 mx-auto container">
            <div class="text-center">
                <Welcome />
                <Search :Categories="categories" />
            </div>
        </div>
    </div>

    <SkeletonLoader v-if="!processing" />

    <div class="container mx-auto" v-if="processing">
        <div
            class="category_listing"
            v-for="(listCat, catKey) in listData"
            :key="catKey"
        >
            <h4 class="font-bold pb-2 mt-12 border-b border-gray-200 text-xl">
                Latest {{ listCat.category_name }}
            </h4>

            <div class="md:flex md:justify-between">
                <div
                    class="w-full md:w-3/12 p-2"
                    v-for="(productDetails, productKey) in listCat.product_list"
                    :key="productKey"
                >
                    <Card
                        :productDetails="productDetails"
                        :catSlug="listCat.category_slug"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";
import SkeletonLoader from "../../Shared/SkeletonLoader.vue";
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";
import { Link } from "@inertiajs/inertia-vue3";
import Card from "../../Shared/Card.vue";
import Search from "../Home/Search.vue";
import Welcome from "../Home/Welcome.vue";

defineProps({
    categories: Array,
});

let processing = ref(false);
let listData = ref([]);
let fetchListingData = () => {
    axios.get("/home/fetch_latest_listings").then((res) => {
        listData.value = res.data;
        processing.value = true;
    });
};

onMounted(() => {
    fetchListingData();
});
</script>
