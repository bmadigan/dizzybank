<template>
    <dashboard-layout>
        <div class="px-8 mt-10">
            <h2 class="text-2xl text-gray-600 font-semibold mb-10">My Accounts</h2>

            <div class="flex items-center">
                <div class="bg-white rounded-lg shadow-md w-2/6 mx-3 cursor-pointer hover:bg-gray-100">
                    <div class="px-6 py-3">
                        <div class="flex items-center mb-3">
                            <img src="/svgs/wordmark-color.svg" class="w-6 mr-2" />
                            <h3 class="text-md font-semibold text-gray-800">Unlimited Checking Account</h3>
                        </div>
                        <div class="flex items-center mb-3">
                            <div class="text-gray-600 text-lg font-semibold mr-1">$</div>
                            <div class="text-green-700 text-3xl font-semibold">3,912.00</div>
                        </div>
                    </div>
                    <div class="bg-indigo-100 px-6 py-2">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs uppercase text-gray-500 tracking-wide">Account Number</div>
                                <div class="text-gray-700">12345678</div>
                            </div>
                            <div>
                            <div class="badge badge-active">
                                <svg viewBox="0 0 24 24" class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                    <defs/>
                                    <path fill-rule="evenodd" d="M10 13a3 3 0 100-6 3 3 0 000 6zM9 4c0-.552.444-1 1-1 .552 0 1 .444 1 1 0 .552-.444 1-1 1-.552 0-1-.444-1-1zm4.536 1.05a.998.998 0 011.414 0 .998.998 0 010 1.414.998.998 0 01-1.414 0 .998.998 0 010-1.414zM16 9c.552 0 1 .444 1 1 0 .552-.444 1-1 1-.552 0-1-.444-1-1 0-.552.444-1 1-1zm-1.05 4.536a.998.998 0 010 1.414.998.998 0 01-1.414 0 .998.998 0 010-1.414.998.998 0 011.414 0zM11 16c0 .552-.444 1-1 1-.552 0-1-.444-1-1 0-.552.444-1 1-1 .552 0 1 .444 1 1zm-4.536-1.05a.998.998 0 01-1.414 0 .998.998 0 010-1.414.998.998 0 011.414 0 .998.998 0 010 1.414zM4 11c-.552 0-1-.444-1-1 0-.552.444-1 1-1 .552 0 1 .444 1 1 0 .552-.444 1-1 1zm1.05-4.536a.998.998 0 010-1.414.998.998 0 011.414 0 .998.998 0 010 1.414.998.998 0 01-1.414 0z"/>
                                </svg>
                                <span>Active</span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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

export default {
    components: {
        DashboardLayout,
        DataTable,
        DataTableHeader,
        DataTableRow
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
