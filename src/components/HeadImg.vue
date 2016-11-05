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
  padding: 15px 20px;
  box-shadow: 0 0px 1px 1px rgba(0,0,0,0.1);
  background-color: #999;
  background: url("http://item.redream.cn/truthmoment/back_api/bg1.jpg") no-repeat;
  background-size: cover;
  color: #fff;
  .-img{
    width:80px;
    height: 80px;
    border: solid 2px #fff;
    border-radius: 50%;
  }
  .-info{
    display: flex;
    flex-direction: column;
    justify-content: space-around;
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
