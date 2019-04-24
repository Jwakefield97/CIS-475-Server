var canvas,
    canStart = false,
    gameHeight,
    gameWidth,
    isPaused = true;

function setup() {
    if(canStart) {
        canvas = createCanvas(gameWidth, gameHeight);
        // Move the canvas so it’s inside our <div id="sketch-holder">.
        canvas.parent("gameCanvas");
        background(0);
    }
}

function draw() {
    if(canStart) {
        if(!isPaused) {
            if (mouseIsPressed) {
                fill(0);
            } else {
                fill(255);
            }
            ellipse(mouseX, mouseY, 80, 80);
        }
    }
}

function resetGame() {
    clear();
    background(0);
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
        isPaused = !isPaused;
        $("#startGame").html(isPaused ? "Start" : "Pause");
    });
    $("#resetGame").on("click",function(){
        resetGame();
    });
});