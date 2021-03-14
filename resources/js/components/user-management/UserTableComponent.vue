<template>
    <v-app>
            <v-card>
                <v-card-title>
                    Users
                    <v-spacer></v-spacer>
                    <v-text-field
                        v-model="search"
                        append-icon="mdi-magnify"
                        label="Search"
                        single-line
                        hide-details
                    ></v-text-field>
                </v-card-title>
                <v-data-table :headers="headers" :items="users"  :search="search" :items-per-page="15" class="elevation-1"></v-data-table>
               </v-card>
        </v-app>
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
            search: '',
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
