<template>
    <Head>
        <title>Users</title>
    </Head>
    <div class="row">
        <div class="col">
            <h1>Users</h1>
        </div>
        <div class="col d-flex align-items-center">
            <div class="input-group">
            <input v-model="search" type="text" placeholder="Search" class="form-control ms-auto border-end-0 border border-dark" />
            <button 
                @click="clear"
                class="btn btn-outline-dark  border-start-0" 
                type="reset" 
                id="button-addon2"
            >
                X
            </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <tbody>
                    <tr  v-for="user in users.data" :key="user.id">
                        <td> {{ user.name}} </td>
                        <td class="text-end"> 
                            <Link :href="`users/${user.id}/edit`">Edit</Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <Pagination :links="users.links" />

    <div style="margin-top:900px">
        <p>The current time is {{ time }}.</p>
        <Link 
            href="/users"
            preserve-scroll
        >
            Refresh
        </Link> 
    </div>
</template> 

<script>

export default {
    props: {
        time: String,
        users: Object,
        filters: Object,
    },

    data() {
        return {
            search: this.filters.search
        }
    },

    watch: {
        search(value) {
            this.$inertia.get('/users', { search: value }, {
                preserveState: true,
                replace: true
            });
        }
    },
    methods: {
        clear() {
            this.search = '';
        }
    },
};

</script> 