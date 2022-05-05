<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import IslandCard from "@/Components/IslandCard";
import {ref} from "vue";


const island1 = {
    id: 1,
    title: "Alteisen",
    ilvl:250,
    mokokosTotal:10,
    mokokosCollected:ref(2),
    soulGotten: ref(false),
    isFavorite: ref(false),
    soulType: "RNG[Monster kills]",
    islandType:"Adventure",

}


const islandList = [island1];

function toggleFavorite(id){
    let islandToChange = islandList.find(island => island.id === id);
    islandToChange.isFavorite.value = !islandToChange.isFavorite.value;
    console.log(island1.isFavorite.value);
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
                            <v-col v-for="item in islandList" cols="4">
                                <IslandCard v-bind="item" @toggle-favorite="toggleFavorite" />
                            </v-col>

                        </v-row>
                    </v-container>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
