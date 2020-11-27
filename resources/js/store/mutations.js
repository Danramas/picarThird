export default {
    setAdverts(state, adverts) {
        state.adverts = adverts
    },
    setMarks(state, marks) {
        state.marks = marks
    },
    setSamples(state, samples) {
        state.samples = samples
    },
    setModifications(state, modifications) {
        state.modifications = modifications
    },
    setAdvert(state, advert) {
        state.advert = advert
    },
    setUsers(state, users) {
        state.users = users
    },
    setComments(state, comments) {
        state.comments = comments
    },
    setSubscribe(state, status) {
      state.subscribe = status;
    },
    Login(state){
        state.Auth.user_id = localStorage.getItem('user_id');
        state.Auth.api_token = localStorage.getItem('api_token');
        state.Auth.name = localStorage.getItem('name');
        state.Auth.isAdmin = localStorage.getItem('isAdmin');
        state.Auth.login = state.Auth.user_id !== null && state.Auth.api_token !== null &&  state.Auth.name !== null;
    }
}
