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
    components: { Sidenav, TopnavDashboard }
};
</script>
