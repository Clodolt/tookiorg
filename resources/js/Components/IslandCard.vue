<script setup>

import {ref} from "vue";
import {computed} from "vue";

let islandName = "Alteisen";
let itemLvl = 250;
let description = "RNG [Monster kills]";
let soulGotten = ref(false);
let isFavorite = ref(false);
let mokokoTotal = ref(8);
let mokokoCollected = ref(2);

const cardClassObject = computed(() => ({
    'bg-red-darken-4': !soulGotten.value || !(mokokoTotal.value - mokokoCollected.value === 0),
    'bg-amber-accent-4': isFavorite.value && !(soulGotten.value && mokokoTotal.value - mokokoCollected.value === 0),
    'bg-green-darken-3': soulGotten.value && (mokokoTotal.value - mokokoCollected.value === 0),
}))

function toggleFavorite(){
    isFavorite.value = !isFavorite.value;
}

</script>

<template>
    <v-card
        width="300"
        :class = "cardClassObject"
        rounded="lg"
        :elevation="11"
    >
        <v-card-header>
            <v-row class="tw-p-3">
                <v-avatar
                    class="tw-outline tw-outline-2 " size="50"
                    :class ="{'tw-outline-green-800':soulGotten, 'tw-outline-red-800':!soulGotten}"
                >
                    <v-img src="https://d3planner-assets.maxroll.gg/lost-ark/icons/island_icon_12.png"></v-img>

                </v-avatar>
                <v-card-header-text>
                    <v-card-title class="text-grey-lighten-5 tw-ml-3">{{islandName}}</v-card-title>
                    <v-card-subtitle class="text-grey-lighten-5 tw-ml-3">Item-Level: {{itemLvl}}</v-card-subtitle>
                </v-card-header-text>
                <v-icon @click="toggleFavorite" class="tw-pt-1 tw-cursor-pointer" size="35" style="color: #f5c542" v-if="isFavorite">
                    mdi-star
                </v-icon>

                <v-icon @click="toggleFavorite" class="tw-pt-1 tw-cursor-pointer" size="35" style="color: #f5c542" v-if="!isFavorite">
                    mdi-star-outline
                </v-icon>
            </v-row>
        </v-card-header>

        <v-card-text>
            <v-row class="tw-pt-2">
                <div class="d-flex align-center tw-text-white">
                    <img class="tw-ml-4" alt="mokoko icon" width="28" src="/assets/mokoko.png"/>
                    <div class="text-body-1 text-grey-lighten-5 font-weight-medium tw-pl-2">Mokoko</div>
                    <div style="width: 50px"></div>
                    <input type="number" min="0" max="{{mokokoTotal}}" class="tw-text-center tw-opacity-70 tw-bg-white tw-text-gray-700" style="width:20px" v-model="mokokoCollected" maxlength="1" />
                    <p class="tw-pl-2">of {{mokokoTotal}}</p>
                </div>
            </v-row>
            <v-row class="tw-pt-2">
                <div class="d-flex justify-center align-center">
                    <img class="tw-ml-4" alt="Island Soul icon" width="25"
                         src="https://d3planner-assets.maxroll.gg/lost-ark/icons/tokenitem_9.png"/>
                    <div class="text-body-1 text-grey-lighten-4 font-weight-medium tw-pl-2">Island Soul</div>
                    <div style="width: 50px"></div>
                    <v-switch
                        v-model="soulGotten"
                        color="green"
                        hide-details
                    ></v-switch>
                </div>
            </v-row>
            <v-row class="tw-pt-2 justify-center align-center">

                <div class="text-body-1 text-grey-lighten-4 font-weight-medium tw-pl-4">{{ description }}</div>

                <v-icon class="tw-ml-auto tw-mr-2 tw-mb-1" size="30" color="white">
                    mdi-compass-outline
                </v-icon>


            </v-row>
        </v-card-text>
    </v-card>
</template>
