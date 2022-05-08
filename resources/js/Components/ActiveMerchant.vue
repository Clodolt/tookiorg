<script setup>

import {computed, onMounted, ref} from "vue";

const props = defineProps([
    'name',
    'zone',
    'card',
    'rapport',
    'votes',
    'notifyFilter'
])
const emit = defineEmits(['notify'])
const cardRarityClassObject = computed(() => ({
    'tw-text-lime-500': props.card.rarity === 1,
    'tw-text-blue-500': props.card.rarity === 2,
    'tw-text-purple-500': props.card.rarity === 3,
    'tw-text-amber-500': props.card.rarity === 4,
}))

onMounted(()=>{
    if(props.rapport.rarity === 4 && props.notifyFilter.rapport) {
        emit('notify');
    }
    if(props.notifyFilter.card.some(cardName => cardName === props.card.name)) {
        if(props.card.name === 'Wei') {
            emit('notify', true);
        } else {
            emit('notify', false);
        }

    }
})

let nextReset = new Date();
nextReset.setMinutes(55);
nextReset.setSeconds(0);

const imgUrl = '/assets/zones/'+props.zone+'.jpg'
const dialog = ref(false);

</script>

<template>
    <v-list-item class="tw-flex tw-bg-neutral-100 dark:tw-bg-neutral-600 tw-mt-3">
        <v-col cols="4">
            <v-dialog
                v-model="dialog"
                width="500"
            >
                <template v-slot:activator="{ on, attrs }">
                    <a class="tw-cursor-pointer" @click="dialog = true">
                        <v-list-item-title class="dark:tw-text-white">{{ name }}</v-list-item-title>
                        <v-list-item-subtitle class="zone-name dark:tw-text-neutral-100">
                            {{ zone }}
                        </v-list-item-subtitle></a>
                </template>

                <v-card class="tw-bg-white dark:tw-bg-neutral-800 tw-p-4">
                    <v-card-title class="dark:tw-text-white">
                        {{zone}}
                    </v-card-title>

                    <v-card-text>
                        <img :src="imgUrl" :alt="zone">
                    </v-card-text>
                </v-card>
            </v-dialog>

        </v-col>

        <div class="tw-flex tw-w-1/4 justify-center align-center">
            <p class="mr-1" :class="cardRarityClassObject">{{ card.name }}</p>
        </div>
        <div class="tw-flex justify-end align-center tw-ml-auto">
            <div v-if="rapport.rarity === 3"
                 style="background-image: url('https://lostarkcodex.com/images/icon_grade_3.webp');">
                <img src="https://lostarkcodex.com/icons/shop_icon_17.webp" alt="Rapport Chest" style="height: 40px">
            </div>
            <div v-if="rapport.rarity === 4"
                 style="background-image: url('https://lostarkcodex.com/images/icon_grade_4.webp');">
                <img src="https://lostarkcodex.com/icons/shop_icon_17.webp" alt="Rapport Chest" style="height: 40px">
            </div>
        </div>

        <div class="tw-flex justify-center align-center tw-ml-auto dark:tw-text-white">
            <p>{{votes}} Votes</p>
        </div>


    </v-list-item>
</template>
