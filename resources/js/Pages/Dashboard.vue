<template>
    <dashboard-layout>
        <div>
            I am the dashboard
        </div>
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Shared/Layouts/Dashboard";

export default {
    components: {
        DashboardLayout
    },
    mounted() {
        document.title = `Dashboard - ${this.$page.app.name}`;
    }
};
</script>
