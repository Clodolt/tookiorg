<script setup>
import Layout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import MarisItem from "@/Components/MarisItem";
import {ref, computed} from "vue";


let goldToGem = ref(500);
let filterTier = ref('');
let filterType = ref('');

const item1 = {
    name: 'Destruction Stone Crystal',
    img: 'https://d3planner-assets.maxroll.gg/lost-ark/icons/use_6_105.png',
    tier: 'Tier 3',
    type: 'Honing Stones',
    bundleSize: 500,
    crystalPrice: 300
}

const item2 = {
    name: 'Guardian Stone Crystal',
    img: 'https://d3planner-assets.maxroll.gg/lost-ark/icons/use_6_104.png',
    tier: 'Tier 3',
    type: 'Honing Stones',
    bundleSize: 1000,
    crystalPrice: 270
}
const item3 = {
    name: 'Honor Leapstone',
    img: 'https://d3planner-assets.maxroll.gg/lost-ark/icons/use_7_155.png',
    tier: 'Tier 3',
    type: 'Leapstones',
    bundleSize: 20,
    crystalPrice: 40
}
const item4 = {
    name: 'Great Honor Leapstone',
    img: 'https://d3planner-assets.maxroll.gg/lost-ark/icons/use_7_156.png',
    tier: 'Tier 3',
    type: 'Leapstones',
    bundleSize: 5,
    crystalPrice: 50
}

let itemList = [item1, item2, item3, item4]
const filteredList = computed(() => {
    return itemList.filter( item =>
        item.tier.toLowerCase().includes(filterTier.value.toLowerCase()) && item.type.toLowerCase().includes(filterType.value.toLowerCase())
    )
})

</script>

<template>
    <Head title="Island Tracker" />

    <Layout>
        <template #header>
            <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight dark:tw-text-white dark:tw-bg-neutral-700">
                Mari's Shop Calculator
            </h2>
        </template>

        <div class="tw-py-12">
            <div class="tw-max-w-7xl tw-mx-auto sm:tw-px-6 lg:tw-px-8">
                <div class="tw-bg-white dark:tw-bg-neutral-800 tw-overflow-hidden tw-shadow-sm sm:tw-rounded-lg">
                    <div class="tw-p-6 tw-bg-white dark:tw-bg-neutral-700">
                        <div class="tw-flex tw-bg-white dark:tw-bg-neutral-700 align-center justify-space-between">
                            <div class="tw-flex tw-ml-6  align-center">
                                <input class="tw-h-10 tw-w-1/4 text-center tw-rounded-lg tw-drop-shadow-lg tw-bg-white dark:tw-bg-neutral-800 dark:tw-text-white" type="text" v-model="goldToGem" placeholder="Gold To Gem rate" />
                                <img src="https://d3planner-assets.maxroll.gg/lost-ark/icons/money_4.png" class="tw-pl-2" style="height: 25px" alt="Gold">
                                <p class="dark:tw-text-white tw-pl-2">equals 95</p>
                                <img src="/assets/blue_crystal_ccexpress.png" class="tw-pl-2" style="height: 25px" alt="Blue Crystals">
                            </div>
                            <div class="tw-flex tw-ml-6  align-center ml-auto">
                                <p class="tw-mr-2 dark:tw-text-white">Tier:</p>
                                <select class="tw-h-10 tw-p-2 text-center tw-rounded-lg tw-drop-shadow-lg tw-bg-white dark:tw-bg-neutral-800 dark:tw-text-white" v-model="filterTier">
                                    <option value="" selected="selected">All</option>
                                    <option>Tier 1</option>
                                    <option>Tier 2</option>
                                    <option>Tier 3</option>
                                </select>

                            </div>
                            <div class="tw-flex tw-ml-6 tw-mr-5 align-center">
                                <p class="tw-mr-2 dark:tw-text-white">Type:</p>
                                <select class="tw-h-10 tw-p-1 text-center tw-rounded-lg tw-drop-shadow-lg tw-bg-white dark:tw-bg-neutral-800 dark:tw-text-white" v-model="filterType">
                                    <option value="" selected="selected">All</option>
                                    <option>Leapstones</option>
                                    <option>Shard Pouches</option>
                                    <option>Honing Stones</option>
                                    <option>Honing Support</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="tw-pb-6 tw-pl-6 tw-pr-6 tw-bg-white dark:tw-bg-neutral-700">
                        <v-container class="tw-bg-white dark:tw-bg-neutral-700">
                            <v-row>
                                <v-col>
                                    <v-list class="tw-bg-white dark:tw-bg-neutral-700">
                                        <MarisItem class="tw-mt-1" v-for="item in filteredList" v-bind="item" :goldToGem="goldToGem"></MarisItem>
                                    </v-list>
                                </v-col>
                            </v-row>
                        </v-container>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
