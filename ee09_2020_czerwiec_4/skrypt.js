function oblicz()
        {
            var pil = document.getElementById("1");
            var mask = document.getElementById("2");
            var masa = document.getElementById("3");
            var reg = document.getElementById("4");

            let cena = 0;

            if(pil.checked==true)
            {
                cena=cena+45;
            }
            
            if(mask.checked==true)
            {
                cena=cena+30;
            }
            
            if(masa.checked==true)
            {
                cena=cena+20;
            }
            
            if(reg.checked==true)
            {
                cena=cena+5;
            }

            document.getElementById("wynik").innerHTML=cena;
        }