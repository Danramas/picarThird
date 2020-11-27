<template>
    <div>
        <v-app>
            <v-layout>
                <v-flex>
                    <v-toolbar>
                        <v-spacer></v-spacer>
                        <v-btn
                            v-for="item in profileNavigate"
                            :key="item.path"
                            v-if="item.auth === auth.login"
                            @click="onClick(item)">
                            {{item.title}}
                        </v-btn>
                        <v-btn
                            v-for="item in adminNavigate"
                            :key="item.path"
                            v-if="item.auth === auth.login && auth.isAdmin === '1'"
                            @click="onClick(item)">
                            {{item.title}}
                        </v-btn>
                    </v-toolbar>
                </v-flex>
            </v-layout>
            <v-content>
                <v-container>
                    <router-view></router-view>
                </v-container>
            </v-content>
        </v-app>
        <el-card v-for="item in user" class="info-card" :key="item.id">
            <div slot="header">
                <span class="card-title">USER INFO</span>
            </div>
            <span class="text">
                <p>Name: {{item.name}}</p>
                <p>Registered: {{item.created_at}}</p>
                <p>E-mail: {{item.email}}</p>
            </span>
        </el-card>
        <el-card class="info-card">
            <div slot="header">
                <h1 class="card-title">Your adverts</h1>
            </div>
            <adverts
                :user_id="$store.state.Auth.user_id"
            />
        </el-card>
    </div>
</template>

<script>
    import Auth from '../helpers/Auth';
    import {mapState} from 'vuex';
    import adverts from './Adverts'
    export default {
        components: {adverts},
        computed:{
            ...mapState(['navigate', 'authNavigate', 'profileNavigate', 'adminNavigate']),
            auth() {
                return this.$store.state.Auth;
            },
            user() {
                return this.$store.getters.selectedUser(this.$store.state.Auth.user_id)
            },
        },

        mounted() {
            this.$http
                .get('api/users')
                .then(response => {
                    this.$store.dispatch('setUsers', response.data);
                })
        },

        methods:{
            onClick(item){
                if(item.path !== '/logout'){
                    this.$router.push(item.path);

                    return true;
                }
                this.$http.defaults.headers.common['Authorization'] = "Bearer " + this.auth.api_token;
                this.$http.post("/api/logout")
                    .then(response=> {
                        if(response.data.success){
                            Auth.logout();
                            Auth.init();
                            this.$router.push("/")
                        }
                    });
            }
        },
    }
</script>
