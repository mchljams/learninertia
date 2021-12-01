<template>
  <Head title="Create User" />

  <h1 class="text-3xl">Create New User</h1>

  <form @submit.prevent="submit" class="">
    <div class="mb-3">
      <label class="form-label" for="name"> Name </label>

      <input 
        v-model="form.name" 
        class="form-control" 
        type="text" 
        name="name" 
        id="name" 
        required 
      />
    </div>

    <div class="mb-3">
      <label class="form-label" for="email"> Email </label>

      <input
        v-model="form.email"
        class="form-control"
        type="email"
        name="email"
        id="email"
        required
      />
    </div>

    <div class="mb-3">
      <label class="form-label" for="password"> Password </label>

      <input
        v-model="form.password"
        class="form-control"
        type="password"
        name="password"
        id="password"
        required
      />
    </div>

    <div class="mb-3">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</template>

<script>
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia'

export default {
    setup () {
        const form = reactive({
            name: null,
            email: null,
            password: null,
        })

        function submit() {
            Inertia.post('/users', form)
        }

        return { form, submit }
    },
}
</script>