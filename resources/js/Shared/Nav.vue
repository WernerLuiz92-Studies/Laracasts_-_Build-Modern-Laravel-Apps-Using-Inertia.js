<template>
    <div class="min-h-full">
        <Disclosure as="nav" class="bg-sky-600" v-slot="{ open }">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <Link href="/">
                                <Logo class="h-6" alt="Logo da Empresa" />
                            </Link>
                        </div>
                        <div class="hidden lg:block">
                            <div class="ml-3 flex items-baseline space-x-2">
                                <span class="sr-only"
                                    >Itens do menu de navegação:</span
                                >
                                <div
                                    v-for="item in navigation"
                                    :key="item.name"
                                >
                                    <div class="flex items-center text-white">
                                        <Link
                                            :href="item.href"
                                            :class="[
                                                $page.url.startsWith(item.href)
                                                    ? 'bg-sky-700'
                                                    : 'hover:bg-sky-500 hover:bg-opacity-75',
                                                'text-sm font-medium px-3 py-2 rounded-md',
                                            ]"
                                            :aria-current="
                                                $page.url.startsWith(item.href)
                                                    ? 'page'
                                                    : undefined
                                            "
                                        >
                                            {{ item.name }}
                                        </Link>
                                    </div>
                                </div>
                                <Menu as="div" class="relative">
                                    <div>
                                        <MenuButton
                                            class="
                                                px-3
                                                py-2
                                                rounded-md
                                                flex
                                                items-center
                                                text-white
                                                hover:bg-sky-500
                                                hover:bg-opacity-75
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
                                                    text-sky-200
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
                                                w-52
                                                rounded-md
                                                shadow-lg
                                                py-1
                                                bg-white
                                                ring-1 ring-black ring-opacity-5
                                                focus:outline-none
                                            "
                                        >
                                            <MenuItem
                                                v-for="item in dropDownNavigation"
                                                :key="item.name"
                                                v-slot="{ active }"
                                            >
                                                <div
                                                    v-if="
                                                        item.name ===
                                                        'separator'
                                                    "
                                                >
                                                    <hr
                                                        class="
                                                            border-t
                                                            border-gray-200
                                                        "
                                                    />
                                                </div>
                                                <Link
                                                    v-else
                                                    :href="item.href"
                                                    :class="[
                                                        active
                                                            ? 'bg-gray-100'
                                                            : '',
                                                        'block px-4 py-2 text-sm text-gray-700',
                                                    ]"
                                                    >{{ item.name }}</Link
                                                >
                                            </MenuItem>
                                        </MenuItems>
                                    </transition>
                                </Menu>
                            </div>
                        </div>
                    </div>
                    <div class="hidden lg:block">
                        <div class="ml-4 flex items-center lg:ml-6">
                            <button
                                type="button"
                                class="
                                    bg-sky-600
                                    p-1
                                    rounded-full
                                    text-sky-200
                                    hover:text-white
                                    focus:outline-none
                                "
                            >
                                <span class="sr-only">Ver Notificações</span>
                                <BellIcon class="h-6 w-6" aria-hidden="true" />
                            </button>

                            <!-- Profile dropdown -->
                            <Menu as="div" class="ml-3 relative">
                                <div>
                                    <MenuButton
                                        class="
                                            p-1
                                            max-w-xs
                                            bg-sky-600
                                            rounded-full
                                            flex
                                            items-center
                                            text-sm text-white
                                            focus:outline-none
                                        "
                                    >
                                        <span class="sr-only"
                                            >Abrir menu do usuário</span
                                        >
                                        <img
                                            class="h-8 w-8 rounded-full"
                                            :src="user.imageUrl"
                                            alt=""
                                        />
                                        <span class="ml-2"
                                            >Empresa de Exemplo</span
                                        >
                                        <ChevronDownIcon
                                            class="
                                                ml-3
                                                h-5
                                                w-5
                                                fill-current
                                                text-sky-200
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
                                            w-48
                                            rounded-md
                                            shadow-lg
                                            py-1
                                            bg-white
                                            ring-1 ring-black ring-opacity-5
                                            focus:outline-none
                                        "
                                    >
                                        <MenuItem
                                            v-for="item in userNavigation"
                                            :key="item.name"
                                            v-slot="{ active }"
                                        >
                                            <div v-if="item.method">
                                                <Link
                                                    :href="item.href"
                                                    :method="item.method"
                                                    :data="{
                                                        userId: 1,
                                                    }"
                                                    as="button"
                                                    :class="[
                                                        active
                                                            ? 'bg-gray-100'
                                                            : '',
                                                        'block w-full text-left px-4 py-2 text-sm text-gray-700',
                                                    ]"
                                                >
                                                    {{ item.name }}
                                                </Link>
                                            </div>
                                            <Link
                                                v-else
                                                :href="item.href"
                                                :class="[
                                                    active ? 'bg-gray-100' : '',
                                                    'block px-4 py-2 text-sm text-gray-700',
                                                ]"
                                            >
                                                {{ item.name }}
                                            </Link>
                                        </MenuItem>
                                    </MenuItems>
                                </transition>
                            </Menu>
                            <!-- /Profile dropdown -->
                        </div>
                    </div>
                    <div class="-mr-2 flex lg:hidden">
                        <!-- Mobile menu button -->
                        <DisclosureButton
                            class="
                                bg-sky-600
                                inline-flex
                                items-center
                                justify-center
                                p-2
                                rounded-md
                                text-sky-200
                                hover:text-white
                                hover:bg-sky-500
                                hover:bg-opacity-75
                                focus:outline-none
                                focus:ring-2
                                focus:ring-offset-2
                                focus:ring-offset-sky-600
                                focus:ring-white
                            "
                        >
                            <span class="sr-only">Open main menu</span>
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
                        <!-- /Mobile menu button -->
                    </div>
                </div>
            </div>
            <DisclosurePanel class="lg:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <Link
                        v-for="item in mobileNavigation"
                        :key="item.name"
                        :href="item.href"
                        :class="[
                            $page.url.startsWith(item.href)
                                ? 'bg-sky-700 text-white'
                                : 'text-white hover:bg-sky-500 hover:bg-opacity-75',
                            'block px-3 py-2 rounded-md text-base font-medium',
                        ]"
                        :aria-current="
                            $page.url.startsWith(item.href) ? 'page' : undefined
                        "
                    >
                        {{ item.name }}
                    </Link>
                </div>
                <div class="pt-4 pb-3 border-t border-sky-700">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img
                                class="h-10 w-10 rounded-full"
                                :src="user.imageUrl"
                                alt=""
                            />
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-white">
                                {{ user.name }}
                            </div>
                            <div class="text-sm font-medium text-sky-300">
                                {{ user.email }}
                            </div>
                        </div>
                        <button
                            type="button"
                            class="
                                ml-auto
                                bg-sky-600
                                flex-shrink-0
                                p-1
                                border-2 border-transparent
                                rounded-full
                                text-sky-200
                                hover:text-white
                                focus:outline-none
                                focus:ring-2
                                focus:ring-offset-2
                                focus:ring-offset-sky-600
                                focus:ring-white
                            "
                        >
                            <span class="sr-only">View notifications</span>
                            <BellIcon class="h-6 w-6" aria-hidden="true" />
                        </button>
                    </div>
                    <div
                        v-for="item in userNavigation"
                        :key="item.name"
                        class="mt-3 px-2 space-y-1"
                    >
                        <Link
                            v-if="item.method"
                            :method="item.method"
                            as="button"
                            :href="item.href"
                            class="
                                block
                                px-3
                                py-2
                                rounded-md
                                text-base
                                font-medium
                                text-white
                                hover:bg-sky-500 hover:bg-opacity-75
                            "
                        >
                            {{ item.name }}
                        </Link>
                        <Link
                            v-else
                            :href="item.href"
                            class="
                                block
                                px-3
                                py-2
                                rounded-md
                                text-base
                                font-medium
                                text-white
                                hover:bg-sky-500 hover:bg-opacity-75
                            "
                        >
                            {{ item.name }}
                        </Link>
                    </div>
                </div>
            </DisclosurePanel>
        </Disclosure>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
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

export default {
    components: {
        Link,
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

    data() {
        const navigation = [
            {
                name: "Dashboard",
                href: "/dashboard",
            },
            {
                name: "Grupos",
                href: "/localgroups",
            },
            {
                name: "Controle de Acesso",
                href: "/access_control",
            },
            {
                name: "Firewall",
                href: "/firewall",
            },
            {
                name: "VPN Empresarial",
                href: "/vpns",
            },
            {
                name: "Relatórios",
                href: "/reports",
            },
        ];

        const dropDownNavigation = [
            {
                name: "Velocidade",
                href: "/traffic_control",
            },
            {
                name: "separator",
                href: "#",
            },
            {
                name: "Redes",
                href: "/networks",
            },
            {
                name: "Equipamentos",
                href: "/clientips",
            },
            {
                name: "Usuários",
                href: "/users",
            },
            {
                name: "separator",
                href: "#",
            },
            {
                name: "Registros DNS locais",
                href: "/networks/custom_dns_record",
            },
            {
                name: "Compatibilidade AD",
                href: "/networks/conditional_forwarding_dns",
            },
            {
                name: "Endereços MAC liberados",
                href: "/clientips/ignored_macs",
            },
        ];

        const userNavigation = [
            {
                name: "Settings",
                href: "/users/settings",
            },
            {
                name: "Sign out",
                href: "/logout",
                method: "post",
            },
        ];

        return {
            user: {
                name: "Werner Luiz Gottschalt",
                email: "werner@lumiun.com",
                imageUrl: "",
            },
            navigation,
            userNavigation,
            dropDownNavigation,
        };
    },

    created() {
        this.generateUserAvatar();
    },

    // setup() {
    //     return {
    //         navigation,
    //         userNavigation,
    //         dropDownNavigation,
    //     };
    // },

    methods: {
        generateUserAvatar() {
            if (this.user.imageUrl !== "") {
                return;
            }
            let names = this.user.name.split(" ");

            this.user.imageUrl =
                "https://ui-avatars.com/api/?name=" +
                names[0] +
                "+" +
                names[names.length - 1] +
                "&size=256&background=random&rounded=true&color=random";
        },

        mobileNavigation() {
            let mobileNav = [];

            mobileNav.concat(this.navigation, this.dropDownNavigation);

            console.log(mobileNav);

            return mobileNav;
        },
    },
};
</script>