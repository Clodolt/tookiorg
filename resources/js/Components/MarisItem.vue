<script setup>
import {computed, ref} from "vue";

const props = defineProps([
    'name',
    'img',
    'tier',
    'type',
    'bundleSize',
    'crystalPrice',
    'goldToGem'
])

let marketPrice = ref(0);

let marisPrice = computed(()=> {
    return (((props.goldToGem / 95) * props.crystalPrice)/props.bundleSize).toFixed(2)
})


</script>

<template>
    <v-list-item class="tw-flex tw-bg-neutral-100 dark:tw-bg-neutral-600 tw-mt-3">
        <img :src="img" style="height: 50px"
             :alt="name">
        <v-col cols="4">
            <v-list-item-title class="dark:tw-text-white">{{name}}</v-list-item-title>
            <v-list-item-subtitle class="dark:tw-text-neutral-100">{{bundleSize}} Units per {{crystalPrice}} Crystals</v-list-item-subtitle>
        </v-col>

        <div class="tw-flex justify-center align-center">
            <input class="tw-h-10 tw-w-1/6 text-center tw-rounded-lg tw-drop-shadow-lg tw-bg-white dark:tw-bg-neutral-800 dark:tw-text-white mr-2" type="text" v-model="marketPrice" />
            <img src="https://d3planner-assets.maxroll.gg/lost-ark/icons/money_4.png" style="height: 25px" alt="Gold">
            <p class="ml-1 dark:tw-text-white">per Unit on the Market</p>
        </div>

        <div v-show="crystalPrice" class="tw-flex justify-center align-center tw-ml-auto">
            <p class="mr-1 dark:tw-text-white">{{marisPrice}}</p>
            <img src="https://d3planner-assets.maxroll.gg/lost-ark/icons/money_4.png" style="height: 25px" alt="Gold">
            <p class="ml-1 dark:tw-text-white">per Unit</p>
        </div>
        <div class="tw-flex justify-center align-center tw-ml-auto">
            <p v-if="(marketPrice - marisPrice) > 0" class="mr-1 tw-text-green-600">Buy in Mari's Shop</p>
            <p v-else class="mr-1 tw-text-red-600">Buy in Market</p>
        </div>


    </v-list-item>
</template>
