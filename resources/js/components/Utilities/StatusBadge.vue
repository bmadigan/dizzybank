<template>
    <span class="badge" :class="getType">
        <slot />
    </span>
</template>

<script>
export default {
    props: {
        variant: {
            type: String,
            default: "active"
        }
    },

    computed: {
        getType() {
            if (this.variant === "active") {
                return "badge-active";
            }
            if (this.variant === "closed") {
                return "badge-closed";
            }
            if (this.variant === "expired") {
                return "badge-expired";
            }
        }
    }
};
</script>
