<template>
    <section class="flex-shrink-0 bg-gradient-sidenav text-indigo-500 w-72">
        <div class="flex justify-center py-8">
            <div>
                <inertia-link href="/">
                    <img src="/svgs/logo-white.svg" class="w-48" />
                </inertia-link>
            </div>
        </div>
        <div class="flex sm:hidden">
            <!--/hamburder?-->
            <button type="button">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    class="h-6 w-6 fill-current text-gray-500 hover:text-white focus:outline-none focus:text-white"
                >
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                </svg>
            </button>
        </div>
        <div class="px-6">
            <div class="pb-4 flex justify-center">
                <button
                    @click.prevent="$modal.show('create-account-modal')"
                    class="w-48 rounded-lg text-sm bg-cta text-white py-3 px-2"
                >
                    Create A New Account
                </button>
            </div>
            <div class="mt-8">
                <p class="uppercase text-xs text-indigo-200 pb-4">Accounts</p>
                <div class="font-semibold text-sm text-white hover:text-indigo-200 pb-3">
                    <a href="#">Account Summary</a>
                </div>
                <div class="font-semibold text-sm text-white hover:text-indigo-200 pb-3">
                    <a href="#">Create An Account</a>
                </div>
            </div>
            <div class="mt-8">
                <p class="uppercase text-xs text-indigo-200 pb-4">Transactions</p>
                <div class="font-semibold text-sm text-white hover:text-indigo-200 pb-3">
                    <a href="#">Transaction History</a>
                </div>
                <div class="font-semibold text-sm text-white hover:text-indigo-200 pb-3">
                    <a href="#">Make A Payment</a>
                </div>
                <div class="font-semibold text-sm text-white hover:text-indigo-200 pb-3">
                    <a href="#">Payment History</a>
                </div>
            </div>
            <div class="mt-8">
                <p class="uppercase text-xs text-indigo-200 pb-4">Services</p>
                <div class="font-semibold text-sm text-white hover:text-indigo-200 pb-3">
                    <a href="#">Transfer Money</a>
                </div>
                <div class="font-semibold text-sm text-white hover:text-indigo-200 pb-3">
                    <a href="#">My Profile</a>
                </div>
            </div>
        </div>

        <create-account-modal></create-account-modal>
    </section>
</template>

<script>
import CreateAccountModal from "@/Pages/Accounts/CreateAccountModal";

export default {
    components: { CreateAccountModal }
};
</script>
