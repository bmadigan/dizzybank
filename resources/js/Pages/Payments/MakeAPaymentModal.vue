<template>
    <modal
        name="make-payment-modal"
        :draggable="false"
        :scrollable="false"
        :height="450"
        :width="400"
        :clickToClose="false"
        classes="modal-container"
    >
        <div class="modal-content">
            <form @submit.prevent="submitForm">
                <div class="modal-body ">
                    <div class="flex items-center justify-between border-b border-gray-200 py-6 px-4">
                        <div class="flex items-center">
                            <img src="/svgs/wordmark-color.svg" class="w-8 mr-3" />
                            <h2 class="text-gray-800 font-semibold text-xl">Make A Payment</h2>
                        </div>
                        <svg
                            @click="cancel"
                            viewBox="0 0 24 24"
                            class="fill-current text-gray-500 w-6 h-6 cursor-pointer"
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                        >
                            <defs />
                            <path
                                fill-rule="evenodd"
                                d="M11.414 10l2.829-2.828-1.415-1.415L10 8.586 7.172 5.757 5.757 7.172 8.586 10l-2.829 2.828 1.415 1.415L10 11.414l2.828 2.829 1.415-1.415L11.414 10zM2.93 17.071c3.905 3.905 10.237 3.905 14.142 0 3.905-3.905 3.905-10.237 0-14.142-3.905-3.905-10.237-3.905-14.142 0-3.905 3.905-3.905 10.237 0 14.142z"
                            />
                        </svg>
                    </div>

                    <div class="mt-6 justify-center w-full">
                        <div class="pb-4 px-4 flex justify-between items-center">
                            <label class="block">
                                <span class="text-gray-700 w-full">Account</span>
                                <select class="form-select mt-1 block w-full" v-model="form.accountId">
                                    <option disabled value="null">Select An Account</option>
                                    <option v-for="(account, index) in accounts" v-bind:value="account.id">
                                        {{ account.account_name }}
                                    </option>
                                </select>
                            </label>
                        </div>

                        <div class="pb-4 px-4 flex justify-between items-center">
                            <label class="block">
                                <span class="text-gray-700 w-full">Pay To</span>
                                <select class="form-select mt-1 block w-full" v-model="form.payeeId">
                                    <option disabled value="null">Select A Payee</option>
                                    <option v-for="(payee, index) in payees" v-bind:value="payee.id">
                                        {{ payee.payee_name }}
                                    </option>
                                </select>
                            </label>
                        </div>

                        <div class="pb-4 px-4 flex justify-between items-center">
                            <label class="block">
                                <span class="text-gray-700 w-full">Payment Amount</span>
                                <input
                                    v-model="form.amount"
                                    v-money="money"
                                    class="form-input mt-1 block w-full"
                                    placeholder="$0.00"
                                />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex items-center justify-between">
                    <p class="p-6 cursor-pointer" @click="cancel">Cancel</p>
                    <div class="p-6 text-right">
                        <button
                            type="submit"
                            name="addMoney"
                            class="bg-indigo-700 hover:bg-indigo-600 text-white rounded text-xs px-4 py-2"
                        >
                            Pay Bill
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </modal>
</template>

<script>
export default {
    props: ["accounts", "payees"],
    data() {
        return {
            form: {
                accountId: null,
                payeeId: null,
                amount: 0.0
            },
            money: {
                decimal: ".",
                thousands: ",",
                prefix: "$ ",
                precision: 2,
                masked: false /* doesn't work with directive */
            }
        };
    },
    methods: {
        submitForm() {
            this.$inertia.post(route("payments.store"), this.form).then(() => {
                this.resetForm();
                this.close();
            });
        },
        cancel() {
            this.resetForm();
            this.close();
        },
        resetForm() {
            (this.form.accountId = null), (this.form.payeeId = null), (this.form.amount = 0.0);
        },
        close() {
            this.$modal.hide("make-payment-modal");
        }
    }
};
</script>
