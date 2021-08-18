<template>
    <div class="row">
        <div class="col-md-3 grid-margin stretch-card">
            Filter                
        </div>
        <div class="col-md-9 grid-margin stretch-card">
            Results
        </div>
    </div>
</template>

<script>
export default {
    props: ['search-data'],
    data() {
        return {

        }
    },
    mounted() {
      console.log("mounted Hotel List");
    },
    created() {
      console.log("created Hotel List");
    },
    updated() {
      console.log("updated Hotel List");
    },
    methods:{

    }
};
</script>