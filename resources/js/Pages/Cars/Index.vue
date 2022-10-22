<template>
    <AppLayout title="Home">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Home
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-[105rem] mx-auto sm:px-6 lg:px-8">
                <div class="bg-white bg-opacity-50 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-4 py-6 sm:px-0">
                        <div class="container mx-auto flex-row w-auto">

                            <div class="xl:px-24 px-6 sm:py-6">
                                <p class="font-bold text-2xl">Najczęściej wynajmowane samochody</p>
                                <div class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols mb-10 w-auto">

                                    <!-- Car --->
                                    <div
                                        class="border border-white rounded-3xl m-2 pb-5 lg:hover:scale-105 duration-500 shadow-2xl"
                                        v-for="car in cars"
                                        :class="car.available ? 'bg-green-300' : 'bg-red-300'"
                                    >
                                        <img :src="'/images/' + car.main" alt="car-5" class="rounded-3xl p-2 w-full">
                                        <div class="flex mb-3">
                                            <div class="flex-1">
                                                <p class="ml-4 mt-2 text-xl">{{ car.name }}</p>
                                            </div>
                                            <div class="flex-none mr-3 mt-2">
                                                <span class="border border-dashed border-blue-400 rounded-2xl px-2 py-1">{{ car.year }}</span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 text-center mb-3">
                                            <div class="">
                                                <i class="fas fa-user-friends text-cyan-600"></i> <span>{{ car.seats }} Osobowy</span>
                                            </div>
                                            <div class="">
                                                <i class="fas fa-gas-pump text-cyan-600"></i> <span class="">{{ car.fuel }}</span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 text-center">
                                            <div class="">
                                                <i class="fas fa-tint text-cyan-600"></i> <span>{{ car.fuel_consumption }} l / 100km</span>
                                            </div>
                                            <div class="">
                                                <i class="fas fa-cogs text-cyan-600"></i> <span>{{ car.gearbox }}</span>
                                            </div>
                                        </div>
                                        <div class="text-center mt-2">
                                            <p>{{ car.price }} zł / dzień</p>
                                        </div>
                                        <hr class="mr-5 ml-5 mt-3 mb-3">

                                        <!-- Favorites -->
                                        <div>
                                            <div v-if="car.favorites.length === 0">
                                                <div class="flex justify-center items-center">
                                                    <button @click.prevent="addFavorite(car.id)" type="submit" class="bg-yellow-200 rounded-2xl p-2 text-blue-500 hover:text-red-500 duration-500">
                                                        <i class="flex justify-center items-center far fa-heart text-3xl"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div v-else>
                                                <div class="flex justify-center items-center">
                                                    <button @click.prevent="removeFavorite(car.id)" type="submit" class="bg-yellow-200 rounded-2xl p-2 text-blue-500 hover:text-red-500 duration-500">
                                                        <i class="flex justify-center items-center fas fa-heart text-3xl text-red-500 hover:text-blue-500 duration-500"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex-row justify-center items-center text-center mt-3">
                                            <Link :href="route('cars.show', car.slug)">
                                                <button class="bg-cyan-400 hover:bg-cyan-500 duration-300 px-4 py-2 rounded-3xl text-white">
                                                    Wynajmij
                                                </button>
                                            </Link>
                                        </div>

                                        <!-- Rating -->
                                        <div class="flex justify-center items-center mt-2 text-2xl font-bold" v-if="car.car_rating">
                                            <span class="mr-2">{{ car.car_rating }}</span>
                                            <i class="fas fa-star text-yellow-300"></i>
                                        </div>

                                    </div>
                                    <!-- Car --->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link, useForm} from '@inertiajs/inertia-vue3';
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    cars: Object,
});

const form = useForm({

});

const addFavorite = (id) => {
    Inertia.post(route('car.add-favorite', id))
};

const removeFavorite = (id) => {
    Inertia.post(route('car.remove-favorite', id))
};

</script>
