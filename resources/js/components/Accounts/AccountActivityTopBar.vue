<template>
    <div class="flex justify-between pl-6 pr-2">
        <div class="px-6 py-6 w-3/5">
            <div class="flex items-center">
                <h2 class="text-3xl text-indigo-700 font-semibold mr-8">{{ account.account_name }}</h2>
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
                    <span>{{ account.state | capitalize }}</span>
                </status-badge>
            </div>
            <div class="flex items-center">
                <div class="mt-4 mr-10">
                    <div class="text-xs uppercase text-gray-500">Account Number</div>
                    <div class="text-gray-700">{{ account.account_number }}</div>
                </div>
                <div class="mt-4 mr-10">
                    <div class="text-xs uppercase text-gray-500">Type</div>
                    <div class="text-gray-700">{{ type.short_name }}</div>
                </div>
                <div class="mt-4 mr-10">
                    <div class="text-xs uppercase text-gray-500">Balance As Of</div>
                    <div class="text-gray-700">{{ today }}</div>
                </div>
            </div>
        </div>

        <div class="text-right w-2/5 mt-12">
            <div class="uppercase text-sm text-gray-500">Total Balance</div>
            <div class="text-4xl text-green-700 font-semibold">$54,023.33</div>
        </div>
    </div>
</template>

<script>
import StatusBadge from "@/components/Utilities/StatusBadge";
import Moment from "moment";

export default {
    props: ["account", "type"],
    components: { StatusBadge, Moment },
    data() {
        return {
            today: Moment().format("MMM DD, YYYY")
        };
    }
};
</script>
