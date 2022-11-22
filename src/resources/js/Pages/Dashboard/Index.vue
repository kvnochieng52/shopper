<template>
    <div class="container mx-auto">
        <div class="md:flex md:justify-between">
            <div class="w-full md:w-3/12 md:mr-5 pt-4">
                <SideBar />
            </div>
            <div class="w-full md:w-9/12 md:mr-5 pt-4">
                <p>
                    <Link
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-2 py-2 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        href="/dashboard/create"
                    >
                        New Product
                    </Link>
                </p>
                <br />

                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <hr />
                    <table
                        class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                    >
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Product name
                                </th>
                                <th scope="col" class="py-3 px-6">Category</th>
                                <th scope="col" class="py-3 px-6">Price</th>
                                <th scope="col" class="py-3 px-6">
                                    Date Online
                                </th>
                                <th scope="col" class="py-3 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"
                                v-for="(
                                    productDetails, productKey
                                ) in products.data"
                                :key="productKey"
                            >
                                <th
                                    scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                >
                                    {{ productDetails.title }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ productDetails.category_name }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ productDetails.currency }}
                                    {{ productDetails.price }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ productDetails.date_online }}
                                </td>
                                <td class="py-4 px-6">
                                    <a
                                        href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        >Edit</a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    <ul class="inline-flex -space-x-px">
                        <Paginator
                            :Links="products.links"
                            v-if="products.total > 0"
                        />
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import Paginator from "../../Shared/Paginator.vue";
import SideBar from "../../Pages/Dashboard/SideBar.vue";
defineProps({
    products: Array,
    categories: Array,
});
</script>
