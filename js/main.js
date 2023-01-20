var slideIndex = 1;
var cardIndex = 1;
var translateAmount = 0;
var theme = "dark";
var themeProperties = ['--bodybgcolor', '--breadcrumbbg', '--navbarbg', '--txtcolor', '--linkcolor', '--linkvisited', '--linkhovercolor', '--navlinkcolor', '--navlinkvisited', '--navlinkhovercolor', '--navlinkbg', '--themebg', '--themeborder', '--iconpos', '--logo', '--cardbg', '--cardLogobg', '--cardshadow', '--cardtxtcolor', '--breadcrumbsvg'];
var themeValues = [['#050505', '#181818', '#050505', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#1BDC88', '#f1f1f1', '#f1f1f1', '#1BDC88', '#5050504d', '#f1f1f1', '#1BDC88', 'left', 'url(../img/logo-sfondo-nero.webp)', '#181818', '#ffffff', '#141414', '#f1f1f1', 'invert(100%) sepia(100%) saturate(0%) hue-rotate(302deg) brightness(101%) contrast(102%)'], 
  ['#ffffff', '#ededed', '#ffffff', '#000000', '#000000', '#000000', '#1BDC88', '#000000', '#000000', '#1BDC88', '#ababab4d', '#000000', '#1BDC88', 'right', 'url(../img/logo-sfondo-bianco.webp)', '#ededed', '#e1e1e1', '#e1e1e1', '#000000', 'invert(0%) sepia(97%) saturate(14%) hue-rotate(160deg) brightness(103%) contrast(102%)']];

window.readyState(setupWindow());
document.readyState(setupPage());

function setupWindow() {
  sessionStorage.setItem('panelTheme', theme);
}

function setupPage() {
  alert(sessionStorage.getItem('panelTheme'));
}

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].classList.add("active");
}

function changeTheme() {
  localstTheme = sessionStorage.getItem('panelTheme');
  if (localstTheme == 'dark') {
    theme = 'light';
    setTheme('light');
  } else {
    theme = 'dark';
    setTheme('dark');
  }
}

function setTheme(theme) {
  if (theme == 'dark') {
    sessionStorage.setItem('panelTheme', theme);
    for (var i = 0; i < themeProperties.length; i++) {
      document.documentElement.style.setProperty(themeProperties[i], themeValues[0][i]);
    } /* attenzione alla posizione delle variabili globali, prima erano tra set theme e changeTheme, siccome change chiama set e le variabili erano dichiarate sotto change per change non esistevano ancora e crashava con metodo .lenght*/
  }
  if (theme == 'light') {
    sessionStorage.setItem('panelTheme', theme);
    for (var i = 0; i < themeProperties.length; i++) {
      document.documentElement.style.setProperty(themeProperties[i], themeValues[1][i]);
    }/**/
  }
}

/*document.scroll(function(){
  var y = this.scrollTop();
  window.alert(y);
  if(y > 200){
    document.getElementById("toTop").style.display = "block";
  }else{
    document.getElementById("toTop").style.display = "none";
  }
}); /*non va boh*/

function toTop(){
  window.scroll({top : 0, behavior : 'smooth'});
}

function toggleMenu(){ /*for hamburger menu*/
  var menu = document.getElementById("menus");
  var hamburger = document.getElementById("hamburger");
  if(menu.style.display == "flex"){
    menu.style.display = "none";
    hamburger.setAttribute("aria-expanded", "false");
  }else{
    menu.style.display = "flex";
    hamburger.setAttribute("aria-expanded", "true");
  }
}

function showCards(n){
  var cards = document.getElementsByClassName("partnerCard");
  cardIndex += n;
  if(cardIndex > cards.length){
    cardIndex = 1;
    translateAmount = 0;
    for (var i = 0; i < cards.length; i++){
      cards[i].style.transform = "translate(0px)";
    }
  } else if(cardIndex < 1){
    cardIndex = cards.length;
    translateAmount = (cards.length - 1) * 390;
    for (var i = 0; i < cards.length; i++){
      cards[i].style.transform = "translate(-" + translateAmount + "px)";
    }
  } else {
    translateAmount += n*390;
    for (var i = 0; i < cards.length; i++) {
      cards[i].style.transform = "translate(-"+translateAmount+"px)";
    }
  }
}

function showDescription() {
  
}
