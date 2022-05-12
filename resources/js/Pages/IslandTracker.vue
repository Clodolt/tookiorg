<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head, usePage} from '@inertiajs/inertia-vue3';
import IslandCard from "@/Components/IslandCard";
import {computed, onBeforeMount, onMounted, reactive, ref} from "vue";

const filterText=ref('')
let showFilter = ref('');
let soulTypeFilter = ref('');

const user = computed(()=>{
    const user = usePage().props.value.auth.user;
    return { user };
})

const id = user.value.user.id;

let islandList = ref([]);

const filteredList = computed(() => {
    return islandList.value
        .sort()
        .filter(
            island =>
                island.title.toLowerCase().includes(filterText.value.toLowerCase())
        )
        .filter(
            island => {
                if (soulTypeFilter.value)
                    return island.soulType === soulTypeFilter.value
                return island
            }
        )
       .filter(
            island => {
                if (showFilter.value === 'completed')
                    return island.pivot.soulGotten && (island.mokokosTotal - island.pivot.mokokosGotten === 0)
                if (showFilter.value === 'incomplete')
                    return !island.pivot.soulGotten || !(island.mokokosTotal - island.pivot.mokokosGotten === 0)
                if (showFilter.value === 'favorites')
                    return island.pivot.isFavorite && !(island.pivot.soulGotten && island.mokokosTotal - island.pivot.mokokosGotten === 0)
                return island
            }
        )
        /*
        .sort((a,b) => {
            if(a.isFavorite.value && b.isFavorite.value) {
                return 0;
            } else if(a.isFavorite.value && !b.isFavorite.value){
                return -1;
            }else{
                return 1;
            }
        })
        */

})

function updateIsland(island, key, value){
    let islandIndex = islandList.value.findIndex((item) => item.id === island.id);
    islandList.value[islandIndex].pivot[key] = value;


    axios.post('/api/islands/'+id, islandList.value[islandIndex]).then(res => {
        getIslands('/api/islands/'+id);
        });

}


function getIslands(url){
    axios.get(url).then(res => {
        islandList.value = res.data;

    });

}

onBeforeMount(()=> {
    getIslands(`/api/islands/${id}`);
})

</script>

<template>
    <Head title="Island Tracker" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="tw-flex justify-center align-center">
                <v-icon class="tw--mr-10 tw-z-50 tw-relative">
                    mdi-magnify
                </v-icon>
                <input class="tw-h-10 tw-w-1/2 tw-mr-10 text-center tw-rounded-lg tw-drop-shadow-lg tw-bg-white dark:tw-bg-neutral-800 dark:tw-text-white pl-3" type="text" v-model="filterText" placeholder="Search Islands" />

                <label class="tw-ml-3 tw--mr-3">Show:</label>
                <select v-model="showFilter" name="show" class="tw-w-1/6 tw-h-10 tw-rounded-lg text-center tw-drop-shadow-lg tw-bg-white dark:tw-bg-neutral-800 dark:tw-text-white tw-ml-6">
                    <option class="text-center" value=""> All </option>
                    <option class="text-center" value="favorites"> Favorites </option>
                    <option class="text-center" value="completed"> Completed </option>
                    <option class="text-center" value="incomplete"> Incomplete </option>
                </select>

                <label class="tw-ml-3 tw--mr-3">Soul Type:</label>
                <select v-model="soulTypeFilter" name="soulType" class="tw-w-1/6 tw-h-10 tw-rounded-lg tw-drop-shadow-lg tw-bg-white dark:tw-bg-neutral-800 dark:tw-text-white pl-3 tw-ml-6">

                    <option class="text-center" value=""> All </option>
                    <option class="text-center"> RNG </option>
                    <option class="text-center"> Una's Task </option>
                </select>

            </div>
        </template>

        <div class="tw-py-12">
            <div class="tw-max-w-7xl tw-mx-auto sm:tw-px-6 lg:tw-px-8">
                <div class="tw-bg-white tw-overflow-hidden tw-shadow-sm sm:tw-rounded-lg">
                    <div class="tw-p-6 tw-bg-white dark:tw-bg-neutral-700">
                    <v-container>
                        <v-row>
                            <v-col v-for="item in filteredList" :key="item.title" cols="4">
                                <IslandCard v-bind="item" @update-island="updateIsland"/>
                            </v-col>

                        </v-row>
                    </v-container>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
