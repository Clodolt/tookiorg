<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import IslandCard from "@/Components/IslandCard";
import {computed, ref} from "vue";

const filterText=ref('')

const island1 = {
    id: 1,
    title: "Alteisen",
    ilvl:250,
    mokokosTotal:10,
    mokokosCollected:ref(2),
    soulGotten: ref(false),
    isFavorite: ref(false),
    soulType: "RNG [Monster kills]",
    islandType:"Adventure Island",

}

const island2 = {
    id: 2,
    title: "Allakir",
    ilvl:600,
    mokokosTotal:3,
    mokokosCollected:ref(2),
    soulGotten: ref(false),
    isFavorite: ref(false),
    soulType: "RNG",
    islandType:"Timed Island",

}

const island3 = {
    id: 3,
    title: "Althertz",
    ilvl:340,
    mokokosTotal:5,
    mokokosCollected:ref(2),
    soulGotten: ref(false),
    isFavorite: ref(false),
    soulType: "Boom Boom",
    islandType:"Adventure Island",

}


const islandList = [island1, island2, island3];

const filteredList = computed(() => {
    return islandList.filter( island =>
        island.title.toLowerCase().includes(filterText.value.toLowerCase())
    )
})


function toggleFavorite(id){
    let islandToChange = islandList.find(island => island.id === id);
    islandToChange.isFavorite.value = !islandToChange.isFavorite.value;
    console.log(island1.isFavorite.value);
}

function updateMokoko(id, value){
    let islandToChange = islandList.find(island => island.id === id);
    islandToChange.mokokosCollected.value = value;
    console.log(island1.mokokosCollected.value);
}

function toggleSoul(id){
    let islandToChange = islandList.find(island => island.id === id);
    islandToChange.soulGotten.value = !islandToChange.soulGotten.value;
    console.log(island1.soulGotten.value);
}



</script>

<template>
    <Head title="Island Tracker" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="tw-flex justify-center align-center">
                <v-icon class="tw--mr-10 tw-z-50 tw-relative">
                    mdi-magnify
                </v-icon>
                <input class="tw-h-10 tw-w-1/2 text-center tw-rounded-lg tw-drop-shadow-lg tw-bg-white dark:tw-bg-neutral-800 dark:tw-text-white pl-3" type="text" v-model="filterText" placeholder="Search Islands" />

            </div>
        </template>

        <div class="tw-py-12">
            <div class="tw-max-w-7xl tw-mx-auto sm:tw-px-6 lg:tw-px-8">
                <div class="tw-bg-white tw-overflow-hidden tw-shadow-sm sm:tw-rounded-lg">
                    <div class="tw-p-6 tw-bg-white dark:tw-bg-neutral-700">
                    <v-container>
                        <v-row>
                            <v-col v-for="item in filteredList" :key="item.id" cols="4">
                                <IslandCard v-bind="item" @toggle-favorite="toggleFavorite" @update-mokokos="updateMokoko" @toggle-soul="toggleSoul "/>
                            </v-col>

                        </v-row>
                    </v-container>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
