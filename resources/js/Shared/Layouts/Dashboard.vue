<template>
    <div class="flex min-h-screen w-full">
        <section class="flex-shrink-0 bg-gradient-sidenav text-indigo-500 w-72">
            <div class="flex justify-center py-8">
                <div><img src="/svgs/logo-white.svg" class="w-48" /></div>
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
                    <button class="w-48 rounded-lg text-sm bg-cta text-white py-3 px-2">
                        Create A New Account
                    </button>
                </div>
                <div class="mt-4">
                    <p class="uppercase text-xs text-indigo-200 pb-4">Accounts</p>
                    <div class="font-semibold text-sm text-white hover:text-indigo-200 pb-3">
                        <a href="#">Account Summary</a>
                    </div>
                    <div class="font-semibold text-sm text-white hover:text-indigo-200 pb-3">
                        <a href="#">My Accounts</a>
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
                        <a href="#">Create An Account</a>
                    </div>
                    <div class="font-semibold text-sm text-white hover:text-indigo-200 pb-3">
                        <a href="#">My Profile</a>
                    </div>
                </div>
            </div>
        </section>

        <main class="w-full">
            <div class="bg-indigo-900 h-48 px-8 pt-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img src="/svgs/wordmark-color.svg" class="w-8 mr-3" />
                        <h2 class="text-white text-3xl font-semibold">Account Summary</h2>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-2">
                            <img
                                src="https://randomuser.me/api/portraits/women/65.jpg"
                                class="w-8 rounded-full border-indigo-200 border-2"
                            />
                        </div>
                        <div class="text-white text-sm">
                            Brad madigan
                        </div>
                    </div>
                </div>
            </div>

            <div class="-mt-32 flex justify-between px-8">
                <div class="mt-6 px-6 py-6 w-3/5 bg-white rounded-lg shadow flex justify-between">
                    <div>
                        <h3 class="text-gray-700 text-lg font-semibold pb-2">Brad and Karen Madigan</h3>
                        <div class="text-gray-500 text-sm">
                            30 Texas Ave,
                            <br />
                            Sault Ste. Marie, Ontario
                            <br />
                            CA P6A 4Y8
                        </div>
                    </div>
                    <div>
                        <button class="bg-indigo-100 text-sm text-indigo-700 rounded px-4 py-2">
                            Update Address
                        </button>
                    </div>
                </div>

                <div class="text-right w-2/5 mt-3">
                    <div class="uppercase text-sm text-indigo-500 pb-1">Total Balance</div>
                    <div class="text-4xl text-white font-semibold">$54,023.33</div>
                </div>
            </div>

            <slot />
        </main>
    </div>
</template>

<script>
export default {};
</script>
