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
			store: null
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
			dbObj.open()
			.then((db) => {
				this.db=db
				if(!db.objectStoreNames.contains("qa_data")) {
				     db.createObjectStore("qa_data", { keyPath: "userid" })  //创建仓库
				}
				//transaction方法用于创建一个数据库事务。向数据库添加数据之前，必须先创建数据库事务。
				let t = db.transaction(["qa_data"],"readwrite")
				this.store = t.objectStore("qa_data")
				console.log(this.store,11)
				this.store.add(obj,1);
			})
			.catch((e) => {
				console.warn(e)
			})
		},
		add(){
			let obj={
				userid:'',
				nickname:'',
				sex:'',
				question:this.question,
				answer:''
			}
			console.log(obj)
			let request = this.store.add(obj,1);
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
		background-color: #888;
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
				}
			}
			
		}
		.-question{
			background-color: #fff;
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
				color: #888;
			}
		}
	}
</style>