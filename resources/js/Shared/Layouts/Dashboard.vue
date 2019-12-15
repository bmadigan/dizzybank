<template>
    <div class="flex min-h-screen w-full">
        <sidenav />

        <main class="w-full">
            <topnav-dashboard />

            <slot />
        </main>
    </div>
</template>

<script>
import Sidenav from "@/Shared/Sidenav";
import TopnavDashboard from "@/Shared/TopnavDashboard";

export default {
    components: { Sidenav, TopnavDashboard },
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
