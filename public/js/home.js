function onJsonWallpaper(json) {
    const overlay = document.querySelector("#wallpaper");
    overlay.src = json.urls.regular;
}

function onResponse(response) {
    return response.json();
}

function onError(error) {
    console.log(error);
}

// function fetchPosts() {
//     fetch("post").then(onResponse).then(onJson);
// }

fetch("wallpaper").then(onResponse, onError).then(onJsonWallpaper);