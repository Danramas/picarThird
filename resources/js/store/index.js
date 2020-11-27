import Vue from 'vue'
import Vuex from 'vuex'
import mutations from './mutations';
import actions from './actions';

Vue.use(Vuex);

const store = new Vuex.Store({

    state: {
        navigate: [
            {path: "/", title: "Home", auth: 'both'},
            {path: "/search", title: "Search", auth: 'both'},
            {path: "/user", title: "Account", auth: true}
        ],

        authNavigate: [
            {path: "/login", title: "Login", auth: false},
        ],

        profileNavigate: [
            {path: "/logout", title: "Logout", auth: true},
            {path: "/createAdvert", title: "Create advert", auth: true}
        ],

        adminNavigate: [
            {path: "/register", title: "Register", auth: true},
        ],

        Auth: {
            login: false,
            user_id: null,
            api_token: null,
            name: null,
            isAdmin: null,
        },

        active: null,
        marks: [],
        samples: [],
        modifications: [],
        adverts: [],
        advert: {
            id: null,
        },
        users: [],
        comments: [],
        subscribe: false,
        dropDownParams: {
            markModel: null,
            sampleModel: null,
            modificationModel: null,
        },
        searchParams: {
            minYear: 1900,
            maxYear: new Date().getFullYear(),
            withImagesOnly: false,
        }
    },
    actions,
    mutations,
    getters: {}
});

export default store



