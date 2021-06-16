window.onload = pageLoaded;

function pageLoaded(){
  let exchangeBtn = document.getElementById("exchange");
  let cad = document.getElementById("money");
  let tokenInfo = document.getElementById("token-info");
  let hiddenCad = document.getElementById("money-2");
  let hiddenTokenInfo = document.getElementById("token-info-2");
  let coinIcon = document.getElementById("coin");
  let status = false;

  exchangeBtn.onclick = exchange;

  function exchange(){

    if(status === false){
      cad.style.display= "none";
      hiddenCad.style.display = "block";
      tokenInfo.style.display = "none";
      hiddenTokenInfo.style.display = "block";
      coinIcon.style.top = "7.3em";
      status = true;
    }else if(status === true){
      cad.style.display= "block";
      hiddenCad.style.display = "none";
      tokenInfo.style.display = "block";
      hiddenTokenInfo.style.display = "none";
      coinIcon.style.top = "14.3em;";
      status = false;
    }

    audio("http://commondatastorage.googleapis.com/codeskulptor-assets/week7-brrring.m4a");
  }

  function audio(url){
    new Audio(url).play();
  }
}