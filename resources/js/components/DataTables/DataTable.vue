<template>
    <div class="">
        <table
            cellpadding="0"
            cellspacing="0"
            class="table-auto border-collapse text-sm py-4 px-4 mb-4 bg-white w-full shadow"
        >
            <thead>
                <data-table-header
                    v-for="header in headers"
                    :header="header"
                    v-bind:key="header.id"
                    :active="activeColumnSortKey === header.sortkey"
                    v-on:sort="sort"
                >
                    >
                </data-table-header>
            </thead>
            <tbody>
                <DataTableRow v-for="(item, itemIndex) in data" :key="`item-${itemIndex}`">
                    <td
                        v-for="(header, headerIndex) in headers"
                        :key="`header-${headerIndex}`"
                        class="text-sm py-4 px-6 whitespace-no-wrap"
                        style="display: table-cell;"
                    >
                        <slot :name="header.key" :item="item">{{ item[header.key] }}</slot>
                    </td>
                </DataTableRow>
            </tbody>
        </table>
    </div>
</template>
<script>
import DataTableHeader from "./DataTableHeader";
import DataTableRow from "./DataTableRow";
export default {
    components: {
        DataTableHeader,
        DataTableRow
    },
    props: {
        headers: {
            type: Array
        },
        sortUrl: {},
        data: {
            type: Array
        }
    },
    data() {
        return {
            activeColumnSortKey: false,
            uriString: "?sort=",
            direction: "asc"
        };
    },
    methods: {
        sort(sortKey) {
            this.direction = this.toggleSort(this.direction);

            this.$nextTick(function() {
                this.activeColumnSortKey = sortKey;
            });

            let queryStr = "";

            if (this.direction === "desc") {
                queryStr = this.sortUrl + this.uriString + "-" + sortKey;
            } else {
                queryStr = this.sortUrl + this.uriString + sortKey;
            }

            //Inertia.visit(queryStr);
        },
        toggleSort(v) {
            return v === "desc" ? "asc" : "desc";
        }
    }
};
</script>
