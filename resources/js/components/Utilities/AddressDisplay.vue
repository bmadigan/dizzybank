<template>
    <div class="text-gray-600 text-sm">
        <div v-if="address">
            <address>
                {{ address.street }}
                <br />
                <span v-if="address.secondary">
                    {{ address.secondary }}
                    <br />
                </span>
                {{ address.city }}
                <br />
                {{ address.state }} &nbsp; {{ address.zip }}
            </address>
        </div>
        <warning-display v-else>
            <svg
                class="fill-current w-4 h-4 mr-1"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
            >
                <defs />
                <path
                    fill-rule="evenodd"
                    d="M10 20s7-9.134 7-13A7 7 0 003 7c0 3.866 7 13 7 13zm0-11a2 2 0 100-4 2 2 0 000 4z"
                />
            </svg>
            If you wish to add an address, update your profile.
        </warning-display>
    </div>
</template>

<script>
import WarningDisplay from "@/components/Utilities/WarningDisplay";
export default {
    components: { WarningDisplay },
    data() {
        return {
            address: this.$page.auth.user.address
        };
    }
};
</script>
