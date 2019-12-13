<template>
    <div>
        <div class="bg-indigo-900 h-48 px-8 pt-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img src="/svgs/wordmark-color.svg" class="w-8 mr-3" />
                    <h2 class="text-white text-3xl font-semibold">Account Summary</h2>
                </div>
                <profile-dropdown :user="$page.auth.user"></profile-dropdown>
            </div>
        </div>

        <div class="-mt-32 flex justify-between px-8">
            <user-profile-card />

            <div class="text-right w-2/5 mt-3">
                <div class="uppercase text-sm text-indigo-300 pb-1">Total Balance</div>
                <div class="text-4xl text-white font-semibold">$54,023.33</div>
            </div>
        </div>
    </div>
</template>

<script>
import ProfileDropdown from "./ProfileDropdown";
import UserProfileCard from "@/components/Dashboard/UserProfileCard";

export default {
    components: { ProfileDropdown, UserProfileCard }
};
</script>
