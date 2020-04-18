<template>
    <div>
        <swap-group
            :title = "title"
            :isbtn = "false"
            >
            <div v-for="(field,key) in fields" :key="key" class="">
                <swap-card
                    :index = "key"
                    :count = "count"
                    :title = "fields[key].title"
                >
                    <div v-if="field.type == 'image'" class="col-md-12 col-lg-12">
                        <div class="row">
                            <select-wide
                                :name="prefix+'['+key+']'+'[wide]'"
                                :inval="field.wide"
                                v-on:change-wide="field.wide = $event"
                                >
                            </select-wide>
                        </div>
                        <div class="form-group form-element-image">
                           <image-component
                                url="/admin/save/fieldimage?pg=1"
                                :name="prefix+'['+key+']'+'[image]'"
                                :val="field.image ? field.image : {}"
                                v-on:change-field="fields[key].image = $event"
                            >
                            </image-component>
                        </div>
                    </div>
                    <div v-else-if="field.type == 'ckeditor'" class="col-md-12 col-lg-12">
                        <div class="row">
                            <select-wide
                                :name="prefix+'['+key+']'+'[wide]'"
                                :inval="field.wide"
                                v-on:change-wide="field.wide = $event"
                                >
                            </select-wide>
                        </div>
                        <div class="form-group form-element-text">
                            <textarea  type="text"
                                        :id="'field'+key"
                                        :name="prefix+'['+key+']'+'[value]'"
                                        :value="field.value"
                                        class="form-control js-ckeditor"
                                        v-on:input="changeValue($event.target.value,key)"
                            ></textarea>
                        </div>
                    </div>
                    <div v-else-if="field.type == 'html'" class="col-md-12 col-lg-12">
                        <div class="row">
                            <select-wide
                                :name="prefix+'['+key+']'+'[wide]'"
                                :inval="field.wide"
                                v-on:change-wide="field.wide = $event"
                                >
                            </select-wide>
                        </div>
                        <div class="form-group form-element-text">
                            <textarea  type="text"
                                        :id="'field'+key"
                                        :name="prefix+'['+key+']'+'[value]'"
                                        :value="field.value"
                                        class="form-control"
                                        v-on:input="changeValue($event.target.value,key)"
                            ></textarea>
                        </div>
                    </div>
                    <div v-else-if="field.type == 'narrow_text'" class="col-md-12 col-lg-12">
                        <div class="row">
                            <select-wide
                                :name="prefix+'['+key+']'+'[wide]'"
                                :inval="field.wide"
                                v-on:change-wide="field.wide = $event"
                                >
                            </select-wide>
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group form-element-text">
                                <textarea  type="text"
                                            :id="'field'+key"
                                            :name="prefix+'['+key+']'+'[value]'"
                                            :value="field.value"
                                            class="form-control js-ckeditor"
                                            v-on:input="changeValue($event.target.value,key)"
                                ></textarea>
                            </div>
                        </div>
                    </div>
                    <div v-else-if="field.type == 'product_text'" class="col-md-12 col-lg-12">
                        <div class="row">
                            <select-wide
                                :name="prefix+'['+key+']'+'[wide]'"
                                :inval="field.wide"
                                v-on:change-wide="field.wide = $event"
                                >
                            </select-wide>
                            <div class="col-md-4">
                                <div class="form-group form-element-text">
                                    <label :for="'field_'+key+'position'" class="control-label">
                                        Позиция карточки
                                    </label>
                                    <select
                                        :id="'field_'+key+'position'"
                                        class="form-control"
                                        :name="prefix+'['+key+']'+'[value][position]'"
                                        :value="field.value.position"
                                        v-on:change="changeFieldSubValue($event.target.value,key,'position')"
                                    >
                                        <option value="left">Слева</option>
                                        <option value="right">Справа</option>
                                    </select>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" :class="field.value.position == 'left' ? 'col-md-push-6' : ''">
                                <div class="form-group form-element-text">
                                    <label :for="'field'+key+'text'">Текст</label>
                                    <textarea type="text"
                                                :id="'field'+key+'text'"
                                                :name="prefix+'['+key+']'+'[value][text]'"
                                                :value="field.value.text"
                                                class="form-control js-ckeditor"
                                                v-on:input="changeFieldSubValue($event.target.value,key,'text')"
                                    ></textarea>
                                </div>
                            </div>
                            <div class="col-md-6" :class="field.value.position == 'left' ? 'col-md-pull-6' : ''">
                                <div class="form-group">
                                    <label :for="'field_'+key+'product'" class="control-label">Продукт</label>
                                    <select
                                        :id="'field'+key+'product'"
                                        :name="prefix+'['+key+']'+'[value][product]'"
                                        v-selecttwo
                                        :value="field.value.product"
                                        class="form-control"
                                        @change="changeFieldSubValue(getMultipleSelectValue($event.target),key,'product')"
                                    >

                                        <option v-for="(product,key) in products" :key="key" :value="key">{{ product }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else-if="field.type == 'two_text'" class="col-md-12 col-lg-12">
                        <div class="row">
                            <select-wide
                                :name="prefix+'['+key+']'+'[wide]'"
                                :inval="field.wide"
                                v-on:change-wide="field.wide = $event"
                                >
                            </select-wide>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-element-text">
                                    <label :for="'field'+key+'left'">Левая колонка</label>
                                    <textarea type="text"
                                                :id="'field'+key+'left'"
                                                :name="prefix+'['+key+']'+'[value][left]'"
                                                :value="field.value.left"
                                                class="form-control js-ckeditor"
                                                v-on:input="changeFieldSubValue($event.target.value,key,'left')"
                                    ></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-element-text">
                                    <label :for="'field'+key+'right'">Правая колонка</label>
                                    <textarea type="text"
                                                :id="'field'+key+'right'"
                                                :name="prefix+'['+key+']'+'[value][right]'"
                                                :value="field.value.right"
                                                class="form-control js-ckeditor"
                                                v-on:input="changeFieldSubValue($event.target.value,key,'right')"
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else-if="field.type == 'product_list'" class="col-md-12 col-lg-12">
                        <div class="row">
                            <select-wide
                                :name="prefix+'['+key+']'+'[wide]'"
                                :inval="field.wide"
                                v-on:change-wide="field.wide = $event"
                                >
                            </select-wide>
                        </div>
                        <div class="form-group">
                            <label :for="'field_'+key" class="control-label">Продукты</label>
                            {{ fields[key]['value'] }}
                            <select
                                :id="'field'+key+'product'"
                                :value="fields[key]['value']"
                                v-selecttwot
                                multiple="multiple"
                                class="form-control"
                                v-model="selected" @change="changeValue(getMultipleSelectValue($event.target),key)"
                            >
                                <option v-for="(product,key) in products" :key="key" :value="key.toString()">{{ product }}</option>
                            </select>
                            <input type="hidden" :name="prefix+'['+key+']'+'[value]'" :value="fields[key]['value']">
                        </div>
                    </div>
                    <input type="hidden" :value="field.type" :name="prefix+'['+key+']'+'[type]'">
                    <input type="hidden" :value="field.title" :name="prefix+'['+key+']'+'[title]'">
                </swap-card>
            </div>
        </swap-group>
        <div style="margin: 15px 0;">
            <div class="col-md-6">
                <label for="add_type">Добавить блок</label>
                <div class="input-group">
                    <select v-model="addType" id="add_type" class="form-control">
                        <option disabled value="">Выберите тип блока для добавления</option>
                        <option value="ckeditor">Текстовый блок</option>
                        <option value="two_text">Две колонки текста</option>
                        <option value="product_text">Карточка товара с текстом</option>
                        <!-- <option value="product_list">Карточки товаров</option> -->
                        <option value="html">Чистый HTML</option>
                        <option value="image">Картинка</option>
                    </select>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-success" @click.prevent="addBlock()">
                            <i class="fa fa-plus"></i> Добавить
                        </button>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</template>

<script>
import { setTimeout } from 'timers';
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
                default: 'Group'
            },
            products: {
                type: Array,
                default: []
            }
        },
        data: () => {
            return {
                addType: 'ckeditor',
                fields: [],
                iteration: 0,
                elementKey: '',
                selected:'',
                count: 0,
            }
        },
        mounted() {
            this.fields = this.fieldsin;
            this.count = this.fields.length;
            console.log('Component mounted.');
        },
        watch: {
            fields: function () {
                this.count = this.fields.length;
                setTimeout(function() {
                    Admin.setEditor();

                },500);
            },
        },
        methods: {
            addBlock: function() {
                let item = {};
                switch(this.addType) {
                    case 'html':
                        item = {
                            type: 'html',
                            value: '',
                            wide: 12,
                            title: 'Чистый HTML'
                        };
                        break;
                    case 'image':
                        item = {
                            type: 'image',
                            image: {
                                path: '',
                                alt: '',
                                show: 'on'
                            },
                            wide: 12,
                            title: 'Картинка'
                        };
                        break;
                    case 'ckeditor':
                        item = {
                            type: 'ckeditor',
                            value: '',
                            wide: 12,
                            title: 'Текстовый блок'
                        };
                        break;
                    case 'narrow_text':
                        item = {
                            type: 'narrow_text',
                            value: '',
                            wide: 12,
                            title: 'Узкий текстовый блок'
                        };
                        break;
                    case 'two_text':
                        item = {
                            type: 'two_text',
                            value: {
                                left:'',
                                right:''
                            },
                            wide: 12,
                            title: 'Две колонки текста',
                        };
                        break;
                    case 'product_text':
                        item = {
                            type: 'product_text',
                            value: {
                                text:'',
                                product:'',
                                position:'left'
                            },
                            wide: 12,
                            title: 'Карточка товара с текстом',
                        };
                        break;
                    case 'product_list':
                        item = {
                            type: 'product_list',
                            value: '',
                            wide: 12,
                            title: 'Карточки товаров',
                        };
                        break;
                }
                this.$set(this.fields, this.fields.length, item);
                console.log(this.fields);
            },
            getMultipleSelectValue(target) {
                return $(target).val();
            },
            changeFieldSubValue: function(value,fieldKey,subKey) {
                this.fields[fieldKey]['value'][subKey] = value;
            },
            changeValue: function(value,fieldKey) {
                this.fields[fieldKey]['value'] = value;
            },
            swapItems: function (firstKey,secondKey) {
                let fields = this.fields;
                let tempItem = fields[firstKey];

                fields[firstKey] = fields[secondKey];
                fields[secondKey] = tempItem;
                this.fields = fields;
                this.count = this.fields.length;
                this.iteration += 1;
                setTimeout(function() {
                    Admin.setEditor();

                },500);

            },
            removeItem: function (itemKey) {
                this.fields.splice(itemKey,1);
            },


        }
    }
</script>
<style>
    .header-btns {
        width: 52px;
        margin-right: 15px;
        text-align: center;
    }
</style>
