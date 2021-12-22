<template>
    <div class="min-h-full static bottom-0">
        <div
            class="
                max-w-full
                border-t border-gray-200
                mx-auto
                px-4
                sm:px-6
                lg:px-8
            "
        >
            <div
                class="
                    py-8
                    text-sm text-gray-500 text-center
                    sm:text-left
                    flex flex-col
                    items-center
                    space-y-2
                "
            >
                <span class="block sm:inline text-gray-600"
                    >&copy; {{ year }} Lumiun Internet Security. Todos os
                    direitos reservados.</span
                >
                <span class="block sm:inline text-xs text-gray-600"
                    >Fuso horário America/Sao_Paulo
                    <inertia-link class="text-blue-500 ml-2" href="#"
                        >Alterar</inertia-link
                    ></span
                >
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Footer",

    data() {
        let now = new Date();

        return {
            year: now.getFullYear(),
        };
    },
};
</script>