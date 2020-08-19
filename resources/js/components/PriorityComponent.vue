<template>
<div>
    <table class="table table-bordered table-striped pt-1">
        <tr>
            <td>Issue ID</td>
            <td>Project ID</td>
            <td>OS</td>
            <td>Risk</td>
            <td>Issue</td>
            <td>Description</td>
            <td>Assignment</td>
            <td>Status</td>
            <td>Created</td>
            <td>Last Updated</td>
        </tr>

        <tr v-for="issue in issues" v-bind:key="issue.id">
            <td>{{ issue.id }}</td>
            <td>{{ issue.project_id }}</td>
            <td>{{ issue.os  }}</td>
            <td>{{ issue.risk }}</td>
            <td>{{ issue.issue}}</td>
            <td>{{ issue.description}}</td>
            <td>{{ issue.assignment }}</td>
            <td>{{ issue.status }}</td>
            <td>{{ issue.created_at}}</td>
            <td>{{ issue.updated_at }}</td>
        </tr>


</table>
<div class="form-group row d-flex pt-3 pb-2">
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
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Priority mounted.');
        },
        data() {
            return {
                issues: [],
                issue: {
                  id: '',
                  project_id: '',
                  os: '',
                  risk: '',
                  issue: '',
                  description: '',
                  assignment: '',
                  status: '',
                  created_at: '',
                  updated_at: '',

                },
                pagination: {},
            }

        },
        created(){
            this.fetchData();
        },

        methods: {
            fetchData() {
                fetch('api/priorities')
                .then(result => result.json()
                .then(result => {
                    this.issues = result.data;
                }))
            }
        }
    }
</script>
