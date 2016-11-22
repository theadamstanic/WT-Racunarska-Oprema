
function provjeriime(string)
{
    var reg=/^[A-Za-z]+$/;
    if(string.match(reg))
    {
        return true;
    }
    else
        return false;
    
    
}

function provjeripassword(string)
{
    
    var regslova=/\w{1,}/;
    var regbrojevi=/\d{1,}/;
    
    if(string.length < 5)
        return false;
    
    
    if(string.match(regslova) && string.match(regbrojevi))
        return true;
    else
        {
        return false;
        }
}

function provjeriemail(string)
{
    var reg=/\w{1,}@\w{1,}(\.\w{1,}){0,}\.\w+/;
    var regmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(string.match(regmail))
        return true;
    else
        return false;
}

function provjeribroj(string)
{
    var reg=/^\d+$/;
    if(string.match(reg))
        return true;
    else
        return false;
}



function validirajformu(referenca)
{
    var ime=false;
    var prezime = false;
    var password = false;
    var email = false;
    var cijena_min = false;
    var cijena_max = false;
    var poruka = false;
    
    
    if(referenca.value=="Posalji")
        {
            ime = provjeriime(document.getElementById("ime_kontakt").value);
            prezime 
            =provjeriime(document.getElementById("prezime_kontakt").value);
            
            var porukatekst =
                document.getElementById("poruka_kontakt").value;
           
            if(porukatekst.length >=10)
                {
                    poruka=true;
                }
            else
                {
                    poruka = false;
                }
            
            
            
            
            if(!ime)
                {
                    document.getElementById("ime_kontakt").style.border="1px solid red";
                    
                    document.getElementById("ime_kontakt_error").style.display="block";
                    
                    
                    
                }
            else
                {
                    document.getElementById("ime_kontakt").style.border="1px solid rgb(100,167,77)";
                    
                    document.getElementById("ime_kontakt_error").style.display="none";
                }
            
            if(!prezime)
                {
                    document.getElementById("prezime_kontakt").style.border="1px solid red";
                    
                    document.getElementById("prezime_kontakt_error").style.display="block";
                }
            else
                {
                    document.getElementById("prezime_kontakt").style.border="1px solid rgb(100,167,77)";
                    
                    document.getElementById("prezime_kontakt_error").style.display="none";
                }
            if(!poruka)
                {
                    document.getElementById("poruka_kontakt").style.border="1px solid red";
                    
                    document.getElementById("poruka_kontakt_error").style.display="block";
                    return false;
                }
            else
                {
                    document.getElementById("poruka_kontakt").style.border="1px solid rgb(100,167,77)";
                
                    document.getElementById("poruka_kontakt_error").style.display="none";
                }
            
            
        }
    
    
    if(referenca.value=="GO")
        {
            cijena_min=provjeribroj(document.getElementById("cijena_min").value);
            
            cijena_max=provjeribroj(document.getElementById("cijena_max").value);
            
            if(cijena_max && cijena_min)
                {
                    if(parseInt(document.getElementById("cijena_max").value)< parseInt(document.getElementById("cijena_min").value))
                        {
                            cijena_max=false;
                            cijena_min=false;
                        }
                }
            
            if(!cijena_min)
                {
                    document.getElementById("cijena_min").style.border="1px solid red";
                    
                    document.getElementById("cijena_min_error").style.display="block";
                }
            else
                {
                    document.getElementById("cijena_min").style.border="1px solid rgb(100,167,77)";
                    
                    document.getElementById("cijena_min_error").style.display="none";
                }
            if(!cijena_max)
                {
                    document.getElementById("cijena_max").style.border="1px solid red";
                    
                    document.getElementById("cijena_max_error").style.display="block";
                }
            else
                {
                    document.getElementById("cijena_max").style.border="1px solid rgb(100,167,77)";
                    
                    document.getElementById("cijena_max_error").style.display="none";
                }
            
            
        }
    
    
    if(referenca.value=="Log in")
        {
            ime=provjeriime(document.getElementById("username_sign_in").value);
            password=provjeripassword(document.getElementById("password_sign_in").value);
            
            
            if(!ime)
                {
                    document.getElementById("username_sign_in").style.border="1px solid red";
                    
                     document.getElementById("username_sign_in_error").style.display="block";
                }
            else
                {
                    document.getElementById("username_sign_in").style.border="1px solid rgb(100,167,77)";
                    
                     document.getElementById("username_sign_in_error").style.display="none";
                }
            if(!password)
                {
                    document.getElementById("password_sign_in").style.border="1px solid red";
                
                    document.getElementById("password_sign_in_error").style.display="block";
                
                }
            else
                {
                    document.getElementById("password_sign_in").style.border="1px solid rgb(100,167,77)";
                    
                     document.getElementById("password_sign_in_error").style.display="none";
                
                }
            
            
        }
    
    
    if(referenca.value=="Sign up")
        {
            ime=provjeriime(document.getElementById("ime_sign_up").value);
             prezime=provjeriime(document.getElementById("prezime_sign_up").value);
            
             password=provjeripassword(document.getElementById("password_sign_up").value);
            
             email=provjeriemail(document.getElementById("email_sign_up").value);
            
            
            if(!ime)
        {
            document.getElementById("ime_sign_up").style.border="1px solid red";
            
            document.getElementById("ime_sign_up_error").style.display="block";
        }
            else
                {
                    document.getElementById("ime_sign_up").style.border="1px solid rgb(100,167,77)";
                
                 document.getElementById("ime_sign_up_error").style.display="none";
                }
    if(!prezime)
        {
            document.getElementById("prezime_sign_up").style.border="1px solid red";
            
             document.getElementById("prezime_sign_up_error").style.display="block";
        }
    else
        {
            document.getElementById("prezime_sign_up").style.border="1px solid rgb(100,167,77)";
        
         document.getElementById("prezime_sign_up_error").style.display="none";
        }
     if(!email)
        {
            document.getElementById("email_sign_up").style.border="1px solid red";
            
             document.getElementById("email_sign_up_error").style.display="block";
        }
    else
        {
            document.getElementById("email_sign_up").style.border="1px solid rgb(100,167,77)";
        
         document.getElementById("email_sign_up_error").style.display="none";
        }
     if(!password)
        {
            document.getElementById("password_sign_up").style.border="1px solid red";
            
             document.getElementById("password_sign_up_error").style.display="block";
        }
    else
        {
            document.getElementById("password_sign_up").style.border="1px solid rgb(100,167,77)";
             document.getElementById("password_sign_up_error").style.display="none";
        }
            
        }
    
}


