<template>
    <th
        class="text-sm font-semibold text-left py-4 px-6 text-gray-500 bg-white uppercase border-b-2 border-gray-200 md:text-xxs"
        @click.prevent="header.sortable ? initSort(header) : ''"
        :class="headerClasses"
    >
        <span v-if="header.sortable" class="cursor-pointer inline-flex items-center">
            {{ header.title }}
            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14">
                <g id="sortable-icon" fill="none" fill-rule="evenodd">
                    <path
                        class="fill-current"
                        :class="descClass"
                        id="Path-Desc-Icon"
                        d="M1.70710678 4.70710678c-.39052429.39052429-1.02368927.39052429-1.41421356 0-.3905243-.39052429-.3905243-1.02368927 0-1.41421356l3-3c.39052429-.3905243 1.02368927-.3905243 1.41421356 0l3 3c.39052429.39052429.39052429 1.02368927 0 1.41421356-.39052429.39052429-1.02368927.39052429-1.41421356 0L4 2.41421356 1.70710678 4.70710678z"
                    />
                    <path
                        class="fill-current"
                        :class="ascClass"
                        id="Path-Asc-Icon"
                        fill-rule="nonzero"
                        d="M6.29289322 9.29289322c.39052429-.39052429 1.02368927-.39052429 1.41421356 0 .39052429.39052429.39052429 1.02368928 0 1.41421358l-3 3c-.39052429.3905243-1.02368927.3905243-1.41421356 0l-3-3c-.3905243-.3905243-.3905243-1.02368929 0-1.41421358.3905243-.39052429 1.02368927-.39052429 1.41421356 0L4 11.5857864l2.29289322-2.29289318z"
                    />
                </g>
            </svg>
        </span>

        <span v-else>
            {{ header.title }}
        </span>
    </th>
</template>
<script>
export default {
    props: {
        header: {
            type: Object
        },
        active: false
    },

    data() {
        return {
            direction: "asc"
        };
    },

    computed: {
        headerClasses() {
            return {
                "cursor-pointer": this.header.sortable
            };
        },
        ascClass() {
            if (this.header.sortable && this.direction == "desc" && this.active == true) {
                return "text-blue-700";
            }

            return "text-gray-500";
        },
        descClass() {
            if (this.header.sortable && this.direction == "asc" && this.active == true) {
                return "text-blue-700";
            }

            return "text-gray-500";
        }
    },
    methods: {
        initSort(payload) {
            this.direction = this.toggleSort(this.direction);

            this.$emit("sort", payload.sortkey);
        },
        toggleSort(v) {
            return v === "desc" ? "asc" : "desc";
        }
    }
};
</script>
