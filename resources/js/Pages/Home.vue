<template>
    <h1>Hello, {{ name }}!</h1>
    <p><span v-html="message"></span></p>

    <div>
        <h2>Tecnologias utilizadas nessa serie:</h2>
        <ul>
            <li v-for="framework in frameworks" :key="framework">
                {{ framework }}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {

        props: {
            name: {
                required: true,
                type: String
            },
            frameworks: {
                required: true,
                type: Array
            }
        },

        computed: {
            message() {
                let messageFragment = 'Welcome to your new ';

                this.frameworks.forEach(framework => {
                    if (framework === this.frameworks[this.frameworks.length - 1]) {
                        messageFragment += '<b>' + framework + '</b> application!';
                    } else {
                        messageFragment += '<b>' + framework + '</b> + ';
                    }
                });

                return messageFragment
            }
        }

    }
</script>