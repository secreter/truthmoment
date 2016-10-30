<template>
  <div class="headimg">
    <img class="-img" src="../assets/logo.png">
    <div class="-info">
      <span class="-nickname">周星星</span>
      <span class="-desc">sdsdsdsdsdsdssd</span>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HeadImg',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang='less' scoped>
.headimg{
  background-color: #999;
  display: flex;
  padding: 5px;
  .-img{
    width:60px;
    height: 60px;
  }
  .-info{
    display: flex;
    flex-direction: column;
    height: 100%;
    background-color: yellow;
    .-nickname {
      padding: 5px 10px;
      background-color: #888;
    }
    .-desc{

    }

  }

}
</style>
