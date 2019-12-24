<template>
    <div class="pr-6 pb-2 w-full">
        <label v-if="label" class="block text-label tracking-wide mb-2" :for="id">{{ label }}</label>
        <input
            :id="id"
            ref="input"
            v-bind="$attrs"
            class="appearance-none text-sm block w-full text-gray-800 border border-gray-400 rounded py-4 px-4 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            :class="{ 'border-red-400': error }"
            :type="type"
            :value="value"
            :placeholder="placeholder"
            @input="$emit('input', $event.target.value)"
        />
        <div v-if="error" class="block p-2 bg-red-100 text-red-600 mt-2 text-sm leading-tight">{{ error[0] }}</div>
    </div>
</template>

<script>
export default {
    inheritAttrs: false,
    props: {
        id: {
            type: String,
            default() {
                return `text-input-${this._uid}`;
            }
        },
        type: {
            type: String,
            default: "text"
        },
        value: {
            type: String,
            default: ""
        },
        label: {
            type: String,
            default: ""
        },
        placeholder: {
            type: String,
            default: ""
        },
        error: {
            type: String,
            default: ""
        }
    },
    methods: {
        focus() {
            this.$refs.input.focus();
        },
        select() {
            this.$refs.input.select();
        },
        setSelectionRange(start, end) {
            this.$refs.input.setSelectionRange(start, end);
        }
    }
};
</script>
