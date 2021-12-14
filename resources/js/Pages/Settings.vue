<template>
    <h1>Settings</h1>

    <nav>
        <ul>
            <li><Link href="/">Home</Link></li>
            <li><Link href="/users">Users</Link></li>
            <li><Link href="/settings">Settings</Link></li>
        </ul>
    </nav>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';

    export default {

        name: 'Settings',

        components: {
            Link,
        },

    }
</script>