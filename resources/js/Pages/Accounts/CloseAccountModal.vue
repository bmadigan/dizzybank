<template>
    <modal
        name="close-account-modal"
        :draggable="false"
        :scrollable="false"
        :height="280"
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
                            <h2 class="text-gray-800 font-semibold text-xl">Close Account</h2>
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
                        <div class="pb-4 px-4 text-center">
                            <h2 class="text-red-700 text-lg">
                                Are you sure you wish to close the
                                <span class="font-semibold">{{ account.account_name }}</span>
                                account?
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex items-center justify-between">
                    <p class="p-6 cursor-pointer" @click="cancel">Cancel</p>
                    <div class="p-6 text-right">
                        <button type="submit" class="bg-red-700 hover:bg-red-600 text-white rounded text-xs px-4 py-2">
                            Yes Close Account
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </modal>
</template>

<script>
export default {
    props: ["account"],
    data() {
        return {
            form: {
                account_uuid: this.account.uuid,
                isClosed: 0
            }
        };
    },
    methods: {
        submitForm() {
            this.form.isClosed = 1;
            this.$inertia.patch(route("accounts.update", this.account.uuid), this.form).then(() => {
                this.close();
            });
        },
        cancel() {
            this.close();
        },
        close() {
            this.$modal.hide("close-account-modal");
        }
    }
};
</script>
