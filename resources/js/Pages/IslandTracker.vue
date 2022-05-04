<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import IslandCard from "@/Components/IslandCard";

const island1 = {
    id: 1,
    title: "Alteisen",
    ilvl:250,
    mokokoTotal:10,
    mokokosCollected:2,
    soulGotten: false,
    isFavorite: false,
    soulType: "RNG[Monster]",
    islandType:"Adventure",

}

const island2 = {
    id: 1,
    title: "Alakkir",
    ilvl:250,
    mokokoTotal:5,
    mokokosCollected:1,
    soulGotten: true,
    isFavorite: false,
    soulType: "Unas Task", //Unas Task
    islandType:"Adventure",

}
const island3 = { //Gelb
    id: 1,
    title: "Lullaby",
    ilvl:250,
    mokokoTotal:8,
    mokokosCollected:0,
    soulGotten: false,
    isFavorite: true,
    soulType: "RNG[Monster]",
    islandType:"Timed", //Timed

}

const island4 = { //Gelb
    id: 1,
    title: "Lullyby",
    ilvl:250,
    mokokoTotal:5,
    mokokosCollected:5,
    soulGotten: true,
    isFavorite: false,
    soulType: "RNG[Monster]",
    islandType:"Timed", //Timed

}

</script>

<template>
    <Head title="Island Tracker" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight dark:tw-text-white dark:tw-bg-neutral-700">
                Island Tracker
            </h2>

        </template>

        <div class="tw-py-12">
            <div class="tw-max-w-7xl tw-mx-auto sm:tw-px-6 lg:tw-px-8">
                <div class="tw-bg-white tw-overflow-hidden tw-shadow-sm sm:tw-rounded-lg">
                    <div class="tw-p-6 tw-bg-white dark:tw-bg-neutral-700">
                    <v-container>
                        <v-row>
                            <v-col cols="4">
                                <IslandCard v-bind="island1" />
                            </v-col>
                            <v-col cols="4">
                                <IslandCard v-bind="island2" />
                            </v-col>
                            <v-col cols="4">
                                <IslandCard v-bind="island3" />
                            </v-col>
                            <v-col cols="4">
                                <IslandCard v-bind="island4" />
                            </v-col>

                        </v-row>
                    </v-container>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
