<template>
    <v-container>
        <v-form
            ref="form"
            v-model="valid"
            lazy-validation
            @submit.prevent="login"
        >

            <v-text-field
                v-model="email"
                :rules="emailRules"
                label="E-mail"
                required
                type="email"
                name="email"
            ></v-text-field>

            <v-text-field
                v-model="password"
                :rules="passwordRules"
                label="Password"
                required
                type="password"
                name="password"
            ></v-text-field>

            <v-btn
                color="success"
                class="mr-4"
                type="submit"
            >
                Login
            </v-btn>

            <v-btn
                color="warning"
            >
                Cancel
            </v-btn>
        </v-form>
    </v-container>
</template>

<script>
    export default {
        data: () => ({
            valid: true,
            password: '',
            passwordRules: [
                v => !!v || 'Password is required',
                v => (v && v.length >= 8) || 'Password must be more than 10 characters',
            ],
            email: '',
            emailRules: [
                v => !!v || 'E-mail is required',
                v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
            ],
        }),

        methods: {
            validate () {
                this.$refs.form.validate()
            },
            reset () {
                this.$refs.form.reset()
            },
            resetValidation () {
                this.$refs.form.resetValidation()
            },
            login () {
                // alert(this.email)
                var request = {
                    email: this.email,
                    password: this.password
                }
                axios.post('/api/auth/login', request).
                    then(res => console.log(res.data)).
                    catch(error => console.log(error.respond.data))
            }
        },
    }
</script>
