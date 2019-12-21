<template>
    <dashboard-layout>
        <div class="px-8 mt-10">
            <h2 class="text-2xl text-gray-600 font-semibold mb-10">My Accounts</h2>

            <account-card-list :accounts="accounts"></account-card-list>

            <div class="flex items-center justify-between mt-12 mb-10">
                <h2 class="text-2xl text-gray-600 font-semibold">Latest Transactions</h2>
                <button class="flex items-center btn-sm btn-indigo">
                    <svg viewBox="0 0 24 24" class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" fill-rule="evenodd" />
                    </svg>
                    <span>Download Transactions</span>
                </button>
            </div>

            <div v-if="transactions.length > 0">
                <data-table :headers="headers()" sort-url="/" :data="transactions">
                    <template v-slot:date="{ item }">
                        {{ item.created_at | formatDate }}
                    </template>
                    <template v-slot:account="{ item }">
                        {{ item.account.account_name }}
                    </template>
                    <template v-slot:description="{ item }">
                        {{ item.description }}
                    </template>
                    <template v-slot:amount="{ item }">
                        <span :class="[{ 'text-green-700': isAdded(item) }, 'text-red-700']">
                            {{ item.amount_display }}
                        </span>
                    </template>
                    <template v-slot:balance="{ item }">
                        {{ item.balance | currency }}
                    </template>
                </data-table>
            </div>
            <div v-else>
                <div class="text-center py-10 text-xl bg-white rounded">
                    You have not had any transactions recorded yet.
                </div>
            </div>
        </div>
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Shared/Layouts/Dashboard";
import DataTable from "@/components/DataTables/DataTable";
import DataTableHeader from "@/components/DataTables/DataTableHeader";
import DataTableRow from "@/components/DataTables/DataTableRow";
import AccountCardList from "@/components/Accounts/AccountCardList";

export default {
    props: ["accounts", "transactions"],
    components: {
        DashboardLayout,
        DataTable,
        DataTableHeader,
        DataTableRow,
        AccountCardList
    },
    mounted() {
        document.title = `Dashboard - ${this.$page.app.name}`;
    },
    methods: {
        headers() {
            return [
                { title: "Date", key: "date" },
                { title: "Account", key: "account" },
                { title: "Description", key: "description" },
                { title: "Amount", key: "amount" },
                { title: "Balance", key: "balance" }
            ];
        },
        isAdded(transaction) {
            if (["MoneyAdded", "MoneyTransferredTo"].includes(transaction.type)) {
                return true;
            } else {
                return false;
            }
        }
    }
};
</script>
