<template>
  <div id="app">
    <tab-container v-model="active">
      <tab-container-item id="tab-container1">
        <head-img></head-img>
        <div class="empty" v-if="dataArr.length==0">
          暂时还没有问题，赶紧分享到朋友圈让小伙伴们来提问吧~
        </div>
        <qa-item v-for="item in dataArr" :question="item.question" :answer="item.answer"></qa-item> 
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
        <ask></ask>
        <Subscribe></Subscribe>
      </tab-container-item>
      <tab-container-item id="tab-container3">
        <mt-header  title="挑战真心话">
          <btn slot="left" icon="back" @click.native="page1">
          </btn>
        </mt-header>
        <div class="notice">
          你已发起真心话挑战，你可以选择性的回答朋友提出的问题，只有被回答的问题会被显示出来。但会显示总提问数和总回答数。分享本页面立即结束挑战~
        </div>
        <reply></reply>
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
import IndexDB from './api/IndexDB'
import { Button, Cell, Popup, TabContainer, TabContainerItem, Badge ,Header   } from 'mint-ui'

export default {
  data(){
    return {
      active: 'tab-container1',
      dataArr: []
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
      this.init()
    },
    page2(){
      this.active = 'tab-container2'
    },
    page3(){
      this.active = 'tab-container3'
    },
    init(){
      let dbObj=new IndexDB()
      let vm=this
      vm.dataArr.length=0
      dbObj.open("truthMoment",1,"qa_data","userid")
      .then((db) => {
        vm.db=db
        let store = vm.db.transaction(["qa_data"],"readonly").objectStore("qa_data")
        //在当前对象仓库里面建立一个读取光标（cursor）
        let cursor = store.openCursor()
        cursor.onsuccess = function(e) {
          var res = e.target.result;
          if(res) {
            // console.log("Key", res.key);
            // console.log("Data", res.value);
            console.log(vm.dataArr)

            vm.dataArr.push(res.value)
            res.continue()
          }
        }
      })
      .catch((e) => {
        console.warn(e)
      })
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
  margin: 10px;
  padding: 20px;
  background-color: #ddd;
  text-align: justify;
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
.notice{
  margin: 10px;
  padding: 10px;
  text-align: justify;
  background-color: #ddd;
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
