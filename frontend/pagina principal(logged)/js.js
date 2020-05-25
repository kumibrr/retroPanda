
function cambioVisibiliti(){
    var visibiliti = document.getElementsByClassName('cajaInvisible')[0];

    visibiliti.className="cajaVisible";
}

function main(){
    document.getElementById('btn').addEventListener('click',cambioVisibiliti)
}


window.addEventListener('load',main);