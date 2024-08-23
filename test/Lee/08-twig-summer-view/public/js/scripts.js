/*!
* Start Bootstrap - Blog Post v5.0.9 (https://startbootstrap.com/template/blog-post)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-blog-post/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

if (document.querySelector(".categListHidden")) {
    const categListHidden = document.querySelectorAll(".categListHidden");
    const catListName = document.querySelectorAll(".catListName");
    console.log(catListName);
    for (let i = 0; i < catListName.length; i++) {
        for (let j = 0; j < categListHidden.length; j++) {
            if (categListHidden[j].id == catListName[i].id) {
                console.log("match found : " + categListHidden[j].id +" + " +catListName[i].id);
                let checkThis = catListName[i];
                checkThis.toggleAttribute("checked");

            }
        }
    }
}

if (document.querySelector(".tagListHidden")) {
    const tagListHidden = document.querySelectorAll(".tagListHidden");
    const tagListName = document.querySelectorAll(".tagListName");
    for (let i = 0; i < tagListName.length; i++) {
        for (let j = 0; j < tagListHidden.length; j++) {
            if (tagListHidden[j].id == tagListName[i].id) {
                console.log("match found : " + tagListHidden[j].id +" + " +tagListName[i].id);
                let checkThis = tagListName[i];
                checkThis.toggleAttribute("checked");

            }
        }
    }
}