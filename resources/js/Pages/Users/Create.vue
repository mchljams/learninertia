<template>
  <Head title="Create User" />

  <h1 class="text-3xl">Create New User</h1>

  <form @submit.prevent="submit" class="">
    <div class="mb-3">
      <label class="form-label" for="name"> Name </label>

      <input 
        v-model="form.name" 
        class="form-control" 
        :class="{'is-invalid': form.errors.name}"
        type="text" 
        name="name" 
        id="name" 
        aria-describedby="nameValidation"
        required
      />
      <div v-if="form.errors.name" v-text="form.errors.name" id="nameValidation" class="invalid-feedback"></div>
    </div>

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
      <button type="submit" class="btn btn-primary" :disabled="form.processing">Submit</button>
    </div>
  </form>
</template>

<script>
import { useForm} from '@inertiajs/inertia-vue3'

export default {

    props: {
        errors: Object,
    },

    setup () {

        const form = useForm({
            name: null,
            email: null,
            password: null,
        })

        function submit() {
            form.post('/users')
        }

        return { form, submit }
    },
}
</script>