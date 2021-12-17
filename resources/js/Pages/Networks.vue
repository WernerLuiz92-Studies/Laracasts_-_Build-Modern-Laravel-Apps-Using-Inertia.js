<template>
    <!-- Nav -->
    <Nav />
    <!-- /End Nav -->

    <header>
        <!-- Page Banner -->
        <Banner> Redes </Banner>
        <!-- /End Page Banner -->
    </header>

    <main>
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
import Nav from "../Shared/Nav";

export default {
    name: "Networks",

    components: {
        Banner,
        Nav,
    },
};
</script>