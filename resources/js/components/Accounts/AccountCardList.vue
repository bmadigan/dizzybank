<template>
    <div class="flex items-center">
        <div
            v-for="(account, index) in accounts"
            class="bg-white rounded-lg shadow-md w-2/6 mx-3 cursor-pointer hover:bg-gray-100"
        >
            <account-card :account="account"></account-card>
        </div>
    </div>
</template>

<script>
import AccountCard from "./AccountCard";

export default {
    props: ["accounts"],
    components: { AccountCard }
};
</script>
