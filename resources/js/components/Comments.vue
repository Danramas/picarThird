<template>
    <div>
        <el-card class="info-card">
            <span slot="header" class="card-title">Comments</span>
            <span v-for="comment in comments" class="text">
                <p>Created by: {{comment.user.name}}</p>
                <p>Created at: {{comment.created_at}}</p>
                <p>Text: {{comment.text}}</p>
            </span>
            <el-alert v-if="!errors" @close="errors = []"
                      :title="alert.title"
                      :type="alert.type"
                      :description="alert.description"
                      show-icon>
            </el-alert>
            <div v-if="$store.state.Auth.login">
                <el-input
                    type="textarea"
                    autosize
                    placeholder="Please input your comment"
                    v-model="text">
                </el-input>
                <el-button @click="addComment(text)">Submit</el-button>
            </div>
        </el-card>
    </div>
</template>

<script>
    import {mapState, mapActions} from 'vuex'

    export default {
        data() {
            return {
                alert: {
                    title: 'Warning',
                    type: 'warning',
                    description: "Comment shouldn't be empty. Please write your comment.",
                },
                text: '',
                errors: []
            }
        },

        computed: {
            ...mapState({
                comments: state => state.comments
            })
        },

        methods: {
            ...mapActions([
                'fetchComments',
                'toComment'
            ]),

            addComment(newVal) {
                this.toComment(newVal);
                this.fetchComments();
                this.text = '';
            },
        },

        mounted() {
            this.fetchComments();
        },
    }
</script>
