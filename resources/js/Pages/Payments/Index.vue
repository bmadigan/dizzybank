<template>
    <app-layout>
        <div class="bg-white px-8 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img src="/svgs/wordmark-color.svg" class="w-8 mr-3" />
                    <h2 class="text-gray-800 text-3xl font-semibold">Bill Payments</h2>
                </div>
                <profile-dropdown :user="$page.auth.user" theme="app"></profile-dropdown>
            </div>
        </div>

        <div class="px-8 mt-10">
            <div class="flex items-center justify-between mt-12 mb-10">
                <h2 class="text-2xl text-gray-600 font-semibold">Payment History</h2>
                <div class="flex items-center">
                    <button
                        @click.prevent="$modal.show('make-payment-modal')"
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
                        <span>Make A Payment</span>
                    </button>

                    <button
                        @click.prevent="$modal.show('manage-payees-modal')"
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
                        <span>Manage Bill Payees</span>
                    </button>
                </div>
            </div>

            <div v-if="payments.length > 0">
                <data-table :headers="headers()" sort-url="/" :data="payments">
                    <template v-slot:date="{ item }">
                        {{ item.created_at | formatDate }}
                    </template>
                    <template v-slot:user="{ item }">
                        {{ item.user.name }}
                    </template>
                    <template v-slot:account="{ item }">
                        {{ item.account.account_name }}
                    </template>
                    <template v-slot:payee="{ item }">
                        {{ item.payee.payee_name }}
                    </template>
                    <template v-slot:amount="{ item }" class="text-red-600">- {{ item.amount | currency }}</template>
                </data-table>
            </div>
            <div v-else>
                <div class="text-center py-10 text-xl bg-white rounded">
                    There hasn't been any payments for this account yet.
                </div>
            </div>
        </div>

        <manage-payees-modal :payees="payees" />

        <make-payment-modal :accounts="accounts" :payees="payees" />
    </app-layout>
</template>

<script>
import AppLayout from "@/Shared/Layouts/App";
import ProfileDropdown from "@/Shared/ProfileDropdown";
import ManagePayeesModal from "./ManagePayeesModal";
import MakePaymentModal from "./MakeAPaymentModal";
import DataTable from "@/components/DataTables/DataTable";
import DataTableHeader from "@/components/DataTables/DataTableHeader";
import DataTableRow from "@/components/DataTables/DataTableRow";

export default {
    props: ["accounts", "payees", "payments"],

    components: {
        AppLayout,
        ProfileDropdown,
        ManagePayeesModal,
        MakePaymentModal,
        DataTable,
        DataTableHeader,
        DataTableRow
    },
    methods: {
        headers() {
            return [
                { title: "Date", key: "date" },
                { title: "Paid By", key: "user" },
                { title: "Account", key: "account" },
                { title: "Payee", key: "payee" },
                { title: "Amount", key: "amount" }
            ];
        }
    },
    mounted() {
        document.title = `Payment History - ${this.$page.app.name}`;
    }
};
</script>
