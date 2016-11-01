class IndexDB{
	constructor(){
		if(! "indexedDB" in window) {
     // 不支持
     console.error('不支持indexedDB，请更新浏览器！')
     return
   }
	}
	open(name,primaryKey){
		let openRequest = indexedDB.open("truthMoment",1)
		return new Promise((resolve,reject) => {
			openRequest.onupgradeneeded = function(e) {
		    console.log("Upgrading...");
		    this.db = e.target.result;
		    resolve(this.db)
			}
			openRequest.onsuccess = function(e) {
		    console.log("Success!");
		    
		    
			}
			openRequest.onerror = function(e) {
			    console.error("Error");
			    console.dir(e);
			    reject(e)
			}
		})
	}
}

export default IndexDB