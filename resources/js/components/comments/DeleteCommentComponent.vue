<template>
    <div class="modal fade" id="comment-delete" tabindex="-1" role="dialog" aria-labelledby="create-modal-title">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="create-modal-title">Delete current comment on ticket</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <form id="new-comment-form" method="post" action="">

                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button @click="deleteComment" type="submit" class="btn btn-danger">Delete</button>
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
            console.log('Delete Edit Component mounted.')

        },

        methods: {
            deleteComment() {
                window.axios.defaults.headers.common = {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN' : token
                };
          /*      axios.delete(this.route,
                    { body: this.body})
                    .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                }) */
            }
    }
    }
</script>
