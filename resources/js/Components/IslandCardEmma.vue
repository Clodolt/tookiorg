<script setup>

import {ref} from "vue";

let islandName = "Alteisen";
let itemLvl = 250;
let description = "RNG [Monster kills]";
let soulGotten = ref(false);
let isFavorite = true;



</script>

<template>
    <v-card
        width="400"
        :class = "{'bg-green':soulGotten, 'bg-red':!soulGotten}"
    >
        <v-card-header>
            <v-row class="tw-p-3">
                <v-avatar size="50">
                    <v-img src="https://cdn.vuetifyjs.com/images/john.jpg"></v-img>
                </v-avatar>
                <v-card-header-text>
                    <v-card-title class="text-grey-lighten-5 tw-ml-3">{{islandName}}</v-card-title>
                    <v-card-subtitle class="text-grey-lighten-5 tw-ml-3">Item-Level: {{itemLvl}}</v-card-subtitle>
                </v-card-header-text>
                <v-icon class="tw-pt-1" style="color: #f5c542">
                    mdi-star-outline
                </v-icon>
            </v-row>
        </v-card-header>

        <v-card-text>
            <v-row class="tw-pt-2">
                <div class="d-flex">
                    <img class="tw-ml-4" alt="mokoko icon" width="28" src="/assets/mokoko.png"/>
                    <div class="text-body-1 text-grey-lighten-5 font-weight-medium tw-pl-2">Mokoko</div>
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
                        color="indigo"
                        hide-details
                    ></v-switch>
                </div>
            </v-row>
            <v-row class="tw-pt-2 justify-center align-center">

                <div class="text-body-1 text-grey-lighten-4 font-weight-medium tw-pl-4">{{ description }}</div>

                <v-icon class="tw-ml-auto tw-mr-2" size="30">
                    mdi-compass-outline
                </v-icon>


            </v-row>
        </v-card-text>
    </v-card>
</template>
