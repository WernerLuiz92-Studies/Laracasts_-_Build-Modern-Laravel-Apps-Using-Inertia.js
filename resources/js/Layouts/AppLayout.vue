<template>
    <div class="flex flex-col h-screen">
        <header>
            <Nav />
        </header>

        <main class="mb-auto">
            <slot />
        </main>

        <footer>
            <Footer />
        </footer>
    </div>
</template>

<script>
import Nav from "../Shared/Nav";
import Footer from "../Shared/Footer";

export default {
    components: {
        Nav,
        Footer,
    },
};
</script>