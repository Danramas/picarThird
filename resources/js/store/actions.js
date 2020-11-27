import axios from 'axios';

export default {
    fetchUsers({commit}) {
        return new Promise((resolve, reject) => {
            axios.get('api/users')
                .then(response => {
                    commit('setUsers', response.data);
                    resolve(response.data);
                })
                .catch(response => reject(response.data.message));
        });
    },

    fetchMarks({commit}) {
        return axios.get('/api/marks')
            .then(response => commit('setMarks', response.data));
    },

    fetchSamples({commit, state}) {
        const params = {
            mark_id: state.dropDownParams.markModel
        };

        return axios.get('/api/samples', {
            params
        })
            .then(response => commit('setSamples', response.data));
    },

    fetchModifications({commit, state}) {
        const params = {
            sample_id: state.dropDownParams.sampleModel
        };

        return axios.get('/api/modifications', {
            params
        })
            .then(response => commit('setModifications', response.data));
    },

    fetchAdverts({commit, state}) {
        const params = {
          mark_id: state.dropDownParams.markModel,
          sample_id: state.dropDownParams.sampleModel,
          modification_id: state.dropDownParams.modificationModel,
          minYear: state.searchParams.minYear,
          maxYear: state.searchParams.maxYear,
          withImagesOnly: state.searchParams.withImagesOnly,
        };

        return axios.get('/api/search', {
            params
        })
            .then(response => commit('setAdverts', response.data));
    },

    fetchAdvert({commit, state}) {
        const params = {
            advert_id: state.advert.id
        };

        return axios.get('/api/search/advert', {
            params
        })
            .then(response => commit('setAdvert', response.data));
    },

    fetchComments({commit, state}) {
        const params = {
            advert_id: state.advert.id,
        };

        axios
            .get('/api/comments', {
                params
            })
            .then(response => commit('setComments', response.data));
    },

    toComment({commit, state}, text) {
        const data = {
          text: text,
          user_id: state.Auth.user_id,
          advert_id: state.advert.id,
        };

        return axios
            .post('/api/comment', data);
    },

    checkSubscribeStatus({state}) {
        const params = {
          advert_id: state.advert.id,
          user_id: state.Auth.user_id,
        };

        return axios
            .get('/api/checkSubscribe', {
                params
            });
    },

    toSubscribe({commit, state}) {
        const params = {
            advert_id: state.advert.id,
            user_id: state.Auth.user_id,
        };

        return axios
            .get('/api/subscribe', {
                params
            })
            .then(response => commit('setSubscribe', response.data));
    },
}
