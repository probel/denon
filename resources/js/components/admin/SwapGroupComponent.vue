<template>
    <div>
        <h5>{{ title }}</h5>
        <slot></slot>
        <div v-if="isbtn" style="margin: 15px 0;">
            <div class="input-group">
                <button type="button" class="btn btn-success" @click.prevent="addBlock()">
                    <i class="fa fa-plus"></i> Добавить
                </button>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            title: {
                type: String,
                default: ''
            },
            isbtn: {
                type: Boolean,
                default: true
            },
        },
        data: () => {
            return {
                opened: null,
            }
        },
        mounted() {

        },
        watch: {

        },
        methods: {
            addBlock: function() {
                this.$parent.addBlock();
            },
            swapItems: function (firstKey,secondKey) {
                let fields = this.$parent.fields;
                let tempItem = fields[firstKey];
                this.$set(this.$parent.fields, firstKey, fields[secondKey])
                this.$set(this.$parent.fields, secondKey, tempItem)

            },
            removeItem: function (itemKey) {
                this.$parent.fields.splice(itemKey,1);
            },
        }
    }
</script>
<style>
    .header-btns {
        width: 65px;
        margin-right: 15px;
        text-align: center;
    }
    .js-ckeditor {
        display: none !important;
    }
</style>
