<template>
    <app-layout>
        <div class="bg-white px-8 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img src="/svgs/wordmark-color.svg" class="w-8 mr-3" />
                    <h2 class="text-gray-800 text-3xl font-semibold">User Profile</h2>
                </div>
                <profile-dropdown :user="$page.auth.user" theme="app"></profile-dropdown>
            </div>
        </div>

        <div class="px-8 mt-10">
            <form @submit.prevent="saveProfile">
                <div class="flex">
                    <div class="w-full md:w-1/3 px-12 py-4 md:py-1">
                        <h3 class="text-md font-semibold">Contact Information</h3>
                        <div class="mt-2 text-sm text-gray-800">Update your name and email address.</div>
                    </div>

                    <div class="w-full md:w-2/3 px-12">
                        <div class="card">
                            <div class="py-6 px-6">
                                <text-input v-model="form.name" label="Name" type="text" autofocus />

                                <text-input v-model="form.email" label="Email" type="email" />
                            </div>

                            <div class="card-footer">
                                <div class="flex-grow text-right">
                                    <inertia-link
                                        :href="route('dashboard')"
                                        class="text-sm text-gray-600 hover:text-gray-500 mr-4"
                                        tabindex="-1"
                                    >
                                        Cancel
                                    </inertia-link>
                                    <button
                                        type="submit"
                                        class="bg-indigo-700 hover:bg-indigo-600 text-white rounded text-xs px-4 py-2"
                                    >
                                        Update Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <hr class="hr" />

            <form @submit.prevent="savePassword">
                <div class="flex mb-8">
                    <div class="w-full md:w-1/3 px-12 py-4 md:py-1">
                        <h3 class="text-md font-semibold">Update Password</h3>
                        <div class="mt-2 text-sm text-gray-800">
                            If you do not wish to update your pass, you can just leave the fields blank.
                        </div>
                    </div>
                    <div class="w-full md:w-2/3 px-12">
                        <div class="card">
                            <div class="py-6 px-6">
                                <text-input v-model="form.password" label="New Password" type="password" autofocus />

                                <text-input
                                    v-model="form.password_confirmation"
                                    label="Confirm Password"
                                    type="password"
                                />
                            </div>

                            <div class="card-footer">
                                <div class="flex-grow text-right">
                                    <inertia-link
                                        :href="route('dashboard')"
                                        class="text-sm text-gray-600 hover:text-gray-500 mr-4"
                                        tabindex="-1"
                                    >
                                        Cancel
                                    </inertia-link>
                                    <button
                                        type="submit"
                                        class="bg-indigo-700 hover:bg-indigo-600 text-white rounded text-xs px-4 py-2"
                                    >
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Shared/Layouts/App";
import ProfileDropdown from "@/Shared/ProfileDropdown";
import TextInput from "@/components/Utilities/TextInput";

export default {
    components: {
        AppLayout,
        ProfileDropdown,
        TextInput
    },
    data() {
        return {
            form: {
                name: this.$page.auth.user.name,
                email: this.$page.auth.user.email,
                password: null,
                password_confirmation: null
            }
        };
    },
    methods: {
        saveProfile() {
            this.$inertia.patch(route("user.profile.update"), this.form).then(() => {});
        },
        savePassword() {
            this.$inertia.patch(route("user.profile.password"), this.form).then(() => {
                this.form.password = null;
                this.form.password_confirmation = null;
            });
        }
    },
    mounted() {
        document.title = `User Profile - ${this.$page.app.name}`;
    }
};
</script>
