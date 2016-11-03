<template>
	<div class="ask">
    <div class="-input">
    	<textarea row='10' class="-textarea" v-model="question"></textarea>
    	<div class="-btn-wrap">
    		<btn class="-btn" size="small" type="primary" @click.native="add">提问</btn>
    	</div>
    	
    </div>
    <div class="-question">
    	<div class="-title">快速提问示例：</div>
    	<div class="-item" v-for="q in ansArr" @click="setQuestion(q)">{{q}}</div>
    	
    </div>
  </div>
</template>
<script>
import { Button   } from 'mint-ui'
import IndexDB from '../api/IndexDB'
export default{
	data(){
		return {
			ansArr: [
				'最后悔的一件事是什么？',
				'有对象了吗？',
				'最忘不了的一个人是谁？',
				'你的梦想是什么？',
				'暗恋的人名字首字母是什么？',
				''
			],
			question: '',
			db: null,
			store: null,
			userid:1
		}
	},
	created() {
		console.log(1)
		this.init()
	},
	components: {
		btn: Button
	},
	methods: {
		setQuestion(q){
			this.question=q
		},
		init(){
			let dbObj=new IndexDB()
			dbObj.open("truthMoment",1,"qa_data","userid")
			.then((db) => {
				this.db=db
				
				//transaction方法用于创建一个数据库事务。向数据库添加数据之前，必须先创建数据库事务。
				// let t = db.transaction(["qa_data"],"readwrite")
				// this.store = store
				// console.log(this.store,11)
				// this.store.add(obj,1);
			})
			.catch((e) => {
				console.warn(e)
			})
		},
		add(){
			
			let obj={
				userid:this.userid++,
				nickname:'',
				sex:'',
				question:this.question,
				answer:''
			}
			this.store = this.db.transaction(["qa_data"],"readwrite").objectStore("qa_data")
			console.log(obj)
			console.log(this.store,11)
			let request = this.store.add(obj);
			request.onerror = function(e) {
			     console.error("Error",e.target.error.name);
			}
			request.onsuccess = function(e) {
			    console.log("数据添加成功！");
			}
		}
	}
}
</script>
<style lang='less'>
	.ask{
		display: flex;
		flex-direction: column;
		padding: 10px;
		.-input{
			display: flex;
			flex-direction: column;
			.-textarea{
				height: 60px;
				padding: 5px;
			}
			.-btn-wrap{
				display: flex;
				justify-content: flex-end;
				.-btn{
					margin: 5px 0;
					background-color: #5aa8dd;
				}
			}
			
		}
		.-question{
			background-color: #f8f8f8;
			padding: 10px;
			border-radius: 3px;
			box-shadow: 0 1px 2px 1px rgba(0,0,0,0.3);
			.-title{
				padding: 15px 0 0 0;
				font-size: 14px;
			}
			.-item{
				background-color: rgba(255,230,147,1);
				margin: 5px 0;
				padding: 5px;
				display: flex;
				justify-content: center;
				align-items: center;
				border:solid 1px #e6b54c;
				border-radius: 3px;
				font-size: 14px;
				color: #666;
				&:active{
					background-color: rgba(255,233,120,1);
				}
			}

		}
	}
</style>