<template>
    <div class="flex flex-col h-screen">
        <section>
            <header>
                <Nav />
            </header>
        </section>

        <section class="mb-auto">
            <slot />
        </section>

        <section>
            <footer>
                <Footer />
            </footer>
        </section>
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