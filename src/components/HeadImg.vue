<template>
  <div class="headimg">
    <img class="-img" :src="userinfo.headimgurl">
    <div class="-info">
      <span class="-nickname">{{userinfo.nickname}}</span>
      <span class="-desc">共有{{question}}个提问，{{answer}}个回答</span>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HeadImg',
  data () {
    return {
    }
  },
  props:['userinfo','question','answer']
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
