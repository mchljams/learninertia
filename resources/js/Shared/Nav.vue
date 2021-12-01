<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Learn Inertia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li><NavLink href="/" :active="$page.component == 'Home'">Home</NavLink></li>
                <li><NavLink href="/users" :active="$page.component == 'Users'">Users</NavLink></li>
                <li><NavLink href="/settings" :active="$page.component == 'Settings'">Settings</NavLink></li>
                <li><Link href="/logout" method="post" as="button" class="btn btn-link">Log Out</Link></li>
            </ul>
            </div>
        </div>
    </nav>
</template> 

<script>
import NavLink from "../Shared/NavLink";

export default {
    components: { NavLink },
};
</script> 