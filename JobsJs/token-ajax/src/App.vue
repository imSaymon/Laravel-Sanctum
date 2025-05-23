<script setup>
import HelloWorld from "./components/HelloWorld.vue";
import axios from "axios";
import { ref } from "vue";

axios.defaults.baseURL = "http://localhost:8000";
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

const response = ref({});
async function ajax() {
    response.value = await axios.get("http://laravel-sanctum.test/api/token", {
        headers: {
            Authorization:
                "Bearer 1|nXNgkA7T4QYNA4NP0oSsc8470DEQAbQEHIxVjKHV24cb8ef7",
        },
    });
}

async function login() {
    await axios.post("/login");
}

async function logout() {
    await axios.post("/logout");
}

async function csrfCookie() {
    await axios.get("/sanctum/csrf-cookie");
}

async function getUser() {
    await axios.get("/api/user");
}
</script>

<template>
    <div>
        <button @click="csrfCookie">CSRF Cookie</button>

        <button @click="login">Login</button>

        <button @click="getUser">User</button>

        <button @click="logout">Logout</button>

        <br /><br /><br />
        <pre>{{ response.data }}</pre>

        <button @click="ajax">AJAX</button>
        <br /><br /><br /><br /><br /><br /><br />
        <a href="https://vite.dev" target="_blank">
            <img src="/vite.svg" class="logo" alt="Vite logo" />
        </a>
        <a href="https://vuejs.org/" target="_blank">
            <img src="./assets/vue.svg" class="logo vue" alt="Vue logo" />
        </a>
    </div>
    <HelloWorld msg="Vite + Vue" />
</template>

<style scoped>
.logo {
    height: 6em;
    padding: 1.5em;
    will-change: filter;
    transition: filter 300ms;
}
.logo:hover {
    filter: drop-shadow(0 0 2em #646cffaa);
}
.logo.vue:hover {
    filter: drop-shadow(0 0 2em #42b883aa);
}
</style>
