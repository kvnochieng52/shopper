<template>
    <nav class="flex justify-between flex-wrap bg-orange-500 p-5">
        <Link href="/">
            <div class="flex items-center flex-shrink-0 text-white mr-6">
                <img src="/images/logo.png" width="40" height="40" />
                <span class="font-semibold text-xl"> &nbsp; Shopper</span>
            </div>
        </Link>

        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
                <Link
                    href="/"
                    class="block mt-4 lg:inline-block lg:mt-0 text-white text-base font-bold hover:text-white mr-4"
                >
                    Home
                </Link>
                <Link
                    href="/category/furniture"
                    class="block mt-4 lg:inline-block lg:mt-0 text-white text-base font-bold hover:text-white mr-4"
                >
                    Furnitures
                </Link>

                <Link
                    href="/category/electronics"
                    class="block mt-4 lg:inline-block lg:mt-0 text-white text-base font-bold hover:text-white mr-4"
                >
                    Electronics
                </Link>
                <Link
                    href="/category/cars"
                    class="block mt-4 lg:inline-block lg:mt-0 text-white text-base font-bold hover:text-white mr-4"
                >
                    Cars
                </Link>

                <Link
                    href="/category/property"
                    class="block mt-4 lg:inline-block lg:mt-0 text-white text-base font-bold hover:text-white mr-4"
                >
                    Property
                </Link>
            </div>
            <div>
                <Link
                    v-if="!$page.props.auth"
                    href="/login"
                    class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0 font-bold"
                    >Login/SignUp</Link
                >
                <template v-else>
                    <div class="md:flex md:justify-between">
                        <Link href="/dashboard" class="">
                            <img
                                class="w-10 h-10 rounded-full float-left"
                                :src="$page.props.auth.user.avatar"
                            />
                        </Link>
                        <div class="float-right">
                            <Link href="/dashboard" class="">
                                <p class="text-gray-100 pl-2">
                                    {{
                                        $page.props.auth.user.name.split(" ")[0]
                                    }}
                                </p>
                            </Link>
                            <p>
                                <a
                                    href="/login/logout"
                                    class="text-gray-100 pl-2 font-bold"
                                    >Logout</a
                                >
                            </p>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>
