export default class AREA extends HTMLElement {
    #url = import.meta.url; 
    
    constructor() {
        super(); 
    }

    refactoringData() {
        let refactor = this.#url.replace(".js", "").split("/");
        refactor.pop()
        let joinR = refactor.join("/"); 
        return joinR; 
    }

    handleEvent(e) {
        e.preventDefault();
        (e.type) == "submit" ? this.activeWorker(e) : undefined; 
    }

    activeWorker(e) {
        const data = Object.fromEntries(new FormData(e.target)); 
        const ws = new Worker("components/workers/wsArea.js");
        ws.postMessage({data, nfc: e.submitter.name}); 
        ws.addEventListener("message", r => {
            let parser = new DOMParser();  
            if(parser.parseFromString(r.data, 'text/html').body instanceof HTMLElement) {
                 let htmlRender = this.querySelector("div.tableAreasGet"); 
                 return htmlRender.innerHTML = r.data; 
             }else {
                 let res = JSON.parse(r.data); 
                 Swal.fire({
                     "title": "Congratulations!!",
                     "text": `${res['message']}, status ${res['status']}`,
                     "icon": "success"
                 })
             }
        })
    }

    async getTemplateComponent() {
        let url = this.refactoringData();  
        return await ((await fetch(url+"/templates/areas.html")).text());
    }

    connectedCallback() { 
         Promise.resolve(this.getTemplateComponent()).then(html => {
             this.innerHTML = html; 
             this.form = this.querySelector("form");
             this.form.addEventListener("submit", this.handleEvent.bind(this));
         })
    }
}

customElements.define('form-area', AREA); 