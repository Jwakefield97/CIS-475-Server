
var canvas,
    canStart = false,
    gameHeight,
    gameWidth,
    isPaused = false,
    userX,
    userY,
    isAlive = true,
    KEYS = {
        W: 87,
        A: 65,
        S: 83,
        D: 68,
        SPACE: 32
    },
    userDir = KEYS.W, //user direction
    playerSize = 20,
    bulletSpeed = 15,
    bullets = [],
    bulletSize = 10,
    canShoot = true,
    enemies = [],
    enemySpawnTime = 1000,
    enemySpeed = 3,
    largeEnemySize = 50,
    smallEnemySize = 20,
    score = 0;

function setup() {
    if(canStart) {
        canvas = createCanvas(gameWidth, gameHeight);
        // Move the canvas so it’s inside our <div id="sketch-holder">.
        canvas.parent("gameCanvas");
        background(0);
        userX = gameWidth/2;
        userY = gameHeight/2;
        setInterval(function(){
            if(enemies.length < 15 && isAlive && !isPaused) {
                createEnemy();
            }
        },enemySpawnTime);
    }
}

function draw() {
    if(canStart && isAlive && !isPaused) {
        clear();
        background(0);
        fill(255);
        checkControls();
        stroke(0,0,255);
        switch(userDir) { //rotate based on direction
            case KEYS.W: 
                triangle(userX-20, userY, userX, userY-50, userX+20, userY);
                break;
            case KEYS.A: 
                triangle(userX-50, userY, userX, userY-20, userX, userY+20);
                break;
            case KEYS.S: 
                triangle(userX-20, userY, userX, userY+50, userX+20, userY);
                break;
            case KEYS.D: 
                triangle(userX+50, userY, userX, userY-20, userX, userY+20);
                break;
        }
        stroke(255);
        updateBullets();
        drawBullets();
        updateEnemies();
    } else if (!isAlive) {
        textSize(32);
        fill(255, 0, 0);
        text('YOU DIED!', gameWidth/2, gameHeight/2);
        console.log("game ended");
    }
    $("#scoreInput").val(score); //update score
}

//update enemy positions
function updateEnemies() {
    var validEnemies = [];
    enemies.forEach(function(enemy){
        if(enemy.isDead) {          //if enemy is dead draw the dead colors of the enemy
            fill(enemy.deadColors[0]);
            enemy.deadColors.shift();
        } else { 
            //update enemy location                   
            switch(enemy.dir){
                case KEYS.W: 
                    enemy.y -= enemy.speed;
                    break;
                case KEYS.A: 
                    enemy.x -= enemy.speed;
                    break;
                case KEYS.S: 
                    enemy.y += enemy.speed;
                    break;
                case KEYS.D: 
                    enemy.x += enemy.speed;
                    break;
            }
            if(enemy.dir === KEYS.A && enemy.x <= 0) { //collision with left barrier
                enemy.x = gameWidth;
            } else if(enemy.dir === KEYS.D && enemy.x >= gameWidth) { //collision with right barrier
                enemy.x = 0;
            }
        
            if(enemy.dir === KEYS.W && enemy.y <= 0) { //collision with top barrier
                enemy.y = gameHeight;
            } else if (enemy.dir === KEYS.S && enemy.y >= gameHeight) { //collision with bottom barrier
                enemy.y = 0;
            }
            fill(255,0,0);
        }
        if(!enemy.isDead || enemy.deadColors.length > 0) {
            validEnemies.push(enemy);
        }
        ellipse(enemy.x,enemy.y,enemy.size,enemy.size);

        var userPoly = [],
            collision = false;
        //check for user collision with enemy
        switch(userDir) { //rotate based on direction
            case KEYS.W: 
                userPoly[0] = createVector(userX-20,userY);
                userPoly[1] = createVector(userX,userY-50);
                userPoly[2] = createVector(userX+20,userY);
                break;
            case KEYS.A: 
                userPoly[0] = createVector(userX-50,userY);
                userPoly[1] = createVector(userX,userY-20);
                userPoly[2] = createVector(userX,userY+20);
                break;
            case KEYS.S: 
                userPoly[0] = createVector(userX-20,userY);
                userPoly[1] = createVector(userX,userY+50);
                userPoly[2] = createVector(userX+20,userY);
                break;
            case KEYS.D: 
                userPoly[0] = createVector(userX+50, userY);
                userPoly[1] = createVector(userX, userY-20);
                userPoly[2] = createVector(userX, userY+20);
                break;
        }
        collision = collideCirclePoly(enemy.x,enemy.y,enemy.size,userPoly);
        if(collision) {
            isAlive = false;
        }
    });
    enemies = validEnemies;
}

//create a new enemy
function createEnemy() {
    var dir = ([KEYS.W,KEYS.A,KEYS.D,KEYS.S])[int(random(0,3))],
        x = 0,
        y = 0;
    switch(dir){
        case KEYS.W: 
            x = random(largeEnemySize,gameWidth-largeEnemySize);
            y = gameHeight+largeEnemySize*2;
            break;
        case KEYS.A: 
            x = gameWidth+largeEnemySize*2;
            y = random(largeEnemySize,gameHeight-largeEnemySize);
            break;
        case KEYS.S: 
            x = random(largeEnemySize,gameWidth-largeEnemySize);
            y = 0-largeEnemySize*2;
            break;
        case KEYS.D: 
            x = 0-largeEnemySize*2;
            y = random(largeEnemySize,gameHeight-largeEnemySize);
            break;
    }
    enemies.push({
        x: x,
        y: y,
        dir: dir,
        size: largeEnemySize,
        speed: enemySpeed,
        isDead: false,
        deadColors: [255,230,220,215,200,175,150,120,110,100,90,50,25,15,5,0]
    });
}

//update the bullets on the screen
function updateBullets() {
    var validBullets = [];
    bullets.forEach(function(bullet) {
        switch(bullet.dir) { //rotate based on direction
            case KEYS.W: 
                bullet.y -= bulletSpeed;
                break;
            case KEYS.A: 
                bullet.x -= bulletSpeed;
                break;
            case KEYS.S: 
                bullet.y += bulletSpeed;
                break;
            case KEYS.D: 
                bullet.x += bulletSpeed;
                break;
        }

        if(!(bullet.x <= 0) && !(bullet.x >= gameWidth) && !(bullet.y <= 0) && !(bullet.y >= gameHeight)) { //collision with left barrier
            validBullets.push(bullet);
        }
        enemies.forEach(function(enemy){
            var collision = false; 
            if(bullet.dir === KEYS.W || bullet.dir === KEYS.S) { //draw vertical line
                collision = collideLineCircle(bullet.x,bullet.y,bullet.x,bullet.y+bulletSize,enemy.x,enemy.y,enemy.size);
            } else if (bullet.dir === KEYS.A || bullet.dir === KEYS.D) { //draw horizontal line
                collision = collideLineCircle(bullet.x,bullet.y,bullet.x+bulletSize,bullet.y,enemy.x,enemy.y,enemy.size);
            } 
            if(collision) {
                enemy.isDead = true;
                score++;
                updateScoreOnServer();
                return;
            }
        });
    });
    bullets = validBullets;
}

//draw the bullets on the screen
function drawBullets() {
    strokeWeight(4);
    stroke(0,0,255);
    bullets.forEach(function(bullet) {
        if(bullet.dir === KEYS.W || bullet.dir === KEYS.S) { //draw vertical line
            line(bullet.x,bullet.y,bullet.x,bullet.y+bulletSize);
        } else if (bullet.dir === KEYS.A || bullet.dir === KEYS.D) { //draw horizontal line
            line(bullet.x,bullet.y,bullet.x+bulletSize,bullet.y);
        }
    });
    stroke(255);
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
        userY -= 5;
        userDir = KEYS.W;
    } 
    if(keyIsDown(KEYS.A)){//a  i.e. left
        userX -= 5;
        userDir = KEYS.A;
    } 
    if(keyIsDown(KEYS.S)){//s   i.e. down
        userY += 5;
        userDir = KEYS.S;
    }  
    if(keyIsDown(KEYS.D)){//d  i.e. right 
        userX += 5;
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

//reset the game start
function resetGame() {
    clear();
    background(0);
    score = 0;
    enemies = []; 
    canShoot = true;
    bullets = [];
    userDir = KEYS.W;
    isAlive = true;
    userX = gameWidth/2;
    userY = gameHeight/2;
}

//send the new high score to server
function updateScoreOnServer() {

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