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

            <div>
                <data-table :headers="headers()" sort-url="/" :data="transactions">
                    <template v-slot:date="{ item }">
                        {{ item.date }}
                    </template>
                    <template v-slot:account="{ item }">
                        {{ item.account }}
                    </template>
                    <template v-slot:description="{ item }">
                        {{ item.description }}
                    </template>
                    <template v-slot:amount="{ item }">
                        {{ item.amount }}
                    </template>
                    <template v-slot:balance="{ item }">
                        {{ item.balance }}
                    </template>
                </data-table>
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
    props: ["accounts"],
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
    data() {
        return {
            transactions: [
                {
                    id: 1,
                    date: "Aug 3, 2019",
                    account: "Everyday Savings",
                    description: "Lorum ipsuem",
                    amount: 100.0,
                    balance: 599.99
                },
                {
                    id: 1,
                    date: "Aug 5, 2019",
                    account: "Borderless Plans",
                    description: "Lorum ipsuem",
                    amount: 200.0,
                    balance: 299.99
                },
                {
                    id: 1,
                    date: "Aug 7, 2019",
                    account: "Everyday Savings",
                    description: "Lorum ipsuem",
                    amount: 130.0,
                    balance: 49.99
                },
                {
                    id: 1,
                    date: "Aug 12, 2019",
                    account: "Everyday Savings",
                    description: "Lorum ipsuem",
                    amount: 140.0,
                    balance: 99.99
                }
            ]
        };
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
        }
    }
};
</script>
