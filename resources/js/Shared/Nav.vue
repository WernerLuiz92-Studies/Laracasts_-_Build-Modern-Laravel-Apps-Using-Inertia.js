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

                        <!-- Nav Key Links -->
                        <div class="hidden lg:block">
                            <div class="ml-3 flex items-baseline space-x-2">
                                <span class="sr-only"
                                    >Itens do menu de navegação:</span
                                >
                                <div
                                    v-for="(link, index) in keyLinks"
                                    :key="index"
                                >
                                    <div
                                        class="flex items-center text-blue-100"
                                    >
                                        <a
                                            v-if="link.legacy"
                                            :href="link.route"
                                            class="
                                                text-sm
                                                font-medium
                                                leading-5
                                                px-3
                                                py-2
                                                rounded-md
                                                hover:text-white
                                                hover:bg-light-blue-600
                                                hover:bg-opacity-60
                                            "
                                            >{{ link.name }}</a
                                        >
                                        <inertia-link
                                            v-else
                                            @click="
                                                toggleNavigation(
                                                    link.route,
                                                    'key'
                                                )
                                            "
                                            :href="route(link.route)"
                                            :class="[
                                                link.isActive
                                                    ? 'bg-light-blue-600'
                                                    : 'hover:bg-light-blue-600 hover:bg-opacity-60',
                                                'text-sm font-medium leading-5 px-3 py-2 rounded-md hover:text-white',
                                            ]"
                                            :aria-current="
                                                link.isActive
                                                    ? 'page'
                                                    : undefined
                                            "
                                            >{{ link.name }}</inertia-link
                                        >
                                    </div>
                                </div>
                                <!-- Nav More Links -->
                                <Menu as="div" class="relative z-50">
                                    <div>
                                        <MenuButton
                                            class="
                                                px-3
                                                py-2
                                                rounded-md
                                                flex
                                                items-center
                                                text-white
                                                hover:bg-light-blue-600
                                                hover:bg-opacity-60
                                            "
                                        >
                                            <span class="sr-only"
                                                >Mais itens do menu</span
                                            >
                                            <span class="text-sm font-medium"
                                                >Mais</span
                                            >
                                            <ChevronDownIcon
                                                class="
                                                    ml-1
                                                    h-5
                                                    w-5
                                                    fill-current
                                                    text-blue-200
                                                "
                                                aria-hidden="true"
                                            />
                                        </MenuButton>
                                    </div>
                                    <transition
                                        enter-active-class="transition ease-out duration-100"
                                        enter-from-class="transform opacity-0 scale-95"
                                        enter-to-class="transform opacity-100 scale-100"
                                        leave-active-class="transition ease-in duration-75"
                                        leave-from-class="transform opacity-100 scale-100"
                                        leave-to-class="transform opacity-0 scale-95"
                                    >
                                        <MenuItems
                                            class="
                                                origin-top-right
                                                absolute
                                                right-0
                                                mt-2
                                                w-56
                                                rounded-md
                                                shadow-lg
                                                py-1
                                                bg-white
                                                ring-1 ring-black ring-opacity-5
                                                focus:outline-none
                                            "
                                        >
                                            <div
                                                v-for="(
                                                    link, index
                                                ) in moreLinks"
                                                :key="index"
                                            >
                                                <MenuItem
                                                    v-slot="{ active }"
                                                    :class="[
                                                        link.isActive
                                                            ? 'bg-gray-200'
                                                            : '',
                                                        link.separator
                                                            ? 'border-b border-gray-100'
                                                            : '',
                                                    ]"
                                                >
                                                    <a
                                                        v-if="link.legacy"
                                                        :href="link.route"
                                                        :class="[
                                                            active
                                                                ? 'bg-gray-100'
                                                                : '',
                                                            'block px-4 py-2 text-sm text-gray-700',
                                                        ]"
                                                        >{{ link.name }}</a
                                                    >
                                                    <inertia-link
                                                        v-else
                                                        @click="
                                                            toggleNavigation(
                                                                link.route,
                                                                'more'
                                                            )
                                                        "
                                                        :href="
                                                            route(link.route)
                                                        "
                                                        :class="[
                                                            active
                                                                ? 'bg-gray-100'
                                                                : '',
                                                            'block px-4 py-2 text-sm text-gray-700',
                                                        ]"
                                                        >{{
                                                            link.name
                                                        }}</inertia-link
                                                    >
                                                </MenuItem>
                                            </div>
                                        </MenuItems>
                                    </transition>
                                </Menu>
                                <!-- /Nav More Links -->
                            </div>
                        </div>
                        <!-- /Nav Key Links -->
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
                        <button
                            type="button"
                            class="
                                bg-blue-600
                                rounded-full
                                text-blue-200
                                hover:text-white
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
                            <span class="sr-only">Ver Notificações</span>
                            <BellIcon class="h-6 w-6" aria-hidden="true" />
                        </button>
                        <!-- /Notifications Button -->

                        <!-- Profile Dropdown -->
                        <Menu as="div" class="ml-3 relative z-50">
                            <div>
                                <MenuButton
                                    class="
                                        bg-blue-600
                                        hover:bg-light-blue-600
                                        hover:bg-opacity-60
                                        flex
                                        items-center
                                        text-sm text-white
                                        rounded-full
                                        focus:outline-none
                                        focus:ring-2
                                        focus:ring-offset-2
                                        focus:ring-offset-blue-600
                                        focus:ring-white
                                        xl:max-w-[13.5rem]
                                        lg:p-1
                                        lg:focus:ring-0
                                        lg:focus:ring-offset-0
                                        lg:rounded-md
                                    "
                                >
                                    <span class="sr-only">
                                        Abrir menu do usuário
                                    </span>
                                    <img
                                        class="h-8 w-8 lg:mr-2 rounded-full"
                                        :src="$page.props.auth.user.avatar"
                                        @error="generateUserAvatar"
                                        alt=""
                                    />
                                    <span
                                        class="
                                            hidden
                                            xl:block
                                            truncate
                                            ...
                                            xl:max-w-[8.75rem]
                                        "
                                        >{{
                                            $page.props.auth.client.name
                                        }}</span
                                    >
                                    <ChevronDownIcon
                                        class="
                                            hidden
                                            ml-3
                                            h-5
                                            w-5
                                            fill-current
                                            text-blue-200
                                            lg:block
                                        "
                                        aria-hidden="true"
                                    />
                                </MenuButton>
                            </div>
                            <transition
                                enter-active-class="transition ease-out duration-100"
                                enter-from-class="transform opacity-0 scale-95"
                                enter-to-class="transform opacity-100 scale-100"
                                leave-active-class="transition ease-in duration-75"
                                leave-from-class="transform opacity-100 scale-100"
                                leave-to-class="transform opacity-0 scale-95"
                            >
                                <MenuItems
                                    class="
                                        origin-top-right
                                        absolute
                                        right-0
                                        mt-2
                                        w-56
                                        rounded-md
                                        shadow-lg
                                        py-1
                                        bg-white
                                        ring-1 ring-black ring-opacity-5
                                        focus:outline-none
                                    "
                                >
                                    <MenuItem
                                        as="div"
                                        class="
                                            flex flex-col
                                            w-full
                                            h-16
                                            justify-center
                                            text-left
                                            px-4
                                            py-2
                                            text-sm text-gray-900
                                            border-b border-gray-100
                                        "
                                        disabled
                                    >
                                        <span> Conectado como </span>
                                        <span
                                            class="font-medium truncate ..."
                                            >{{
                                                $page.props.auth.user.name
                                            }}</span
                                        >
                                    </MenuItem>
                                    <MenuItem
                                        as="div"
                                        class="
                                            flex flex-col
                                            w-full
                                            h-10
                                            text-left
                                            justify-center
                                            px-4
                                            py-2
                                            text-sm text-gray-900
                                            border-b border-gray-100
                                        "
                                        disabled
                                    >
                                        <span
                                            class="
                                                font-medium
                                                text-gray-500 text-xs
                                                uppercase
                                                truncate
                                                ...
                                            "
                                        >
                                            {{ $page.props.auth.client.name }}
                                        </span>
                                    </MenuItem>
                                    <div
                                        v-for="(link, index) in userLinks"
                                        :key="index"
                                    >
                                        <MenuItem
                                            v-slot="{ active }"
                                            :class="[
                                                link.separator
                                                    ? 'border-b border-gray-100'
                                                    : '',
                                            ]"
                                        >
                                            <div v-if="link.method">
                                                <inertia-link
                                                    :href="route(link.route)"
                                                    :method="link.method"
                                                    :data="link.data"
                                                    as="button"
                                                    :class="[
                                                        active
                                                            ? 'bg-gray-100'
                                                            : '',
                                                        'block w-full text-left px-4 py-2 text-sm text-gray-700',
                                                    ]"
                                                >
                                                    {{ link.name }}
                                                </inertia-link>
                                            </div>
                                            <div v-else>
                                                <a
                                                    v-if="link.legacy"
                                                    :href="link.route"
                                                    :class="[
                                                        active
                                                            ? 'bg-gray-100'
                                                            : '',
                                                        'block px-4 py-2 text-sm text-gray-700',
                                                    ]"
                                                >
                                                    {{ item.name }}
                                                </a>
                                                <inertia-link
                                                    v-else
                                                    @click="
                                                        toggleNavigation(
                                                            link.route,
                                                            'user'
                                                        )
                                                    "
                                                    :href="route(link.route)"
                                                    :class="[
                                                        active
                                                            ? 'bg-gray-100'
                                                            : '',
                                                        'block px-4 py-2 text-sm text-gray-700',
                                                    ]"
                                                >
                                                    {{ link.name }}
                                                </inertia-link>
                                            </div>
                                        </MenuItem>
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                        <!-- /Profile Dropdown -->
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <DisclosurePanel class="lg:hidden">
                <div class="px-2 pt-2 pb-3">
                    <div
                        class="
                            mx-2
                            py-1
                            border-b border-gray-100 border-opacity-20
                        "
                    >
                        <template v-for="link in keyLinks" :key="link.name">
                            <a
                                v-if="link.legacy"
                                :href="link.route"
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
                                {{ link.name }}
                            </a>
                            <inertia-link
                                v-else
                                @click="toggleNavigation(link.route, 'key')"
                                :href="route(link.route)"
                                :class="[
                                    link.isActive
                                        ? 'bg-light-blue-600 text-white'
                                        : 'text-white hover:bg-light-blue-600 hover:bg-opacity-60',
                                    'block px-3 py-2 rounded-md text-base font-medium',
                                ]"
                                :aria-current="
                                    link.isActive ? 'page' : undefined
                                "
                            >
                                {{ link.name }}
                            </inertia-link>
                        </template>
                    </div>
                    <div
                        :class="[
                            link.separator
                                ? 'border-b border-gray-100 border-opacity-20'
                                : '',
                            'mx-2 py-1',
                        ]"
                        v-for="(link, index) in moreLinks"
                        :key="index"
                    >
                        <a
                            v-if="link.legacy"
                            :href="link.route"
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
                            {{ link.name }}
                        </a>
                        <inertia-link
                            v-else
                            @click="toggleNavigation(link.route, 'more')"
                            :href="route(link.route)"
                            :class="[
                                link.isActive
                                    ? 'bg-light-blue-600 text-white'
                                    : 'text-white hover:bg-light-blue-600 hover:bg-opacity-60',
                                'block px-3 py-2 rounded-md text-base font-medium',
                            ]"
                            :aria-current="link.isActive ? 'page' : undefined"
                        >
                            {{ link.name }}
                        </inertia-link>
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
import { BellIcon, MenuIcon, XIcon } from "@heroicons/vue/outline";
import { ChevronDownIcon } from "@heroicons/vue/solid";
import Logo from "./Logo";

const axios = require("axios");

export default {
    components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        BellIcon,
        MenuIcon,
        XIcon,
        ChevronDownIcon,
        Logo,
    },

    async setup() {
        let navigation = [];

        await axios
            .get(route("api.navbar_links"))
            .then((response) => {
                navigation = response.data;
            })
            .catch((error) => {
                console.log(error);
            });

        return {
            navigation,
        };
    },

    data() {
        const keyLinks = this.setLinks(this.navigation.key);
        const moreLinks = this.setLinks(this.navigation.more);
        const userLinks = this.setLinks(this.navigation.user);

        return {
            keyLinks,
            moreLinks,
            userLinks,
        };
    },

    methods: {
        generateUserAvatar(event) {
            let names = this.$page.props.auth.user.name.split(" ");
            let imageUrl = "";

            imageUrl =
                "https://ui-avatars.com/api/?name=" +
                names[0] +
                "+" +
                names[names.length - 1] +
                "&size=256&background=random&rounded=true&color=random";

            event.target.src = imageUrl;
        },

        toggleNavigation(route, from) {
            this.keyLinks.forEach((item) => {
                item.isActive = false;
            });
            this.moreLinks.forEach((item) => {
                item.isActive = false;
            });
            this.userLinks.forEach((item) => {
                item.isActive = false;
            });

            if (from === "key") {
                this.keyLinks.filter((item) => {
                    if (item.route === route) {
                        item.isActive = true;
                    }
                });
            } else if (from === "more") {
                this.moreLinks.filter((item) => {
                    if (item.route === route) {
                        item.isActive = true;
                    }
                });
            } else if (from === "user") {
                this.userLinks.filter((item) => {
                    if (item.route === route) {
                        item.isActive = true;
                    }
                });
            }
        },

        setLinks(links) {
            let newLinks = [];

            links.forEach((separator) => {
                separator.forEach((link, idx) => {
                    let newLink = {
                        name: link.title,
                        route: link.route,
                        isActive: route().current(link.route),
                    };

                    if (link.legacy) {
                        newLink["legacy"] = true;
                    }

                    if (link.method) {
                        newLink["method"] = link.method;
                        newLink["data"] = link.data ?? {};
                    }

                    if (idx === separator.length - 1) {
                        newLink["separator"] = true;
                    }

                    newLinks.push(newLink);
                });
            });

            let last = newLinks[newLinks.length - 1];

            if (last.separator) {
                newLinks[newLinks.indexOf(last)].separator = false;
            }

            return newLinks;
        },
    },
};
</script>
