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

            <account-activity-top-bar :account="account" :type="accountType" :isActive="isActive" />
        </div>

        <div class="px-8 mt-10">
            <div class="flex items-center justify-between mt-12 mb-10">
                <h2 class="text-2xl text-gray-600 font-semibold">Latest Transactions</h2>
                <div class="flex items-center">
                    <button
                        v-if="isActive"
                        @click.prevent="$modal.show('subtract-money-modal')"
                        class="flex items-center btn-sm btn-indigo mr-4"
                    >
                        <svg
                            viewBox="0 0 24 24"
                            class="fill-current w-4 h-4 mr-2"
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                        >
                            <defs />
                            <path
                                fill-rule="evenodd"
                                d="M10 20c5.523 0 10-4.477 10-10S15.523 0 10 0 0 4.477 0 10s4.477 10 10 10zm5-11v2H5V9h10z"
                            />
                        </svg>
                        <span>Withdraw Money</span>
                    </button>

                    <button
                        v-if="isActive"
                        @click.prevent="$modal.show('add-money-modal')"
                        class="flex items-center btn-sm btn-indigo mr-4"
                    >
                        <svg
                            viewBox="0 0 24 24"
                            class="fill-current w-4 h-4 mr-2"
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M11 9V5H9v4H5v2h4v4h2v-4h4V9h-4zm-1 11c5.523 0 10-4.477 10-10S15.523 0 10 0 0 4.477 0 10s4.477 10 10 10z"
                            />
                        </svg>
                        <span>Add Money</span>
                    </button>

                    <a :href="route('export.transactions')" target="_blank">
                        <button class="flex items-center btn-sm btn-indigo">
                            <svg
                                viewBox="0 0 24 24"
                                class="fill-current w-4 h-4 mr-2"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" fill-rule="evenodd" />
                            </svg>
                            <span>Download Transactions</span>
                        </button>
                    </a>
                </div>
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
                    There hasn't been any transactions for this account yet.
                </div>
            </div>
        </div>

        <add-money-modal :account="account" />

        <subtract-money-modal :account="account" />
    </app-layout>
</template>

<script>
import AppLayout from "@/Shared/Layouts/App";
import ProfileDropdown from "@/Shared/ProfileDropdown";
import AddMoneyModal from "./AddMoneyModal";
import SubtractMoneyModal from "./SubtractMoneyModal";
import AccountActivityTopBar from "@/components/Accounts/AccountActivityTopBar";
import DataTable from "@/components/DataTables/DataTable";
import DataTableHeader from "@/components/DataTables/DataTableHeader";
import DataTableRow from "@/components/DataTables/DataTableRow";

export default {
    props: ["account", "isActive", "accountType", "transactions"],
    components: {
        AppLayout,
        ProfileDropdown,
        AddMoneyModal,
        SubtractMoneyModal,
        AccountActivityTopBar,
        DataTable,
        DataTableHeader,
        DataTableRow
    },
    mounted() {
        document.title = `${this.account.account_name} - ${this.$page.app.name}`;
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
