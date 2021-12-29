<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 border-b sm:rounded-b-lg">
        <div class="flex-1 flex justify-between sm:hidden">
            <inertia-link :href="data.prev_page_url ?? '#'" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Anterior
            </inertia-link>
            <inertia-link :href="data.next_page_url ?? '#'" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Próxima
            </inertia-link>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div v-if="data.total > 0">
                <p class="text-sm text-gray-700">
                    Exibindo <span class="font-medium">{{ data.from }}</span> a <span class="font-medium">{{ data.to }}</span> de <span class="font-medium">{{ data.total }}</span> resultados
                </p>
            </div>
            <div v-else>
                <p class="text-sm text-gray-700">
                    Nenhum registro para exibir
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <dls-pagination-link v-for="( link, index ) in data.links" :key="index" :index="index" :active="link.active" :url="link.url" :label="link.label" />
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
    import DlsPaginationLink from '../Pagination/PaginationLink';

    export default {

        components: {

            DlsPaginationLink,

        },

        props: {

            data: { type: Object },

        }
    }

</script>