<template>
<div class="form-group row d-flex pt-3">
    <div class="col-sm-2">
        <button type="submit" class="btn btn-success">Low Risk</button>
    </div>

    <div class="col-sm-2">
        <button type="submit" class="btn btn-info">Medium Risk</button>
    </div>

    <div class="col-sm-2">
        <button type="submit" class="btn btn-danger">High Risk</button>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {

        },
        created(){
            this.fetchPriorityData();
        },

        methods: {
            fetchPriorityData() {

            }
        }
    }
</script>
