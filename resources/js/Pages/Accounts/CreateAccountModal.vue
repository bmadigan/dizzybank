<template>
    <modal
        name="create-account-modal"
        :draggable="false"
        :scrollable="false"
        :height="380"
        :width="410"
        :clickToClose="false"
        classes="modal-container"
    >
        <div class="modal-content">
            <form @submit.prevent="submitForm">
                <div class="modal-body ">
                    <div class="flex items-center justify-between border-b border-gray-200 py-6 px-4">
                        <div class="flex items-center">
                            <img src="/svgs/wordmark-color.svg" class="w-8 mr-3" />
                            <h2 class="text-gray-800 font-semibold text-xl">Create A New Account</h2>
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
                                <span class="text-gray-700 w-full">Account type</span>
                                <select class="form-select mt-1 block w-full" v-model="form.accountTypeId">
                                    <option disabled value="">Select An Account Type</option>
                                    <option v-for="(type, index) in accountTypes" v-bind:value="type.id">
                                        {{ type.type_name }}
                                    </option>
                                </select>
                            </label>
                        </div>

                        <div class="pb-4 px-4 flex justify-between items-center">
                            <label class="block">
                                <span class="text-gray-700 w-full">Account Name</span>
                                <input
                                    v-model="form.accountName"
                                    class="form-input mt-1 block w-full"
                                    placeholder="Eg. Family Savings Account ..."
                                />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex items-center justify-between">
                    <p class="p-6" @click="cancel">Cancel</p>
                    <div class="p-6 text-right">
                        <button
                            type="submit"
                            class="bg-indigo-700 hover:bg-indigo-600 text-white rounded text-xs px-4 py-2"
                        >
                            Create Account
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </modal>
</template>

<script>
export default {
    data() {
        return {
            accountTypes: [],
            form: {
                accountTypeId: 1,
                accountName: ""
            }
        };
    },
    methods: {
        getAccountTypes() {
            // do tit
        },
        submitForm() {
            this.$inertia.post(route("accounts.store"), this.form).then(() => {
                this.resetForm();
                this.close();
            });
        },
        cancel() {
            this.resetForm();
            this.close();
        },
        resetForm() {
            this.form.accountTypeId = "5";
            this.form.accountName = "";
        },
        close() {
            this.$modal.hide("create-account-modal");
        }
    },
    mounted() {
        this.accountTypes = this.$page.accountTypes;
    }
};
</script>
