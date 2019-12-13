<template>
    <div class="mt-6 px-6 py-6 w-3/5 card flex justify-between">
        <div>
            <h3 class="text-gray-800 text-lg font-semibold pb-2">{{ profileName }}</h3>
            <address-display />
        </div>
        <div>
            <button class="btn-sm btn-lite hover:bg-indigo-200">
                Update Profile
            </button>
        </div>
    </div>
</template>

<script>
import AddressDisplay from "@/components/Utilities/AddressDisplay";

export default {
    components: { AddressDisplay },
    data() {
        return {
            profileName: this.$page.auth.user.profile_name
        };
    }
};
</script>
