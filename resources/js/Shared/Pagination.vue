<template>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li 
                v-for="link in links" 
                class="page-item" 
                :class="{'active': link.active, 'disabled': !link.url}"
                :key="link.label"
            >
                <Link 
                    :href="link.url"
                    v-html="link.label"
                    class="page-link"
                />
            </li>
        </ul>
    </nav>
</template>

<script>

export default {
    props: {
        links: Array,
    }
};

</script> 