<template>
    <div>
        <div>
            <el-carousel :interval="3000" type="card">
                <el-carousel-item>
                    <el-image :src='/files/+advert.image1'></el-image>
                </el-carousel-item>
                <el-carousel-item>
                    <el-image :src='/files/+advert.image2'></el-image>
                </el-carousel-item>
                <el-carousel-item>
                    <el-image :src='/files/+advert.image3'></el-image>
                </el-carousel-item>
                <el-carousel-item>
                    <el-image :src='/files/+advert.image4'></el-image>
                </el-carousel-item>
                <el-carousel-item>
                    <el-image :src='/files/+advert.image5'></el-image>
                </el-carousel-item>
            </el-carousel>

            <el-card class="info-card">
                <div slot="header">
                    <span class="card-title">
                        Information
                    </span>
                </div>
                <span class="text">
                    <p>ID: {{ advert.id }}</p>
                    <p>Mark: {{ advert.modification.sample.mark.markName }}</p>
                    <p>Model: {{ advert.modification.sample.sampleName }}</p>
                    <p>Modification: {{ advert.modification.modificationName }}</p>
                    <p>Year: {{advert.year}}</p>
                    <p>Created at: {{ advert.created_at }}</p>
                    <p>Created by: {{ advert.user.name }}</p>
                </span>
            </el-card>
        </div>
        <comments/>
        <div class="subscribe" v-if="auth.login">
            <el-checkbox-button
                @change="checkSubscribe()">
                {{ subscribe ? 'subscribed': 'subscribe' }}
            </el-checkbox-button>
        </div>
    </div>
</template>

<script>
    import Comments from "../components/Comments";
    import {mapState, mapActions} from 'vuex';

    export default {
        components: {Comments},
        computed: {
            ...mapState({
                advert: state => state.advert,
                auth: state => state.Auth,
                subscribe: state => state.subscribe,
            }),
        },
        created() {
            this.advert.id = this.$route.params.id;
            this.fetchAdvert();
        },
        mounted() {
            if (this.auth.login) {
                this.checkSubscribeStatus();
            }
        },
        methods: {
            ...mapActions([
               'fetchAdvert',
               'checkSubscribeStatus',
               'toSubscribe'
            ]),

            checkSubscribe() {
                this.toSubscribe();
                this.checkSubscribeStatus();
            }
        },
    }
</script>

<style>
    .el-carousel {
        width: 1000px;
        height: 400px;
    }

    .el-carousel__arrow {
        color: black;
    }

    .el-carousel__item:nth-child(2n) {
        background-color: #032535;
    }

    .el-carousel__item:nth-child(2n+1) {
        background-color: #032535;
    }

    .el-image {
        width: 98%;
        height: 97%;
        margin: 1%;
    }

    .info-card {
        text-align: right;
        width: 1000px;
        background: #032535;
        border: 2px solid #000000;
    }

    .card-title {
        color: #ff5858;
        font-size: 24px;
        text-transform: uppercase;
        font-family: Arial;
    }

    .text {
        text-align: left;
        font-family: Arial;
        text-indent: 5%;
        color: #ff5858;
        font-size: 18px;
        line-height: 2px;
        font-style: oblique;
        margin: 10px;
    }

    .el-card__body {
        padding: 0px;
    }
</style>
