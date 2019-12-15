<template>
        <dropdown>
            <template v-slot:trigger>
                <div class="text-gray-500 hover:text-indigo-500 cursor-pointer">
                    <svg 
                       viewBox="0 0 24 24"
                       class="fill-current w-6 h-6 ml-3"
                       xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                        <defs/>
                        <path fill-rule="evenodd" d="M3.073 8.982a7.058 7.058 0 000 2.036L.34 13.268l2 3.464 3.316-1.242c.53.42 1.123.765 1.762 1.018L8 20h4l.582-3.492a6.993 6.993 0 001.762-1.018l3.316 1.242 2-3.464-2.733-2.25a7.058 7.058 0 000-2.036l2.733-2.25-2-3.464-3.316 1.242a6.993 6.993 0 00-1.762-1.018L12 0H8l-.582 3.492A6.993 6.993 0 005.656 4.51L2.34 3.268l-2 3.464 2.733 2.25zM10 13a3 3 0 100-6 3 3 0 000 6z"/>
                    </svg>
                </div>
            </template>

            <div class="w-56">
                <ul>
                    <li class="pl-2 pr-8 py-2 hover:bg-gray-200">
                        <a href="#" class="block">Update Account Name</a>
                    </li>
                    <li class="pl-2 pr-8 py-2 hover:bg-gray-200">
                        <a href="#">Close Account</a>
                    </li>
                </ul>
            </div>
        </dropdown>
</template>

<script>
export default {
    props: ["account"],
}
</script>