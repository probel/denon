<template>
    <div>
        <div v-if="errors.length" class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="closeAlert()">
                <span aria-hidden="true">&times;</span>
            </button>
            <p v-for="(error,num) in errors" :key="num"><i class="fa fa-hand-o-right" aria-hidden="true"></i> @{{ error }}</p>
        </div>
        <div class="form-element-files clearfix" v-if="has_value">
            <div class="form-element-files__item">
                <a :href="image" class="form-element-files__image" data-toggle="lightbox">
                    <img :src="image" />
                </a>
                <div class="form-element-files__info">
                    <a :href="image" class="btn btn-default btn-xs pull-right">
                        <i class="fa fa-cloud-download"></i>
                    </a>

                    <button type="button" v-if="has_value && !readonly" class="btn btn-danger btn-xs" @click.prevent="remove()">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
        </div>

        <div v-if="!readonly">
            <div class="btn btn-primary upload-button">
                <i class="fa fa-upload"></i> Выбор изображения
            </div>

        </div>

        <input :name="name" type="hidden" :value="val" v-on:input="changeValue($event.target.value,key)">
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
                        self.errors = response.errors;
                    }
                },
                complete(){
                    self.uploading = false;
                }
            });
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
        closeAlert () {
            this.errors = [];
        }
    },
    computed: {
        uploadClass() {
            if (!this.uploading) {
                return 'fa fa-upload';
            }
            return 'fa fa-spinner fa-spin'
        },
        has_value () {
            return this.val.length > 0
        },
        image () {
            return ((this.val.indexOf('http') === 0) ? this.val : Admin.Url.upload(this.val))
        },
    }
}
</script>
