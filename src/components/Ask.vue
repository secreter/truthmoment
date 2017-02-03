<template>
	<div class="ask">
		<popup class="pop" position="top" :modal="false" v-model="popupVisible">
			提问成功~回复后可见
		</popup>
    <div class="-input">
    	<textarea row='10' class="-textarea" v-model="question"></textarea>
    	<div class="-btn-wrap">
    		<btn class="-btn" size="small" type="primary" @click.native="add">提问</btn>
    	</div>
    	
    </div>
    <div class="-question">
    	<div class="-title">	📝快速提问示例：</div>
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
				'你妈逼你结婚了吗？',
				'《西游伏妖》约吗？',
				'过年要租对象吗？便宜租你',
				'最后悔的一件事是什么？',
				'有对象了吗？',
				'最忘不了的一个人是谁？',
				'新年愿望是什么？',
				'暗恋的人名字首字母是什么？',
				'大年一起去看电影吧？',
				'初吻什么时候没的？',
				'谈过几次恋爱？',
				'最丢脸的事情是什么？',
				'想收到什么礼物？',
				'觉得自己有什么优点？',
				'最欣赏自己哪个部位？',
				'如果有来生，你选择当？',
				'做过最疯狂的事是什么？',
				'你心目中理想的爱人是什么样子呢？',
				'最想实现的三个愿望是什么？',
				'你是如何向喜欢的人表白的？',
				'第一次是什么时候？',
				'你的外号是什么?',
				'一晚最多几次？',
				'你生日是什么时候？',
				'敢不敢爆出自己的身高及体重？',
				'如果一个流氓要对你耍流氓，你会肿么样 ?',
				'你是同性恋吗？',
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
			},1500)
			setTimeout(() => {
				this.$emit('reply-success', null)
			},1700)
			this.popupVisible=true
		}
	},
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
					background-color: #27a2ff;
				}
			}
			
		}
		.-question{
			background-color: #f8f8f8;
			padding: 10px;
			border-radius: 1px;
			box-shadow: 0 1px 1px 1px rgba(0,0,0,0.1);
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