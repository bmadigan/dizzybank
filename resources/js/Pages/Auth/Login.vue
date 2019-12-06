<template>
    <layout>
        <div class="flex justify-center">
            <form class="w-full" @submit.prevent="submit">
                <div class="w-1/2">
                    <h1 class="font-semibold text-gray-600 text-2xl mb-6 text-center">Login to your Account</h1>
                    <div class="border-indigo-300 p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">
                        <div class="mb-4">
                            <label class="font-bold text-gray-700 block mb-2">Email Address</label>
                            <input
                                type="text"
                                v-model="form.email"
                                class="block appearance-none w-full bg-white border border-gray-200 hover:border-gray px-2 py-2 rounded shadow"
                                placeholder="Your Email"
                            />
                        </div>

                        <div class="mb-4">
                            <label class="font-bold text-gray-700 block mb-2">Password</label>
                            <input
                                type="passeword"
                                v-model="form.password"
                                class="block appearance-none w-full bg-white border border-gray-200 hover:border-gray px-2 py-2 rounded shadow"
                                placeholder="*******"
                            />
                        </div>

                        <div class="flex items-center justify-between">
                            <button class="bg-indigo-500 hover:bg-indigo-400 text-white font-bold py-2 px-4 rounded">
                                Login
                            </button>

                            <a
                                class="no-underline inline-block align-baseline font-bold text-sm text-indigo-700 hover:text-indigo-600 float-right"
                                href="#"
                            >
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-600 text-sm">
                            Don't have an account?
                            <a href="#" class="no-underline text-indigo-600 font-bold">Create an Account</a>
                            .
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </layout>
</template>

<script>
import Layout from "@/Shared/Layouts/Auth";

export default {
    props: {
        errors: Object
    },
    components: {
        Layout
    },
    mounted() {
        document.title = `Login - ${this.$page.app.name}`;
    },
    data() {
        return {
            sending: false,
            form: {
                email: null,
                password: null,
                remember: null
            }
        };
    },

    methods: {
        submit() {
            this.$inertia.post("/login", {
                email: this.form.email,
                password: this.form.password,
                remember: this.form.remember
            });
        }
    }
};
</script>
