# TAK23-Web-Final

Loodud lihtne CRUD leht kasutades MySQL PDO ühendust.

#Esmane seadistus

1. **config/simple.sql** Importida phpmyadmin abil endale sobivasse andmebaasi
2. **config/init.php** Seadistada real 47 andmebaasi ühendamiseks vajalikud andmed nagu andmebaasi host, andmebaasi kasutajanimi, parool ning tabeli nimi.

Terve veebilehe liiklus käib läbi **index.php** faili.

Avalehel **main.php** on näha READ osa ehk siis terve tabel. Tabel näitab vaikimisi 5 rida korraga.
Avalehele on lisatud juurde filtreerimis võimalus.
Filtreerida on võimalik nime, sünniaja, palga, pikkuse ja lisatud aja järgi. Lisaks on ka võimalik muuta kui mitut rida näitab lehel.
Tabelile on lisatud ka juurde leheküljendus, et saaks vaadata ka teisi ridu mida vaikimisi ei näidata tabelis.
Tabelis igale kirjele on lõppu lisatud UPDATE ja DELETE ikoonid.
UPDATE klõpsates viiakse **edit.php** lehele kus on võimalik olemas olevat kirjet muuta.
DELETE klõpsates küsitakse üle kas soovitakse antud kirjet kustutada ning nõustumisel kirje kustutatakse.
Tabeli päistel on ka sorteerimis funktsionaalsus lisatud. Sorteerimiseks tuleb lihtsalt klõpsata tabeli päise nimel.
Algväärtused nupp nullib kogu filtreerimise ning sorteerimise.
Uus isik nupp viib **add.php** lehele kus on võimalik lisada uus kirje.

Kõik CRUD funktsionaalsus on koondatud kokku **common.php** failis.

Erinevad php funktsioonid on koondatud kokku **functions.php** failis.

Javascript funktsioonid on koondatud kokku **js/default.js** failis.

Lisa stiilid on koondatud kokku **css/style.css** failis.

Erinevad lihtsad vidinad nagu näiteks filter, navbar ja pagination on koondatud kokku **assets/** kaustas 