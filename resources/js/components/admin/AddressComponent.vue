<template>
    <div :key="iteration">
        <div class="row">
            <template v-for="(field,key) in fields">
                <div :key="key" class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <div class="float-left header-btns">
                                <button v-if="key > 0" @click="swapItems(key,key-1)"  type="button" class="btn btn-tool"><i class="fa fa-chevron-up"></i></button>
                                <button v-if="key < (fields.length - 1)" @click="swapItems(key,key+1)" type="button" class="btn btn-tool"><i class="fa fa-chevron-down"></i></button>
                            </div>
                            <h3 class="card-title cursor-pointer" data-card-widget="collapse">#{{ key+1 }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" @click="removeItem(key)" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-element-image">
                                        <label :for="'title_'+key" class="control-label">Заголовок</label>
                                        <input type="text"
                                            class="form-control"
                                            :value="fields[key].title"
                                            :name="prefix+'['+key+'][title]'"
                                            :id="'title_'+key"
                                            v-on:input="fields[key].title = $event.target.value"
                                        >
                                    </div>
                                    <div class="form-group form-element-image">
                                        <label :for="'text_'+key" class="control-label">Текст</label>
                                        <textarea type="text"
                                            class="js-ckeditor"
                                            :value="fields[key].text"
                                            :name="prefix+'['+key+'][text]'"
                                            :id="'text_'+key"
                                            v-on:input="fields[key].text = $event.target.value">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <div style="margin: 15px 0;">
            <div class="col-md-6">
                <button type="button" class="btn btn-success" @click.prevent="addVariation()">
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
            fieldsin: {
                default: [],
                type: Array
            },
            prefix: {
                default: 'default',
                type: String
            },
            lines: {}
        },
        data: () => {
            return {
                fields: [],
                iteration: 0,
                count: 0,
            }
        },
        mounted() {
            if (this.fieldsin && this.fieldsin.length) {
                this.fields = this.fieldsin;
                this.count = this.fields.length;
            }
        },
        updated() {
            Admin.setEditor();
        },
        watch: {
            fields: function () {
            },
        },
        methods: {
            addVariation: function() {
                this.fields.push({
                    title:'',
                    path:'',
                    image:'',
                });
            },
            swapItems: function (firstKey,secondKey) {
                let fields = this.fields;
                let tempItem = fields[firstKey];

                fields[firstKey] = fields[secondKey];
                fields[secondKey] = tempItem;
                this.fields = fields;
                this.iteration += 1;
            },
            removeItem: function (itemKey) {
                this.fields.splice(itemKey,1);
            },
        }
    }
</script>
<style>
    .header-btns {
        width: 65px;
        margin-right: 15px;
    }
    .js-ckeditor {
        display: none !important;
    }
</style>
