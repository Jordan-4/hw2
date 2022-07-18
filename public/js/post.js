function onJsonPosts(json) {
    console.log(json);
    console.log(json.length);

    if (!json.length) {
        console.log('No posts');
        const post = document.querySelector(".post_home");
        const notFound = document.createElement("div");
        notFound.classList.add("no_posts");
        notFound.textContent = "Nessun post disponibile";
        post.appendChild(notFound);
    }
    else {
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

fetch("fetch").then(onResponse).then(onJsonPosts);