import { createStore } from 'vuex'
import posts from './modules/posts'
import categories from './modules/categories'

export default createStore({
  modules: {
    posts,
    categories,
  },
})
