<template>
<div>
 <nav class="pt-2 pb-2">
    <ul class="pagination">
     <li v-bind:class="[{disabled: !pagination.previous_page_url}]" class="page-item"><a class="btn btn-success" href="#" @click="fetchData(pagination.previous_page_url)">Previous</a></li>
      <li class="page-item diabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page}} of {{ pagination.last_page}}</a></li>
       <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="btn btn-info" href="#" @click="fetchData(pagination.next_page_url)">Next</a></li>

    </ul>

     <button @click="getCreated()" class="btn btn-primary">Created</button>
     <button @click="getProgress()" class="btn btn-warning">In Progress</button>
     <button @click="getResolved()" class="btn btn-success">Resolved</button>
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
            console.log('Status mounted.');
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
                    page_url = page_url || 'api/status';
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
        getCreated(page_url)
        {
                    let vm = this;
                    page_url = 'api/status/created';
                    fetch(page_url).then(result => result.json())
                    .then(result => {
                                     this.issues = result.data;
                                     vm.makePagination(result.meta, result.links);
                                    })
                .catch(error => console.log(error));
                     },
         getProgress(page_url)
        {
                    let vm = this;
                    page_url = 'api/status/progress';
                    fetch(page_url).then(result => result.json())
                    .then(result => {
                                     this.issues = result.data;
                                     vm.makePagination(result.meta, result.links);
                                    })
                .catch(error => console.log(error));
                     },
         getResolved(page_url)
        {
                    let vm = this;
                    page_url = 'api/status/resolved';
                    fetch(page_url).then(result => result.json())
                    .then(result => {
                                     this.issues = result.data;
                                     vm.makePagination(result.meta, result.links);
                                    })
                .catch(error => console.log(error));
                     },

       watchIssue(id) {
            //alert('watch button clicked');
            axios.post('/watch/' + id).then(response => {
                console.log(response.data);
            })

        }
    }
    }
</script>
