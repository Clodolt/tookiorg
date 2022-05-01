<script setup>
import {ref, watch} from 'vue'

let ilvl = ref(250);
let gottenToken = ref(false)
let isFavorite = ref(true);

let complete = gottenToken;

watch(gottenToken, () => {
    complete = gottenToken;
    console.log("hello")
})

function toggleToken() {
    gottenToken = !gottenToken;
}

function toggleFavorite() {
    isFavorite = !isFavorite;
}

defineProps(['message']);
</script>

<template>
    <!-- Wenn complete = true dann werde grün -->
    <v-card
        width="400"
        class="bg-red lighten-1"
        :class="{ 'bg-green': complete }"
        rounded="lg"
    >
        <v-card-header>

            <v-row class="tw-p-3">
                <v-avatar>
                    <v-img src="https://cdn.vuetifyjs.com/images/john.jpg"></v-img>
                </v-avatar>
                <v-card-header-text>
                    <v-card-title class="text-grey-lighten-5 tw-ml-2">Alteisen</v-card-title>
                    <v-card-subtitle class="text-grey-lighten-5 tw-ml-2">Item-Level: {{ ilvl }}</v-card-subtitle>
                </v-card-header-text>
                <v-icon @click="toggleFavorite" class="tw-pt-1" style="color: #f5c542">
                    {{ isFavorite ? "mdi-star" : "mdi-star-outline" }}
                </v-icon>
            </v-row>
        </v-card-header>


        <v-row class="tw-pl-4 tw-pt-2">
            <div class="d-flex">
                <img class="tw-ml-4" alt="mokoko icon" width="25" src="/assets/mokoko.png"/>
                <div class="text-body-1 text-grey-lighten-5 font-weight-medium tw-pl-2">Mokoko</div>
            </div>
        </v-row>
        <v-row class="tw-pl-4 tw-pt-2">
            <div class="d-flex justify-center align-center">
                <img class="tw-ml-4" alt="Island Soul icon" width="25"
                     src="https://d3planner-assets.maxroll.gg/lost-ark/icons/tokenitem_9.png"/>
                <div class="text-body-1 text-grey-lighten-4 font-weight-medium tw-pl-2">Island Soul</div>
                <div style="width: 50px"></div>
                <v-switch
                    v-model="gottenToken"
                    color="{{ complete ? 'green' : 'red' }}"
                    hide-details
                ></v-switch>
            </div>

        </v-row>

    </v-card>
</template>
