<template>
    <div class="image-wrapper">
        <label class="control-label">{{ label }}</label>
        <upload-image
                :url="url"
                :name="name+'[path]'"
                :value="path ? path : ''"
                v-on:change-image="changePath($event)"
            >
        </upload-image>
        <div v-if="path" class="mt-4">
            <div v-if="isstatus" class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" v-model="show" :name="name+'[show]'" class="custom-control-input" :id="'show_image'+imageNumber">
                    <label class="custom-control-label" :for="'show_image'+imageNumber">Отображать</label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Alt Картинки</label>
                <input type="text" :name="name+'[alt]'" v-model="alt" class="form-control">
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            val: {
                default: {
                    path: '',
                    alt: '',
                    show: true,
                },
                type: Object
            },
            isstatus: {
                default: false,
                type: Boolean
            },
            imageNumber: {
                default: Math.random().toString(36),
            },
            label: {
                default: 'Изображение',
                type: String
            },
            name: {
                default: 'image',
                type: String
            },
            url: {
                default: '/admin/save/fieldimage',
                type: String
            },

        },
        data: () => {
            return {
                path: '',
                alt: '',
                show: true,
            }
        },
        computed: {
            imageField: function () {
                return {
                    path: this.path,
                    alt: this.alt,
                    show: this.show,
                }
            }
        },
        mounted() {
            if (this.val.path) {
                this.path = this.val.path;
            }
            if (this.val.alt !== undefined) {
                this.alt = this.val.alt;
            }
            if (this.val.show !== undefined) {
                this.show = this.val.show;
            }

        },
        updated() {

        },
        watch: {
            val: function () {
                if (this.val.path) {
                    this.path = this.val.path;
                }
                if (this.val.alt !== undefined) {
                    this.alt = this.val.alt;
                }
                if (this.val.show !== undefined) {
                    this.show = this.val.show;
                }

            },
            imageField: function () {
                this.$emit('change-field', this.imageField);
            },
        },
        methods: {
            changePath: function (path) {
                this.path = path;
            },
        }
    }
</script>
<style>
.image-wrapper {
    max-width: 100%;
}
.header-btns {
    width: 65px;
}
.form-element-files__item > a {
    background: #dfdfdf;
}
</style>
