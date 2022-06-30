let element = document.getElementsByTagName("body")[0];
element.setAttribute("id", "root");

const root_url = "/VolunteerNetwork";


// Reload
const Reload = () => {
    let currentURL = window.location.href;
    let req = new XMLHttpRequest();
    req.open('GET', `${currentURL}`, true);
    req.send();
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('root').innerHTML = req.responseText;
        }
    }
}

//GET
const getFunc = (Url) => {
    let req = new XMLHttpRequest();
    var response;
    req.open('GET', Url, true);
    req.send();
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            response = req.responseText;
            if (response == 1) {
                Reload();
            }
        }
    }
}



// Routhing
const redirectTo = (pageURL) => {
    let req = new XMLHttpRequest();
    req.open('GET', `${pageURL}`, true);
    req.send();
    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('root').innerHTML = req.responseText;
            window.history.pushState({
                id: "",
                source: "JS",
            }, "Router", pageURL)
        }
    }


}

// Window Back  
window.onpopstate = () => {
    Reload();
}

// Message Fuc
const messageFunc = (response, submit) => {
    let submit_btn = document.getElementById(submit);
    let alert_div = document.getElementById('alert');
    let mgs_span = document.getElementById('msg');
    submit_btn.disabled = true;
    alert_div.classList.remove('d-none');
    mgs_span.innerHTML = response;

    setTimeout(() => {
        alert_div.classList.add('d-none');
        mgs_span.innerHTML = "";
        submit_btn.disabled = false;
    }, 5000);

}


const getFormData = (data) => {
    let form_element = document.getElementsByClassName(data);
    let form_data = new FormData();
    for (let i = 0; i < form_element.length; i++) {
        form_data.append(form_element[i].name, form_element[i].value);
    }
    return form_data;
}


const submitForm = (e, url) => {
    e.preventDefault();

    let response = 0;
    let pageURL = "";

    let req = new XMLHttpRequest();
    let form_data = getFormData("_form_data");

    req.open('POST', url, true);
    req.send(form_data);

    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            response = req.responseText;

            if (response == 1) {
                pageURL = root_url;
                redirectTo(pageURL);
            }else if (response == 2) {
                pageURL = root_url+"/auth/login/";
                redirectTo(pageURL);
            } else if (response == 3) {
                Reload();
            } else if (response == 4) {
                history.back();
            } else {
                messageFunc(response, "submit");
            }
        }

    }
}



// logout
const logout = () => {
    let response = 0;
    let req = new XMLHttpRequest();
    req.open('GET', root_url+'/auth/logout', true);
    req.send();

    req.onreadystatechange = () => {
        if (req.readyState == 4 && req.status == 200) {
            response = req.responseText;
            if (response == 1) {
                const pageURL = root_url;
                redirectTo(pageURL);
            }
        }
    }
}



// Navigation 
const SideMenuOpenClose = () => {
    let SideNavID = document.getElementById("SideNavID");

    if (SideNavID.classList.contains('NavOpen')) {
        SideNavID.classList.remove('NavOpen');
        SideNavID.classList.add('NavClose');

    } else {
        SideNavID.classList.remove('NavClose');
        SideNavID.classList.add('NavOpen');

    }
}

//displayForm
const displayForm = (CommentID) => {
    let reply_form = "reply_form" + CommentID;
    let form = document.getElementById(reply_form);
    form.style.display = "block";
}





