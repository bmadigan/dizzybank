<template>
    <tr class="border-b border-gray-200 text-gray-700 hover:bg-gray-100">
        <slot />
        <slot v-if="$slots.actions" name="actions">
            <td class="py-4 px-6">
                <slot />
            </td>
        </slot>
    </tr>
</template>
<script>
export default {};
</script>
