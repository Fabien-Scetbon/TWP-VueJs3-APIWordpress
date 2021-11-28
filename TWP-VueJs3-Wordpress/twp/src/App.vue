<template>
  <div id="nav">
    <router-link to="/">
      <button id="close" class="button">
        <i class="fas fa-home"></i>
      </button>
    </router-link>
    <h1>&nbsp;TRALALA&nbsp;</h1>
    <router-link to="/create_category">
      <button id="newPost" class="button">
        <i class="fas fa-plus-square"></i>
      </button>
    </router-link>
  </div>

  <router-view />
</template>

<script>
export default {
  name: 'App',

  data: () => ({
    //
  }),
}
</script>

<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&family=Road+Rage&family=Roboto:wght@100&display=swap');
* {
  margin: 0;
  padding: 0;
  font-family: 'Inconsolata', sans-serif;
  text-decoration: none;
}

.button {
  cursor: pointer;
  background-color: transparent;
  border: 3px rgb(18, 10, 131) solid;
  border-radius: 30px;
  padding: 0.2rem 1rem;
  font-size: 3rem;
}

button:active {
  transform: scale(0.9);
}

html {
  background: url(./assets/background.jpg) no-repeat top/cover;
  background-attachment: fixed;
  background-size: cover;
}

#app {
  margin: auto;
  padding: 0.5rem;
  width: 100%;
  min-width: 350px;
}

#nav {
  height: 8.1rem;
  width: 99.9%;
  min-width: 450px;
  display: flex;
  justify-content: space-between;
  text-align: center;
  border-radius: 20px;
  padding: 1.5rem;
  background: linear-gradient(85deg, rgb(97, 144, 246), rgb(187, 206, 248));
  opacity:0.5;
}

#nav h1 {
  color: rgb(192, 33, 126);
  font-size: 3rem;
  margin-top: 5px;
  border: 3px rgb(18, 10, 131) solid;
  border-radius: 30px;
}

#nav i {
  font-size: 2.5rem;
  width: 3rem;
  color: rgb(192, 33, 126);
}
</style>
