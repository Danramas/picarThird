<template>
    <div>
        <el-select v-model="dropDown.markModel" placeholder="Select a mark">
            <el-option
                    v-for="(item, index) in marks"
                    :key="index"
                    :label="item.markName"
                    :value="item.id">
            </el-option>
        </el-select>

        <el-select :disabled="!dropDown.markModel" v-model="dropDown.sampleModel" placeholder="Select a sample">
            <el-option
                    v-for="(item, index) in samples"
                    :key="index"
                    :label="item.sampleName"
                    :value="item.id">
            </el-option>
        </el-select>

        <el-select :disabled="!dropDown.sampleModel"  v-model="dropDown.modificationModel" placeholder="Select a modification">
            <el-option
                    v-for="(item, index) in modifications"
                    :key="index"
                    :label="item.modificationName"
                    :value="item.id">
            </el-option>
        </el-select>
    </div>
</template>

<script>
    import {mapState, mapActions} from 'vuex'

    export default {
        mounted() {
            Promise.all([ this.fetchMarks(), this.fetchSamples(), this.fetchModifications() ])
                .catch(() => this.$notify.error('Could not load data'));
        },

        computed: {
            ...mapState ({
                marks: state => state.marks,
                samples: state => state.samples,
                modifications: state => state.modifications,
                dropDown: state => state.dropDownParams,
                markModel: state => state.dropDownParams.markModel,
                sampleModel: state => state.dropDownParams.sampleModel,
            }),
        },
        methods: {
            ...mapActions([
                'fetchMarks',
                'fetchSamples',
                'fetchModifications'
            ]),
        },
        watch: {
            markModel() {
                this.fetchSamples();
                this.dropDown.sampleModel = null;
            },
            sampleModel() {
                this.fetchModifications();
                this.dropDown.modificationModel = null;
            }
        }
    }
</script>
