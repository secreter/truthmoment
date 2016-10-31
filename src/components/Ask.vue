<template>
	<div class="ask">
    <div class="-input">
    	<textarea row='10' class="-textarea" v-model="question"></textarea>
    	<div class="-btn-wrap">
    		<btn class="-btn" size="small" type="primary">提问</btn>
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
			question: ''
		}
	},
	components: {
		btn: Button
	},
	methods: {
		setQuestion(q){
			this.question=q
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