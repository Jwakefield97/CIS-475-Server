var canvas,
    canStart = false,
    gameHeight,
    gameWidth;

function setup() {
    if(canStart) {
        canvas = createCanvas(gameWidth, gameHeight);
        // Move the canvas so it’s inside our <div id="sketch-holder">.
        canvas.parent("gameCanvas");
        background(255, 0, 200);
    }
}

function draw() {
    if(canStart) {
        if (mouseIsPressed) {
            fill(0);
        } else {
            fill(255);
        }
        ellipse(mouseX, mouseY, 80, 80);
    }
}

$(document).ready(function(){
    canStart = true;
    gameHeight = $(window).height()/1.5;
    gameWidth = $("#navWrapper").width();
    setup();
    $(window).resize(function() {
        gameHeight = $(window).height()/1.5;
        gameWidth = $("#navWrapper").width();
        resizeCanvas(gameWidth, gameHeight);
        background(255, 0, 200);

    });
    $("#startGame").on("click",function(){

    });
    $("#stopGame").on("click",function(){

    });
    $("#resetGame").on("click",function(){

    });
});