<script setup>
import Layout from '@/Layouts/Authenticated.vue';
import {Head} from '@inertiajs/inertia-vue3';
import MarisItem from "@/Components/MarisItem";
import {ref, computed, watch, onBeforeMount, onMounted, onBeforeUnmount} from "vue";
import {getMerchants, start, regions} from '@/Helpers/merchants'
import ActiveMerchant from "@/Components/ActiveMerchant";


let goldToGem = ref(500);
let filterRegion = ref(localStorage.getItem("selectedRegion") ?? '');
let filterServer = ref(localStorage.getItem("selectedServer") ?? '');
let timer;
let merchantList = ref([]);

let now = ref(new Date());


let timeTilMerchant = computed(()=>{
    if(now.value.getMinutes() >= 55) {
        return (60-(Math.abs(30 - now.value.getMinutes()))).toString() + ' Minutes and ' + (60 - now.value.getSeconds()) + ' Seconds'
    }
    return (30 - now.value.getMinutes()).toString() + ' Minutes and ' + (60 - now.value.getSeconds()) + ' Seconds'

})

onBeforeMount(() => {
    start();
})

onMounted(() => {
    timer = setInterval(async () => {
        now.value = new Date();
        if (filterServer.value && (55 > now.value.getMinutes() && 30 < now.value.getMinutes())) {
            merchantList.value = await getMerchants(filterServer.value);
            console.info(merchantList.value)
        }
    }, 1000)
})

onBeforeUnmount(() => {
    clearInterval(timer);
})

watch([filterRegion, filterServer], ([newRegion, newServer]) => {
    localStorage.setItem("selectedServer", newServer);
    localStorage.setItem("selectedRegion", newRegion);
});


</script>

<template>
    <Head title="Island Tracker"/>

    <Layout>
        <template #header>
            <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight dark:tw-text-white dark:tw-bg-neutral-700">
                Wandering Merchant Tracker
            </h2>
        </template>

        <div class="tw-py-12">
            <div class="tw-max-w-7xl tw-mx-auto sm:tw-px-6 lg:tw-px-8">
                <div class="tw-bg-white dark:tw-bg-neutral-800 tw-overflow-hidden tw-shadow-sm sm:tw-rounded-lg">
                    <div class="tw-p-6 tw-bg-white dark:tw-bg-neutral-700">
                        <div class="tw-flex tw-bg-white dark:tw-bg-neutral-700 align-center justify-space-between">
                            <div class="tw-flex tw-ml-6  align-center ml-auto">
                                <p class="tw-mr-2 dark:tw-text-white">Region:</p>
                                <select
                                    class="tw-h-10 tw-p-2 text-center tw-rounded-lg tw-drop-shadow-lg tw-bg-white dark:tw-bg-neutral-800 dark:tw-text-white"
                                    v-model="filterRegion">
                                    <option v-for="region in regions" :value="region.name"
                                            v-text="region.name"></option>
                                </select>

                            </div>
                            <div v-if="filterRegion" class="tw-flex tw-ml-6 tw-mr-5 align-center">
                                <p class="tw-mr-2 dark:tw-text-white">Server:</p>
                                <select
                                    class="tw-h-10 tw-p-1 text-center tw-rounded-lg tw-drop-shadow-lg tw-bg-white dark:tw-bg-neutral-800 dark:tw-text-white"
                                    v-model="filterServer">
                                    <option v-for="server in regions.find(r => r.name === filterRegion).servers"
                                            v-text="server"></option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="tw-pb-6 tw-pl-6 tw-pr-6 tw-bg-white dark:tw-bg-neutral-700">
                        <v-container v-if="(55 > now.getMinutes() && 30 < now.getMinutes())"  class="tw-bg-white dark:tw-bg-neutral-700">
                            <v-row>
                                <v-col>
                                    <v-list class="tw-bg-white dark:tw-bg-neutral-700">
                                        <ActiveMerchant v-if="filterServer" class="tw-mt-1" v-for="merchantGroup in merchantList" v-bind="merchantGroup.activeMerchants[0]"></ActiveMerchant>
                                    </v-list>
                                </v-col>
                            </v-row>
                        </v-container>
                        <v-container v-else class="text-center tw-bg-white dark:tw-bg-neutral-700">
                                    <h2 class="tw-text-4xl dark:tw-text-white">The merchants you are looking for are in another castle</h2>
                                   <p class="mt-2 dark:tw-text-white">Merchants are reappearing in {{ timeTilMerchant }}</p>

                        </v-container>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
 <select class=""
 v-model="cad"
 >
 <option
 </select>
