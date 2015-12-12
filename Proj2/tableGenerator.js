/**
 * Created by drapek on 11.11.15.
 */

var rowsNumber = 0;
var colsNumber = 0;
var headerMemory = [];
var cellsMemory = [];

var namesDB = ["Jan", "Jakub", "Filip", "Michał", "Aleksander", "Szymon", "Igor", "Wiktor", "Sebastion", "Oliwier",
                "Maria", "Zofia", "Julia", "Amelia", "Helena", "Barbara", "Łucja", "Anna", "Joanna", "Kaja"];
var surnameDB = ["Adamczyk", "Biernart", "Cembrzyńska", "Chodzińska", "Cudna", "Dąbrowska", "Dębska", "Domańska",
                 "Dróżdż", "Drygiel", "Filpczka", "Frączkiewicz", "Fronc", "Gadomska", "Głowka", "Grązka", "Grzesińska",
                 "Jarzębska", "Kaczmarczyk", "Kędra", "Kłos", "Kowalczyk", "Królik", "Kuć", "Lusińska", "Oklasińska", "Olkowicz" ];

window.onload = updateRowsNumber;
function updateRowsNumber() {
    rowsNumber = parseInt(document.getElementById("rowsNumber").value);
    console.log("Wybrano table o " + rowsNumber + " wierszach.")
}

function makeButtonDodajKol() {
    return "<button id=\"newColumnMaker\" onclick='dodajKolumne()' >Dodaj</button>";
}

function makeTableHeader() {
    var headerRow = "<tr id=\"row0\"> <th id=\"th0\"> Lp</th> <th id=\"th1\" >Imię</th> <th id=\"th2\">Nazwisko</th> <th id=\"th3\">" + makeButtonDodajKol() + "</th> </tr>";
    return headerRow;
}

function generujTabele() {
    var tabela = document.getElementById("generowanaTabela");

    tabela.innerHTML = makeTableHeader();
    colsNumber = 4;

    for(var a = 1; a <= rowsNumber; a++) {
        tabela.innerHTML = tabela.innerHTML + "<tr id=\"row" + a + "\"> <td id=\"t" + a + ".0\">" + a + "</td> <td id=\"td" + a + ".1\">" + losujImie() + "</td> <td id=\"td" + a + ".2\"> " + losujNazwisko() + "</td> <td id=\"td" + a + ".3\"></td> </tr>";
    }
}


function dodajKolumne() {
    copyAllInputValues();

    var header = document.getElementById("row0");
    header.innerHTML = header.innerHTML + "<th id=\"th" + (colsNumber) + "\">" + makeButtonDodajKol() + "</th>";

    var prviousAddButton = document.getElementById("th" + (colsNumber - 1));
    prviousAddButton.innerHTML = "<input class=\"headerInput\" id=\"inpHead" + (colsNumber - 1) + "\" />";;

    for(var i = 1; i <= rowsNumber; i++) {
        //dodaje pustą kolumne na koniec
        var oneRow = document.getElementById("row" + i);
        oneRow.innerHTML = oneRow.innerHTML + " <td id=\"td" + i + "." + colsNumber + "\"></td>"

        //w poprzedniej kolumnie wsadza inputy
        var cellToMakeInput = document.getElementById("td" + i + "." + (colsNumber - 1));
        cellToMakeInput.innerHTML = "<input class=\"tableInput\" id=\"inp" + i + "." + (colsNumber - 1) + "\" />";
    }

    insertAllInpuValue();

    colsNumber++;
}

function copyAllInputValues() {
    for(var i = 3; i < colsNumber - 1; i++ ) {
        headerMemory[i] = document.getElementById("inpHead" + i).value;
    }

    console.log("Zapamiętane nagłówki: " + headerMemory);

    for(var i = 1; i <= rowsNumber; i++) {
        for(var j=3; j < colsNumber - 1; j++) {
            cellsMemory[i+"."+j] = document.getElementById("inp" + i + "." + j).value;
        }
    }

    console.log("Zapamiętane komórki: " + cellsMemory);
}

function insertAllInpuValue() {
    for(var i = 3; i < colsNumber - 1; i++ ) {
        document.getElementById("inpHead" + i).value = headerMemory[i];
    }

    for(var i = 1; i <= rowsNumber; i++) {
        for(var j=3; j < colsNumber - 1; j++) {
            document.getElementById("inp" + i + "." + j).value = cellsMemory[i+"."+j];
        }
    }
}

function losujImie() {
    return namesDB[Math.floor(Math.random()*namesDB.length)];
}

function losujNazwisko() {
    return surnameDB[Math.floor(Math.random()*surnameDB.length)];
}