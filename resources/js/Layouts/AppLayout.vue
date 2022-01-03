<template>
    <inertia-head>
        <meta
            type="description"
            content="My Inertia App Description"
            head-key="description"
        />
    </inertia-head>
    <div class="flex flex-col h-screen">
        <section>
            <header>
                <Suspense>
                    <template #default>
                        <Nav />
                    </template>
                    <template #fallback>
                        <NavMock />
                    </template>
                </Suspense>
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
import NavMock from "../Shared/NavMock";

export default {
    components: {
    Nav,
    Footer,
    NavMock
},
};
</script>