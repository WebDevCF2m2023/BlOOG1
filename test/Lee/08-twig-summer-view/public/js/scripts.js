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

    for (let i = 0; i < catListName.length; i++) {

        for (let j = 0; j < categListHidden.length; j++) {

            if (categListHidden[j].id == catListName[i].id) {
                console.log("match found : " + categListHidden[j].id +" + " +catListName[i].id);
                let checkThis = catListName[i];
                checkThis.toggleAttribute("checked"); // works fine but need to figure out how to update DB

                //     console.log(checkThis.attributes)
                //      console.log(checkThis.classList);
            }
        }
    }

}