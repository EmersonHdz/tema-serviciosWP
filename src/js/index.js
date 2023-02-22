function gymwordpress(){
    if(document.querySelector('.swiper')) {
        const opciones = {
            loop: true,
            controls: true,
            autoplay:{
                delay: 3000
            }
        }
        new Swiper('.swiper' , opciones);
    }

    // Wrap every letter in a span
var textWrapper = document.querySelector('.ml2');

if(textWrapper) {
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml2 .letter',
    scale: [4,1],
    opacity: [0,1],
    translateZ: 0,
    easing: "easeOutExpo",
    duration: 950,
    delay: (el, i) => 70*i
  }).add({
    targets: '.ml2',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
}

}

document.addEventListener('DOMContentLoaded', gymwordpress)

window.onscroll = () => {
    const scroll = window.scrollY;

    
    const headerNav = document.querySelector('.barra-navegacion');
    const documentBody = document.querySelector('body');

    // si la cantidad de escroll es mayor a, agregar una clase
    if(scroll > 300) {
        headerNav.classList.add('fixed-top');
        documentBody.classList.add('ft-activo');
    } else {
        documentBody.classList.remove('ft-activo');
        headerNav.classList.remove('fixed-top');
    }

}

jQuery(document).ready( $ =>  {
    $('.site-header .menu-principal .menu').slicknav({
        label: 'menu',
        appendTo: '.site-header'
});

});