<template>
    <div class="dropdown relative">
        <div class="dropdown-trigger" @click.prevent="isOpen = !isOpen" aria-haspopup="true" :aria-expanded="isOpen">
            <slot name="trigger"></slot>
        </div>
        <transition
            enter-active-class="transition-all transition-fast ease-out"
            leave-active-class="transition-all transition-slow ease-in"
            enter-class="opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100"
            leave-class="opacity-100 scale-100"
            leave-to-class="opacity-0 scale-75"
        >
            <div v-show="isOpen">
                <div class="dropdown-menu absolute bg-white mt-2 text-sm rounded shadow z-10">
                    <slot />
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isOpen: false
        };
    },

    watch: {
        isOpen(isOpen) {
            if (isOpen) {
                document.addEventListener("click", this.closeIfOutsideClick);
            }
        }
    },

    methods: {
        closeIfOutsideClick(event) {
            if (!event.target.closest(".dropdown")) {
                this.isOpen = false;
            }
        }
    }
};
</script>

<style>
.slide-fade-enter-active {
    transition: all 0.3s ease;
}
.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
    transform: translateX(10px);
    opacity: 0;
}
</style>
