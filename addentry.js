clear_btn  = document.querySelector(".add-post-clear");
submit_btn = document.querySelector(".add-post-submit");

clear_btn.addEventListener("click", function(){
    post_title  = document.querySelector("#title");
    post_content = document.querySelector("#content");
    post_title.value = "";
    post_content.value = "";
});


submit_btn.addEventListener("click", function(e){
    post_title  = document.querySelector("#title");
    post_content = document.querySelector("#content");
    if(post_title.value == "" || post_content.value == ""){
        if(post_title.value == ""){
            post_title.style.border = "2px solid red";
        }
        if(post_content.value == ""){
            post_content.style.border = "2px solid red";
        }
        e.preventDefault();
    }
});