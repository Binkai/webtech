function hauptFunction(){
             testeNamen();
             testePLZ();
             testeStadt();
             testeStrasse();
             testeHausnummer();
             testeIBAN();
             testeGeldbetrag();
            }
            function testeNamen(){
                var text = document.getElementById("name").value;
                var muster = /^[A-ZÄÖÜ][a-zäöüß]+([\-][A-ZÄÖÜ][a-zäöüß]+)?[\ ][A-ZÄÖÜ][a-zäöüß]*(['\-][A-ZÄÖÜ][a-zäöüß]+)?$/;
                if(muster.test(text)){
                   document.getElementById("deinnamenhabichgesagt").innerHTML = "Name erfolgreich";
                }
                else {
                   document.getElementById("deinnamenhabichgesagt").innerHTML = "Name nicht erfolgreich! Sie haben eingegeben: "+text +
                           " //Regeln Namen: A-Za-z und – erlaubt und für Nachname ' erlaubt. Nach Sonderzeichen oder Leerzeichen bitte Großbuchstabe. Bitte nur einen Vor-und Nachnamen angeben.";
                   
                } 
            }//end name
      
            function testePLZ(){
                  var text = document.getElementById("plz").value;
                  var muster = /^[0-9][0-9][0-9][0-9][0-9]$/;
                if(muster.test(text)){
                   document.getElementById("postcode").innerHTML = "PLZ erfolgreich";
                }
                else {
                   document.getElementById("postcode").innerHTML = "PLZ nicht erfolgreich! Sie haben eingegeben: "+text+
                           " //Regeln PLZ: Fünf Ziffern von 0 bis 9.";
                }
              }//end plz
              
            function testeStadt(){
                  var text = document.getElementById("stadt").value;
                  var muster = /^[A-ZÄÖÜ][a-zäöüß]+$/;
                if(muster.test(text)){
                   document.getElementById("city").innerHTML = "Stadt erfolgreich";
                }
                else {
                   document.getElementById("city").innerHTML = "Stadt nicht erfolgreich! Sie haben eingegeben: "+text+
                           " //Regeln Stadt:Mit Großbuchstabe anfangen und mit beliebig viele Kleinbuchstaben enden. Keine Sonder-oder Leerzeichen.";
                }
              }//end stadt
            function testeStrasse(){
                  var text = document.getElementById("straße").value;
                  var muster = /^[A-ZÄÖÜ][a-zäöüß]+([\.\ \-][A-ZÄÖÜ][a-zäöüß]+)?$/;
                if(muster.test(text)){
                   document.getElementById("street").innerHTML = "Straße erfolgreich";
                }
                else {
                   document.getElementById("street").innerHTML = "Straße nicht erfolgreich! Sie haben eingegeben: "+text+
                           " //Regeln Straße: Mit Großbuchstabe anfangen, Sonderzeichen: . und - und Leerzeichen erlaubt. Nach Sonderzeichen Großbuchstabe.";
                }
              }//end strasse
              
            function testeHausnummer(){
                  var text = document.getElementById("hausnummer").value;
                  var muster = /^[1-9][0-9]?[0-9]?[a-zA-Z]?$/;
                if(muster.test(text)){
                   document.getElementById("number").innerHTML = "Hausnummer erfolgreich";
                }
                else {
                   document.getElementById("number").innerHTML = "Hausnummer nicht erfolgreich! Sie haben eingegeben: "+text+
                           " //Regeln Hausnummer: Mind. eine Ziffer von 1 bis 9 am Anfag, höchstens 3 Ziffern und ein Buchstabe erlaubt.";
                }
              }//end hausnummer
              
            function testeIBAN(){
                  var text = document.getElementById("iban").value;
                  var muster = /^[A-Z][A-Z][0-9]{22}$/;
               if(muster.test(text)){
                   document.getElementById("ban").innerHTML = "IBAN erfolgreich";
                }
                else {
                   document.getElementById("ban").innerHTML = "IBAN nicht erfolgreich! Sie haben eingegeben: "+text+
                           " //Regeln IBAN: 2 Großbuchstaben am Anfang und 22 Ziffern von 0 bis 9 danach.";
                } 
              }//end iban
              
            function testeGeldbetrag(){
                  var text = document.getElementById("geldbetrag").value;
                  var muster = /^[0-9]+([\,\.][0-9][0-9]?)?$/;
                if(muster.test(text)){
                   document.getElementById("money").innerHTML = "Geldbetrag erfolgreich";
                }
                else {
                   document.getElementById("money").innerHTML = "Geldbetrag nicht erfolgreich! Sie haben eingegeben: "+text+
                           " //Regen Geldbetrag: Beliebig große Zahl, Sonderzeichen: . und , erlaubt und nach Sonderzeichen mind. eine Ziffer oder höchstens zwei.";
                }
              }//end geldbetrag
              