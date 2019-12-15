<template>
    <div class="flex min-h-screen w-full">
        <sidenav />

        <main class="w-full">
            <div class="bg-white px-8 pt-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img src="/svgs/wordmark-color.svg" class="w-8 mr-3" />
                        <h2 class="text-gray-800 text-3xl font-semibold">Account Activity</h2>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-2">
                            <img
                                src="https://randomuser.me/api/portraits/women/65.jpg"
                                class="w-8 rounded-full border-indigo-200 border-2"
                            />
                        </div>
                        <div class="text-gray-700 text-sm">
                            Brad madigan
                        </div>
                    </div>
                </div>

                <account-activity-top-bar />
            </div>

            <slot />
        </main>
    </div>
</template>

<script>
import Sidenav from "@/Shared/Sidenav";
import AccountActivityTopBar from "@/Shared/AccountActivityTopBar";

export default {
    components: { Sidenav, AccountActivityTopBar },
    methods: {
        showFlashMessage() {
            return this.$toasted.show(this.$page.flash.success, {
                position: "bottom-right",
                duration: 4000,
                keepOnHover: true,
                type: "success",
                theme: "bubble",
                action: {
                    onClick: (e, toastObject) => {
                        toastObject.goAway(0);
                    }
                }
            });
        },
        showErrorMessages() {
            if (this.$page.errors) {
                const options = {
                    position: "bottom-right",
                    duration: 4000,
                    keepOnHover: true,
                    type: "error",
                    theme: "bubble",
                    action: {
                        onClick: (e, toastObject) => {
                            toastObject.goAway(0);
                        }
                    }
                };
                var errors = this.$page.errors;
                var messages = Object.values(errors);
                var that = this;
                messages.forEach(function(msg) {
                    that.$toasted.show(msg, options);
                });
            }
        },
        showAnErrorMessage() {
            return this.$toasted.show(this.$page.flash.error, {
                position: "bottom-right",
                duration: 4000,
                keepOnHover: true,
                type: "error",
                theme: "bubble",
                action: {
                    onClick: (e, toastObject) => {
                        toastObject.goAway(0);
                    }
                }
            });
        }
    },
    watch: {
        "$page.flash": {
            handler() {
                this.showFlashMessage();
            },
            deep: true
        },
        "$page.errors": {
            handler() {
                this.showErrorMessages();
            },
            deep: true
        },
        "$page.error": {
            handler() {
                this.showAnErrorMessage();
            },
            deep: true
        }
    },
    mounted() {
        this.showFlashMessage();
        this.showErrorMessages();
        this.showAnErrorMessage();
    }
};
</script>
