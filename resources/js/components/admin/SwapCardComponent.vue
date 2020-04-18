<template>
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="pull-left header-btns" role="tab">
                <button v-if="index > 0" @click="$parent.swapItems(index,index-1)"  type="button" class="btn btn-xs btn-success"><i class="fa fa-chevron-up"></i></button>
                <button v-if="index < (count - 1)" @click="$parent.swapItems(index,index+1)" type="button" class="btn btn-xs btn-danger"><i class="fa fa-chevron-down"></i></button>
            </div>
            <h3 class="panel-title cursor-pointer">
                <a role="button" data-toggle="collapse" :href="'#collapse'+index" aria-expanded="true">
                    {{ titleText }}
                </a>
            </h3>
        </div>
        <div :id="'collapse'+index" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body">
                <slot></slot>
            </div>
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
