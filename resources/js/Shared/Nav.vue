<template>
    <div class="min-h-full">
        <Disclosure as="nav" class="bg-blue-600" v-slot="{ open }">
            <div class="container mx-auto px-6 lg:px-8">
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
                            <Link href="/">
                                <Logo class="h-6" alt="Logo da Empresa" />
                            </Link>
                        </div>
                        <!-- /Logo -->

                        <!-- Nav Key Links -->
                        <div class="hidden lg:block">
                            <div class="ml-3 flex items-baseline space-x-2">
                                <span class="sr-only"
                                    >Itens do menu de navegação:</span
                                >
                                <div
                                    v-for="item in navigation.keyLinks"
                                    :key="item.name"
                                >
                                    <div
                                        class="flex items-center text-blue-100"
                                    >
                                        <Link
                                            :href="item.href"
                                            :class="[
                                                $page.url.startsWith(item.href)
                                                    ? 'bg-light-blue-600'
                                                    : 'hover:bg-light-blue-600 hover:bg-opacity-60',
                                                'text-sm font-medium leading-5 px-3 py-2 rounded-md',
                                            ]"
                                            :aria-current="
                                                $page.url.startsWith(item.href)
                                                    ? 'page'
                                                    : undefined
                                            "
                                            >{{ item.name }}</Link
                                        >
                                    </div>
                                </div>
                                <!-- Nav More Links -->
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
                                                divide-y divide-gray-100
                                            "
                                        >
                                            <div
                                                v-for="(
                                                    links, index
                                                ) in navigation.moreLinks"
                                                :key="index"
                                            >
                                                <MenuItem
                                                    v-for="item in links"
                                                    :key="item.name"
                                                    v-slot="{ active }"
                                                >
                                                    <Link
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
                        <Menu as="div" class="ml-3 relative">
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
                                        xl:w-[13.5rem]
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
                                        :src="user.imageUrl"
                                        alt=""
                                    />
                                    <span
                                        class="
                                            hidden
                                            xl:block
                                            truncate
                                            ...
                                            xl:w-[8.75rem]
                                        "
                                        >{{ client.name }}</span
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
                                        divide-y divide-gray-100
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
                                        "
                                        disabled
                                    >
                                        <span> Conectado como </span>
                                        <span
                                            class="font-medium truncate ..."
                                            >{{ user.name }}</span
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
                                            {{ client.name }}
                                        </span>
                                    </MenuItem>
                                    <div
                                        v-for="(links, index) in userNavigation"
                                        :key="index"
                                    >
                                        <MenuItem
                                            v-for="item in links"
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
                <div
                    class="
                        px-2
                        pt-2
                        pb-3
                        divide-y divide-gray-100 divide-opacity-20
                    "
                >
                    <div class="mx-2 py-1">
                        <Link
                            v-for="item in navigation.keyLinks"
                            :key="item.name"
                            :href="item.href"
                            :class="[
                                $page.url.startsWith(item.href)
                                    ? 'bg-light-blue-600 text-white'
                                    : 'text-white hover:bg-light-blue-600 hover:bg-opacity-60',
                                'block px-3 py-2 rounded-md text-base font-medium',
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
                    <div
                        class="mx-2 py-1"
                        v-for="(links, index) in navigation.moreLinks"
                        :key="index"
                    >
                        <Link
                            v-for="item in links"
                            :key="item.name"
                            :href="item.href"
                            :class="[
                                $page.url.startsWith(item.href)
                                    ? 'bg-light-blue-600 text-white'
                                    : 'text-white hover:bg-light-blue-600 hover:bg-opacity-60',
                                'block px-3 py-2 rounded-md text-base font-medium',
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
            </DisclosurePanel>
            <!-- /Mobile Menu -->
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
        const navigation = {
            keyLinks: [
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
            ],
            moreLinks: [
                [
                    {
                        name: "Velocidade",
                        href: "/traffic_control",
                    },
                ],
                [
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
                ],
                [
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
                ],
            ],
        };

        const userNavigation = [
            [
                {
                    name: "Dados de cliente",
                    href: "/users/settings",
                },
                {
                    name: "Preferências",
                    href: "/users/settings",
                },
                {
                    name: "Log de atividades",
                    href: "/users/settings",
                },
            ],
            [
                {
                    name: "Meus dados",
                    href: "/users/settings",
                },
                {
                    name: "Alterar senha",
                    href: "/users/settings",
                },
                {
                    name: "Excluir conta",
                    href: "/users/settings",
                },
            ],
            [
                {
                    name: "Onboarding",
                    href: "/users/settings",
                },
                {
                    name: "Sair",
                    href: "/logout",
                    method: "post",
                },
            ],
        ];

        return {
            user: {
                name: "Werner Luiz Gottschalt",
                email: "werner@lumiun.com",
                imageUrl: "",
            },
            client: {
                name: "Amme - Organização Social Associação Mantenedora De Mães Especiais",
                imageUrl: "",
            },
            navigation,
            userNavigation,
        };
    },

    created() {
        this.generateUserAvatar();
    },

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

        navigationSeparators(navigation) {
            let mobileNav = [];

            mobileNav.concat(this.navigation, this.dropDownNavigation);

            console.log(mobileNav);

            return mobileNav;
        },
    },
};
</script>