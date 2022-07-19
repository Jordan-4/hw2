function onJsonPosts(json) {
    console.log(json);
    console.log(json.length);
    const post = document.querySelector(".post_home");
    post.innerHTML = "";


    if (!json.length) {
        console.log('No posts');
        const post = document.querySelector(".post_home");
        const notFound = document.createElement("div");
        notFound.classList.add("no_posts");
        notFound.textContent = "Nessun post trovato";
        post.appendChild(notFound);
    }
    else {
        const post = document.querySelector(".post_home");
        const found = document.createElement("div");
        found.classList.add("status");
        found.textContent = "Ho trovato " + json.length + " post";
        post.appendChild(found);
        for (let i = 0; i < json.length; i++) {
            const article = document.querySelector(".post_home");
            const div = document.createElement("div");
            div.classList.add("post");
            const autore = document.createElement("div");
            autore.classList.add("author");
            autore.textContent = "Post creato da " + json[i].autore;
            div.appendChild(autore);
            const titolo = document.createElement("div");
            titolo.classList.add("title");
            titolo.textContent = json[i].titolo;
            div.appendChild(titolo);
            const contenuto = document.createElement("div");
            contenuto.classList.add("content");
            contenuto.textContent = json[i].contenuto;
            div.appendChild(contenuto);
            article.appendChild(div);
        }
    }
}

function onResponse(response) {
    return response.json();
}

function cerca (event) {
    event.preventDefault();
    const input = document.querySelector("#search").value;
    console.log(input);
    if (input) {
        fetch ('find/' + encodeURIComponent(input)).then(onResponse).then(onJsonPosts);
    }
    else {
        alert('Inserisci una parola per cercare');
    }
}

const valore = document.querySelector(".search");
valore.addEventListener('submit', cerca);
