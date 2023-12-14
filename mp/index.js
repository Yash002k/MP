let count = 0;

document.getElementById("increasebtn").onclick = function(){
    count+=1;
    document.getElementById("countLabel").innerHTML = count;
}