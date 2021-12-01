<template>
    <Nav />
    <div class="container-sm mt-3">
        Welcome Back, {{ username }}!
    </div>
    <div class="container-sm mt-3">
        <div class="row">
            <slot />
        </div>
    </div>
</template> 

<script>
import Nav from "../Shared/Nav";

export default {
    components: { Nav },
    computed: {
        username() {
            return this.$page.props.auth.user.username;
        }
    }
};
</script> 