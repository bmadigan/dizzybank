<template>
    <span class="min-w-full rounded-lg uppercase px-2 py-1 m-1 text-xxs font-bold mr-3" :class="getType">
        <slot />
    </span>
</template>
<script>
export default {
    props: {
        variant: {
            type: String,
            default: "success"
        },
        pill: {
            type: Boolean,
            default: false
        }
    },

    computed: {
        getType() {
            if (this.variant === "primary") {
                return "bg-indigo-700 text-indigo-200";
            }
            if (this.variant === "secondary") {
                return "bg-gray-700 text-gray-200";
            }
            if (this.variant === "success") {
                return "bg-green-700 text-green-200";
            }
            if (this.variant === "warning" || this.variant === "pending") {
                return "bg-yellow-700 text-yellow-200";
            }
            if (this.variant === "danger" || this.variant === "invalid") {
                return "bg-red-700 text-red-200";
            }
            if (this.variant === "info") {
                return "bg-blue-700 text-blue-200";
            }

            return "bg-indigo-700 text-indigo-200";
        }
    }
};
</script>
