<template>
    <div class="card card-info">
        <div class="card-header">
            <div class="float-left header-btns">
                <button v-if="index > 0" @click="$parent.swapItems(index,index-1)"  type="button" class="btn btn-tool"><i class="fa fa-chevron-up"></i></button>
                <button v-if="index < (count - 1)" @click="$parent.swapItems(index,index+1)" type="button" class="btn btn-tool"><i class="fa fa-chevron-down"></i></button>
            </div>
            <h3 class="card-title cursor-pointer" data-card-widget="collapse">{{ title ? title : '#'+(index+1) }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" @click="$parent.removeItem(index)">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <slot></slot>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            title: {
                default: '',
                type: String
            },
            isOpen: {
                default: false,
                type: Boolean
            },
            index: {
                default: 0,
                type: Number
            },
            count: {
                default: 0,
                type: Number
            },
        },
        data: () => {
            return {
                path: '',
            }
        },
        computed: {
            titleText: function () {
                return this.title ? this.title : ('# ' + (this.index+1));
            }
        },
        mounted() {

        },
        updated() {

        },
        watch: {
            val: function () {
                if (this.val.path) {
                    this.path = this.val.path;
                }
            },
            imageField: function () {
                this.$emit('change-field', this.imageField);
            },
        },
        methods: {

        }
    }
</script>
<style>
.image-wrapper {
    max-width: 100%;
}
.header-btns {
    width: 65px;
}
</style>
