import VueRouter from 'vue-router';
import Main from './views/Main';
import Register from './components/Register';
import Login from './components/Login';
import Adverts from  './views/Adverts'
import Search from './views/Search'
import AdvertPage from './views/AdvertPage'
import CreateAdvert from './views/AdvertCreate'
import UserAccount from './views/UserAccount'

let routes = [

    {
        path: '/',
        name: 'Main',
        component: Main
    },

    {
        path: '/search',
        name: 'Search',
        component: Search
    },

    {
        path: '/adverts',
        name: 'Adverts',
        component: Adverts
    },

    {
        path: '/search/:id',
        component: AdvertPage
    },

    {
        path: '/register',
        name: 'Register',
        component: Register
    },

    {
        path: '/createAdvert',
        name: 'CreateAdvert',
        component: CreateAdvert
    },

    {
        path: '/login',
        name: 'Login',
        component: Login
    },

    {
        path: '/user',
        name: 'UserAccount',
        component: UserAccount
    }
];

export default new VueRouter({
    mode: 'history',
    routes,
    linkActiveClass: 'is-active',
});

