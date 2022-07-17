function jsonCheckusername(json) {
    if (!json.exists) {
        document.querySelector('#err_user').textContent = "Username non valido (max 13)";
        document.querySelector('#err_user').classList.add('hidden');
        CHECK_F.username = true;
    } else {
        document.querySelector('#err_user').textContent = "Questo username è già in uso";
        document.querySelector('#err_user').classList.remove('hidden');
        CHECK_F.username = false;
    }
}

function jsonCheckEmail(json) {
    if (!json.exists) {
        document.querySelector('#err_email').textContent = "email non valida"; 
        document.querySelector('#err_email').classList.add('hidden');
        CHECK_F.email = true;
    } else {
        document.querySelector('#err_email').textContent = "email già in uso";
        document.querySelector('#err_email').classList.remove('hidden');
        CHECK_F.email = false;
    }
}

function fetchResponse(response) {
    return (response.ok ? response.json() : null);
}

function checkusername(event) {
    const username = document.querySelector('#username');

    if (!/^[a-zA-Z0-9_]{1,13}$/.test(username.value)) {
        document.querySelector('#err_user').classList.remove("hidden");
        CHECK_F.username = false;
    } else {
        fetch("signup/username/" + encodeURIComponent(username.value)).then(fetchResponse).then(jsonCheckusername);
    }
}

function checkEmail(event) {
    const addr = document.querySelector('#email');

    if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(addr.value).toLowerCase())) {
        document.querySelector('#err_email').classList.remove("hidden");
        CHECK_F.email = false;
    } else {
        fetch("signup/email/" + encodeURIComponent(String(addr.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}

function checkPassword(event) {
    const pass = document.querySelector('#password');
    if (pass.value.length >= 8) {
        document.querySelector('#err_pass').classList.add('hidden');
        CHECK_F.passw = true;
    } else {
        document.querySelector('#err_pass').classList.remove('hidden');
        CHECK_F.passw = false;
    }
}

let CHECK_F = {
    username: false,
    passw: false,
    email: false,
};

function T_Check(event) {
    let fCheck = 0;
    for (const f in CHECK_F) {
        if (CHECK_F[f] == false) fCheck++;
    }

    if (fCheck) {
        event.preventDefault();
        document.querySelector('#final_error').classList.remove('hidden');
    }
}

document.querySelector('#username').addEventListener('blur', checkusername);
document.querySelector('#password').addEventListener('blur', checkPassword);
document.querySelector('#email').addEventListener('blur', checkEmail);
document.forms['signup_form'].addEventListener('submit', T_Check);