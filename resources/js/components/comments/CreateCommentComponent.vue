<template>
    <div class="modal fade" id="comment-create" tabindex="-1" role="dialog" aria-labelledby="create-modal-title">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="create-modal-title">Add new comment to ticket</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <form id="new-comment-form" method="post" action="">

                    <div class="modal-body">

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="body" class="col-md-8 control-label">Comment Text</label>
                                <div class="col-md-8">
                                    <textarea id="body" v-model="body" rows="10" cols="50"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button @click="postComment" type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

    export default {
        data() {
            return {
                body: '',
            }
        },
        props: ['route'],

        mounted() {
            console.log('Comment Create Component mounted.')
        },

        methods: {
            postComment() {
                window.axios.defaults.headers.common = {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN' : token
                };
                axios.post(this.route,
                    { body: this.body})
                    .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                })
            }
    }
    }
</script>
