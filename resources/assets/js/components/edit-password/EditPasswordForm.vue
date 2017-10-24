<template>
    <div>
        <form @submit.prevent="updatePassword()">
            <div class="form-group" :class="{ 'has-error' : errors.newPassword}">
                <label class="control-label" for="new-password">New Password</label>
                <input type="password" class="form-control" id="new-password" v-model="newPassword">
                <span class="help-block" v-if="errors.newPassword">{{ errors.newPassword }}</span>
            </div>
            <div class="form-group" :class="{ 'has-error' : errors.confirmNewPassword}">
                <label class="control-label" for="confirm-new-password">Confirm New Password</label>
                <input type="password" class="form-control" id="confirm-new-password" v-model="confirmNewPassword">
                <span class="help-block" v-if="errors.confirmNewPassword">{{ errors.confirmNewPassword }}</span>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Password</button>
            </div>
        </form>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        name: 'edit-password-form',
        created() {
            this.$store.dispatch('clearEditPasswordErrors');
        },
        data() {
            return {
                newPassword: null,
                confirmNewPassword: null
            }
        },
        computed: {
            ...mapState({
                errors: state => state.editPassword.errors
            })
        },
        methods: {
            updatePassword() {
                const formData = {
                    new_password: this.newPassword,
                    confirm_new_password: this.confirmNewPassword
                };

                this.$store.dispatch('updatePasswordRequest', formData)
                    .then(() => this.clearForm())
                    .catch(() => {});
            },
            clearForm() {
                this.newPassword = null;
                this.confirmNewPassword = null;
            }
        }
    }
</script>
