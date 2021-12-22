<template>
    <inertia-head>
        <title>{{ title }}</title>
    </inertia-head>
    <main>
        <!-- Page Banner -->
        <Banner>{{ title }}</Banner>
        <!-- /End Page Banner -->

        <div class="container mx-auto py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class="px-4 py-4 sm:px-0">
                <div
                    class="
                        border-4 border-dashed border-gray-200
                        rounded-lg
                        h-96
                    "
                />
            </div>
            <!-- /End replace -->
        </div>
    </main>
</template>


<script>
import Banner from "../Shared/Banner";

export default {
    name: "Reports",

    components: {
        Banner,
    },

    data() {
        return {
            title: "Relatórios",
        };
    },
};
</script>