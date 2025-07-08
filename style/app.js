const body = document.querySelector('body'),
sidebar = body.querySelector('nav'),
toggle = body.querySelector(".toggle"),
searchBtn = body.querySelector(".search-box"),
modeSwitch = body.querySelector(".toggle-switch"),
modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Clair"; 
        document.cookie = 'pref=Sombre; path=/; expires=' + date;
    }else{
        modeText.innerText = "Sombre";
        document.cookie = 'pref=Clair; path=/; expires=' + date;
        }
        
    });
    
    
function recupererCookie(nom){
        var nomRC = nom + "=";
        var ca = document.cookie.split(';');

        for(var i=0;i < ca.length; i++)
        {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);

        if (c.indexOf(nomRC) == 0)
        return c.substring(nomRC.length, c.length);
        }
        return "inconnu";
    }

var res=recupererCookie('pref');

function changecolor(color){
        if(color == 'Sombre'){
            modeText.innerText="Clair";
            body.classList.toggle("dark");
        }else{
            modeText.innerText="Sombre";
            
        }
    }    

if(document.cookie!=''){
    changecolor(res);
}else{
    document.cookie='pref=Clair; path=/; expires='+ datedel;
}
   
