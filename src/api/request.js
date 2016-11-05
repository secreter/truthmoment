import $ from 'jquery'
let DOMAIN = location.host === 'localhost:8080' ? 'http://localhost/item' : 'http://item.redream.cn'
export function add_item(dataObj) {
	$.ajax({
		type: 'get',
    // jsonpCallback: 'callback' ,
		url: DOMAIN +'/truthmoment/back_api/add_item.php',
		dataType:'jsonp',
		data: dataObj,
		success: (data) => {
			// console.log(data)
			console.log("add_item",'success')
		},
		error: (e) => {
			console.error(e)
		}
	})
}
export function get_item(userid) {
	return new Promise((resolve,reject) => {
		$.ajax({
			type: 'get',
	    // jsonpCallback: 'callback' ,
			url: DOMAIN + '/truthmoment/back_api/get_item.php',
			dataType:'jsonp',
			data: {
				parentid: userid
			},
			success: (data) => {
				// console.log(data)
				console.log("get_item",'success')
				resolve(data.itemArr)
			},
			error: (e) => {
				console.error(e)
				reject(e)
			}
		})
	})
}
export function update_item(id,answer) {
	return new Promise((resolve,reject) => {
		$.ajax({
			type: 'get',
	    // jsonpCallback: 'callback' ,
			url: DOMAIN + '/truthmoment/back_api/update_item.php',
			dataType:'jsonp',
			data: {
				id,
				answer
			},
			success: (data) => {
				// console.log(data)
				console.log("update_item",'success')
				resolve(data)
			},
			error: (e) => {
				console.error(e)
				reject(e)
			}
		})
	})
}
export function get_user_info(id){
	return new Promise((resolve,reject) => {
		$.ajax({
			type: 'get',
	    // jsonpCallback: 'callback' ,
			url: DOMAIN + '/truthmoment/back_api/get_user_info.php',
			dataType:'jsonp',
			data: {
				id
			},
			success: (data) => {
				// console.log(data)
				console.log("get_user_info",'success')
				resolve(data.data)
			},
			error: (e) => {
				console.error(e)
				reject(e)
			}
		})
	})	
}