/*
    Bouncing ball example: 
    function Ball(x,y,r) {
        this.x = x;
        this.y = y;
        this.r = r;
        this.d = 2*r;
        this.xVelocity = -4;
        this.yVelocity = 3;

        this.show = function() {
            color(255);
            ellipse(this.x, this.y, this.d, this.d);
        }
        this.move = function() {
            this.x += this.xVelocity;
            this.y += this.yVelocity;
            this.bounce();
        }
        this.bounce = function() {
            if(this.x - this.r <= 0 || this.x + this.r >= width) {
                this.xVelocity *= -1;
            }
            if(this.y - this.r <= 0 || this.y + this.r >= height) {
                this.yVelocity *= -1;
            }
        }
    }
*/
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
        D: 68
    },
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

        var radians = atan2(mouseY-userY, mouseX-userX);
        rotate(radians + HALF_PI);
        triangle(-playerSize, playerSize, playerSize, playerSize, 0, -playerSize);
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
        translate(bullet.x,bullet.y);
        rotate(bullet.angle);
        line(-bulletSize,0,bulletSize,bulletSize);
    });
}

//add bullets to the bullet array when left click is pressed
function shootBullet() {
    if(canShoot) {
        var radians = atan2(mouseY-userY, mouseX-userX);
        bullets.push({
            x: userX, 
            y: userY,
            angle: radians
        });
        canShoot = false;
        setTimeout(function(){
            canShoot = true;
        }, 200);
    }
}

//check controls that are pressed
function checkControls() {
    if(mouseIsPressed && mouseButton === LEFT) {
        shootBullet();
    }
    if(keyIsDown(KEYS.W)){ //w   i.e. up 
        userY -= 3;
    } 
    if(keyIsDown(KEYS.A)){//a  i.e. left
        userX -= 3;
    } 
    if(keyIsDown(KEYS.S)){//s   i.e. down
        userY += 3;
    }  
    if(keyIsDown(KEYS.D)){//d  i.e. right 
        userX += 3;
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