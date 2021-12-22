<template>
    <AppLayout>
        <header>
            <!-- Page Banner -->
            <Banner>{{ title }}</Banner>
            <!-- /End Page Banner -->
        </header>

        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                <div class="px-4 py-4 sm:px-0">
                    <div
                        class="
                            border-4 border-dashed border-gray-200
                            rounded-lg
                            h-[1000px]
                        "
                    >
                        <div
                            class="
                                w-full
                                h-full
                                flex flex-col
                                items-center
                                justify-center
                            "
                        >
                            <p>The current time is {{ time }}.</p>
                            <inertia-link
                                class="
                                    inline-flex
                                    items-center
                                    mt-2
                                    p-2
                                    border border-transparent
                                    rounded-full
                                    shadow-sm
                                    text-white
                                    bg-blue-600
                                    hover:bg-light-blue-700
                                    focus:outline-none
                                    focus:ring-2
                                    focus:ring-offset-2
                                    focus:ring-light-blue-500
                                "
                                href="/users"
                                as="button"
                                preserve-scroll
                            >
                                <RefreshIcon
                                    class="h-5 w-5"
                                    aria-hidden="true"
                                />
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <!-- /End replace -->
            </div>
        </main>
    </AppLayout>
</template>

<script>
import AppLayout from "../Layouts/AppLayout";
import Banner from "../Shared/Banner";
import { RefreshIcon } from "@heroicons/vue/outline";

export default {
    name: "Users",

    components: {
        AppLayout,
        Banner,
        RefreshIcon,
    },

    props: {
        time: {
            type: String,
            default: "",
        },
    },

    data() {
        return {
            title: "Usuários",
        };
    },
};
</script>