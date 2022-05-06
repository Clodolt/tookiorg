<script setup>
import {onBeforeMount, ref, watch} from 'vue';
import BreezeDropdown from '@/Components/Dropdown.vue';
import BreezeDropdownLink from '@/Components/DropdownLink.vue';
import BreezeNavLink from '@/Components/NavLink.vue';
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link} from '@inertiajs/inertia-vue3';

let root = document.getElementsByTagName('html')[0];
let darkMode = ref(localStorage.getItem("isDark") === 'true');

onBeforeMount(() => {
    if(darkMode.value) {
        root.classList.add('tw-dark');
    }
})

watch(darkMode, () => {
    if(darkMode.value) {
        localStorage.setItem("isDark", "true");
        root.classList.add('tw-dark');
    } else {
        localStorage.setItem("isDark", "false");
        root.classList.remove('tw-dark');
    }
})

const showingNavigationDropdown = ref(false);
</script>

<template>

    <div>
        <div class="tw-min-h-screen tw-bg-gray-100 dark:tw-bg-neutral-800">
            <nav class="tw-bg-white tw-border-b tw-border-gray-100 dark:tw-bg-neutral-700">
                <!-- Primary Navigation Menu -->
                <div class="tw-max-w-7xl tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8">
                    <div class="tw-flex tw-h-16 dark:tw-text-white">
                        <div class="tw-flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 tw-flex tw-items-center">
                                    <img class="mr-3 mb-2" src="/assets/tooki.png" style="height:55px" />
                            </div>

                            <!-- Navigation Links -->
                            <div class="tw-hidden sm:tw--my-px sm:tw-ml-10 sm:tw-flex">
                                <BreezeNavLink class="dark:tw-text-white" :href="route('islandtracker')" :active="route().current('islandtracker')">
                                    Island Tracker
                                </BreezeNavLink>
                            </div>
                            <div class="tw-hidden sm:tw--my-px sm:tw-ml-10 sm:tw-flex">
                                <BreezeNavLink class="dark:tw-text-white" :href="route('marisshop')" :active="route().current('marisshop')">
                                    Mari's Shop
                                </BreezeNavLink>
                            </div>

                        </div>

                        <div class="tw-hidden sm:tw-flex sm:tw-items-center tw-ml-auto tw-mr-0">
                            <!-- Settings Dropdown -->
                            <div v-if="$page.props.auth.user" class="tw-ml-3 tw-relative">
                                <BreezeDropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="tw-inline-flex tw-rounded-md">
                                            <button type="button"
                                                    class="tw-inline-flex tw-items-center tw-px-3 tw-py-2  tw-border-transparent tw-text-sm tw-leading-4 tw-font-medium tw-rounded-md tw-text-gray-500 hover:tw-text-neutral-200 focus:tw-outline-none tw-transition tw-ease-in-out tw-duration-150 dark:tw-text-white dark:hover:tw-text-neutral-300">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="tw-ml-2 tw--mr-0.5 tw-h-4 tw-w-4"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <BreezeDropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </BreezeDropdownLink>
                                    </template>
                                </BreezeDropdown>

                            </div>
                            <div class="tw-hidden sm:tw--my-px sm:tw-ml-10 sm:tw-flex tw-items-center">
                                <v-icon size="27" class="tw-mr-2">
                                    mdi-weather-sunny
                                </v-icon>
                                <v-switch v-model = "darkMode" hide-details>
                                </v-switch>
                                <v-icon>
                                    mdi-weather-night
                                </v-icon>
                            </div>
                        </div>


                        <!-- Hamburger -->
                        <div class="tw--mr-2 tw-flex tw-items-center sm:tw-hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown"
                                    class="tw-inline-flex tw-items-center tw-justify-center tw-p-2 tw-rounded-md tw-text-gray-400 hover:tw-text-gray-500 hover:tw-bg-gray-100 focus:tw-outline-none focus:tw-bg-gray-100 focus:tw-text-gray-500 tw-transition tw-duration-150 tw-ease-in-out">
                                <svg class="tw-h-6 tw-w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{'tw-hidden': showingNavigationDropdown, 'tw-inline-flex': ! showingNavigationDropdown }"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"/>
                                    <path
                                        :class="{'tw-hidden': ! showingNavigationDropdown, 'tw-inline-flex': showingNavigationDropdown }"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'tw-block': showingNavigationDropdown, 'tw-hidden': ! showingNavigationDropdown}"
                     class="sm:tw-hidden">
                    <div class="tw-pt-2 tw-pb-3 tw-space-y-1">
                        <BreezeResponsiveNavLink :href="route('islandtracker')" :active="route().current('islandtracker')">
                            Island Tracker
                        </BreezeResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div v-if="$page.props.auth.user" class="tw-pt-4 tw-pb-1 tw-border-t tw-border-gray-200">
                        <div class="tw-px-4">
                            <div class="tw-font-medium tw-text-base tw-text-gray-800">{{
                                    $page.props.auth.user.name
                                }}
                            </div>
                            <div class="tw-font-medium tw-text-sm tw-text-gray-500">{{
                                    $page.props.auth.user.email
                                }}
                            </div>
                        </div>

                        <div class="tw-mt-3 tw-space-y-1">
                            <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </BreezeResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="tw-bg-white tw-shadow dark:tw-text-white dark:tw-bg-neutral-700" v-if="$slots.header">
                <div class="tw-max-w-7xl tw-mx-auto tw-py-6 tw-px-4 sm:tw-px-6 lg:tw-px-8 dark:tw-text-white dark:tw-bg-neutral-700">
                    <slot name="header"/>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot/>
            </main>
            <v-footer padless class="dark:tw-bg-neutral-700">
                <v-container fluid>
                <v-card
                    flat="true"
                    tile
                    class="tw-bg-white dark:tw-bg-neutral-700 text-center"
                >
                    <v-card-text>
                        <v-btn
                            class="mx-4 white--text dark:tw-text-white dark:tw-bg-black "
                            icon ="mdi-github"
                            href="https://github.com/Clodolt/tookiorg"
                        >
                        </v-btn>
                    </v-card-text>

                    <v-card-text class="white--text dark:tw-text-white pt-0">
                        Dodi ist unser Lieblingsbaum ❤️
                    </v-card-text>

                    <v-divider></v-divider>

                    <v-card-text class="white--text dark:tw-text-white">
                        {{ new Date().getFullYear() }} — <strong>Clodolt & Erela</strong>
                    </v-card-text>
                </v-card>
                </v-container>
            </v-footer>
        </div>
    </div>
</template>
