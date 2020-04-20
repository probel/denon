<template>
    <div>
        <div v-if="errors.length" class="alert alert-warning" v-show="errors.length" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="closeAlert()">
                <span aria-hidden="true">&times;</span>
            </button>
            <p v-for="error in errors" :key="error" v-show="errors">
                <i class="fas fa-image" aria-hidden="true"></i> @{{ error }}
            </p>
        </div>
        <div class="form-element-files clearfix" v-if="has_value" v-show="has_value" style="display:none;">
            <div class="form-element-files__item">
                <a :href="createdimage" class="form-element-files__image" data-toggle="lightbox">
                    <img :src="createdimage"/>
                </a>
                <div class="form-element-files__info">
                    <a :href="createdimage" class="btn btn-default btn-sm pull-right" download target="_blank" title="Скачать">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </a>
                    <button type="button" v-if="!readonly" @click.prevent="insert(val)" class="btn btn-default btn-sm pull-right mr-1" title="Вставить ссылку">
                        <i class="fas fa-link"></i>
                    </button>

                    <button type="button" v-if="has_value && !readonly" class="btn btn-danger btn-xs" @click.prevent="remove()" title="Удалить изображение">
                        <i class="fas fa-times"></i> Удалить изображение
                    </button>
                </div>
            </div>
        </div>

        <div v-if="!readonly">
            <div class="btn btn-primary upload-button btn-sm">
                <i :class="uploadClass"></i> Выбор изображения
            </div>
            <button type="button" @click.prevent="insert($event.target.value)" class="btn btn-default btn-sm" title="Вставить ссылку">
                <i class="fas fa-link"></i>
            </button>
        </div>
        <input :name="name" type="hidden" :value="val">
    </div>
</template>
<script>
export default {
    props: {
        url: {
            required: true
        },
        value: {
            default: ''
        },
        readonly: {
            type: Boolean,
            default: false
        },
        name: {
            type: String,
            required: true
        }
    },
    data () {
        return {
            errors: [],
            uploading: false,
            val: '',
        }
    },
    mounted () {
        this.val = this.value;
        this.initUpload()
    },
    watch: {
        val: function () {
            this.$emit('change-image', this.val);
        },
        value: function () {
            this.val = this.value;
        },
    },
    methods: {
        initUpload () {
            let self = this,
                container = $(self.$el.parentNode),
                button = container.find('.upload-button');
            button.dropzone({
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
                },
                error (file, response) {
                    if(_.isArray(response.errors)) {
                        if (response.errors[0]) {
                            Admin.Messages.error(response.errors[0])
                        }
                        self.errors = response.errors;
                    }
                },
                complete(){
                    self.uploading = false;
                }
            });
        },
        image (uri) {
            return ((uri.indexOf('http') === 0) ? uri : Admin.Url.upload(uri));
        },
        remove () {
            let self = this;
            Admin.Messages.confirm(trans('lang.message.are_you_sure')).then((result) => {
                if(result.value)
                    self.val = '';
                else
                    return false;
            });
        },
        insert (image) {
            let self = this;
            let url = null;
            let link = null;
            if (typeof(image) !== 'undefined') {
              url = self.val;
              link = this.image(url);
            }

            Admin.Messages.prompt(trans('lang.file.insert_link'), null, null, url, link).then(result => {
                if(result.value) {
                    self.val = result.value;
                } else {
                    return false;
                }
            });
        },
        closeAlert () {
            this.errors = [];
        }
    },
    computed: {
        uploadClass() {
            if (!this.uploading) {
                return 'fas fa-image';
            }
            return 'fas fa-spinner fa-spin'
        },
        has_value () {
            return this.val.length > 0
        },
        createdimage () {
            return ((this.val.indexOf('http') === 0) ? this.val : Admin.Url.upload(this.val))
        },
    }
}
</script>
