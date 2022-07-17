
function onJsonRicerca(json) {
    console.log(json);
    console.log(json.length);
    if (!json.length) {
        document.querySelector("article").innerHTML = "";
        const post = document.querySelector("article");
        const notFound = document.createElement("div")
        notFound.classList.add("no_data");
        notFound.textContent = "No data."
        post.appendChild(notFound);
    }
    else {
        document.querySelector("article").innerHTML = "";
        const searchResponse = document.createElement("div"); 
        searchResponse.textContent = "Stavi cercando... " + json[0].ricerca + " ha ritornato " + json.length + " accoppiamenti"; 
        searchResponse.classList.add("search_success"); 
        document.querySelector("article").appendChild(searchResponse);
        for (let i = 0; i < json.length; i++) {
            const article = document.querySelector("article");
            const div = document.createElement("div");
            div.classList.add("post");
            const autore = document.createElement("div");
            autore.classList.add("author");
            autore.textContent = json[i].autore;
            div.appendChild(autore);
            const titolo = document.createElement("div");
            titolo.classList.add("title");
            titolo.textContent = json[i].title;
            div.appendChild(titolo);
            const contenuto = document.createElement("div");
            contenuto.classList.add("content");
            contenuto.textContent = json[i].content
            div.appendChild(contenuto);
            article.appendChild(div);

        }
    }
}

function onJson(json) {
    console.log(json);
    console.log(json.length);
    if (!json.length) {
        console.log('saxo');
        const post = document.querySelector(".post");
        const notFound = document.createElement("div");
        notFound.classList.add("No_data");
        notFound.textContent = "Nessun post disponibile";
        post.appendChild(notFound);
    }
    else {
        for (let i = 0; i < json.length; i++) {
            const article = document.querySelector("article");
            const div = document.createElement("div");
            div.classList.add("post");
            const autore = document.createElement("div");
            autore.classList.add("author");
            autore.textContent = json[i].autore;
            div.appendChild(autore);
            const titolo = document.createElement("div");
            titolo.classList.add("title");
            titolo.textContent = json[i].title;
            div.appendChild(titolo);
            const contenuto = document.createElement("div");
            contenuto.classList.add("content");
            contenuto.textContent = json[i].content
            div.appendChild(contenuto);
            article.appendChild(div);


        }
    }
}

function onResponse(response) {
    return response.json();
}

fetch("post").then(onResponse).then(onJson);