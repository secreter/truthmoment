<template>
  <div class="headimg">
    <img class="-img" src="http://wx.qlogo.cn/mmopen/16Q9aDojjfkMRfo7TSc9F3SEIiaLaLppczYn5sZ3ceZZUcxGryMH8G5M8bpYfdaQ0JlwNx2yaw9OLNrrrxqAebUFLN2voWlBib/132">
    <div class="-info">
      <span class="-nickname">周星星</span>
      <span class="-desc">共有32个提问，28个回答</span>
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
  display: flex;
  padding: 5px;
  box-shadow: 0 1px 0px 1px rgba(0,0,0,0.3);
  .-img{
    width:64px;
    height: 64px;
    border: solid 1px #864;
  }
  .-info{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    /*height: 100%;*/
    /*background-color: yellow;*/
    .-nickname {
      padding: 5px 10px;
      /*background-color: #888;*/
    }
    .-desc{
      padding: 0 10px;
      font-size: 14px;
    }

  }

}
</style>
