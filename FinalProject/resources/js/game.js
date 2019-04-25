
var canvas,
    canStart = false,
    gameHeight,
    gameWidth,
    isPaused = false,
    userX,
    userY,
    KEYS = {
        W: 87,
        A: 65,
        S: 83,
        D: 68,
        SPACE: 32
    },
    userDir = KEYS.W, //user direction
    playerSize = 20,
    bulletSpeed = 10,
    bullets = [],
    bulletSize = 10,
    canShoot = true;

function setup() {
    if(canStart) {
        canvas = createCanvas(gameWidth, gameHeight);
        // Move the canvas so it’s inside our <div id="sketch-holder">.
        canvas.parent("gameCanvas");
        background(0);
        userX = gameWidth/2;
        userY = gameHeight/2;
    }
}

function draw() {
    if(canStart && !isPaused) {
        clear();
        background(0);
        fill(255);
        checkControls();
        translate(userX, userY);

        var rotateAngle;
        switch(userDir) { //rotate based on direction
            case KEYS.W: 
                rotateAngle = 0;
                break;
            case KEYS.A: 
                rotateAngle = 270;
                break;
            case KEYS.S: 
                rotateAngle = 180;
                break;
            case KEYS.D: 
                rotateAngle = 90;
                break;
        }

        angleMode(DEGREES);
        rotate(rotateAngle);
        triangle(-playerSize, playerSize, playerSize, playerSize, 0, -playerSize);
        rotate(-rotateAngle); //rotate back before updating bullets
        updateBullets();
        drawBullets();
    }
}

//update the bullets on the screen
function updateBullets() {
    bullets.forEach(function(bullet) {
        
    });
}

//draw the bullets on the screen
function drawBullets() {
    strokeWeight(4);
    stroke(255);
    bullets.forEach(function(bullet) {
        translate(bullet.x, bullet.y);
        line(-bulletSize,0,bulletSize,bulletSize);
    });
}

//add bullets to the bullet array when left click is pressed
function shootBullet() {
    if(canShoot) {
        bullets.push({
            x: userX, 
            y: userY,
            dir: userDir
        });
        canShoot = false;
        setTimeout(function(){
            canShoot = true;
        }, 200);
    }
}

//check controls that are pressed
function checkControls() {
    if(keyIsDown(KEYS.SPACE)) {
        shootBullet();
    }
    if(keyIsDown(KEYS.W)){ //w   i.e. up 
        userY -= 3;
        userDir = KEYS.W;
    } 
    if(keyIsDown(KEYS.A)){//a  i.e. left
        userX -= 3;
        userDir = KEYS.A;
    } 
    if(keyIsDown(KEYS.S)){//s   i.e. down
        userY += 3;
        userDir = KEYS.S;
    }  
    if(keyIsDown(KEYS.D)){//d  i.e. right 
        userX += 3;
        userDir = KEYS.D;
    }
    checkBoundaries();
}

//check collisions with the screen boundaries
function checkBoundaries() {
    if(userX <= 0) { //collision with left barrier
        userX = gameWidth;
    } else if(userX >= gameWidth) { //collision with right barrier
        userX = 0;
    }

    if(userY <= 0) { //collision with top barrier
        userY = gameHeight;
    } else if (userY >= gameHeight) { //collision with bottom barrier
        userY = 0;
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
        background(0);
        userX = gameWidth/2;
        userY = gameHeight/2;

    });
    $("#startGame").on("click",function(){
        isPaused = !isPaused;
        $("#startGame").html(isPaused ? "Start" : "Pause");
    });
    $("#resetGame").on("click",function(){
        resetGame();
    });
});