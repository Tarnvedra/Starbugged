<template>
<div>
    <nav class="pt-2 pb-2">
    <ul class="pagination">
     <li v-bind:class="[{disabled: !pagination.previous_page_url}]" class="page-item"><a class="btn btn-success" href="#" @click="fetchData(pagination.previous_page_url)">Previous</a></li>
      <li class="page-item diabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page}} of {{ pagination.last_page}}</a></li>
       <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="btn btn-info" href="#" @click="fetchData(pagination.next_page_url)">Next</a></li>

    </ul>
     <button @click="getLow()" class="btn btn-success">Low Risk</button>
     <button @click="getMed()" class="btn btn-info">Medium Risk</button>
     <button @click="getHigh()" class="btn btn-danger">High Risk</button>
      <a href="/home" class="btn btn-info">Back</a>
    </nav>

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
            <td>Watch Issue</td>
        </tr>

        <tr v-for="issue in issues" v-bind:key="issue.id">
            <td><a :href="'/issue/' + issue.id">{{ issue.id}}</a></td>
            <td>{{ issue.project_id }}</td>
            <td>{{ issue.os  }}</td>
            <td>{{ issue.risk }}</td>
            <td>{{ issue.issue}}</td>
            <td>{{ issue.description}}</td>
            <td>{{ issue.assignment }}</td>
            <td>{{ issue.status }}</td>
            <td>{{ issue.created_at}}</td>
            <td>{{ issue.updated_at }}</td>
            <td>
                  <button class="btn btn-primary" @click="watchIssue(issue.id)">Watch</button>
                    </td>
        </tr>


</table>

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
                    fetchData(page_url) {
                    let vm = this;
                    page_url = page_url || 'api/priorities';
                    fetch(page_url).then(result => result.json())
                    .then(result => {
                                     this.issues = result.data;
                                     vm.makePagination(result.meta, result.links);
                                    })
                .catch(error => console.log(error));
            },
        makePagination(meta , links) {
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                previous_page_url: links.prev
            }
            this.pagination = pagination;
        },
        getLow(page_url)
        {
                    let vm = this;
                    page_url = 'api/priorities/low';
                    fetch(page_url).then(result => result.json())
                    .then(result => {
                                     this.issues = result.data;
                                     vm.makePagination(result.meta, result.links);
                                    })
                .catch(error => console.log(error));
                     },
         getMed(page_url)
        {
                    let vm = this;
                    page_url = 'api/priorities/medium';
                    fetch(page_url).then(result => result.json())
                    .then(result => {
                                     this.issues = result.data;
                                     vm.makePagination(result.meta, result.links);
                                    })
                .catch(error => console.log(error));
                     },
         getHigh(page_url)
        {
                    let vm = this;
                    page_url = 'api/priorities/high';
                    fetch(page_url).then(result => result.json())
                    .then(result => {
                                     this.issues = result.data;
                                     vm.makePagination(result.meta, result.links);
                                    })
                .catch(error => console.log(error));
                     },

       watchIssue(id) {

            axios.post('api/watch/' + id).then(response => {
                console.log(response.data);
            })

        }
    }
    }
</script>
