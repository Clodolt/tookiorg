<script setup>
import Layout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import MarisItem from "@/Components/MarisItem";

</script>

<template>
    <Head title="Island Tracker" />

    <Layout>
        <template #header>
            <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight dark:tw-text-white dark:tw-bg-neutral-700">
                Island Tracker
            </h2>
        </template>

        <div class="tw-py-12">
            <div class="tw-max-w-7xl tw-mx-auto sm:tw-px-6 lg:tw-px-8">
                <div class="tw-bg-white tw-overflow-hidden tw-shadow-sm sm:tw-rounded-lg">
                    <div class="tw-p-6 tw-bg-white dark:tw-bg-neutral-700">
                        <v-container>
                            <v-row>
                                <v-col>
                                    <v-list class="tw-bg-neutral-100 dark:tw-bg-neutral-600">
                                        <MarisItem key="1" title="Test" price="3"></MarisItem>
                                        <MarisItem key="1" title="Test" price="3"></MarisItem>
                                        <MarisItem key="1" title="Test" price="3"></MarisItem>
                                    </v-list>
                                </v-col>
                                <v-col>
                                    <v-list class="tw-bg-neutral-100 dark:tw-bg-neutral-600">
                                        <MarisItem key="1" title="Test" price="3"></MarisItem>
                                        <MarisItem key="1" title="Test" price="3"></MarisItem>
                                        <MarisItem key="1" title="Test" price="3"></MarisItem>
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
