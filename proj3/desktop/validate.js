/**
 * Created by drapek on 09.11.15.
 */

function validateTestForm() {

    var errorSum = 0;

    //imie
    if (!nameOrSurname("name")) {
        setErrorPointer("name");
        errorSum++;
    } else {
        setOkPointer("name");
    }

    //nazwisko
    if (!nameOrSurname("surname")) {
        setErrorPointer("surname");
        errorSum++;
    } else
        setOkPointer("surname");

    //data urodzenia
    if (!validBirthDate()) {
        setErrorPointer("BirthDate");
        errorSum++;
    } else
        setOkPointer("BirthDate");

    //pesel
    if (!validPesel()) {
        setErrorPointer("pesel");
        errorSum++;
    } else
        setOkPointer("pesel");

    //plik
    if( !checkFileExtension() ) {
        setErrorPointer("file");
        errorSum++;
    } else
        setOkPointer("file");

    //przetwarzanie danych osobowych
    if( !checkedPersonalDataProcessing() ) {
        setErrorPointer("personal_data");
        errorSum++;
    } else
        setOkPointer("personal_data");


    if (errorSum == 0 ) {
        document.getElementById("testForm").submit();
    } else {
        console.log("Ilość wykrytych błędów: " + errorSum);
        return false;
    }


}

function setErrorPointer(nameOfWrongElem) {
    var pngIdRow = nameOfWrongElem + "_res";
    document.getElementById(pngIdRow).setAttribute("src", "images/form_warring.png");
}

function setOkPointer(nameOfElem) {
    var pngIdRow = nameOfElem + "_res";
    document.getElementById(pngIdRow).setAttribute("src", "images/form_ok.png");
}

function nameOrSurname(name) {
    var input = document.forms["testForm"][name].value;

    if( input == "" || input == null)
        return false;

    if( !(/^[A-Z]{1}[a-z]+$/.test(input)) )
        return false;

    return true;

}

function validPesel() {
    var input = document.forms["testForm"]["pesel"].value;

    if( input == "" || input == null)
        return false;

    if( !(/^[0-9]{11}$/.test(input)) )
        return false;

    if(!( isMonth(input.substring(2, 4)) && isDay(input.substring(4, 6))) )
        return false;

    return true;
}

function isMonth(string) {
    var month = parseInt(string);
    if( month < 1 || month > 12)
        return false;
    return true;
}


function isDay(string) {
    var day = parseInt(string);
    if( day < 1 || day > 31)
        return false;
    return true;
}

function isYear(string) {
    var year = parseInt(string);
    if( year < 1850 || year > 2015)
        return false;
    return true;
}

function validBirthDate() {
    var input = document.forms["testForm"]["BirthDate"].value;

    console.log("Przeczytana data to: " + input);

    if( input == "" || input == null)
        return false;

    var dateInArr = input.split(".");

    if( dateInArr.length != 3) {

        dateInArr = input.split("-");

        if(dateInArr.length != 3) {
            return false;
        }
    }

    //jeżeli pierwsza liczba jest rokiem, to wprowadzano dane z chrome i jego format jest nast rrrr-mm-dd
    if( isYear(dateInArr[0]) ) {
        if(isMonth(dateInArr[1]) && isDay(dateInArr[2])) {
            return true;
        }
        else {
            return false;
        }

    } else {
            if (!(isDay(dateInArr[0]) && isMonth(dateInArr[1]) && isYear(dateInArr[2])))
                return false;

            return true;
        }


}

function checkFileExtension() {
    var fileName = document.getElementById("fileForm").value;

    if(fileName === "")
        return true;

    console.log("Tak wygląda pole pliku: " + fileName);

    var splitedFileName = fileName.split(".");
    var lastElemSplit= splitedFileName[splitedFileName.length - 1];
    console.log("Rozszerzenie przesyłanego pliku: " + lastElemSplit);

    if (!( lastElemSplit == "png" || lastElemSplit == "jpg" || lastElemSplit == "jpeg" || lastElemSplit == "tif"  ))
        return false;

    return true;
}

function checkedPersonalDataProcessing() {
    if( document.getElementById("personal_data").checked )
        return true;
    else
        return false;
}

function calculateAge() {
    var now = new Date();
    var tmpDate = document.forms["testForm"]["BirthDate"].value;

    var tmpDateInArr = tmpDate.split(".");
    var inputDate = "";

    if( tmpDateInArr.length == 3) {
        var reorderTmpDate = tmpDateInArr[2] + "/" + tmpDateInArr[1] + "/" + tmpDateInArr[0];
        inputDate = new Date(reorderTmpDate);
        console.log("Przeczytana data z Mozilli (ew innej przegl): " + inputDate);

    } else {
        tmpDateInArr = tmpDate.split("-");
        if (tmpDateInArr.length == 3) {
            inputDate = new Date(tmpDate);
            console.log("Przeczytana data z Chrome: " + inputDate);
        } else {
            console.log("Mam problem z wyliczeniem wieku na podstawie pola daty urodzin!" + tmpDateInArr);
            return false;
        }
    }

    var differce = now.getTime() - inputDate.getTime();
    console.log("Różnica daty teraz z datą urodzin w milisekundach: " + differce);

    var differenceInYears = differce / (1000 * 60 * 60 * 24 * 365);

    document.getElementById("age").innerHTML = parseInt(differenceInYears);
}

/* aby po przeładowaniu strony zliczył znaki, gdy w polu komentarza pozostało coś po porzedniej sesji*/
window.onload = renewCommentFieldCounter;
function renewCommentFieldCounter() {
    var contentOfComment = document.getElementById("commentField").value;
    var commentLength = contentOfComment.length;
    document.getElementById("commentCounter").innerHTML = commentLength;
}

document.addEventListener('DOMContentLoaded',addDatePlaceHolderIfFirefox, false);

function addDatePlaceHolderIfFirefox() {
    if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1)
    {
        console.log("Wybrana przeglądarka to firefox");
        document.getElementById("BirthDate").setAttribute("placeholder", "dd.mm.rrrr");
    }
}