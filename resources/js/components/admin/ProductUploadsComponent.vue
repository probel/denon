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
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label :for="'type_'+hash+key" class="control-label">Тип</label>
                                <select
                                    class="form-control"
                                    v-model="field.type"
                                    :name="prefix+'['+key+'][type]'"
                                    :id="'type_'+hash+key">
                                    <option value="document">Document</option>
                                    <option value="pdf">PDF</option>
                                    <option value="website">Website</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label :for="'date_'+hash+key" class="control-label">Дата</label>
                                <input type="date"
                                    class="form-control"
                                    v-model="field.date"
                                    :name="prefix+'['+key+'][date]'"
                                    :id="'date_'+hash+key"
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label :for="'title_'+hash+key" class="control-label">Заголовок</label>
                                <input type="text"
                                    class="form-control"
                                    v-model="field.title"
                                    :name="prefix+'['+key+'][title]'"
                                    :id="'title_'+hash+key"
                                >
                            </div>
                        </div>
                        <div v-if="field.type == 'website'" class="col-md-4">
                            <div class="form-group ">
                                <label :for="'value_'+hash+key" class="control-label">Адрес</label>
                                <input type="text"
                                    class="form-control"
                                    v-model="field.value"
                                    :name="prefix+'['+key+'][value]'"
                                    :id="'value_'+hash+key"
                                >
                            </div>
                        </div>
                        <div v-else class="col-md-4">
                            <div class="form-group ">
                                <label :for="'value_'+hash+key" class="control-label">Файл</label>
                                <upload-file
                                        :url="url"
                                        :name="prefix+'['+key+'][value]'"
                                        :value="field.value ? field.value : ''"
                                    >
                                </upload-file>

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
            url: {
                default: '/admin/save/fieldfile',
                type: String
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
                    date: (new Date()).toISOString().split('T')[0],
                    type: 'document',
                    value: ''
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
