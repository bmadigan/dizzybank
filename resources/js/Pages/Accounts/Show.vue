<template>
    <app-layout>
            <div class="bg-white px-8 pt-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img src="/svgs/wordmark-color.svg" class="w-8 mr-3" />
                        <h2 class="text-gray-800 text-3xl font-semibold">Account Activity</h2>
                    </div>
                    <profile-dropdown :user="$page.auth.user" theme="app"></profile-dropdown>
                </div>

                <account-activity-top-bar :account="account" :type="accountType" />
            </div>

        <div class="px-8 mt-10">
            <div class="flex items-center justify-between mt-12 mb-10">
                <h2 class="text-2xl text-gray-600 font-semibold">Latest Transactions</h2>
                <div class="flex items-center">
                    <button class="flex items-center btn-sm btn-pink mr-4">
                        <svg  viewBox="0 0 24 24" class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                            <defs/>
                            <path fill-rule="evenodd" d="M6.586 12.828L4.41 15.004c-.58.58-1.59.996-2.409.996H0v-2h2.001c.29 0 .792-.207.995-.41l2.176-2.176 1.414 1.414zM16 6h-2c-.29 0-.794.209-.996.41l-2.176 2.176-1.414-1.414 2.176-2.176C12.167 4.42 13.18 4 14 4h2V1l4 4-4 4V6zm0 10h-2c-.82 0-1.833-.42-2.41-.996L2.996 6.41C2.793 6.207 2.29 6 2.001 6H0V4h2.001c.819 0 1.83.417 2.41.996l8.593 8.594c.202.201.706.41.996.41h2v-3l4 4-4 4v-3z"/>
                        </svg>
                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" fill-rule="evenodd" />
                        </svg>
                        <span>Transfer Money</span>
                    </button>

                    <button class="flex items-center btn-sm btn-pink mr-4">
                        <svg viewBox="0 0 24 24" class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                            <path fill-rule="evenodd" d="M11 9V5H9v4H5v2h4v4h2v-4h4V9h-4zm-1 11c5.523 0 10-4.477 10-10S15.523 0 10 0 0 4.477 0 10s4.477 10 10 10z"/>
                        </svg>
                        <span>Add Money</span>
                    </button>

                    <button class="flex items-center btn-sm btn-indigo">
                        <svg viewBox="0 0 24 24" class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" fill-rule="evenodd" />
                        </svg>
                        <span>Download Transactions</span>
                    </button>
                </div>
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
    </app-layout>
</template>

<script>
import AppLayout from "@/Shared/Layouts/App";
import ProfileDropdown from "@/Shared/ProfileDropdown";
import AccountActivityTopBar from "@/components/Accounts/AccountActivityTopBar";
import DataTable from "@/components/DataTables/DataTable";
import DataTableHeader from "@/components/DataTables/DataTableHeader";
import DataTableRow from "@/components/DataTables/DataTableRow";

export default {
    props: ['account', 'accountType'],
    components: {
        AppLayout,
        ProfileDropdown,
        AccountActivityTopBar,
        DataTable,
        DataTableHeader,
        DataTableRow
    },
    mounted() {
        document.title = `AccountName - ${this.$page.app.name}`;
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
