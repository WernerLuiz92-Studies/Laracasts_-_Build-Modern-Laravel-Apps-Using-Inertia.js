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
                            <a href="/v1/">
                                <Logo class="h-6" alt="Logo da Empresa" />
                            </a>
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
                                        <a
                                            v-if="item.legacy"
                                            :href="item.route"
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
                                            >{{ item.name }}</a
                                        >
                                        <inertia-link
                                            v-else
                                            :href="route(item.route)"
                                            :class="[
                                                route().current(item.route)
                                                    ? 'bg-light-blue-600'
                                                    : 'hover:bg-light-blue-600 hover:bg-opacity-60',
                                                'text-sm font-medium leading-5 px-3 py-2 rounded-md hover:text-white',
                                            ]"
                                            :aria-current="
                                                route().current(item.route)
                                                    ? 'page'
                                                    : undefined
                                            "
                                            >{{ item.name }}</inertia-link
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
                                                    <a
                                                        v-if="item.legacy"
                                                        :href="item.route"
                                                        :class="[
                                                            active
                                                                ? 'bg-gray-100'
                                                                : '',
                                                            'block px-4 py-2 text-sm text-gray-700',
                                                        ]"
                                                        >{{ item.name }}</a
                                                    >
                                                    <inertia-link
                                                        v-else
                                                        :href="
                                                            route(item.route)
                                                        "
                                                        :class="[
                                                            active
                                                                ? 'bg-gray-100'
                                                                : '',
                                                            'block px-4 py-2 text-sm text-gray-700',
                                                        ]"
                                                        >{{
                                                            item.name
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
                                        v-for="(links, index) in userNavigation"
                                        :key="index"
                                    >
                                        <MenuItem
                                            v-for="item in links"
                                            :key="item.name"
                                            v-slot="{ active }"
                                        >
                                            <div v-if="item.method">
                                                <inertia-link
                                                    :href="item.href"
                                                    :method="item.method"
                                                    :data="item.data"
                                                    as="button"
                                                    :class="[
                                                        active
                                                            ? 'bg-gray-100'
                                                            : '',
                                                        'block w-full text-left px-4 py-2 text-sm text-gray-700',
                                                    ]"
                                                >
                                                    {{ item.name }}
                                                </inertia-link>
                                            </div>
                                            <div v-else>
                                                <a
                                                    v-if="item.legacy"
                                                    :href="item.href"
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
                                                    :href="item.href"
                                                    :class="[
                                                        active
                                                            ? 'bg-gray-100'
                                                            : '',
                                                        'block px-4 py-2 text-sm text-gray-700',
                                                    ]"
                                                >
                                                    {{ item.name }}
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
                                :href="item.href"
                                :class="[
                                    item.active
                                        ? 'bg-light-blue-600 text-white'
                                        : 'text-white hover:bg-light-blue-600 hover:bg-opacity-60',
                                    'block px-3 py-2 rounded-md text-base font-medium',
                                ]"
                                :aria-current="item.active ? 'page' : undefined"
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
                                :href="item.href"
                                :class="[
                                    item.active
                                        ? 'bg-light-blue-600 text-white'
                                        : 'text-white hover:bg-light-blue-600 hover:bg-opacity-60',
                                    'block px-3 py-2 rounded-md text-base font-medium',
                                ]"
                                :aria-current="item.active ? 'page' : undefined"
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
import { BellIcon, MenuIcon, XIcon } from "@heroicons/vue/outline";
import { ChevronDownIcon } from "@heroicons/vue/solid";
import Logo from "./Logo";

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

    data() {
        const navigation = {
            keyLinks: [
                {
                    name: "Dashboard",
                    route: "dashboard",
                },
                {
                    name: "Grupos",
                    href: route("localgroups"),
                    active: route().current("localgroups"),
                },
                {
                    name: "Controle de Acesso",
                    href: route("access.control"),
                    active: route().current("access.control"),
                },
                {
                    name: "Firewall",
                    href: route("firewall"),
                    active: route().current("firewall"),
                },
                {
                    name: "VPN Empresarial",
                    href: route("vpns"),
                    active: route().current("vpns"),
                },
                {
                    name: "Relatórios",
                    href: route("reports"),
                    active: route().current("reports"),
                },
            ],
            moreLinks: [
                [
                    {
                        name: "Velocidade",
                        href: route("traffic_control"),
                        active: route().current("traffic_control"),
                    },
                ],
                [
                    {
                        name: "Redes",
                        href: route("networks"),
                        active: route().current("networks"),
                    },
                    {
                        name: "Equipamentos",
                        href: route("clientips"),
                        active: route().current("clientips"),
                    },
                    {
                        name: "Usuários",
                        href: route("users"),
                        active: route().current("users"),
                    },
                ],
                [
                    {
                        name: "Registros DNS locais",
                        href: route(""),
                        active: route().current(""),
                    },
                    {
                        name: "Compatibilidade AD",
                        href: route("conditional_forwarding_dns"),
                        active: route().current("conditional_forwarding_dns"),
                    },
                    {
                        name: "Endereços MAC liberados",
                        href: route("ignored_macs"),
                        active: route().current("ignored_macs"),
                    },
                ],
            ],
        };

        const userNavigation = [
            [
                {
                    name: "Dados de cliente",
                    href: route("settings"),
                    active: route().current("settings"),
                },
                {
                    name: "Preferências",
                    href: route("settings"),
                    active: route().current("settings"),
                },
                {
                    name: "Log de atividades",
                    href: route("settings"),
                    active: route().current("settings"),
                },
            ],
            [
                {
                    name: "Meus dados",
                    href: route("settings"),
                    active: route().current("settings"),
                },
                {
                    name: "Alterar senha",
                    href: route("settings"),
                    active: route().current("settings"),
                },
                {
                    name: "Excluir conta",
                    href: route("settings"),
                    active: route().current("settings"),
                },
            ],
            [
                {
                    name: "Onboarding",
                    href: route("settings"),
                    active: route().current("settings"),
                },
                {
                    name: "Sair",
                    href: route("logout"),
                    method: "post",
                    data: {
                        _token: this.$page.props.csrf_token,
                    },
                },
            ],
        ];

        return {
            navigation,
            userNavigation,
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
    },
};
</script>