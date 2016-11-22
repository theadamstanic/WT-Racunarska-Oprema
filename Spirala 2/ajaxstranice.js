
function izbaciheader(string)
{
    var i=0;
    var pomocniniz=[];
    var streak = false;
    
    
    var reg=/"ram"/;
    var reg2=/<footer>/;
    var pozicija=string.search(reg);
    var pozicija_kraj=string.search(reg2);
    
    while(string[pozicija]!='<')
        pozicija--;
    
    pozicija--;
    
    pozicija_kraj--;
    
    
    
    
    
    
    
    return string.substring(pozicija,pozicija_kraj);
    
}
function ucitajstranicu(string)
{
   
    
    var htxp = new XMLHttpRequest();
                
                htxp.onreadystatechange = function()
                {
                    if(htxp.readyState==4 && htxp.status==200)
                        {
                            document.getElementById("okvir").innerHTML=izbaciheader(htxp.responseText);
                        }                

                }
                
                htxp.open("GET",string,true);
                htxp.send();
           
        
}


