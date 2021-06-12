function onResponse(response){
    if(response.ok){
        return response.json();
    }
}

function onJson(json){
    console.log(json);
    const titlebox=document.createElement("h1");
    titlebox.textContent=json[0].scuola;
    const sd=document.querySelector("#schooldetails");
    sd.appendChild(titlebox);
    const classes=document.createElement("div");
    classes.id="classes";
    sd.appendChild(classes);
    const box=document.createElement("div");
    box.classList.add("box");
    const ap=document.createElement("a");
    //console.log(document.querySelector("#login"));
    if(document.querySelector("#login")!==null){
        ap.href="classpage?id_classe="+json[0].id_classe;
    }
    ap.textContent="La tua classe: "+json[0].anno+json[0].corso+" "+json[0].indirizzo;
    box.appendChild(ap);
    classes.appendChild(box);
}

const codfis=document.querySelector("#result").textContent;
if(codfis!=null){
    fetch("your_school/seek/"+codfis).then(onResponse).then(onJson);
}

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