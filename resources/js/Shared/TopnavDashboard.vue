<template>
    <div>
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
            <div class="mt-6 px-6 py-6 w-3/5 card flex justify-between">
                <div>
                    <h3 class="text-gray-800 text-lg font-semibold pb-2">Brad and Karen Madigan</h3>
                    <div class="text-gray-600 text-sm">
                        30 Texas Ave,
                        <br />
                        Sault Ste. Marie, Ontario
                        <br />
                        CA P6A 4Y8
                    </div>
                </div>
                <div>
                    <button class="btn-sm btn-lite hover:bg-indigo-200">
                        Update Address
                    </button>
                </div>
            </div>

            <div class="text-right w-2/5 mt-3">
                <div class="uppercase text-sm text-indigo-300 pb-1">Total Balance</div>
                <div class="text-4xl text-white font-semibold">$54,023.33</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>
