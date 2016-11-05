<template>
  <div id="app">
    <tab-container v-model="active">
      <tab-container-item id="tab-container1">
        <head-img :userinfo="userObj" :question="dataArr.length" :answer="answerNum"></head-img>
        <div class="empty" v-if="dataArr.length==0">
          暂时还没有问题，赶紧分享到朋友圈让小伙伴们来提问吧~
        </div>
        <qa-item v-for="item in dataArr" :question="item.question" :answer="item.answer" :userinfo="userObj"></qa-item> 
        <div class="btn-wrap">
          <span class="btn" @click="page2">我要提问</span>
          <span class="btn" @click="page3">挑战真心话</span>
          
          <!-- <btn class="btns" size="small" color="#ffe957" type="primary" @click.native="page2">我要提问</btn>
          <btn class="btns" size="small" type="primary" @click.native="page2">加入真心话</btn> -->

        </div>
        <div class="introduce">
          Truth Moment: 发起于西方，提倡人与人相处真诚相待。后以真心话挑战走红网络，接受挑战者需诚实回答提问者提出的问题，提出问题的人即表示接受挑战，支持Truth Moment的理念。
        </div>
        <Subscribe></Subscribe>
      </tab-container-item>
      <tab-container-item id="tab-container2">
        <mt-header class="headbar" title="真心话大拷问">
          <btn slot="left" icon="back" @click.native="page1">
          </btn>
        </mt-header> 
        <ask :parentid="id"></ask>
        <Subscribe></Subscribe>
      </tab-container-item>
      <tab-container-item id="tab-container3">
        <mt-header  title="挑战真心话">
        </mt-header>
        <div class="notice">
          你已发起真心话挑战，你可以选择性的回答朋友提出的问题，只有被回答的问题会被显示出来。但会显示总提问数和总回答数。分享本页面立即接受挑战~
        </div>
        <reply :items="dataArr" :userinfo="userObj"></reply>
        <div class="again">
          <span class="btn" @click="page3">再玩一次</span>
        </div>
        <Subscribe></Subscribe>
      </tab-container-item>
    </tab-container>
    
  </div>
</template>

<script>
import HeadImg from './components/HeadImg'
import QaItem from './components/qaItem'
import Subscribe from './components/Subscribe'
import Ask from './components/Ask'
import reply from './components/reply'
import {add_item, get_item, get_user_info} from './api/request'
import Cookie from './api/Cookie'
import { Button, Cell, Popup, TabContainer, TabContainerItem, Badge ,Header   } from 'mint-ui'

export default {
  data(){
    return {
      active: 'tab-container1',
      dataArr: [],
      userObj: {},
      answerNum: 0,
      id:-1,
      headimgurl:''
    }
  },
  mounted(){
    this.init()
  },
  name: 'app',
  components: {
    Btn: Button, 
    Cell, 
    Popup, 
    TabContainer, 
    TabContainerItem,
    HeadImg,
    QaItem,
    Badge,
    Subscribe,
    'mt-header': Header,
    Ask,
    reply
  },
  methods:{
    page1(){
      this.active = 'tab-container1'
    },
    page2(){
      this.active = 'tab-container2'
    },
    page3(){
      // this.active = 'tab-container3'
      location.href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx96bfa7c4e7c79526&redirect_uri='+encodeURI('http://item.redream.cn/truthmoment/back_api/share.php')+'&response_type=code&scope=snsapi_userinfo&state=9#wechat_redirect'
    },
    init(){
      let cookie=new Cookie()
      this.id=this.getParam('id')
      if(cookie.get('truthMomentOpenid')===this.getParam('userid')){
        this.active = 'tab-container3'
      }
      get_user_info(this.id)
      .then((data) => {
        this.userObj=data
        this.headimgurl=data.headimgurl
        // Object.assign(this.userObj,data)
        
      })
      .catch((e) =>{
        console.error('get_user_info',e)
      }) 
      get_item(this.id)
      .then((itemArr) => {
        this.dataArr=itemArr
        itemArr.forEach((o) => {
          if (o.answer) {
            this.answerNum++
          }
        })
      })
      .catch((e) =>{
        console.error('get_item',e)
      })
    },
    getParam(key){
      let str=location.search.replace('?','')
      let arr=str.split('&')
      let obj={}
      arr.forEach((s) => {
        let a=s.split('=')
        obj[a[0]]=a[1]
      })
      return obj[key]
    }
  }
}
</script>

<style>
.headbar{
  color: #fff !important;
}
.btn-wrap{
  background-color: #eee;
  padding: 15px;
}
.empty{
  padding: 20px;
  text-align: justify;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100px;
  color: #999;
  font-size: 13px;
}
.btns{
  width: 100%;
  margin: 10px 0;
  background-color: #ffe957;
  color: #fff;
}
.btn{
  display: flex;
  background-color: #5aa8dd;
  justify-content: center;
  align-items: center;
  padding: 10px 10px;
  margin: 10px 0;
  color: #fff;
  font-weight: bold;
  box-shadow: 0 0 1px rgba(0,0,0,0.2);
  /*color: #fff;*/

}
.btn:active{
  opacity: 0.8;
}
.again{
  padding: 20px;
  width: 100%;
  box-sizing: border-box;
}
.notice{
  margin: 10px;
  padding: 10px;
  text-align: justify;
  background-color: #dfdfdf;
  font-size: 12px;
  color: #666;
}
.introduce{
  margin: 10px;
  padding: 15px;
  text-align: justify;
  background-color: #bd8552;
  box-shadow: 0 0 2px rgba(0,0,0,0.2);
  color: #fff;
  font-size: 12px;
}
</style>
