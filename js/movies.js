window.onload = function (){
    let movielist = document.getElementById("movie");
    let romancebtn =document.getElementById("romancebtn");
    let actionbtn = document.getElementById("actionbtn");
    let kidbtn = document.getElementById("kidsbtn")
    let romance =document.getElementById("romance");
    let action = document.getElementById("action");
    let kids = document.getElementById("kids")
     romancebtn.onclick = function (){
        movielist.style.display = "none";
        romance.style.display = "block";
         action.style.display = "none";
         kids.style.display = "none";
}
    actionbtn.onclick = function (){
        movielist.style.display = "none";
        action.style.display = "block";
        romance.style.display = "none";
        kids.style.display = "none";
    }
    kidbtn.onclick = function (){
        movielist.style.display = "none";
        kids.style.display = "block";
        action.style.display = "none";
        romance.style.display = "none";
    }
}