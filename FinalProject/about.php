<?php
    $current_page = "about";
    include 'partials/header.php'; ?>
    
    <div class="container">
        <div class="row">
            <div id="aboutHeader" class="col-6 mx-auto">
                <h1>About The Game</h1>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <h2 class="card-header p-2 underline">Story</h2>
                    <div class="card-body">
                        <p class="text-center about-us-text">
                            You are a galatic federation ship caught in the middle of enemy territory. They are coming from every direction. It's like there is a new enemy every 3 seconds! Fight off the red enemy blobs to the best of your ability.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <h2 class="card-header p-2 underline">Controls</h2>
                    <div class="card-body">
                        <p class="text-center about-us-text">
                            To move use the <b>W</b>,<b>A</b>,<b>S</b>,<b>D</b> keys to move up, left, down, and right respectively. Use the <b>SPACE</b> bar to shoot. You can use the start/pause button to start and pause the game. If you get hit by one of the enemies you will die and the game will end. 
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <h2 class="card-header p-2 underline">Sources</h2>
                    <div class="card-body">
                        <p class="text-center about-us-text">
                            The game was built using the library <a href="https://p5js.org/">p5js</a> and the collision library <a href="https://github.com/bmoren/p5.collide2D">p5collide</a>. All other game assets are original. The page is styled using <a href="https://getbootstrap.com/docs/4.0/getting-started/introduction/">Bootstrap 4</a> with <a href="https://jquery.com/">jQuery</a> and <a href="https://angular.io/">Angular</a>. 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="/FinalProject/resources/js/master.js"></script>
<?php include 'partials/footer.php'; ?>