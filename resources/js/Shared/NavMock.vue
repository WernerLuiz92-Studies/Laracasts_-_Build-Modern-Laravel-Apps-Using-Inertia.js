<template>
    <div class="min-h-full">
        <Disclosure as="nav" class="bg-blue-600" v-slot="{ open }">
            <div class="max-w-full mx-auto px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <!-- Mobile Menu Hamburger -->
                    <div
                        class="
                            absolute
                            inset-y-0
                            left-0
                            flex
                            items-center
                            lg:hidden
                        "
                    >
                        <DisclosureButton
                            class="
                                inline-flex
                                items-center
                                justify-center
                                p-2
                                rounded-md
                                text-blue-200
                                hover:text-white
                                hover:bg-light-blue-500
                                hover:bg-opacity-75
                                focus:outline-none
                                focus:ring-2
                                focus:ring-inset
                                focus:ring-white
                            "
                        >
                            <span class="sr-only">Abrir o menu</span>
                            <MenuIcon
                                v-if="!open"
                                class="block h-6 w-6"
                                aria-hidden="true"
                            />
                            <XIcon
                                v-else
                                class="block h-6 w-6"
                                aria-hidden="true"
                            />
                        </DisclosureButton>
                    </div>
                    <!-- /Mobile Menu Hamburger -->

                    <div
                        class="
                            flex-1 flex
                            lg:flex-none
                            items-center
                            justify-center
                            lg:justify-arround
                        "
                    >
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <inertia-link
                                :href="route('dashboard')"
                                @click="toggleNavigation('dashboard', 'key')"
                            >
                                <Logo class="h-6" alt="Logo da Empresa" />
                            </inertia-link>
                        </div>
                        <!-- /Logo -->
                    </div>

                    <div
                        class="
                            absolute
                            inset-y-0
                            right-0
                            flex
                            items-center
                            pr-2
                            lg:static lg:inset-auto lg:ml-6 lg:pr-0
                        "
                    >
                        <!-- Notifications Button -->
                        <div
                            class="
                                bg-blue-600
                                rounded-full
                                text-blue-200
                                focus:outline-none
                                focus:ring-2
                                focus:ring-offset-2
                                focus:ring-offset-blue-600
                                focus:ring-white
                                lg:p-1
                                lg:focus:ring-0
                                lg:focus:ring-offset-0
                                lg:rounded-md
                            "
                        >
                            <Spinner class="animate-spin h-8 w-8" />
                        </div>
                        <!-- /Notifications Button -->
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <DisclosurePanel class="lg:hidden">
                <div
                    class="
                        px-2
                        pt-2
                        pb-3
                        divide-y divide-gray-100 divide-opacity-20
                    "
                >
                    <div class="mx-2 py-1">
                        <template
                            v-for="item in navigation.keyLinks"
                            :key="item.name"
                        >
                            <a
                                v-if="item.legacy"
                                :href="item.href"
                                class="
                                    block
                                    px-3
                                    py-2
                                    rounded-md
                                    text-base
                                    font-medium
                                    text-white
                                    hover:bg-light-blue-600 hover:bg-opacity-60
                                "
                            >
                                {{ item.name }}
                            </a>
                            <inertia-link
                                v-else
                                :href="route(item.route)"
                                :class="[
                                    route().current(item.route)
                                        ? 'bg-light-blue-600 text-white'
                                        : 'text-white hover:bg-light-blue-600 hover:bg-opacity-60',
                                    'block px-3 py-2 rounded-md text-base font-medium',
                                ]"
                                :aria-current="
                                    route().current(item.route)
                                        ? 'page'
                                        : undefined
                                "
                            >
                                {{ item.name }}
                            </inertia-link>
                        </template>
                    </div>
                    <div
                        class="mx-2 py-1"
                        v-for="(links, index) in navigation.moreLinks"
                        :key="index"
                    >
                        <template v-for="item in links" :key="item.name">
                            <a
                                v-if="item.legacy"
                                :href="item.route"
                                class="
                                    block
                                    px-3
                                    py-2
                                    rounded-md
                                    text-base
                                    font-medium
                                    text-white
                                    hover:bg-light-blue-600 hover:bg-opacity-60
                                "
                            >
                                {{ item.name }}
                            </a>
                            <inertia-link
                                v-else
                                :href="route(item.route)"
                                :class="[
                                    route().current(item.route)
                                        ? 'bg-light-blue-600 text-white'
                                        : 'text-white hover:bg-light-blue-600 hover:bg-opacity-60',
                                    'block px-3 py-2 rounded-md text-base font-medium',
                                ]"
                                :aria-current="
                                    route().current(item.route)
                                        ? 'page'
                                        : undefined
                                "
                            >
                                {{ item.name }}
                            </inertia-link>
                        </template>
                    </div>
                </div>
            </DisclosurePanel>
            <!-- /Mobile Menu -->
        </Disclosure>
    </div>
</template>

<script>
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
} from "@headlessui/vue";
import { RefreshIcon, MenuIcon, XIcon } from "@heroicons/vue/outline";
import { ChevronDownIcon } from "@heroicons/vue/solid";
import Logo from "./Logo";
import Spinner from "./Spinner";

export default {
    components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        RefreshIcon,
        MenuIcon,
        XIcon,
        ChevronDownIcon,
        Logo,
        Spinner,
    },

    data() {
        return {
            keyLinks: [],
            moreLinks: [],
            userLinks: [],
        };
    },
};
</script>
