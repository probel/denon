<template>
    <div>
        <swap-group
            :title = "title"
            >
            <div v-for="(field,key) in fields" :key="key" class="">
                <swap-card
                    :index = "key"
                    :count = "count"
                    :title = "fields[key].title"
                >
                    <div class="row">
                        <div class="col-md-3">
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
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-element-image">
                                <label :for="'color_'+key" class="control-label">Цвет</label>
                                <input type="color"
                                    class="form-control"
                                    :value="fields[key].color"
                                    :name="prefix+'['+key+'][color]'"
                                    :id="'color_'+key"
                                    v-on:input="fields[key].color = $event.target.value"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title cursor-pointer" data-card-widget="collapse">Изображения</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: none">
                            <multi-images
                                :fieldsin = "fields[key].images"
                                :prefix ="prefix+'['+key+'][images]'"
                            ></multi-images>
                        </div>
                    </div>
                    <small class="text-muted">Если указаны изображения здесь, то при выборе данного цвета будут отображаться они, иначе из вкладки "Основоное"</small>
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
    .js-ckeditor {
        display: none !important;
    }
</style>
