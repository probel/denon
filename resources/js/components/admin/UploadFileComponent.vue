<template>
    <div>
        <div class="form-element-files clearfix " v-if="has_value" v-show="has_value" style="display:none;">
            <div class="form-element-files__item">
                <div class="form-element-files__file">
                    <i class="fa-fw fas fa-file-alt"></i>
                </div>
                <div class="form-element-files__info">
                    <a :href="file" class="btn btn-default btn-xs pull-right" download title="Загрузить" target="_blank">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </a>

                    <button type="button" v-if="has_value" class="btn btn-danger btn-xs"
                            @click.prevent="remove()">
                        <i class="fas fa-times"></i> Удалить
                    </button>
                </div>
            </div>
        </div>

        <div v-if="!readonly">
            <div class="btn btn-primary upload-button btn-sm">
                <i :class="uploadClass"></i> Загрузить
            </div>
        </div>

        <input :name="name" type="hidden" :value="val">
    </div>
</template>
<script>
export default {
    props: {
        url: {
            default: '/admin/save/fieldfile',
            type: String
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
            this.$emit('change-file', this.val);
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
                previewsContainer: false,
                dictDefaultMessage: '',
                maxFilesize: Admin.Config.get('max_file_size'),
                dictFileTooBig: trans('lang.ckeditor.upload.error.filesize_limit_m', {size: Admin.Config.get('max_file_size')}),
                dictResponseError: trans('lang.ckeditor.upload.error.common'),
                sending () {
                    self.uploading = true;
                    self.closeAlert()
                },
                success (file, response) {
                    self.val = response.value;
                },
                error (file, response) {
                    Admin.Messages.error(response)
                    if(_.isArray(response.errors)) {
                        self.errors = response.errors;
                    }
                },
                complete(){
                    self.uploading = false;
                }
            });
        },
        remove () {
            var self = this;

            Admin.Messages.confirm(trans('lang.message.are_you_sure')).then(() => {
                self.val = '';
            });
        },
        closeAlert () {
            this.errors = [];
        }
    },
    computed: {
        uploadClass() {
            if (!this.uploading) {
                return 'fas fa-file-upload';
            }
            return 'fas fa-spinner fa-spin'
        },
        has_value () {
            return this.val.length > 0
        },
        file () {
            return ((this.val.indexOf('http') === 0) ? this.val : Admin.Url.upload(this.val))
        }
    }
}
</script>
