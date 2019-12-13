<template>
    <div class="block flex items-center">
        <dropdown>
            <template v-slot:trigger>
                <div class="flex items-center justify-between cursor-pointer">
                    <div class="mr-2">
                        <img
                            src="https://randomuser.me/api/portraits/women/65.jpg"
                            class="w-8 rounded-full border-indigo-200 border-2"
                        />
                    </div>
                    <div class="text-white text-sm">
                        {{ user.name }}
                    </div>
                </div>
            </template>

            <div class="w-40">
                <ul>
                    <li class="pl-2 pr-8 py-2 hover:bg-gray-200">
                        <a href="#" class="block">Update Profile</a>
                    </li>
                    <li class="pl-2 pr-8 py-2 hover:bg-gray-200">
                        <a href="#" @click.prevent="logout">Logout</a>
                    </li>
                </ul>
            </div>
        </dropdown>
    </div>
</template>

<script>
export default {
    props: ["user"],
    data() {
        return {
            csrfToken: null
        };
    },
    mounted() {
        this.csrfToken = this.$page._token;
    },
    methods: {
        async logout() {
            await this.$inertia.post(this.route("logout"), {
                _token: this.csrfToken
            });

            window.location.href = "/";
        }
    }
};
</script>
