<script setup>
import ToggleButton from "@/Components/toogle-btn";

defineProps(['message']);
</script>

<template>
    <v-card
        width="400"
        class="bg-green"
    >
        <v-card-header>

            <v-row class="tw-p-3">
                <v-avatar>
                    <v-img src = "https://cdn.vuetifyjs.com/images/john.jpg"></v-img>
                </v-avatar>
                <v-card-header-text>
                    <v-card-title class="tw-ml-2">Alteisen</v-card-title>
                    <v-card-subtitle class="tw-ml-2">Item-Level 250</v-card-subtitle>
                </v-card-header-text>
                <v-icon class="tw-pt-1">mdi-star-outline</v-icon>
            </v-row>
        </v-card-header>

    </v-card>
</template>
