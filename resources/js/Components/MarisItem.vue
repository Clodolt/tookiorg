<script setup>
defineProps([
    'key',
    'title',
    'img',
    'price'
])
</script>

<template>
    <v-list-item class="tw-flex tw-bg-neutral-100 dark:tw-bg-neutral-600">
        <img src="https://d3planner-assets.maxroll.gg/lost-ark/icons/use_6_105.png" style="height: 50px"
             alt="Destruction Stone">
        <v-col>
            <v-list-item-title class="dark:tw-text-white">Destruction Stone</v-list-item-title>
            <v-list-item-subtitle class="dark:tw-text-neutral-100">Honing Materials</v-list-item-subtitle>
        </v-col>

        <p class="mr-1 dark:tw-text-white">25</p>
        <img src="https://d3planner-assets.maxroll.gg/lost-ark/icons/money_4.png" style="height: 25px" alt="Gold">


    </v-list-item>
</template>
