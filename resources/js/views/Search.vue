<template>
    <div>
        <dropdown
        :mark="search.markModel"
        />
        <hr>
        <el-checkbox-button v-model="search.withImagesOnly">Images</el-checkbox-button>
        <el-input-number v-model="search.minYear" :step="1" :min="1900" :max="new Date().getFullYear()"></el-input-number>
        <el-input-number v-model="search.maxYear" :step="1" :min="1900" :max="new Date().getFullYear()"></el-input-number>
        <el-button @click="resetData()">Reset</el-button>
        <hr>
        <adverts/>
    </div>
</template>

<script>
    import {mapState, mapActions} from 'vuex'
    import Dropdown from '../components/Drop-down'
    import Adverts from '../views/Adverts'

    export default {
        components: {Dropdown, Adverts},
        computed: {
            ...mapState({
                search: state => state.searchParams,
                dropDown: state => state.dropDownParams,
            })
        },
        methods: {
            ...mapActions([
                'fetchAdverts'
            ]),
            resetData(){
                this.dropDown.markModel = null;
                this.dropDown.sampleModel = null;
                this.dropDown.modificationModel = null;
                this.search.minYear = 1900;
                this.search.maxYear = new Date().getFullYear();
                this.search.withImagesOnly = false;
            },
        },
        watch: {
            search: {
                handler() {
                    this.fetchAdverts();
                },
                deep: true,
            },
            dropDown: {
                handler() {
                    this.fetchAdverts();
                },
                deep: true,
            }
        }
    }
</script>
