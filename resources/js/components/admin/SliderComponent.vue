<template>
    <div :key="iteration">
        <div class="row">
            <template v-for="(field,key) in fields">
                <div :key="key" class="col-12">
                    <div class="card card-info">
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
                                <div class="col-md-3" :key="fields[key].type">
                                    <label class="control-label">Картинка</label>
                                    <upload-image
                                            url="/admin/save/fieldimage"
                                            :name="prefix+'['+key+'][image]'"
                                            :value="field.image ? field.image : ''"
                                            v-on:change-image="fields[key].image = $event"
                                        >
                                    </upload-image>
                                </div>
                                <div class="col-md-6">
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
                                        <label :for="'subtitle_'+key" class="control-label">Подзаголовок</label>
                                        <input type="text"
                                            class="form-control"
                                            :value="fields[key].subtitle"
                                            :name="prefix+'['+key+'][subtitle]'"
                                            :id="'subtitle_'+key"
                                            v-on:input="fields[key].subtitle = $event.target.value"
                                        >
                                    </div>
                                    <div class="form-group form-element-image">
                                        <label :for="'description_'+key" class="control-label">Описание</label>
                                        <input type="text"
                                            class="form-control"
                                            :value="fields[key].description"
                                            :name="prefix+'['+key+'][description]'"
                                            :id="'description_'+key"
                                            v-on:input="fields[key].description = $event.target.value"
                                        >
                                    </div>
                                    <div class="form-group form-element-image">
                                        <label :for="'path_'+key" class="control-label">Ссылка</label>
                                        <input type="text"
                                            class="form-control"
                                            :value="fields[key].path"
                                            :name="prefix+'['+key+'][path]'"
                                            :id="'path_'+key"
                                            v-on:input="fields[key].path = $event.target.value"
                                        >
                                    </div>
                                    <div class="form-group form-element-image">
                                        <label :for="'help_'+key" class="control-label">Подпись</label>
                                        <input type="text"
                                            class="form-control"
                                            :value="fields[key].help"
                                            :name="prefix+'['+key+'][help]'"
                                            :id="'help_'+key"
                                            v-on:input="fields[key].help = $event.target.value"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label">Награды</label>
                                    <upload-image
                                            url="/admin/save/fieldimage"
                                            :name="prefix+'['+key+'][award]'"
                                            :value="field.award ? field.award : ''"
                                            v-on:change-image="fields[key].award = $event"
                                        >
                                    </upload-image>
                                    <small class="text-muted">Отображается в нижнем правом углу</small>
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
        width: 58px;
        margin-right: 15px;
    }
</style>
