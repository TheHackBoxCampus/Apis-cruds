let wkArea = {
    template(id, name_area) {
        return /* html */ `
            <span>-------------------------------------------------</span>
            <span>La id es: ${id}</span><br>
            <span>El nombre de la area es: ${name_area}</span><br><br>
            <span>-------------------------------------------------</span>

        `
    },

    async getData() {
        let uri = "http://localhost/CRUDS/backend/table/areas";      
        try{
            let consult = await (await fetch(uri, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json"
                }
            })).text(); 
            return consult
        }catch (err) {
            console.warn(err)
        }
    },

    async postData(data) {
        let uri = "http://localhost/CRUDS/backend/table/areas/post";      
        try{
            let consult = await (await fetch(uri, {
                method: "POST",
                body: JSON.stringify(data),
                headers: {
                    "Content-Type": "application/json"
                }
            })).text(); 
            return consult
        }catch (err) {
            console.warn(err)
        }
    },

    async putData(data) {
        let uri = "http://localhost/CRUDS/backend/table/areas/put";
        try {
            let consult = await (await fetch(uri, {
                method: "PUT",
                body: JSON.stringify(data),
                headers: {
                    "Content-Type": "application/json"
                }
            })).text(); 
            return consult 
        }catch (err) {
            console.warn(err); 
        }
    },

    async deleteData(data) {
        let uri = "http://localhost/CRUDS/backend/table/areas/delete";
        try {
            let consult = await (await fetch(uri, {
                method: "DELETE",
                body: JSON.stringify(data),
                headers: {
                    "Content-Type": "application/json"
                }
            })).text(); 
            return consult 
        }catch (err) {
            console.warn(err); 
        }
    }
}

self.addEventListener("message", e => {
    let res = wkArea[e.data.nfc](e.data ? e.data : undefined); 
    if(e.data.nfc == "getData"){
        Promise.resolve(res).then(res => {
            let areas = JSON.parse(res);
            let template = '';  
            areas.forEach(area => {
                template += wkArea.template(area['id'], area['name_area']);
            });
            postMessage(template); 
        });
    }else {
        Promise.resolve(res).then(res => postMessage(res));
    }
})