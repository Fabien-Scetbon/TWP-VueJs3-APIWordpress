<template>
  <div class="note">
    <div class="header" :id="'categoryName' + category.id">
      <h3 v-if="category.name.length < 20" class="noteTitle">
        {{ category.name }}
      </h3>
      <h3 class="noteTitle" v-else>{{ category.name.slice(0, 30) }} ...</h3>
    </div>

    <div class="content">
      <div v-for="post in posts" :key="post.id" style="width: 100%">
        <div class="vif" v-if="category.id == post.categories[0]">
          <button>
            <i
              class="fas fa-arrow-left"
              style="
                color: rgb(240, 136, 136);
                font-size: 1rem;
                margin-top: 1.6rem;
              "
              @click="moveLeft(post, post.id, categories, category.id)"
            >
            </i>
          </button>
          <div class="task">
            <p :post="post">
              {{ post.title.rendered }}
            </p>
            <button>
              <i
                class="fas fa-trash-alt"
                style="color: rgb(214, 139, 243)"
                @click="deletePost({ id: post.id })"
              ></i>
              <!-- pas post.id seul car ajouter force a objet pour delete-->
            </button>
          </div>
          <button>
            <i
              class="fas fa-arrow-right"
              style="
                color: rgb(240, 136, 136);
                font-size: 1rem;
                margin-top: 1.6rem;
              "
              @click="moveRight(post, post.id, categories, category.id)"
            ></i>
          </button>
        </div>
      </div>
    </div>

    <form @submit.prevent="submitForm" :id="'catId' + category.id">
      <!-- id permet de lier le form a son input sinon il faut remplir tous les input si on ajoute une task au 1er -->
      <input
        form="'catId' + category.id"
        class="search task2"
        type="text"
        v-model="title"
        name="title"
        id="title"
        placeholder="Add a new task"
        required
      />
      <button type="submit" style="margin: auto; position: relative">
        <i
          class="fas fa-plus-circle"
          style="color: rgb(163, 73, 125); font-size: 1.5rem; margin: auto"
        ></i>
      </button>
    </form>

    <div class="add-content" :id="'cat' + category.id">
      <button class="edit" @click="deleteCategories(category.id)">
        <i class="fas fa-times" style="color: rgb(241, 100, 175)"></i>
      </button>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  name: 'Posts',
  data() {
    return {
      id: this.category.id,
      title: '',
      content: '',
      description: '',
    }
  },

  props: {
    category: Object,
  },
  computed: {
    ...mapGetters({
      posts: 'posts/SORT_POSTS',
      categories: 'categories/SORT_CATEGORIES',
    }),
  },
  methods: {
    ...mapActions({
      fetchPosts: 'posts/FETCH_POSTS',
      fetchCategories: 'categories/FETCH_CATEGORIES',
      deletePost: 'posts/DELETE_POST',
      deleteCategories: 'categories/DELETE_CATEGORY',
      updatePost: 'posts/UPDATE_POST',
    }),

    moveRight(post, postId, categories, catId) {
      // console.log(post)
      // console.log(postId)
      // console.log(categories)
      // console.log(catId)

      let nbCat = categories.length
      // console.log(nbCat)

      let tabCat = []
      for (let i = 0; i < nbCat; i++) {
        tabCat.push(categories[i].id)
      }
      // console.log(tabCat)
      let index = tabCat.indexOf(catId)

     if (index == categories.length - 1){
       post.categories = tabCat[0]
       
     } else {
        post.categories = tabCat[index + 1]
      } 
      // console.log(post)

      let form = {
        id: postId,
        body: {
          title: post.title,
          content: post.content,
          categories: post.categories,
          status: 'publish',
        },
      }

      this.updatePost(form)
    },

    moveLeft(post, postId, categories, catId) {

      let nbCat = categories.length

      let tabCat = []
      for (let i = 0; i < nbCat; i++) {
        tabCat.push(categories[i].id)
      }
      let index = tabCat.indexOf(catId)

     if (index == 0){
       post.categories = tabCat[categories.length - 1]
       
     } else {
        post.categories = tabCat[index - 1]
      } 

      let form = {
        id: postId,
        body: {
          title: post.title,
          content: post.content,
          categories: post.categories,
          status: 'publish',
        },
      }

      this.updatePost(form)
    },

    submitForm() {
      if (this.title === null || this.title === '') {
        return
      }

      let form = {
        title: this.title,
        content: '',
        categories: [this.id],
        status: 'publish',
      }
      this.$store.dispatch('posts/CREATE_POST', form)
      this.title = '' // pour remettre a 0 dans l'input sur affichage
      this.$router.push('/')
    },
  },
  mounted() {
    this.fetchPosts()
    this.fetchCategories()
  },
}
</script>

<style scoped lang="scss">
.note {
  display: flex;
  flex-direction: column;
  overflow: hidden;
  height: 100%;
  width: 20rem;
  min-width: 20rem;
  padding: 0.5rem;
  margin: 1rem;
  border-radius: 0.5rem;
  background-image: linear-gradient(
    35deg,
    rgba(167, 180, 207, 0.801),
    rgba(15, 31, 104, 0.9)
  );
  box-shadow: -5px 8px 5px rgb(15, 52, 100);
}

.header {
  display: flex;
  justify-content: center;
  margin: 0.8rem 0 0 0;
  overflow-wrap: break-word;
}

.header i {
  width: 2rem;
  color: rgb(51, 63, 153);
  font-size: 1.3rem;
  margin: 0 0.6rem;
  padding-bottom: 0;
}

.noteTitle {
  color: rgb(181, 194, 255);
  width: 10rem;
  text-align: center;
  font-size: 1.2rem;
  overflow-wrap: break-word;
}

.content {
  width: 97%;
  height: auto;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  overflow: hidden;
  font-size: 1rem;
}

.add-content {
  text-align: right;
  height: auto;
  padding: 0.5rem 1rem 0.5rem 1rem;
  margin: 0.4rem 0;
}

.edit {
  float: right;
  cursor: pointer;
  background-color: transparent;
  border: none;
  font-size: 1.8rem;
  padding: 0;
  margin: 0;
}
.vif {
  display: flex;
  justify-content: space-between;
  width: 100%;
}
.task {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 90%;
}

.task p {
  color: rgb(210, 226, 240);
  width: 100%;
  margin: 1.2rem auto;
  line-height: 140%;
  overflow-wrap: break-word;
  text-align: center;
}

button {
  width: 2rem;
  margin: auto;
}

form {
  display: flex;
  flex-direction: column;
  margin: 0 auto;
}

.search {
  background-color: transparent;
  border: 2px solid rgb(227, 209, 246);
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
