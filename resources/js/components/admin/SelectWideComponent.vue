<template>
    <div class="col-md-3">
        <div class="form-group form-element-text">
            <label class="control-label">
                Ширина контейнера
            </label>
            <select class="form-control" :name="name" v-model="val">
                <option v-for="num in 12" :key="num" :value="num">{{ num }}/12</option>
            </select>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            inval: {
                default: 12,
                type: Number
            },
            name: {
                default: 'wide',
                type: String
            },

        },
        data: () => {
            return {
                val: 12,
            }
        },
        mounted() {
            this.val = this.inval;
        },
        watch: {
            val: function () {
                this.$emit('change-wide', this.val);
            },
        },
    }
</script>
