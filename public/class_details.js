function onResponse(response){
    if(response.ok){
        return response.json();
    }
}

/*function onJson(json){
    console.log(json);
    const details_box=document.querySelector("#class_details");
    let var1=true;
    let var2=true;
    for(let i=0; i<json.length; i++){   
        if(json[i].nomemateria!=null){
            console.log("docente");
            const box=document.createElement("div");
            box.classList.add("detail");
            if(var1){
                const title=document.createElement("div");
                title.classList.add("title");
                title.textContent="Docenti";
                details_box.appendChild(title);
                var1=false;
            }
            box.textContent=" "+json[i].nome+" "+json[i].cognome+", età: "+json[i].eta+" anni, prof di "+json[i].nomemateria;
            if((json[i].nome===json[i+1].nome) && (json[i].cognome===json[i+1].cognome)){
                i++;
                box.textContent+=" e di "+json[i].nomemateria;   
            }
            details_box.appendChild(box);
        }
        else{
            console.log("studente");
            const box=document.createElement("div");
            box.classList.add("detail");
            if(var2){
                const title=document.createElement("div");
                title.classList.add("title");
                title.textContent="Studenti";
                details_box.appendChild(title);
                var2=false;
            }
            box.textContent=" "+json[i].nome+" "+json[i].cognome+", età: "+json[i].eta+" anni";
            details_box.appendChild(box);
        }
    }
}*/

function onJson(json){
    console.log(json);
    const details_box=document.querySelector("#class_details");
    let var1=true;
    let var2=true;
    for(const el of json){
        console.log(el.length);
        for(let i=0; i<el.length; i++){ 
            if(el[i].nomemateria!=null){
                console.log("docente");
                const box=document.createElement("div");
                box.classList.add("detail");
                if(var1){
                    const title=document.createElement("div");
                    title.classList.add("title");
                    title.textContent="Docenti";
                    details_box.appendChild(title);
                    var1=false;
                }
                box.textContent=" "+el[i].nome+" "+el[i].cognome+", età: "+el[i].eta+" anni, prof di "+el[i].nomemateria;
                if(el[i+1]!=null){
                    if((el[i].nome===el[i+1].nome) && (el[i].cognome===el[i+1].cognome)){
                        i++;
                        box.textContent+=" e di "+el[i].nomemateria;   
                    }
                }
                details_box.appendChild(box);
            }
            else{
                console.log("studente");
                const box=document.createElement("div");
                box.classList.add("detail");
                if(var2){
                    const title=document.createElement("div");
                    title.classList.add("title");
                    title.textContent="Studenti";
                    details_box.appendChild(title);
                    var2=false;
                }
                box.textContent=" "+el[i].nome+" "+el[i].cognome+", età: "+el[i].eta+" anni";
                details_box.appendChild(box);
            }
        }
    }
}

fetch("classpage/seek/"+window.location.search.substring(11)).then(onResponse).then(onJson);

function mostramenu(event){
    event.currentTarget.removeEventListener("click", mostramenu);
    const menu=document.querySelector("#menutendina");
    menu.classList.remove("hidden");
    event.currentTarget.addEventListener("click", nascondimenu);
}

function nascondimenu(event){
    event.currentTarget.removeEventListener("click", nascondimenu);
    const menu=document.querySelector("#menutendina");
    menu.classList.add("hidden");
    event.currentTarget.addEventListener("click", mostramenu);
}

const tendina=document.querySelector("#tendina");
tendina.addEventListener("click", mostramenu);