let x= 1 ;
let prev = document.querySelector(".prv");
let next= document.querySelector(".next");
let btn = document.querySelector(".nbr");
let tr = document.querySelectorAll(".plat");
function ascend(){
    //el for hathy bech yaffichi ell ba3dhom
    if (tr !== null && tr !== undefined) { // estar hatha mouhem barcha barcha barcha
        for (let i = (x-1)*9; i < x*9 && i < tr.length; i++) { // el 7aja elmouhem hna houwa ennou zedna i< tr.length w hathy 7aja mouhema barcha barcha
            tr[i].classList.toggle('hide');// elfaza mta3 ennk tna7i classes w tzid classe MOUCH 3ADIYA ****************************************************************
        }
    }
    //yakhfi elli KBALHOM
    // el boucle hathy bech ba3d ayeffichi elli ba3dhom yakhfi elli kanou eja mawjoudin :: FEKRA BAHY 3ALLEKHR !!!!!!!!
    if (tr !== null && tr !== undefined) { // estar hatha mouhem barcha barcha barcha
        for (let i = (x-2)*9; i < (x-1)*9 && i < tr.length; i++) { // el 7aja elmouhem hna houwa ennou zedna i< tr.length w hathy 7aja mouhema barcha barcha
            tr[i].classList.toggle('hide');// elfaza mta3 ennk tna7i classes w tzid classe MOUCH 3ADIYA ****************************************************************
        }
    }
}


function descent(){
    //yaffichi hathouma
    if (tr !== null && tr !== undefined) { // estar hatha mouhem barcha barcha barcha
        for (let i = (x-1)*9; i < x*9 && i < tr.length; i++) { // el 7aja elmouhem hna houwa ennou zedna i< tr.length w hathy 7aja mouhema barcha barcha
            tr[i].classList.toggle('hide');// elfaza mta3 ennk tna7i classes w tzid classe MOUCH 3ADIYA ****************************************************************
        }
    }
    // w yakhfi elli BA3DHOM
    if (tr !== null && tr !== undefined) {
        for (let i = (x)*9; i < (x+1)*9 && i < tr.length; i++) {
            tr[i].classList.toggle('hide');
        }
    }
}


function condition(){
    btn.innerHTML = `${x}`;
}
next.addEventListener("click", function() {
    if(x*4< tr.length){
        x++;
        condition();//tzid el compteur mta3 el page
        ascend();
    }
});
prev.addEventListener("click", function(){
    if (x>1){
        x--;
        condition();
        descent();
    }
})