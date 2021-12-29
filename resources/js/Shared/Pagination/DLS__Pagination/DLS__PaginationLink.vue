<template>
    <div v-if="label.match(/Anterior/)">
        <inertia-link :href="url ?? '#'" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
            <span class="sr-only">Anterior</span>
            <ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
        </inertia-link>
    </div>
    <div v-else-if="label.match(/Próxima/)">
        <inertia-link :href="url ?? '#'" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
            <span class="sr-only">Próxima</span>
            <ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
        </inertia-link> 
    </div>
    <div v-else-if="label.match(/.../)">
        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
            ...
        </span>
    </div>
    <div v-else>
        <inertia-link v-if="active" :href="url" aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
            {{ label }}
        </inertia-link>

        <inertia-link v-else :href="url" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
            {{ label }}
        </inertia-link>
    </div>
 
</template>

<script>
    import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/solid'

    export default {

        components: {
            
            ChevronLeftIcon,
            ChevronRightIcon,

        },

        props: {
            
            active: { type: Boolean },
            url: { type: String },
            label: { type: String },
            index: { type: Number }

        }

    }

</script>