<template>
    <OnClickOutside :do="handleClickOutside">
        <div class="relative">
            <div role="button" class="inline-block select-none focus:outline-0" @click="open = !open">
                <slot name="link" />
            </div>
            <div v-show="open" class="absolute pin-l mt-px w-full">
                <slot name="dropdown" />
            </div>
        </div>
    </OnClickOutside>
</template>

<script>
import OnClickOutside from "./OnClickOutside.vue";

export default {
    components: {
        OnClickOutside
    },
    data() {
        return {
            open: false
        };
    },
    methods: {
        handleClickOutside() {
            if (this.open) {
                this.open = false;
            }
        }
    }
};
</script>
