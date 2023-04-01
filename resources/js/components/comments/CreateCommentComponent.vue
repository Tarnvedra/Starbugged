<template>
    <div class="modal fade" id="comment-create" tabindex="-1" role="dialog" aria-labelledby="create-modal-title">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="create-modal-title" :issue="{ issue }">Add new comment to ticket: {issue}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <form id="new-comment-form" method="post" action="">

                    <div class="modal-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="modal-body" class="col-md-8 control-label">Comment Text</label>
                                <div class="col-md-8">
                                    <textarea id="modal-body" rows="10" cols="50"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="hidden" name="_token" :value="csrf">
                        <button @click="postComment" type="submit" class="btn btn-primary">Create</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        props: ['route','issue'],

        mounted() {
            console.log('Comment Create Component mounted.')
            console.log(this.route);
            console.log(this.issue);
        },

        computed: {
            csrf() {
                return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            },
        },

        methods: {
            postComment() {
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
