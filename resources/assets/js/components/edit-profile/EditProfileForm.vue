<template>
    <div>
        <form @submit.prevent="updateProfile()">
            <div v-if="seen">
                <div class="form-group" :class="{ 'has-error' : errors.name}">
                    <label class="control-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" v-model="name">
                    <span class="help-block" v-if="errors.name">{{ errors.name }}</span>
                </div>
                <div class="form-group" :class="{ 'has-error' : errors.email}">
                    <label class="control-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" v-model="email">
                    <span class="help-block" v-if="errors.email">{{ errors.email }}</span>
                </div>
                <div class="form-group">
                    <button type="button" v-on:click="seen = false" class="btn btn-primary">Update Profile</button>
                </div>
            </div>
            <div v-if="!seen">
                <div class="form-group" :class="{ 'has-error' : errors.name}">
                    <label class="control-label" for="name">Name</label>
                    <label class="control-label" for="name">{{name}}</label>
                    <input type="hidden" class="form-control" id="name-confirm" v-model="name">
                </div>
                <div class="form-group" :class="{ 'has-error' : errors.email}">
                    <label class="control-label" for="email">Email</label>
                    <label class="control-label" for="email">{{email}}</label>
                    <input type="hidden" class="form-control" id="email-confirm" v-model="email">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    import * as types from './../../mutation-types';

    export default {
        name: 'edit-profile-form',
        created() {
            this.$store.dispatch('clearEditProfileErrors');
            this.$store.dispatch('setAuthUser');
        },
        data: function () {
            return {
                seen: true
            }
        },
        computed: {
            ...mapState({
                errors: state => state.editProfile.errors
            }),
            name: {
                get() {
                    return this.$store.state.authUser.name;
                },
                set (value) {
                    this.$store.commit({
                        type: types.UPDATE_AUTH_USER_NAME,
                        value
                    });
                }
            },
            email: {
                get() {
                    return this.$store.state.authUser.email;
                },
                set (value) {
                    this.$store.commit({
                        type: types.UPDATE_AUTH_USER_EMAIL,
                        value
                    });
                }
            }
        },
        methods: {
            updateProfile() {
                const formData = {
                    name: this.name,
                    email: this.email
                };

                this.$store.dispatch('updateProfileRequest', formData)
                        .then(() => {
                            this.$router.push({name: 'profile'});
                        })
                        .catch(() => {
                            this.seen = true;
                        });
            }
        }
    }
</script>
