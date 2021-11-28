<template>
  <div class="note">
    <div class="header">
      <h3>Create a new Category</h3>
    </div>
    <h4 class="error">{{ message }}</h4>

    <form @submit.prevent="submitForm" id="createCategory">
      <input
        class="search"
        form="createCategory"
        placeholder="Category"
        type="text"
        id="category"
        name="category"
        v-model="category"
        required
      />
      <button type="submit">
        <i
          class="fas fa-plus-circle"
          style="color: rgb(163, 73, 125); font-size: 2rem; margin: auto"
        ></i>
      </button>
    </form>
  </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  name: 'CreateCategory',
  data() {
    return {
      category: '',
      name: '',
      categories: [],
      message: '',
    }
  },
  methods: {
    ...mapActions({
      fetchCategories: 'categories/FETCH_CATEGORIES',
    }),

    submitForm() {
      console.log(this.category) // du form
      for (let cat of this.functionCategories.categories) {
        if (this.category == cat.name) {
          //console.log('deja pris')
          this.message = 'Category already exists'
          this.category=''

          return
        }
        // console.log(cat.name)
      }

      //console.log(this.functionCategories.categories[1].name)

      let form = {
        name: this.category,
      }
      this.$store.dispatch('categories/CREATE_CATEGORY', form)
      this.$router.push('/')
    },
  },
  mounted() {
    this.fetchCategories()
  },
  computed: {
    functionCategories() {
      // functioncategories est en fait le tab des categories (a utiliser dans vue ou export default)
      return this.$store.state.categories
    },
  },
}
</script>

<style lang="scss" scoped>
.note {
  display: flex;
  flex-direction: column;
  overflow: hidden;
  height: 100%;
  width: 30rem;
  min-width: 20rem;
  padding: 0.5rem;
  margin: 3rem auto;
  border-radius: 0.5rem;
  background-image: linear-gradient(
    35deg,
    rgba(167, 180, 207, 0.801),
    rgba(15, 31, 104, 0.9)
  );
  box-shadow: -5px 8px 5px rgb(15, 52, 100);
}
h3 {
  color: rgb(181, 194, 255);
  margin-top: 1rem;
}

h4 {
  color:rgb(240, 84, 84);
  text-align: center;
}
.header {
  display: flex;
  justify-content: center;
  margin-bottom: 0.3rem;
  overflow-wrap: break-word;
}
form {
  display: flex;
  flex-direction: column;
  margin: 0 auto;
}

.search {
  background-color: transparent;
  border: 2px solid white;
  border-radius: 50px;
  font-size: 1rem;
  padding: 0.5rem 1rem;
  margin: 1rem;
  color: rgb(210, 226, 240);
}

.search::placeholder {
  color: #86bfee;
}

.search:focus {
  outline: none;
}
</style>
