<template>
<div class="form-group row d-flex pt-3">
    <div class="col-sm-2">
        <button type="submit" class="btn btn-danger">Issues Created</button>
    </div>
    <div class="col-sm-2">
                <button type="submit" class="btn btn-info">In Progress</button>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-success">Resolved</button>
            </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
