<template>
    <div>
        <swap-group
            :title = "title"
            >
            <div v-for="(field,key) in fields" :key="key" class="">
                <swap-card
                    :index = "key"
                    :count = "count"
                    :title = "field.title"
                >
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group ">
                                <label :for="'title_'+key" class="control-label">Заголовок</label>
                                <input type="text"
                                    class="form-control"
                                    v-model="field.title"
                                    :name="prefix+'['+key+'][title]'"
                                    :id="'title_'+key"
                                >
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group ">
                                <label :for="'value_'+key" class="control-label">Значение</label>
                                <input type="text"
                                    class="form-control"
                                    v-model="field.value"
                                    :name="prefix+'['+key+'][value]'"
                                    :id="'value_'+key"
                                >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox checkbox-inline">
                                    <input
                                        type="checkbox"
                                        v-model="field.dot"
                                        :name="prefix+'['+key+'][dot]'"
                                        class="custom-control-input"
                                        :id="'param_dot-'+hash+key">
                                    <label class="custom-control-label" :for="'param_dot-'+hash+key">Отображать точками</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </swap-card>
            </div>
        </swap-group>
    </div>
</template>

<script>
    export default {
        props: {
            fieldsin: {
                default: [],
                type: Array
            },
            prefix: {
                type: String,
                default: ''
            },
            title: {
                type: String,
                default: ''
            },
            isdescription: {
                type: Boolean,
                default: true
            },
            isimage: {
                type: Boolean,
                default: true
            },
        },
        data: () => {
            return {
                fields: [],
                hash: Math.random().toString(36),
            }
        },
        mounted() {
            this.fields = this.fieldsin;
        },
        watch: {
            fields: function () {
                this.count = this.fields.length;
            },
        },
        methods: {
            addBlock: function() {
                let element = {
                    title: '',
                    color: '',
                    images: []
                }
                this.$set(this.fields, this.fields.length, element);
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
    .checkbox-inline {
        margin-top: 38px;
    }
</style>
