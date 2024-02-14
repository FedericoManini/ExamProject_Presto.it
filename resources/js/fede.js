let fInnerTitle1 = document.querySelector('#fInnerTitle1')
let fInnerTitle2 = document.querySelector('#fInnerTitle2')
let fInnerTitle3 = document.querySelector('#fInnerTitle3')
let fInnerTitle4 = document.querySelector('#fInnerTitle4')

function firstEntry() {
    let tl = gsap.timeline();
    tl.to("#fInnerTitle1", {delay: 1, opacity: 1, display: 'block', duration: 0.25 })
        .to("#fInnerTitle1", {opacity: 0, display: 'none', duration: 0.25 })
        .to("#fInnerTitle2", {opacity: 1, display: 'block', duration: 0.25 })
        .to("#fInnerTitle2", {opacity: 0, display: 'none', duration: 0.25 })
        .to("#fInnerTitle3", {opacity: 1, display: 'block', duration: 0.25 })
        .to("#fInnerTitle3", {opacity: 0, display: 'none', duration: 0.25 })
        .to("#fInnerTitle4", {opacity: 1, display: 'block', duration: 0.25 })
        /* .from("#bgHeader", { background: "transparent", duration: 0.5 }) */
        /* .from("#bgHeader", { background: "rgba(0, 0, 0, 0)", duration: 0.5 }) */
        .from("#fHeaderLogo", {opacity:0, duration: 0.5},"<")
        .from("#titleHeader", { color: "black", duration: 0.25 }, "<")
        .from("#fInnerTitle4", { color: "black", duration: 0.25 }, "<")
        .from(".fDisplayRoute", { y:10,opacity: 0, duration: 0.5 })
        .from(".fList", { y:50,opacity: 0, duration: 0.5, stagger: 0.2 })
        .from("#fCardHomeInner", { y:50,opacity: 0, duration: 0.3, stagger: 0.1 },"<")

}

function secondEntry(){
    //Questa parte solo nella home e solo se non è partita la firstEntry.
    //di base serve a dare un minimo di movimento alla pagina anche se ci stiamo da un tot.
    gsap.from(".fDisplayRoute", { opacity: 0, y: 30, duration: 1, stagger: 0.23 })
    gsap.from(".fList",{opacity:0, y:30, duration: 1, stagger: 0.15})
}

if (!sessionStorage.getItem("loadedFirst") && fInnerTitle1 && fInnerTitle2 && fInnerTitle3 && fInnerTitle4) {
    firstEntry();
    sessionStorage.setItem("loadedFirst", "true");
}else{
    fInnerTitle4.style = "display: block; opacity: 1; color: var(--yel)";
    secondEntry();
}

/* fine timeline animazione di ingresso */



/* progress bar */
document.addEventListener('scroll', function () {
    updateProgressBar1();
});

function updateProgressBar1() {
    let idBar1 = document.querySelector('#idBar1')

    let altezzaRilevata = document.documentElement.scrollTop;
    let altezzaTotale = document.documentElement.scrollHeight;
    let altezzaEffettiva = altezzaTotale - document.documentElement.clientHeight;
    let scrollPercent = (altezzaRilevata / altezzaEffettiva) * 100;
    idBar1.style.width = scrollPercent + '%';
}



document.addEventListener('scroll', function () {
    updateProgressBar2();
});

function updateProgressBar2() {
    let idBar2 = document.querySelector('#idBar2')

    let altezzaRilevata = document.documentElement.scrollTop;
    let altezzaTotale = document.documentElement.scrollHeight;
    let altezzaEffettiva = altezzaTotale - document.documentElement.clientHeight;
    let scrollPercent = (altezzaRilevata / altezzaEffettiva) * 100;
    idBar2.style.width = scrollPercent + '%';
}

/* fine progress */

/* fAdvatage */

gsap.from(".fAdvantage", { scrollTrigger: "#fFadeAdv", y: 25, duration: 1, opacity:0, stagger: 0.3});
gsap.from(".fCardHome", { scrollTrigger: "#fCardHome", y: 25, duration: 1, opacity: 0, stagger: 0.3 });


/* Bottone Scroll to Top */

document.addEventListener("DOMContentLoaded", function () {
    var scrollToTopBtn = document.getElementById("scrollToTopBtn");
    window.addEventListener("scroll", function () {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollToTopBtn.style.opacity = "1";
        } else {
            scrollToTopBtn.style.opacity = "0";
        }
    });

    scrollToTopBtn.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});
