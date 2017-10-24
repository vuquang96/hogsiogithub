<template>
    <navbar placement="top" type="default">
        <!-- Brand as slot -->
        <router-link slot="brand" class="navbar-brand" :to="{name: 'index'}" v-once>{{ siteName }}</router-link>

        <router-link slot="right" :to="{name: 'index'}" tag="li" activeClass="active" exact>
            <a>Home</a>
        </router-link>
        <router-link slot="right" v-if="!user.authenticated" :to="{name: 'login'}" tag="li" activeClass="active" exact>
            <a>Login</a>
        </router-link>
        <router-link slot="right" v-if="user.authenticated" :to="{name: 'profile'}" tag="li" activeClass="active">
            <a>Profile</a>
        </router-link>
        <li slot="right" v-if="user.authenticated">
            <a href="#" @click.prevent="logout()">Logout</a>
        </li>
    </navbar>
</template>

<script>
    import {siteName} from './../../config';
    import {mapState} from 'vuex';
    import {navbar} from 'vue-strap';

    export default {
        name: 'top-menu',
        data() {
            return {
                siteName: siteName
            }
        },
        components: {
            navbar
        },
        computed: {
            ...mapState({
                user: state => state.authUser
            })
        },
        methods: {
            logout() {
                this.$store.dispatch('logoutRequest')
                    .then(() => {
                        this.$router.push({name: 'login'});
                    });
            }
        }
    }
</script>
