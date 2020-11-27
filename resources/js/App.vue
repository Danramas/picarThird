<template xmlns="">
    <div id="app">
        <v-app>
            <v-layout>
                <v-flex>
                    <v-toolbar>
                        <v-toolbar-title v-if="$store.state.Auth.login">Hello, {{$store.state.Auth.name}}</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-btn
                            text
                            color="white"
                            v-for="item in navigate"
                            :key="item.path"
                            @click="onClick(item)"
                            v-if="item.auth === 'both' || item.auth === auth.login">
                            {{item.title}}
                        </v-btn>
                        <v-spacer></v-spacer>
                        <v-btn
                            text
                            color="white"
                            v-for="item in authNavigate"
                            :key="item.path"
                            @click="onClick(item)"
                            v-if="item.auth === auth.login">
                            {{item.title}}
                        </v-btn>
                        <v-spacer></v-spacer>
                    </v-toolbar>
                </v-flex>
            </v-layout>
        <v-content>
            <v-container>
                <router-view></router-view>
            </v-container>
        </v-content>
    </v-app>
    </div>
</template>

<script>
    import Auth from './helpers/Auth';
    import {mapState} from 'vuex';
    export default {
        created(){
            Auth.init();
        },

        computed:{
            ...mapState(['navigate', 'authNavigate', 'profileNavigate', 'adminNavigate']),
            auth() {
                return this.$store.state.Auth;
            },
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

<style>
    body {
        background: url('../assets/cars-for-sale.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .v-btn {
        background-color: white;
        color: black;
        border: 1px solid #000000;
    }
    .v-btn:hover {
        background-color: #ff5858;
        color: white;
    }
</style>

