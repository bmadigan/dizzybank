<template>
    <div @click.prevent="redirectToAccount()">
        <div class="px-6 py-3">
            <div class="flex items-center mb-3">
                <img src="/svgs/wordmark-color.svg" class="w-6 mr-2" />
                <h3 class="text-md font-semibold text-gray-800">{{ account.account_name | truncate(3) }}</h3>
            </div>
            <div class="flex items-center mb-3">
                <div class="text-gray-600 text-lg font-semibold mr-1">$</div>
                <div class="text-green-700 text-3xl font-semibold">{{ account.balance | money }}</div>
            </div>
        </div>
        <div class="bg-indigo-100 px-6 py-2">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xs uppercase text-gray-500 tracking-wide">Account Number</div>
                    <div :class="balanceText">{{ account.account_number }}</div>
                </div>
                <div>
                    <status-badge :variant="account.state">
                        <svg
                            viewBox="0 0 24 24"
                            class="fill-current w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                        >
                            <defs />
                            <path
                                fill-rule="evenodd"
                                d="M10 13a3 3 0 100-6 3 3 0 000 6zM9 4c0-.552.444-1 1-1 .552 0 1 .444 1 1 0 .552-.444 1-1 1-.552 0-1-.444-1-1zm4.536 1.05a.998.998 0 011.414 0 .998.998 0 010 1.414.998.998 0 01-1.414 0 .998.998 0 010-1.414zM16 9c.552 0 1 .444 1 1 0 .552-.444 1-1 1-.552 0-1-.444-1-1 0-.552.444-1 1-1zm-1.05 4.536a.998.998 0 010 1.414.998.998 0 01-1.414 0 .998.998 0 010-1.414.998.998 0 011.414 0zM11 16c0 .552-.444 1-1 1-.552 0-1-.444-1-1 0-.552.444-1 1-1 .552 0 1 .444 1 1zm-4.536-1.05a.998.998 0 01-1.414 0 .998.998 0 010-1.414.998.998 0 011.414 0 .998.998 0 010 1.414zM4 11c-.552 0-1-.444-1-1 0-.552.444-1 1-1 .552 0 1 .444 1 1 0 .552-.444 1-1 1zm1.05-4.536a.998.998 0 010-1.414.998.998 0 011.414 0 .998.998 0 010 1.414.998.998 0 01-1.414 0z"
                            />
                        </svg>
                        <span>{{ account.state }}</span>
                    </status-badge>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import StatusBadge from "@/components/Utilities/StatusBadge";

export default {
    props: ["account"],
    components: { StatusBadge },
    methods: {
        redirectToAccount() {
            this.$inertia.visit(route("accounts.show", this.account.uuid));
        }
    },
    computed: {
        balanceText: function() {
            if (this.account.balance < 0) {
                return "text-red-700";
            } else {
                return "text-green-700";
            }
        }
    }
};
</script>
