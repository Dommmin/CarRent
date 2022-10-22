<template>
    <AdminLayout title="Index">
        <template #header>
            Index
        </template>

        <div class="py-12">
            <div class="sm:px-6 lg:px-8">
                <div class="bg-white bg-opacity-75 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="mx-auto py-6 sm:px-6 lg:px-8">
                        <div class="flex justify-end mr-4 md:mr-0">
                            <div class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 cursor-pointer rounded-xl">
                                <Link :href="route('admin.car.create')" class="text-sm font-medium">Add Car</Link>
                            </div>
                        </div>
                        <div class="px-4 py-6 sm:px-0">
                            <table class="min-w-full divide-y divide-gray-200 border">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left hidden md:table-cell">
                                        <span class="text-lg leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left hidden md:table-cell">
                                        <span class="text-lg leading-4 font-medium text-gray-500 uppercase tracking-wider">Photo</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-lg leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Available</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-center text-lg">
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                <tr v-for="car in cars" class="transition ease-in duration-100 hover:bg-gray-300">
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 hidden md:table-cell">
                                        {{ car.id }}
                                    </td>
                                    <!--                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">-->
                                    <!--                                <router-link-->
                                    <!--                                    :to="{ name: 'survey.view', params: { slug: car.slug } }"-->
                                    <!--                                    class="font-semibold text-lg text-sky-500 hover:text-sky-700"-->
                                    <!--                                >{{ car.title }}</router-link>-->
                                    <!--                            </td>-->
                                    <td class="whitespace-no-wrap text-sm leading-5 text-gray-900 hidden md:table-cell">
                                        <img :src="'/images/' + car.main" :alt="car.main" class="w-16 rounded-xl m-2">
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-2xl font-bold">
                                        {{ car.name }}
                                    </td>
                                    <td v-if="car.available" class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-green-500">
                                        <button type="submit" @click.prevent="setUnAvailable(car.id)" title="Ustaw niedostępny">
                                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                            </svg>
                                        </button>
                                    </td>
                                    <td v-else class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-red-500">
                                        <button type="submit" @click.prevent="setAvailable(car.id)" title="Ustaw dostępny">
                                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                            </svg>
                                        </button>
                                    </td>
                                    <td class="flex items-center justify-center whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        <div class="mt-4">
                                            <Link :href="route('admin.car.edit', car.id)" title="Edytuj">
                                                <svg class="h-6 w-6 text-cyan-500 hover:text-cyan-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </Link>
                                        </div>
                                        <div class="mt-4 ml-3">
                                            <a href="#" @click="destroy(car.id)" title="Usuń">
                                                <svg class="h-6 w-6 text-red-500 hover:text-red-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="mt-4 ml-3">
                                            <!-- <router-link :to="{ name: 'surveys.stats' }">-->
                                            <svg class="h-6 w-6 text-violet-500 hover:text-violet-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <!-- </router-link>-->
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /End replace -->
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    cars: Object,
    car: Object
});

const destroy = (id) => {
    if (confirm('Are you sure?')) {
        Inertia.delete(route('admin.car.destroy', id));
    }
};

const setAvailable = (id) => {
    Inertia.put(route('admin.car.available', id))
};

const setUnAvailable = (id) => {
    Inertia.put(route('admin.car.unavailable', id))
};

</script>
