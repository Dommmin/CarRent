<template>
    <AdminLayout title="Edit">
        <template #header>
            {{ form.name }}
        </template>

        <div class="py-12">
            <div class="max-w-[50rem] mx-auto sm:px-6 lg:px-8">
                <div class="bg-white bg-opacity-50 overflow-hidden shadow-xl sm:rounded-lg md:px-12">
                    <div class="px-4 py-6 sm:px-0">
                        <div class="container mx-auto flex-row w-auto">

                            <form @submit.prevent="form.put(route('admin.car.update', form.id))">
                                <!-- Name -->
                                <div>
                                    <label for="car-name" class="block font-medium text-sm text-gray-700">
                                        Name
                                    </label>
                                    <input v-model="form.name" id="car-name" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.name" class="text-red-600">
                                            {{ errors.name }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Year -->
                                <div class="mb-3">
                                    <label for="car-slug" class="block font-medium text-sm text-gray-700">
                                        Year
                                    </label>
                                    <input v-model="form.year" id="car-slug" type="number" min="2020" max="2022" step="1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.year" class="text-red-600">
                                            {{ errors.year }}
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-between">
                                    <!-- Fuel -->
                                    <div class="mb-3">
                                        <label for="car-fuel" class="block font-medium text-sm text-gray-700">
                                            Fuel
                                        </label>
                                        <select v-model="form.fuel" name="car-fuel" id="car-fuel" class="w-52 rounded-xl w-full block mt-1 shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <option v-for="fuel in fuels">{{ fuel }}</option>
                                        </select>
                                        <div class="text-red-600 mt-1">
                                            <div v-if="errors.fuel" class="text-red-600">
                                                {{ errors.fuel }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Drivetrain -->
                                    <div class="mb-3">
                                        <label for="car-drivetrain" class="block font-medium text-sm text-gray-700">
                                            Drivetrain
                                        </label>
                                        <select
                                            v-model="form.drivetrain"
                                            name="car-drivetrain"
                                            id="car-drivetrain"
                                            class="w-52 rounded-xl w-full block mt-1 shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        >
                                            <option v-for="drivetrain in drivetrains">{{ drivetrain }}</option>
                                        </select>
                                        <div class="text-red-600 mt-1">
                                            <div v-if="errors.drivetrain" class="text-red-600">
                                                {{ errors.drivetrain }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fuel Consumption -->
                                <div class="mb-3">
                                    <label for="car-fuel_consumption" class="block font-medium text-sm text-gray-700">
                                        Fuel Consumption ( l / 100 km )
                                    </label>
                                    <input v-model="form.fuel_consumption" id="car-fuel_consumption" type="number" step="0.1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.fuel_consumption" class="text-red-600">
                                            {{ errors.fuel_consumption }}
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-center text-center">
                                    <!-- Seats -->
                                    <div class="mb-3">
                                        <label for="car-seats" class="block font-medium text-sm text-gray-700">
                                            Seats
                                        </label>
                                        <input type="radio" id="4" v-model="form.seats" value="4">
                                        <label class="m-2" for="4">4</label>

                                        <input type="radio" id="5" v-model="form.seats" value="5">
                                        <label class="ml-2" for="5">5</label>
                                        <div class="text-red-600 mt-1">
                                            <div v-if="errors.seats" class="text-red-600">
                                                {{ errors.seats }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Gearbox -->
                                    <div class="mb-3 ml-10">
                                        <label for="car-gearbox" class="block font-medium text-sm text-gray-700">
                                            Gearbox
                                        </label>
                                        <input type="radio" id="Automatyczna" v-model="form.gearbox" value="Automatyczna">
                                        <label class="m-2" for="Automatyczna">Automatyczna</label>
                                        <input type="radio" id="Manualna" v-model="form.gearbox" value="Manualna">
                                        <label class="ml-2" for="Manualna">Manualna</label>
                                        <div class="text-red-600 mt-1">
                                            <div v-if="errors.gearbox" class="text-red-600">
                                                {{ errors.gearbox }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="mb-3">
                                    <label for="car-price" class="block font-medium text-sm text-gray-700">
                                        Price ( $ )
                                    </label>
                                    <input v-model="form.price" id="car-price" type="number" step="1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.price" class="text-red-600">
                                            {{ errors.price }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Horsepower -->
                                <div class="mb-3">
                                    <label for="car-horsepower" class="block font-medium text-sm text-gray-700">
                                        Horsepower ( KM )
                                    </label>
                                    <input v-model="form.horsepower" id="car-horsepower" type="number" step="1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.horsepower" class="text-red-600">
                                            {{ errors.horsepower }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Torque -->
                                <div class="mb-3">
                                    <label for="car-torque" class="block font-medium text-sm text-gray-700">
                                        Torque ( Nm )
                                    </label>
                                    <input v-model="form.torque" id="car-torque" type="number" step="1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.torque" class="text-red-600">
                                            {{ errors.torque }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Acceleration -->
                                <div class="mb-3">
                                    <label for="car-acceleration" class="block font-medium text-sm text-gray-700">
                                        Acceleration ( 0 - 100 km/h )
                                    </label>
                                    <input v-model="form.acceleration" id="car-acceleration" type="number" step="0.1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.acceleration" class="text-red-600">
                                            {{ errors.acceleration }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Engine -->
                                <div class="mb-3">
                                    <label for="car-engine" class="block font-medium text-sm text-gray-700">
                                        Engine
                                    </label>
                                    <input v-model="form.engine" id="car-engine" type="number" step="1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.engine" class="text-red-600">
                                            {{ errors.engine }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Images -->
                                <div class="mb-3">
                                    <label for="car-images" class="block font-medium text-sm text-gray-700">
                                        Images
                                    </label>
                                    <input
                                        @change="getImage"
                                        id="car-images"
                                        name="image"
                                        type="file"
                                        accept="image/*"
                                        class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        multiple
                                    >
                                    <hr class="mt-2">
                                    <div class="inline-flex mr-2" v-for="(image, key) in form.images" :key="key">
                                        <div class="flex flex-col">
                                            <div v-if="form.images">
                                                <img :src="'/images/' + image" alt="" width="200" class="rounded mt-2"><br>
                                            </div>
                                            <div v-if="image.src">
                                                <img :src="image.src" :alt="image" width="200" class="rounded mt-2"><br>
                                            </div>
                                            <button
                                                @click.prevent="removeImage(key)"
                                                class="bg-red-500 rounded-xl mb-2 py-2 hover:bg-red-600"
                                            >Remove image</button>
                                        </div>
                                    </div>

                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.images" class="text-red-600">
                                            {{ errors.images }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="car-description" class="block font-medium text-sm text-gray-700">
                                        Description
                                    </label>
                                    <textarea
                                        name="car-description"
                                        id="car-description"
                                        cols="100"
                                        rows="5"
                                        v-model="form.description"
                                        class="rounded-xl w-full"
                                    ></textarea>
                                    <div class="text-red-600 mt-1 w-full">
                                        <div v-if="errors.description" class="text-red-600">
                                            {{ errors.description }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="mt-4">
                                    <button :disabled="isLoading" class="inline-flex items-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl disabled:opacity-75 disabled:cursor-not-allowed w-full justify-center md:w-auto">
                                        <div v-show="isLoading" class="inline-block animate-spin w-4 h-4 mr-2 border-t-2 border-t-white border-r-2 border-r-white border-b-2 border-b-white border-l-2 border-l-blue-600 rounded-full"></div>
                                        <span v-if="isLoading">Processing...</span>
                                        <span v-else class="px-2">Save</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const isLoading = ref(false);

const props = defineProps({
    car: Object,
    errors: Object,
});

const form = useForm(
    props.car
    // {
    // name: '',
    // year: '',
    // fuel: '',
    // fuel_consumption: '',
    // seats: '',
    // gearbox: '',
    // price: '',
    // horsepower: '',
    // torque: '',
    // acceleration: '',
    // engine: '',
    // drivetrain: '',
    // images: [],
    // description: '',
// }
);

// const media = useForm({
//     preview: []
// });

// Preview images
const getImage = (e) => {
    props.car.images.splice(e);
    const selectedFiles = e.target.files;
    for (let i = 0; i < selectedFiles.length; i++) {
        let img = {
            src: URL.createObjectURL(selectedFiles[i]),
            file: selectedFiles[i]
        }
        props.car.images.push(img)
    }

    // for (let file of selectedFiles) {
    //     props.car.images.push(file);
    // }

    console.log(props.car.images);
    // form.images.push(selectedFiles);
}

// console.log(form.images);

const removeImage = (index) => {
    props.car.images.splice(index, 1);
};

const fuels = ['Benzyna', 'Diesel', 'Elektryk'];
const drivetrains = ['RWD', 'FWD', 'AWD'];

</script>
