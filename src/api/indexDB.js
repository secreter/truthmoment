class IndexDB{
	constructor(){
		if(! "indexedDB" in window) {
     // 不支持
     console.error('不支持indexedDB，请更新浏览器！')
     return
   }
	}
	open(dbname,version,tableName,primaryKey){
		let openRequest = indexedDB.open(dbname,version)
		return new Promise((resolve,reject) => {
			openRequest.onupgradeneeded = function(e) {
		    console.log("Upgrading...");
		    this.db = e.target.result;
		    if(!this.db.objectStoreNames.contains(tableName)) {
				     this.db.createObjectStore(tableName, { keyPath: primaryKey })  //创建仓库
				}
				// let store = e.target.transaction.objectStore(tableName)
				// alert(1)
		    resolve(this.db)
			}
			openRequest.onsuccess = function(e) {
		    console.log("Success!");
		    this.db = e.target.result;
		    // let store = this.db.transaction([tableName],"readwrite").objectStore(tableName)
		    	// alert(2)
		    resolve(this.db)
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