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
    components: { Sidenav, AccountActivityTopBar }
};
</script>
