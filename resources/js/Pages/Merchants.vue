<script setup>
import Layout from '@/Layouts/Authenticated.vue';
import {Head} from '@inertiajs/inertia-vue3';
import {ref, computed, watch, onBeforeMount, onMounted, onBeforeUnmount} from "vue";
import {getMerchants, start, regions} from '@/Helpers/merchants'
import ActiveMerchant from "@/Components/ActiveMerchant";

let showNotificationSettings = ref(false);

const notificationSound = new Audio('/assets/notification.mp3')
const notificationSoundWei = new Audio('/assets/weiu.mp3');
const notify = (wei) =>{
    if(wei) {
        notificationSoundWei.volume = 0.5;
        notificationSoundWei.play();
    } else {
        notificationSound.volume = 0.5;
        notificationSound.play();
    }
}

let notifyFilter = ref(
    JSON.parse(localStorage.getItem("notifyFilter")) ?? {
    rapport: false,
    card: ['Wei', 'Seria']
})



let goldToGem = ref(500);
let filterRegion = ref(localStorage.getItem("selectedRegion") ?? '');
let filterServer = ref(localStorage.getItem("selectedServer") ?? '');
let timer;
let merchantList = ref([]);
let merchantListTest = ref([

    {
        "id": 0,
        "server": "Zinnervale",
        "merchantName": "Dorella",
        "activeMerchants": [
            {
                "id": "48d5705b-0745-45bb-473e-08da2fe24b5b",
                "name": "Dorella",
                "zone": "Kalaja",
                "card": {
                    "name": "TEst",
                    "rarity": 3
                },
                "rapport": {
                    "name": "Desiccated Wooden Statue",
                    "rarity": 4
                },
                "votes": 2
            }
        ]
    },{
        "id": 0,
        "server": "Zinnervale",
        "merchantName": "Dorella",
        "activeMerchants": [
            {
                "id": "48d5705b-0745-45bb-473e-08da2fe24b5b",
                "name": "Dorella",
                "zone": "Kalaja",
                "card": {
                    "name": "Levi",
                    "rarity": 2
                },
                "rapport": {
                    "name": "Desiccated Wooden Statue",
                    "rarity": 4
                },
                "votes": 2
            }
        ]
    },
    {
        "id": 0,
        "server": "Zinnervale",
        "merchantName": "Laitir",
        "activeMerchants": [
            {
                "id": "e933f0c5-2545-42e6-474c-08da2fe24b5b",
                "name": "Laitir",
                "zone": "Black Anvil Mine",
                "card": {
                    "name": "Kaysarr",
                    "rarity": 3
                },
                "rapport": {
                    "name": "Piyer's Secret Textbook",
                    "rarity": 3
                },
                "votes": 0
            }
        ]
    },
    {
        "id": 0,
        "server": "Zinnervale",
        "merchantName": "Ben",
        "activeMerchants": [
            {
                "id": "e3630f44-0db2-4302-4778-08da2fe24b5b",
                "name": "Ben",
                "zone": "Loghill",
                "card": {
                    "name": "Varut",
                    "rarity": 2
                },
                "rapport": {
                    "name": "Fancier Bouquet",
                    "rarity": 3
                },
                "votes": 1
            }
        ]
    },
    {
        "id": 0,
        "server": "Zinnervale",
        "merchantName": "Evan",
        "activeMerchants": [
            {
                "id": "1dda4215-18a4-4cf3-47a2-08da2fe24b5b",
                "name": "Evan",
                "zone": "Candaria Territory",
                "card": {
                    "name": "Xereon",
                    "rarity": 2
                },
                "rapport": {
                    "name": "Feather Fan",
                    "rarity": 3
                },
                "votes": 2
            }
        ]
    },
    {
        "id": 0,
        "server": "Zinnervale",
        "merchantName": "Lucas",
        "activeMerchants": [
            {
                "id": "7d35333a-69c5-4483-47ec-08da2fe24b5b",
                "name": "Lucas",
                "zone": "Saland Hill",
                "card": {
                    "name": "Morina",
                    "rarity": 1
                },
                "rapport": {
                    "name": "Yudia Spellbook",
                    "rarity": 3
                },
                "votes": 0
            }
        ]
    },
    {
        "id": 0,
        "server": "Zinnervale",
        "merchantName": "Jeffrey",
        "activeMerchants": [
            {
                "id": "446ea997-c2c9-47fb-4802-08da2fe24b5b",
                "name": "Jeffrey",
                "zone": "Icewing Heights",
                "card": {
                    "name": "Javern",
                    "rarity": 1
                },
                "rapport": {
                    "name": "Shimmering Essence",
                    "rarity": 3
                },
                "votes": 1
            }
        ]
    }
]);

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

watch(notifyFilter.value, (newFilter) => {
    localStorage.setItem("notifyFilter", JSON.stringify(notifyFilter.value))
})

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
                            <div class="tw-flex tw-ml-6  align-center">

                                <v-dialog
                                    v-model="showNotificationSettings"
                                    width="800"
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-btn
                                            @click="showNotificationSettings = true"
                                            class="tw-bg-white dark:tw-text-white dark:tw-bg-neutral-800">
                                            Notification Settings
                                        </v-btn>
                                    </template>

                                    <v-card class="tw-bg-white dark:tw-bg-neutral-800 tw-p-6" width="800">
                                        <v-card-title class="text-h5 dark:tw-text-white">
                                            Notification Settings
                                        </v-card-title>

                                        <v-card-text class="dark:tw-text-white">

                                            <v-container>
                                                <v-row class="tw-flex align-center">
                                                    <v-col>
                                                        <label for="rapportNotify" class="tw-text-amber-500">Legendary Rapport items:</label>
                                                    </v-col>
                                                    <v-col>
                                                        <v-checkbox id="rapportNotify" class="tw-text-black dark:tw-text-white" v-model="notifyFilter.rapport" hide-details></v-checkbox>
                                                    </v-col>
                                                </v-row>
                                                <v-row class="tw-mt-2">
                                                    <v-col>
                                                        <label for="test" class="dark:tw-text-white">Cards:</label>
                                                    </v-col>
                                                    <v-col>
                                                        <v-chip-group
                                                            v-model="notifyFilter.card"
                                                            multiple
                                                            column>
                                                            <v-chip
                                                                value="Seria"
                                                                class="ma-2"
                                                                color="blue"
                                                            >
                                                                Seria
                                                            </v-chip>
                                                            <v-chip
                                                                value="Mokamoka"
                                                                class="ma-2"
                                                                color="blue"
                                                            >
                                                                Mokamoka
                                                            </v-chip>
                                                            <v-chip
                                                                value="Madnick"
                                                                class="ma-2"
                                                                color="blue"
                                                            >
                                                                Madnick
                                                            </v-chip>
                                                            <v-chip
                                                                value="Sian"
                                                                class="ma-2"
                                                                color="blue"
                                                            >
                                                                Sian
                                                            </v-chip>
                                                            <v-chip
                                                                value="Kaysarr"
                                                                class="ma-2"
                                                                color="purple"
                                                            >
                                                                Kaysarr
                                                            </v-chip>
                                                            <v-chip
                                                                value="Wei"
                                                                class="ma-2"
                                                                color="orange"
                                                            >
                                                                Wei
                                                            </v-chip>
                                                        </v-chip-group>
                                                    </v-col>
                                                </v-row>

                                            </v-container>

                                        </v-card-text>

                                        <v-divider></v-divider>

                                        <v-card-actions>
                                            <v-spacer></v-spacer>
                                            <v-btn
                                                class="dark:tw-text-white"
                                                @click="showNotificationSettings = false"
                                            >
                                                Close
                                            </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </v-dialog>

                            </div>
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
                                    class="tw-h-10 tw-p-2 text-center tw-rounded-lg tw-drop-shadow-lg tw-bg-white dark:tw-bg-neutral-800 dark:tw-text-white"
                                    v-model="filterServer">
                                    <option v-for="server in regions.find(r => r.name === filterRegion).servers"
                                            v-text="server"></option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="tw-pb-6 tw-pl-6 tw-pr-6 tw-bg-white dark:tw-bg-neutral-700">
                        <v-container v-if="(55 > now.getMinutes() && 30 < now.getMinutes())" class="tw-bg-white dark:tw-bg-neutral-700">
                            <v-row>
                                <v-col>
                                    <v-list class="tw-bg-white dark:tw-bg-neutral-700">
                                        <ActiveMerchant :notifyFilter="notifyFilter" @notify="notify" v-if="filterServer" class="tw-mt-1" v-for="merchantGroup in merchantList" v-bind="merchantGroup.activeMerchants[0]"></ActiveMerchant>
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

