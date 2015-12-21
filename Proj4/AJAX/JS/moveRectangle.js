/**
 * Created by drapek on 21.12.15.
 */

var boundaryWidth;
var boundaryHeight;

var rectWidth;
var rectHeight;
var rectActualX;
var rectActalY;

var movemntDirectonX = 1;
var movemntDirectonY = 1;
var moveStepX = 1; //o ile px ma się przemieszczać kwadarat w danym obiegu pętli
var moveStepY = 1;

initBoundaryAndRectangleLimits();

document.onload = rectMoveAnimation();

function rectMoveAnimation() {
        setTimeout(movementRectangle, 500);
}



function initBoundaryAndRectangleLimits() {
    var element = document.getElementById('floatBounds');
    var style = window.getComputedStyle(element);

    boundaryWidth = parseInt(style.getPropertyValue('width'));
    boundaryHeight = parseInt(style.getPropertyValue('height'));

    console.log("Rozmary okna: [" + boundaryWidth +  ", " + boundaryHeight + "]");

    var element2 = document.getElementById('floatingRectangle');
    var style2 = window.getComputedStyle(element2);

    rectWidth = parseInt(style2.getPropertyValue('width'));
    rectHeight = parseInt(style2.getPropertyValue('height'));
    rectActualX = parseInt(style2.getPropertyValue('left'));
    rectActalY = parseInt(style2.getPropertyValue('top'));

    console.log("Rozmary prostokąta: [" + rectWidth +  ", " + rectHeight + "]");
    console.log("Pozycja startowa prostokąta: (" + rectActualX +  ", " + rectActalY + ")");
}

function movementRectangle() {
    var nextX = rectActualX + movemntDirectonX * moveStepX;
    var nextY = rectActalY + movemntDirectonY * moveStepY;

    setNewRectPosition(nextX, nextY);

    rectActualX = nextX;
    rectActalY = nextY;

    //console.log("   Nowa pozycja (" + nextX + ", " + nextY +  ")");

    if( ( nextX >= (boundaryWidth - rectWidth) ) || ( nextX <= 0 ))
        movemntDirectonX *= -1;

    if( ( nextY >= (boundaryHeight- rectHeight) ) || ( nextY <= 0 ) )
        movemntDirectonY *= -1;

    setTimeout(movementRectangle, 1);
}

function setNewRectPosition(x, y) {
    document.getElementById("floatingRectangle").style.left = x + "px";
    document.getElementById("floatingRectangle").style.top = y + "px";
}

function sleepFor( sleepDuration ){
    var now = new Date().getTime();
    while(new Date().getTime() < now + sleepDuration){ /* do nothing */ }
}