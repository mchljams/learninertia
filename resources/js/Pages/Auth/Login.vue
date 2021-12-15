<template>
  <Head title="Login" />

    <div class="container h-100">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="col-sm-12 col-md-8 col-lg-4 mx-auto border rounded p-4">

                <h1 class="text-3xl mb-4 ">Login</h1>

                <form @submit.prevent="submit" class="">
                    <div class="mb-3">
                        <label class="form-label" for="email"> Email </label>

                        <input
                            v-model="form.email"
                            class="form-control"
                            :class="{'is-invalid': form.errors.email}"
                            type="email"
                            name="email"
                            id="email"
                            aria-describedby="emailValidation"
                            required
                        />

                        <div v-if="form.errors.email" v-text="form.errors.email" id="emailValidation" class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password"> Password </label>

                        <input
                            v-model="form.password"
                            class="form-control"
                            :class="{'is-invalid': form.errors.password}"
                            type="password"
                            name="password"
                            id="password"
                            aria-describedby="passwordValidation"
                            required
                        />
                        <div v-if="form.errors.password" v-text="form.errors.password" id="passwordValidation" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" :disabled="form.processing">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
import { useForm} from '@inertiajs/inertia-vue3'

export default {
    layout: null,

    props: {
        errors: Object,
    },

    setup () {

        const form = useForm({
            email: null,
            password: null,
        })

        function submit() {
            form.post('/login')
        }

        return { form, submit }
    },
};
</script>
