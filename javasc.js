function funkcija()
{
    var tekst=document.getElementById("pretraga_tekst").value;
    alert(tekst);
}

function funkcijaPretraga()
{
    
    var tekst=document.getElementById("pretraga_tekst").value;
    
    var i=0;
    for(i=1;i<=8;i++)
        {
            var ime = "naziv" + " " + toString(i);
            
            
    

            var element=document.getElementById(tekst);
            if (typeof(element) != 'undefined' && element != null)
             {
                    alert("JEA");
                 return true;
                }
            }
    alert("naziv");
}