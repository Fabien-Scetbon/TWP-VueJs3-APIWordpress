<template>
  <div id="notes">
    <Posts
      v-for="category in categories"
      :key="category.id"
      :category="category"
    />
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import Posts from '@/components/Posts.vue'

export default {
  name: 'Home',
  components: {
    Posts,
  },
  computed: {
    ...mapGetters({
      categories: 'categories/SORT_CATEGORIES',
    }),
  },
  methods: {
    ...mapActions({
      fetchCategories: 'categories/FETCH_CATEGORIES',
    }),
  },
  mounted() {
    this.fetchCategories()
  },
}
</script>

<style lang="scss">
#notes {
  display: flex;
  flex-direction: row;
  justify-content: left;
  width: 99.8%;
  min-width: 450px;
  margin: 2rem 0;
  padding: 1rem;
  padding-bottom: 5rem;
  overflow-x : auto;
}

::-webkit-scrollbar {
  width: 15px;               /* width of the entire scrollbar */
}
::-webkit-scrollbar:vertical {
display:none;
}
::-webkit-scrollbar-track {
  background: transparent;        /* color of the tracking area */
}

::-webkit-scrollbar-thumb {
  background-color: rgb(55, 105, 212);    /* color of the scroll thumb */
  border-radius: 20px;       /* roundness of the scroll thumb */
  border: 2px solid rgb(214, 139, 243);  /* creates padding around scroll thumb */
}

  body {
   
}

</style>
