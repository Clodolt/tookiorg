<script setup>
import Layout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import MarisItem from "@/Components/MarisItem";
import {ref} from "vue";

let goldToGem = ref(500);

const item1 = {
    name: 'Destruction Stone Crystal',
    img: 'https://d3planner-assets.maxroll.gg/lost-ark/icons/use_6_105.png',
    type: 'Honing Materials',
    bundleSize: 500,
    crystalPrice: 300
}

const item2 = {
    name: 'Guardian Stone Crystal',
    img: 'https://d3planner-assets.maxroll.gg/lost-ark/icons/use_6_104.png',
    type: 'Honing Materials',
    bundleSize: 1000,
    crystalPrice: 270
}
const item3 = {
    name: 'Honor Leapstone',
    img: 'https://d3planner-assets.maxroll.gg/lost-ark/icons/use_7_155.png',
    type: 'Honing Materials',
    bundleSize: 20,
    crystalPrice: 40
}
const item4 = {
    name: 'Great Honor Leapstone',
    img: 'https://d3planner-assets.maxroll.gg/lost-ark/icons/use_7_156.png',
    type: 'Honing Materials',
    bundleSize: 5,
    crystalPrice: 50
}

let itemList = [item1, item2, item3, item4]

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
                        <div class="tw-flex tw-bg-white dark:tw-bg-neutral-700 align-center justify-center">
                            <input class="tw-h-10 tw-w-1/12 text-center tw-rounded-lg tw-drop-shadow-lg tw-bg-white dark:tw-bg-neutral-800 dark:tw-text-white" type="text" v-model="goldToGem" placeholder="Gold To Gem rate" />
                            <img src="https://d3planner-assets.maxroll.gg/lost-ark/icons/money_4.png" class="tw-pl-2" style="height: 25px" alt="Gold">
                            <p class="dark:tw-text-white tw-pl-2">equals 95</p>
                            <img src="/assets/blue_crystal_ccexpress.png" class="tw-pl-2" style="height: 25px" alt="Blue Crystals">
                        </div>
                    </div>
                    <div class="tw-p-6 tw-bg-white dark:tw-bg-neutral-700">
                        <v-container>
                            <v-row>
                                <v-col>
                                    <v-list class="tw-bg-white dark:tw-bg-neutral-700">
                                        <MarisItem class="tw-mt-1" v-for="item in itemList.filter(item => item.type==='Honing Materials')" v-bind="item" :goldToGem="goldToGem"></MarisItem>
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
