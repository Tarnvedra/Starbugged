<template>
    <div>
        <v-app>
        <v-data-table :headers="headers" :items="users" :items-per-page="5" class="elevation-1"></v-data-table>
        </v-app>
    </div>
</template>

<script>
import vuetify from 'vuetify';
Vue.use(vuetify);

export default {
    props: ['route'],

    mounted() {
        console.log('UserTableComponent mounted.');
    },
    data() {
        return {
            users: [],
            user: {
                id: '',
                name: '',
                email: '',

            },
            headers: [
                {text: 'ID', value: 'id'},
                {text: 'Name', value: 'name'},
                {text: 'Email', value: 'email'}
            ]
        }

    },
    created() {
        this.fetchUsersData();
    },
    methods: {
        fetchUsersData() {
            axios.get(this.route).then((response) => {
                this.users = response.data.users
            }).catch(error => console.log(error));
        }
    }
};
</script>
