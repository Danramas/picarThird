export default {
    navigate: [
        {path: "/", title: "Home", auth: 'both'},
        {path: "/drop", title: "Drop", auth: true}
    ],
    authNavigate: [
        {path: "/register", title: "Register", isAdmin: 1},
        {path: "/login", title: "Login", auth: false},
    ],
    Auth:{
        login: false,
        user_id: null,
        api_token: null,
        name: null,
        isAdmin: null,
    }
}
