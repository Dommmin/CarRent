<template xmlns="http://www.w3.org/1999/html">
    <AppLayout :title="car.name">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ car.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-[105rem] mx-auto sm:px-6 lg:px-8">
                <div class="bg-white bg-opacity-50 overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <vueper-slides fade :touchable="true">
                            <vueper-slide
                                v-for="image in car.images"
                                :image="'/images/' + image"
                            />
                        </vueper-slides>
                    </div>
                    <div class="text-center mt-10">
                        <span class="desc">Specyfikacja samochodu</span>
                    </div>
                    <div class="mt-8 m-auto w-[26rem] md:w-[40rem] md:grid md:grid-cols-3 md:gap-4">
                        <div class="specification">
                            <div class="grid grid-rows-1 grid-flow-col">
                                <div class="row-span-2"><img src="https://img.icons8.com/ios/50/000000/engine.png" class="w-12 mr-2" alt=""/></div>
                                <div class="col-span-12">Moc</div>
                                <div class="col-span-12 font-bold"><span>{{ car.horsepower }} KM</span></div>
                            </div>
                        </div>
                        <div class="specification">
                            <div class="grid grid-rows-1 grid-flow-col">
                                <div class="row-span-2"><img src="https://img.icons8.com/external-phatplus-lineal-phatplus/64/000000/external-turbo-motor-car-phatplus-lineal-phatplus.png" class="w-12 mr-2" alt=""/></div>
                                <div class="col-span-12">Moment obrotowy</div>
                                <div class="col-span-12 font-bold"><span>{{ car.torque }} NM</span></div>
                            </div>
                        </div>
                        <div class="specification">
                            <div class="grid grid-rows-1 grid-flow-col">
                                <div class="row-span-2"><img src="https://img.icons8.com/ios/100/000000/car-seat.png" class="w-12 mr-2" alt=""/></div>
                                <div class="col-span-12">Liczba miejsc</div>
                                <div class="col-span-12 font-bold"><span>{{ car.seats }}</span></div>
                            </div>
                        </div>
                        <div class="specification">
                            <div class="grid grid-rows-1 grid-flow-col">
                                <div class="row-span-2"><img src="https://img.icons8.com/external-others-inmotus-design/67/000000/external-Gears-gears-others-inmotus-design-6.png" class="w-12 mr-2" alt=""/></div>
                                <div class="col-span-12">Skrzynia</div>
                                <div class="col-span-12 font-bold"><span>{{ car.gearbox }}</span></div>
                            </div>
                        </div>
                        <div class="specification">
                            <div class="grid grid-rows-1 grid-flow-col">
                                <div class="row-span-2"><img src="https://img.icons8.com/ios-filled/100/000000/speedometer.png" class="w-12 mr-2" alt=""/></div>
                                <div class="col-span-12">Przyśpieszenie</div>
                                <div class="col-span-12 font-bold"><span>{{ car.acceleration }} s / 100 km/h</span></div>
                            </div>
                        </div>
                        <div class="specification">
                            <div class="grid grid-rows-1 grid-flow-col">
                                <div class="row-span-2"><img src="https://img.icons8.com/external-those-icons-fill-those-icons/96/000000/external-fuel-cars-components-those-icons-fill-those-icons.png" class="w-12 mr-2" alt=""/></div>
                                <div class="col-span-12">Rodzaj paliwa</div>
                                <div class="col-span-12 font-bold"><span>{{ car.fuel }}</span></div>
                            </div>
                        </div>
                        <div class="specification">
                            <div class="grid grid-rows-1 grid-flow-col">
                                <div class="row-span-2"><img src="https://img.icons8.com/ios/100/000000/calendar--v1.png" class="w-12 mr-2" alt=""/></div>
                                <div class="col-span-12">Rok</div>
                                <div class="col-span-12 font-bold"><span>{{ car.year }}</span></div>
                            </div>
                        </div>
                        <div class="specification">
                            <div class="grid grid-rows-1 grid-flow-col">
                                <div class="row-span-2"><img src="https://img.icons8.com/ios/50/000000/engine.png" class="w-12 mr-2" alt=""/></div>
                                <div class="col-span-12">Pojemność silnika</div>
                                <div class="col-span-12 font-bold"><span>{{ car.engine }} ccm³</span></div>
                            </div>
                        </div>
                        <div class="specification">
                            <div class="grid grid-rows-1 grid-flow-col">
                                <div class="row-span-2"><img src="https://img.icons8.com/external-icongeek26-outline-icongeek26/64/000000/external-wheels-car-parts-and-service-icongeek26-outline-icongeek26.png" class="w-12 mr-2" alt=""/></div>
                                <div class="col-span-12">Napęd</div>
                                <div class="col-span-12 font-bold"><span>{{ car.drivetrain }}</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-10">
                        <span class="desc">Dostępność</span>
                    </div>
                    <div class="text-center text-6xl p-10">
                        <div>
                            Kalendarz
                        </div>
                        <div>
                            Cennik
                        </div>
                    </div>

                    <div class="flex justify-center items-center mb-5 p-2 car-container bg-white bg-opacity-50">
                        <div class="w-72 px-7 py-4 rounded-xl mr-5 text-center">
                            <div class="text-2xl font-bold mb-2">Liczba dni</div>
                            <div v-for="(value, key) in values">
                                <div class="mb-1">{{ key }}</div>
                            </div>
                        </div>
                        <div class="w-72 px-7 py-4 rounded-xl text-center">
                            <div class="text-2xl font-bold mb-2">Cena</div>
                            <div v-for="(value) in values">
                                <div class="mb-1">{{ value * car.price }} zł / doba</div>
                            </div>
                        </div>
                    </div>

                        <div class="flex justify-center items-center text-center">
                            <form @submit.prevent="rent.post(route('rent.store'))">
                                <div>
                                    <input type="datetime-local" v-model="rent.starts" class="mr-5 rounded-xl" :placeholder="rent.starts">
                                    <input type="datetime-local" v-model="rent.ends" class="rounded-xl">
                                </div>

                                <div class="bg-red-500 px-4 py-2 rounded-xl mt-4" v-if="rent.starts < today">Data wsteczna!</div>
                                <div class="mt-5 text-xl">
                                    <div v-if="days < 0">
                                        <p class="bg-red-500 px-4 py-2 rounded-xl ">Data końcowa nie może być mniejsza niż początkowa!</p>
                                    </div>
                                    <div v-else-if="days > 31">
                                        <p class="bg-green-500 px-4 py-2 rounded-xl">Wynajem powyżej 31 dni - cena ustalana indywidualnie.</p>
                                    </div>
                                    <div v-else-if="!isNaN(days) && days !== 0 && rent.starts >= today">
                                        <span class="mr-1">*</span>{{ Math.round(toPay(Math.ceil(days)) * car.price) }} zł
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="mt-4" v-if="days <= 31 && days > 0 && rent.starts >= today">
                                    <button class="inline-flex items-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl disabled:opacity-75 disabled:cursor-not-allowed">
                                        <span class="px-2">Wynajmij</span>
                                    </button>
                                    <br>
                                    <small>* Każda rozpoczęta godzina nowego dnia naliczana jest jako pełna doba.</small>
                                </div>

                            </form>
                        </div>

                    <div class="text-center mt-10">
                        <span class="desc">Kilka słów o {{ car.name }}</span>
                    </div>
                    <div class="car-container border-none">
                        <p class="mt-5 ml-5 mr-5">{{ car.description }}</p>
                    </div>

                    <!-- Reviews -->
                    <div class="mt-4">
                        <div class="text-center font-bold text-6xl mt-2">Recenzje</div>

                        <div v-for="review in car.reviews">
                            <div class="car-container flex justify-center bg-white bg-opacity-40">
                                <img src="https://pbs.twimg.com/profile_images/1329475394714537986/MXGt0d_h_x96.jpg" alt="" />
                                <div>
                                    <div class="flex">
                                        <div>
                                            <a href="#">
                                                <strong>
                                                    Shruti Balasa
                                                    {{ review.user }}
                                                </strong>
                                                <span> @shrutibalasa</span>
                                            </a>
                                            &middot;
                                            <a href="#">Sep 26
    <!--                                                {{ review.created_at }}-->
                                            </a>
                                        </div>

                                        <div class="flex-1">
                                            <Dropdown v-if="$page.props.user.id === review.user_id || $page.props.isAdmin">
                                                <template #trigger>
                                                    <img class="h-4 ml-auto cursor-pointer" src="https://res.cloudinary.com/thirus/image/upload/v1632940964/logos/options_wdtupw.svg" alt="" />
                                                </template>
                                                <template #content>
                                                    <DropdownLink href="#" v-if="$page.props.user.id === review.user_id">
                                                        Edytuj
                                                    </DropdownLink>

                                                    <DropdownLink href="#">
                                                        <span v-if="$page.props.isAdmin" class="text-red-500">Usuń</span>
                                                        <span v-else>Usuń</span>
                                                    </DropdownLink>
                                                </template>
                                            </Dropdown>
                                        </div>

                                    </div>
                                    <div>{{ review.description }}</div>
                                    <div class="actions flex justify-end">
                                        <div class="font-bold text-xl mt-2">
                                            <span>{{ review.rating }} <i class="fas fa-star text-yellow-500"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-if="$page.props.user && !car.has_review" class="car-container flex justify-center border-none">
                            <form @submit.prevent="form.post(route('review.store', car))">
                                    <div class="mb-2">
                                        <div>
                                            <label for="rating">Dodaj recenzję</label>
                                        </div>
                                        <input type="number" name="rating" id="rating" v-model="form.rating" class="rounded-xl w-20 text-center" placeholder="5" min="1" max="5">
                                        <div class="text-red-600 mt-1">
                                            <div v-if="errors.rating" class="text-red-600">
                                                {{ errors.rating }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <textarea name="description" id="description" cols="90" rows="4" class="rounded-xl w-full" v-model="form.description" placeholder="Opis..."></textarea>
                                    </div>
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.description" class="text-red-600">
                                            {{ errors.description }}
                                        </div>
                                    </div>
                                    <div class="flex md:justify-end">
                                        <button class="mt-2 bg-blue-500 hover:bg-blue-600 rounded-xl px-4 py-2 text-white w-full md:w-24">Dodaj</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { VueperSlides, VueperSlide } from 'vueperslides'
import 'vueperslides/dist/vueperslides.css'
import { computed } from "vue";
import {useForm} from "@inertiajs/inertia-vue3";

const date = new Date();
const today = date.getFullYear() + '-0' + (date.getMonth() + 1) + '-' + date.getDate() + 'T' + ((date.getHours() < 10 ? '0' : '') + date.getHours()) + ':' + ((date.getMinutes() < 10 ? '0' : '') + date.getMinutes());

const props = defineProps({
    car: Object,
    rent: Object,
    errors: Object
});

const form = useForm({
    car: props.car.id,
    rating: null,
    description: ''
});

const rent = useForm({
    car: props.car.id,
    user_id: null,
    starts: today,
    ends: today
});

const values = {
    '1 - 2': 1,
    '3 - 5': 0.9,
    '6 - 7': 0.8,
    '8 - 14': 0.65,
    '15 - 21': 0.5,
    '22 - 28': 0.4,
    '29 - 31': 0.3,
};

const days = computed( () => {
    const date1 = new Date(rent.starts).getTime();
    const date2 = new Date(rent.ends).getTime();
    return (date2 - date1) / 1000 / 3600 / 24;
});

const toPay = (d) => {
    let r = 0;
    Object.keys(values).forEach(key => {
        const strArray = key.split(' - ');
        if (d >= strArray[0] && d <= strArray[1]) {
            console.log(d);
            r = values[key] * d;
        }
    })
    return r;
};

</script>
