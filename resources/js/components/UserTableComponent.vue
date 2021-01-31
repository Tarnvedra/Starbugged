<template>
    <div>
        <v-app>
        <v-data-table :headers="headers" :items="posts" :items-per-page="5" class="elevation-1"></v-data-table>
        </v-app>
    </div>
</template>

<script>
import vuetify from 'vuetify';
Vue.use(vuetify);

export default {
    data: () => ({
        posts: [
            {
                userId: 1,
                id: 1,
                title:
                    "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
            },
            {
                userId: 1,
                id: 2,
                title: "qui est esse",
            },
            {
                userId: 1,
                id: 3,
                title: "ea molestias quasi exercitationem repellat qui ipsa sit aut",
            },
            {
                userId: 1,
                id: 4,
                title:
                    "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
            },
            {
                userId: 1,
                id: 5,
                title: "qui est esse",
            },
            {
                userId: 1,
                id: 6,
                title: "ea molestias quasi exercitationem repellat qui ipsa sit aut",
            },
            {
                userId: 1,
                id: 7,
                title:
                    "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
            },
            {
                userId: 1,
                id: 8,
                title: "qui est esse",
            },
            {
                userId: 1,
                id: 9,
                title: "ea molestias quasi exercitationem repellat qui ipsa sit aut",
            },
        ],
        headers: [
            {text: "User ID", value: "userId"},
            {text: "ID", value: "id"},
            {text: "Title", value: "title"},
        ],
    }),
};
</script>
