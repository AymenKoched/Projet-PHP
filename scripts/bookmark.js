let bookMark = document.querySelector(".bkm");
let parent = document.querySelector(".bkmark");
function hideMessage(ele) {
    ele.style.display="none"
}
bookMark.addEventListener("click",()=> {
    let message = document.querySelector(".message");
    if(bookMark.classList.contains("fa-regular")) {
        message.textContent = "Recipe Added to your Bookmark !";
        message.style.display = "block";
        bookMark.classList.remove("fa-regular");
        bookMark.classList.add("fa-solid");
        setTimeout(hideMessage ,4000,message);
    } else {
        message.textContent = "Recipe removed from your Bookmark !";
        message.style.display = "block";
        bookMark.classList.remove("fa-solid");
        bookMark.classList.add("fa-regular");
        setTimeout(hideMessage ,2000,message);
    }
})