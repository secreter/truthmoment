<template>
	<div class="ask">
		<popup class="pop" position="top" :modal="false" v-model="popupVisible">
			提问成功~
		</popup>
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
import { Button ,Popup   } from 'mint-ui'
import {add_item} from '../api/request'
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
			userid:1,
			popupVisible:false
		}
	},
	props:['parentid'],
	created() {
		this.init()
	},
	components: {
		btn: Button,
		Popup 
	},
	methods: {
		setQuestion(q){
			this.question=q
		},
		init(){
			
		},
		add(){
			let obj={
				parentid:this.parentid,
				userid:'o6UDkwIppYchG79HknNe-9fuYugQ',
				question: this.question
			}
			add_item(obj)
			setTimeout(() => {
				this.popupVisible=false
			},2000)
			this.popupVisible=true
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
	.pop{
		height: 60px;
		width: 100%;
		background-color: rgba(0,0,0,.5);
		display: flex;
		justify-content: center;
		align-items: center;
		color: #fff;
	}
</style>