<template>
    <div :key="iteration">
        <h4>{{ title }}</h4>
        <div class="row">
            <template v-for="(field,key) in fields">
                <div :key="key" class="col-md-3">
                    <div class="card card-info">
                        <div class="card-header">
                            <div class="float-left header-btns">
                                <button v-if="key > 0" @click="swapItems(key,key-1)"  type="button" class="btn btn-tool"><i class="fa fa-chevron-left"></i></button>
                                <button v-if="key < (fields.length - 1)" @click="swapItems(key,key+1)" type="button" class="btn btn-tool"><i class="fa fa-chevron-right"></i></button>
                            </div>
                            <h3 class="card-title cursor-pointer" data-card-widget="collapse">#{{ key+1 }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" @click="removeItem(key)">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <image-component
                                :url="url"
                                :name="prefix+'['+key+']'"
                                :val="field ? field : {}"
                                :imageNumber="key"
                                :isstatus="false"
                                v-on:change-field="fields[key] = $event"
                            >
                            </image-component>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <div style="margin: 15px 0;">
            <div class="d-flex align-items-center">
                <div id="upload-zone" class="upload-zone text-center flex-grow-1 bg-light">
                    <i class="fa fa-plus"></i>
                    Перетяните или кликните здесь
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</template>

<script>
//@click.prevent="addVariation()"
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
            url: {
                default: '/admin/save/fieldimage',
                type: String
            },
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
            this.initUpload ();
        },
        watch: {
            fields: function () {

            },
        },
        methods: {
            initUpload () {
                let self = this,
                    container = $(self.$el.parentNode);
                let area = $('#upload-zone');
                    area.dropzone({
                        url: this.url,
                        method: 'POST',
                        uploadMultiple: false,
                        maxFilesize: Admin.Config.get('max_file_size'),
                        dictFileTooBig: trans('lang.ckeditor.upload.error.filesize_limit_m', {size: Admin.Config.get('max_file_size')}),
                        dictInvalidFileType: trans('lang.ckeditor.upload.error.wrong_extension', {file: self.name}),
                        dictResponseError: trans('lang.ckeditor.upload.error.common'),
                        previewsContainer: false,
                        acceptedFiles: 'image/*',
                        dictDefaultMessage: '',
                        sending () {
                            self.uploading = true;
                            self.closeAlert()
                        },
                        success (file, response) {
                            self.val = response.value;
                            let title = '';
                            if ($('[name="name"]').length) {
                                title = $('[name="name"]').val();
                                if (self.fields.length) {
                                    title += ' - ' + self.fields.length;
                                }
                            }

                            let element = {
                                path: response.value,
                                alt: title,
                                show: true,
                            }
                            self.$set(self.fields, self.fields.length, element);
                        },
                        error (file, response) {
                            if(_.isArray(response.errors)) {
                                if (response.errors[0]) {
                                    Admin.Messages.error(response.errors[0])
                                }
                                self.errors = response.errors;
                            }
                        },
                        complete() {
                            self.uploading = false;
                        }
                    });
            },
            addVariation: function() {
                let element = {
                        path: '',
                        alt: '',
                        show: true,
                 }
                this.$set(this.fields, this.fields.length, element);
            },
            swapItems: function (firstKey,secondKey) {
                let tempItem = this.fields[firstKey];
                this.$set(this.fields, firstKey, this.fields[secondKey]);
                this.$set(this.fields, secondKey, tempItem );
            },
            removeItem: function (itemKey) {
                this.fields.splice(itemKey,1);
            },
            closeAlert () {
                this.errors = [];
            }
        }
    }
</script>
<style>
    .header-btns {
        width: 65px;
        margin-right: 15px;
    }
    .upload-zone {
        border: 1px dashed #ccc;
        text-align: center;
        line-height: 80px;
        cursor: pointer;
    }
    .upload-zone:hover {
        background: #efefef !important;
    }
</style>
