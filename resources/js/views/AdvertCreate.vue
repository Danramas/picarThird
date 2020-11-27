<template>
    <div>
        <dropdown/>
        <upload/>
        <el-input-number v-model="form.year" :step="1" :min="1900" :max="new Date().getFullYear()"></el-input-number>
        <el-button @click="Create()">Create</el-button>
    </div>
</template>

<script>
    import dropdown from '../components/Drop-down'
    import {eventBus} from '../app'
    import upload from '../components/Upload'
    export default {
        components: {
            dropdown,
            upload,
        },
        data() {
            return {
                fileList:[],

                form:{
                    modification_id: null,
                    user_id: this.$store.state.Auth.user_id,
                    year: null,
                    images: []
                },
            }

        },
        created(){
            eventBus.$on('dropdownParams', data => {
                this.form.modification_id = data.modificationModel;
            });
            eventBus.$on('setLastImage', response => {
                this.form.images.push(response)
            });
            this.form.year = 1990;
        },
        methods: {
            Create() {
                this.errors = {};
                this.$http
                    .post('api/createAdvert', this.form)
                    .then(response => {
                        if (response.data.success) {
                            this.$router.push('/search/' + response.data.advert_id);
                        }
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            },

            checkError(field) {
                return this.errors.hasOwnProperty(field)?this.errors[field]:[];
            },
        },

    }
</script>
