<template>
    <div>
        <el-row v-for="item in adverts" :key="item.id">
            <el-card :body-style="{ padding: '0px' }" class="el-card-result">
                <el-image :src="'/files/'+item.image1" class="result-image"></el-image>
                <span>
                    <router-link :to="{path: 'search/'+item.id}">
                            {{item.modification.sample.mark.markName}}
                            {{item.modification.sample.sampleName}}
                            {{item.modification.modificationName}}
                            {{item.year}}
                            {{ checkSubscribeStatus() ? 'subscribed' : 'subscribe' }}
                    </router-link>
                </span>
            </el-card>
        </el-row>
    </div>
</template>

<script>
    import {mapState, mapActions} from 'vuex';

    export default {
        mounted() {
            this.fetchAdverts();
        },
        computed: {
            ...mapState({
                adverts: state => state.adverts,
            }),
        },
        methods: {
            ...mapActions([
                'fetchAdverts',
                'checkSubscribeStatus'
            ]),
        },
    }
</script>

<style>
    .el-card-result {
        width: 200px;
        height: 200px;
        background: silver;
        border: 1px solid #000000;
    }
</style>
