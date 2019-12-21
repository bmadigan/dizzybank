<template>
    <modal
        name="manage-payees-modal"
        :draggable="false"
        :scrollable="true"
        :height="450"
        :width="450"
        :clickToClose="false"
        classes="modal-container"
    >
        <div class="modal-content">
            <div class="modal-body ">
                <div class="flex items-center justify-between border-b border-gray-200 py-6 px-4">
                    <div class="flex items-center">
                        <img src="/svgs/wordmark-color.svg" class="w-8 mr-3" />
                        <h2 class="text-gray-800 font-semibold text-xl">Manage Bill Payees</h2>
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

                <form @submit.prevent="submitForm">
                    <div class="mt-6 justify-center w-full">
                        <div class="pb-4 px-4 flex justify-between items-center">
                            <label class="block">
                                <span class="text-gray-700 w-full">Create This New Payee</span>
                                <input
                                    v-model="form.payee_name"
                                    class="form-input mt-1 block w-full"
                                    placeholder="Payee's Name"
                                />
                            </label>
                            <button
                                type="submit"
                                class="bg-indigo-700 hover:bg-indigo-600 mt-6 -ml-4 text-white rounded text-xs px-4 py-2"
                            >
                                Add
                            </button>
                        </div>
                    </div>
                </form>

                <div class="flex items-center justify-between border-b border-gray-200 py-2 px-4">
                    <h3 class="text-gray-700 text-lg">Payee Listings</h3>
                </div>

                <div class="mt-6 justify-center w-full px-6">
                    <div class="py-2" v-for="payee in payees">{{ payee.payee_name }}</div>
                </div>
            </div>
            <div class="modal-footer flex items-center justify-between">
                <p class="p-6 cursor-pointer" @click="cancel">Close</p>
                <div class="p-6 text-right">
                    <button @click="cancel" class="bg-gray-600 hover:bg-gray-500 text-white rounded text-xs px-4 py-2">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </modal>
</template>

<script>
export default {
    props: ["payees"],
    data() {
        return {
            form: {
                payee_name: ""
            }
        };
    },
    methods: {
        submitForm() {
            this.$inertia.post(route("payees.store"), this.form).then(() => {
                this.resetForm();
                this.close();
            });
        },
        cancel() {
            this.resetForm();
            this.close();
        },
        resetForm() {
            this.form.payee_name = "";
        },
        close() {
            this.$modal.hide("manage-payees-modal");
        }
    }
};
</script>
