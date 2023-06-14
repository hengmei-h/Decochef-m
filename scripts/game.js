
// const board = document.querySelector(".play-board");
// const scoreElement = document.querySelector(".score");
// const highScoreElement = document.querySelector(".high-score");

// const controls = document.querySelectorAll(".controls i");
// let gameOver = false;
// let foodX, foodY;
// let snakeX = 5, snakeY = 5;
// let velocityX = 0, velocityY = 0;
// let snakeBody = [];
// let setIntervalId;
// let score = 0;

// // Getting high score from the local storage
// let highScore = localStorage.getItem("high-score") || 0;
// highScoreElement.innerText = `High Score: ${highScore}`;

// const updateFoodPosition = () => {
//     // Passing a random 1 - 30 value as food position
//     foodX = Math.floor(Math.random() * 30) + 1;
//     foodY = Math.floor(Math.random() * 30) + 1;
// } 
// const handleGameOver = () => {
//     // Clearing the timer and reloading the page on game over
//     clearInterval(setIntervalId);
//     alert("Game Over! Press OK to replay...");
//     window.location.reload();
// }
// const changeDirection = e => {
//     // Changing velocity value based on key press
//     if(e.key === "ArrowUp" && velocityY != 1) {
//         velocityX = 0;
//         velocityY = -1;
//     } else if(e.key === "ArrowDown" && velocityY != -1) {
//         velocityX = 0;
//         velocityY = 1;
//     } else if(e.key === "ArrowLeft" && velocityX != 1) {
//         velocityX = -1;
//         velocityY = 0;
//     } else if(e.key === "ArrowRight" && velocityX != -1) {
//         velocityX = 1;
//         velocityY = 0;
//     }
// }
// // Calling changeDirection on each key click and passing key dataset value as an object
// controls.forEach(button => button.addEventListener("click", () => changeDirection({ key: button.dataset.key })));
// const initGame = () => {
//     if(gameOver) return handleGameOver();
//     let html = `<div class="food" style="grid-area: ${foodY} / ${foodX}"></div>`;
//     // Checking if the snake hit the food
//     if(snakeX === foodX && snakeY === foodY) {
//         updateFoodPosition();
//         snakeBody.push([foodY, foodX]); // Pushing food position to snake body array
//         score++; // increment score by 1
//         highScore = score >= highScore ? score : highScore;
//         localStorage.setItem("high-score", highScore);
//         scoreElement.innerText = `Score: ${score}`;
//         highScoreElement.innerText = `High Score: ${highScore}`;
//     }
//     // Updating the snake's head position based on the current velocity
//     snakeX += velocityX;
//     snakeY += velocityY;
    
//     // Shifting forward the values of the elements in the snake body by one
//     for (let i = snakeBody.length - 1; i > 0; i--) {
//         snakeBody[i] = snakeBody[i - 1];
//     }
//     snakeBody[0] = [snakeX, snakeY]; // Setting first element of snake body to current snake position
//     // Checking if the snake's head is out of wall, if so setting gameOver to true
//     if(snakeX <= 0 || snakeX > 30 || snakeY <= 0 || snakeY > 30) {
//         return gameOver = true;
//     }
//     for (let i = 0; i < snakeBody.length; i++) {
//         // Adding a div for each part of the snake's body
//         html += `<div class="head" style="grid-area: ${snakeBody[i][1]} / ${snakeBody[i][0]}"></div>`;
//         // Checking if the snake head hit the body, if so set gameOver to true
//         if (i !== 0 && snakeBody[0][1] === snakeBody[i][1] && snakeBody[0][0] === snakeBody[i][0]) {
//             gameOver = true;
//         }
//     }
//     board.innerHTML = html;
// }
// updateFoodPosition();
// setIntervalId = setInterval(initGame, 100);
// document.addEventListener("keyup", changeDirection);


//-----------------------------------------------------------------------------

// let grid = document.querySelector(".grid");
// let popup = document.querySelector(".popup");
// let playAgain = document.querySelector(".playAgain");
// let scoreDisplay = document.querySelector(".scoreDisplay");
// let left = document.querySelector(".left");
// let bottom = document.querySelector(".bottom");
// let right = document.querySelector(".right");
// let up = document.querySelector(".up");
// let width = 15;
// let currentIndex = 0;
// let appleIndex = 0;
// let currentSnake = [2, 1, 0];
// let direction = 1;
// let score = 0;
// let speed = 0.8;
// let setIntervalTime = 0;
// let interval = 0;


// document.addEventListener("DOMContentLoaded",function(){
//     document.addEventListener("keydown", controls);
//     createBoard();
//     startGame();
//     playAgain.addEventListener("click", replay);
// });

// function createBoard(){
//     popup.getElementsByClassName.display = "none";
//     for(let i = 0; i < 255; i++){
//         let div = document.createElement("div");
//         grid.appendChild(div);
//     }
// }

// function startGame(){
//     let squares = document.querySelectorAll(".grid div");
//     randomApple(squares);
//     direction = 1;
//     scoreDisplay.innerHTML = score;
//     intervalTime = 1000;
//     currentSnake = [2, 1, 0];
//     currentIndex = 0;
//     currentSnake.forEach((index) => squares[index].classList.add("snake"));
//     interval = setInterval(moveOutcome, intervalTime);
// }
// function moveOutcome(){
//     let squares = document.querySelectorAll(".grid div");
//     if(checkForHits(squares)){
//         alert("Game Over!");
//         popup.getElementsByClassName.display = "flex";
//         return clearInterval(interval);
//     }else{
//         moveSnake(squares);
//     }
// }

// function moveSnake(squares){
//     let tail = currentSnake.pop();
//     squares[tail].classList.remove("snake");
//     currentSnake.unshift(currentSnake[0] * direction);
//     eatApple(squares, tail);
//     squares[currentSnake[0]].classList.add("snake");
// }

// function checkForHits(squares){
//     if(
//         (currentSnake[0] + width >= width * width && direction === width) ||
//         (currentSnake[0] % width === width -1 && direction === 1) ||
//         (currentSnake[0] % width === 0 && direction === -1) ||
//         (currentSnake[0] - width <= 0 && direction === -width) ||
//         squares[currentSnake[0] + direction].classList.contains("snake")
//     ){
//         return true;
//     }else{
//         return false;
//     }  
// }

// function eatApple(squares, tail){
//     if(squares[currentSnake[0]].classList.contains("apple")){
//         squares[currentSnake[0]].classList.remove("apple");
//         squares[tail].classList.add("snake");
//         currentSnake.push(tail);
//         randomApple(squares);
//         score++;
//         scoreDisplay.textContent = score;
//         clearInterval(interval);
//         intervalTime - intervalTime * speed;
//         interval = setInterval(moveOutcome, intervalTime);
//     }
// }

// function randomApple(squares){
//     do{
//         appleIndex = Math.floor(Math.random() * squares.length);
//     }while(squares[appleIndex].classList.contains("snake"));
//     squares[appleIndex].classList.add("apple");
// }
// function control(e){
//     if(e.keyCode === 39){
//         direction = 1;
//     }else if(e.keyCode === 38){
//         direction = -width;
//     }else if(e.keyCode === 37){
//         direction = -1;
//     }else if(e.keyCode === 40){
//         direction = _width;
//     }
// }

// up.addEventListener("click", () => (direction = -width));
// bottom.addEventListener("click",() => (direction = +width));
// left.addEventListener("click", () => (direction = -1));
// right.addEventListener("click",() => (direction = 1));


// function replay() {
//     grid.innerHTML = "";
//     score = 0;
//     createBoard();
//     startGame();
//     popup.getElementsByClassName.display = "none";
// }



//-----------------------------------------------------------------------------



/*



If you want to learn how this game was made, check out this video, that walks through the main ideas: 

YouTube: https://youtu.be/TAmYp4jKWoM
Skillshare: https://skl.sh/3nudJ1o

Follow me on twitter for more: https://twitter.com/HunorBorbely



*/

window.addEventListener("DOMContentLoaded", function (event) {
    window.focus(); // Capture keys right away (by default focus is on editor)
  
    // Game data
    let snakePositions; // An array of snake positions, starting head first
    let applePosition; // The position of the apple
  
    let startTimestamp; // The starting timestamp of the animation
    let lastTimestamp; // The previous timestamp of the animation
    let stepsTaken; // How many steps did the snake take
    let score;
    let contrast;
  
    let inputs; // A list of directions the snake still has to take in order
  
    let gameStarted = false;
    let hardMode = false;

  
    // Configuration
    const width = 15; // Grid width
    const height = 15; // Grid height
  
    const speed = 200; // Milliseconds it takes for the snake to take a step in the grid
    let fadeSpeed = 5000; // milliseconds it takes the grid to disappear (initially)
    let fadeExponential = 1.024; // after each score it will gradually take more time for the grid to fade
    const contrastIncrease = 0.5; // contrast you gain after each score
    const color = "#CBAC8D"; // Primary color
  
    // Setup: Build up the grid
    // The grid consists of (width x height) tiles
    // The tiles take the the shape of a grid using CSS grid
    // The tile can represent a part of the snake or an apple
    // Each tile has a content div that takes an absolute position
    // The content can fill the tile or slide in or out from any direction to take the shape of a transitioning snake head or tail
    const grid = document.querySelector(".grid");
    for (let i = 0; i < width * height; i++) {
      const content = document.createElement("div");
      content.setAttribute("class", "content");
      content.setAttribute("id", i); // Just for debugging, not used
  
      const tile = document.createElement("div");
      tile.setAttribute("class", "tile");
      tile.appendChild(content);
  
      grid.appendChild(tile);
    }
  
    const tiles = document.querySelectorAll(".grid .tile .content");
  
    const containerElement = document.querySelector(".container");
    const noteElement = document.querySelector("footer");
    const contrastElement = document.querySelector(".contrast");
    const scoreElement = document.querySelector(".score");
  
    // Initialize layout
    resetGame();
  
    // Resets game variables and layouts but does not start the game (game starts on keypress)
    function resetGame() {
      // Reset positions
      snakePositions = [168, 169, 170, 171];
      applePosition = 100; // Initially the apple is always at the same position to make sure it's reachable
  
      // Reset game progress
      startTimestamp = undefined;
      lastTimestamp = undefined;
      stepsTaken = -1; // It's -1 because then the snake will start with a step
      score = 0;
      contrast = 1;
  
      // Reset inputs
      inputs = [];
  
      // Reset header
      contrastElement.innerText = `${Math.floor(contrast * 100)}%`;
      scoreElement.innerText = hardMode ? `H ${score}` : score;
  
      // Reset tiles
      for (const tile of tiles) setTile(tile);
  
      // Render apple
      setTile(tiles[applePosition], {
        "background-color": color,
        "border-radius": "50%"
      });
  
      // Render snake
      // Ignore the last part (the snake just moved out from it)
      for (const i of snakePositions.slice(1)) {
        const snakePart = tiles[i];
        snakePart.style.backgroundColor = color;
  
        // Set up transition directions for head and tail
        if (i == snakePositions[snakePositions.length - 1])
          snakePart.style.left = 0;
        if (i == snakePositions[0]) snakePart.style.right = 0;
      }
    }
  
    // Handle user inputs (e.g. start the game)
    window.addEventListener("keydown", function (event) {
      // If not an arrow key or space or H was pressed then return
      if (
        ![
          "ArrowLeft",
          "ArrowUp",
          "ArrowRight",
          "ArrowDown",
          " ",
          "H",
          "h",
          "E",
          "e"
        ].includes(event.key)
      )
        return;
  
      // If an arrow key was pressed then first prevent default
      event.preventDefault();
  
      // If space was pressed restart the game
      if (event.key == " ") {
        resetGame();
        startGame();
        return;
      }
  
      // Set Hard mode
      if (event.key == "H" || event.key == "h") {
        hardMode = true;
        fadeSpeed = 4000;
        fadeExponential = 1.025;
        noteElement.innerHTML = `Hard mode. Press space to start!`;
        noteElement.style.opacity = 1;
        resetGame();
        return;
      }
  
      // Set Easy mode
      if (event.key == "E" || event.key == "e") {
        hardMode = false;
        fadeSpeed = 5000;
        fadeExponential = 1.024;
        noteElement.innerHTML = `Easy mode. Press space to start!`;
        noteElement.style.opacity = 1;
        resetGame();
        return;
      }
  
      // If an arrow key was pressed add the direction to the next moves
      // Do not allow to add the same direction twice consecutively
      // The snake can't do a full turn either
      // Also start the game if it hasn't started yet
      if (
        event.key == "ArrowLeft" &&
        inputs[inputs.length - 1] != "left" &&
        headDirection() != "right"
      ) {
        inputs.push("left");
        if (!gameStarted) startGame();
        return;
      }
      if (
        event.key == "ArrowUp" &&
        inputs[inputs.length - 1] != "up" &&
        headDirection() != "down"
      ) {
        inputs.push("up");
        if (!gameStarted) startGame();
        return;
      }
      if (
        event.key == "ArrowRight" &&
        inputs[inputs.length - 1] != "right" &&
        headDirection() != "left"
      ) {
        inputs.push("right");
        if (!gameStarted) startGame();
        return;
      }
      if (
        event.key == "ArrowDown" &&
        inputs[inputs.length - 1] != "down" &&
        headDirection() != "up"
      ) {
        inputs.push("down");
        if (!gameStarted) startGame();
        return;
      }
    });
  
    // Start the game
    function startGame() {
      gameStarted = true;
      noteElement.style.opacity = 0;
      window.requestAnimationFrame(main);
    }
  
    // The main game loop
    // This function gets invoked approximately 60 times per second to render the game
    // It keeps track of the total elapsed time and time elapsed since last call
    // Based on that animates the snake either by transitioning it in between tiles or stepping it to the next tile
    function main(timestamp) {
      try {
        if (startTimestamp === undefined) startTimestamp = timestamp;
        const totalElapsedTime = timestamp - startTimestamp;
        const timeElapsedSinceLastCall = timestamp - lastTimestamp;
  
        const stepsShouldHaveTaken = Math.floor(totalElapsedTime / speed);
        const percentageOfStep = (totalElapsedTime % speed) / speed;
  
        // If the snake took a step from a tile to another one
        if (stepsTaken != stepsShouldHaveTaken) {
          stepAndTransition(percentageOfStep);
  
          // If it’s time to take a step
          const headPosition = snakePositions[snakePositions.length - 1];
          if (headPosition == applePosition) {
            // Increase score
            score++;
            scoreElement.innerText = hardMode ? `H ${score}` : score;
  
            // Generate another apple
            addNewApple();
  
            // Increase the contrast after each score
            // Don't let the contrast go above 1
            contrast = Math.min(1, contrast + contrastIncrease);
  
            // Debugging
            console.log(`Contrast increased by ${contrastIncrease * 100}%`);
            console.log(
              "New fade speed (from 100% to 0% in milliseconds)",
              Math.pow(fadeExponential, score) * fadeSpeed
            );
          }
  
          stepsTaken++;
        } else {
          transition(percentageOfStep);
        }
  
        if (lastTimestamp) {
          // Decrease the contrast based on the time passed an the current score
          // With a higher score the contrast decreases slower
          const contrastDecrease =
            timeElapsedSinceLastCall /
            (Math.pow(fadeExponential, score) * fadeSpeed);
          // Don't let the contrast drop below zero
          contrast = Math.max(0, contrast - contrastDecrease);
        }
  
        contrastElement.innerText = `${Math.floor(contrast * 100)}%`;
        containerElement.style.opacity = contrast;
  
        window.requestAnimationFrame(main);
      } catch (error) {
        // Write a note about restarting game and setting difficulty
        const pressSpaceToStart = "Press space to reset the game.";
        const changeMode = hardMode
          ? "Back to easy mode? Press the letter E."
          : "Ready for hard more? Press the letter H.";
        const followMe =
          'Follow me <a href="https://twitter.com/HunorBorbely" , target="_blank">@HunorBorbely</a>';
        noteElement.innerHTML = `${error.message}. ${pressSpaceToStart} <div>${changeMode}</div> ${followMe}`;
        noteElement.style.opacity = 1;
        containerElement.style.opacity = 1;
      }
  
      lastTimestamp = timestamp;
    }
  
    // Moves the snake and sets up tiles for the transition function so the transition function will be more effective (the transition function gets called more frequently)
    function stepAndTransition(percentageOfStep) {
      // Calculate the next position and add it to the snake
      const newHeadPosition = getNextPosition();
      console.log(`Snake stepping into tile ${newHeadPosition}`);
      snakePositions.push(newHeadPosition);
  
      // Start with tail instead of head
      // Because the head might step into the previous position of the tail
  
      // Clear tile, yet keep it in the array if the snake grows.
      // Whenever the snake steps into a new tile, it will leave the last one.
      // Yet the last tile stays in the array if the snake just grows.
      // As a sideeffect in case the snake just eats an apple,
      // the tail transitioning will happen on a this "hidden" tile
      // (so the tail appears as stationary).
      const previousTail = tiles[snakePositions[0]];
      setTile(previousTail);
  
      if (newHeadPosition != applePosition) {
        // Drop the previous tail
        snakePositions.shift();
  
        // Set up and start transition for new tail
        // Make sure it heads to the right direction and set initial size
        const tail = tiles[snakePositions[0]];
        const tailDi = tailDirection();
        // The tail value is inverse because it slides out not in
        const tailValue = `${100 - percentageOfStep * 100}%`;
  
        if (tailDi == "right")
          setTile(tail, {
            left: 0,
            width: tailValue,
            "background-color": color
          });
  
        if (tailDi == "left")
          setTile(tail, {
            right: 0,
            width: tailValue,
            "background-color": color
          });
  
        if (tailDi == "down")
          setTile(tail, {
            top: 0,
            height: tailValue,
            "background-color": color
          });
  
        if (tailDi == "up")
          setTile(tail, {
            bottom: 0,
            height: tailValue,
            "background-color": color
          });
      }
  
      // Set previous head to full size
      const previousHead = tiles[snakePositions[snakePositions.length - 2]];
      setTile(previousHead, { "background-color": color });
  
      // Set up and start transitioning for new head
      // Make sure it heads to the right direction and set initial size
      const head = tiles[newHeadPosition];
      const headDi = headDirection();
      const headValue = `${percentageOfStep * 100}%`;
  
      if (headDi == "right")
        setTile(head, {
          left: 0, // Slide in from left
          width: headValue,
          "background-color": color,
          "border-radius": 0
        });
  
      if (headDi == "left")
        setTile(head, {
          right: 0, // Slide in from right
          width: headValue,
          "background-color": color,
          "border-radius": 0
        });
  
      if (headDi == "down")
        setTile(head, {
          top: 0, // Slide in from top
          height: headValue,
          "background-color": color,
          "border-radius": 0
        });
  
      if (headDi == "up")
        setTile(head, {
          bottom: 0, // Slide in from bottom
          height: headValue,
          "background-color": color,
          "border-radius": 0
        });
    }
  
    // Transition head and tail between two steps
    // Called with every animation frame, except when stepping to a new tile
    function transition(percentageOfStep) {
      // Transition head
      const head = tiles[snakePositions[snakePositions.length - 1]];
      const headDi = headDirection();
      const headValue = `${percentageOfStep * 100}%`;
      if (headDi == "right" || headDi == "left") head.style.width = headValue;
      if (headDi == "down" || headDi == "up") head.style.height = headValue;
  
      // Transition tail
      const tail = tiles[snakePositions[0]];
      const tailDi = tailDirection();
      const tailValue = `${100 - percentageOfStep * 100}%`;
      if (tailDi == "right" || tailDi == "left") tail.style.width = tailValue;
      if (tailDi == "down" || tailDi == "up") tail.style.height = tailValue;
    }
  
    // Calculate to which tile will the snake step into
    // Throw error if the snake bites its tail or hits the wall
    function getNextPosition() {
      const headPosition = snakePositions[snakePositions.length - 1];
      const snakeDirection = inputs.shift() || headDirection();
      switch (snakeDirection) {
        case "right": {
          const nextPosition = headPosition + 1;
          if (nextPosition % width == 0) throw Error("The snake hit the wall");
          // Ignore the last snake part, it'll move out as the head moves in
          if (snakePositions.slice(1).includes(nextPosition))
            throw Error("The snake bit itself");
          return nextPosition;
        }
        case "left": {
          const nextPosition = headPosition - 1;
          if (nextPosition % width == width - 1 || nextPosition < 0)
            throw Error("The snake hit the wall");
          // Ignore the last snake part, it'll move out as the head moves in
          if (snakePositions.slice(1).includes(nextPosition))
            throw Error("The snake bit itself");
          return nextPosition;
        }
        case "down": {
          const nextPosition = headPosition + width;
          if (nextPosition > width * height - 1)
            throw Error("The snake hit the wall");
          // Ignore the last snake part, it'll move out as the head moves in
          if (snakePositions.slice(1).includes(nextPosition))
            throw Error("The snake bit itself");
          return nextPosition;
        }
        case "up": {
          const nextPosition = headPosition - width;
          if (nextPosition < 0) throw Error("The snake hit the wall");
          // Ignore the last snake part, it'll move out as the head moves in
          if (snakePositions.slice(1).includes(nextPosition))
            throw Error("The snake bit itself");
          return nextPosition;
        }
      }
    }
  
    // Calculate in which direction the snake's head is moving
    function headDirection() {
      const head = snakePositions[snakePositions.length - 1];
      const neck = snakePositions[snakePositions.length - 2];
      return getDirection(head, neck);
    }
  
    // Calculate in which direction of the snake's tail
    function tailDirection() {
      const tail1 = snakePositions[0];
      const tail2 = snakePositions[1];
      return getDirection(tail1, tail2);
    }
  
    function getDirection(first, second) {
      if (first - 1 == second) return "right";
      if (first + 1 == second) return "left";
      if (first - width == second) return "down";
      if (first + width == second) return "up";
      throw Error("the two tile are not connected");
    }
  
    // Generates a new apple on the field
    function addNewApple() {
      // Find a position for the new apple that is not yet taken by the snake
      let newPosition;
      do {
        newPosition = Math.floor(Math.random() * width * height);
      } while (snakePositions.includes(newPosition));
  
      // Set new apple
      setTile(tiles[newPosition], {
        "background-color": color,
        "border-radius": "50%"
      });
  
      // Note that the apple is here
      applePosition = newPosition;
    }
  
    // Resets size and position related CSS properties
    function setTile(element, overrides = {}) {
      const defaults = {
        width: "100%",
        height: "100%",
        top: "auto",
        right: "auto",
        bottom: "auto",
        left: "auto",
        "background-color": "transparent"
      };
      const cssProperties = { ...defaults, ...overrides };
      element.style.cssText = Object.entries(cssProperties)
        .map(([key, value]) => `${key}: ${value};`)
        .join(" ");
    }
  });

  
  


  

//-----------------------------------------------------------------------------
const canvas = document.getElementById("game");
const ctx = canvas.getContext("2d");

class SnakePart {
  constructor(x, y) {
    this.x = x;
    this.y = y;
  }
}

let speed = 7;

let tileCount = 20;
let tileSize = canvas.width / tileCount - 2;

let headX = 10;
let headY = 10;
const snakeParts = [];
let tailLength = 2;

let appleX = 5;
let appleY = 5;

let inputsXVelocity = 0;
let inputsYVelocity = 0;

let xVelocity = 0;
let yVelocity = 0;

let score = 0;

const gulpSound = new Audio("gulp.mp3");

//game loop
function drawGame() {
  xVelocity = inputsXVelocity;
  yVelocity = inputsYVelocity;

  changeSnakePosition();
  let result = isGameOver();
  if (result) {
    return;
  }

  clearScreen();

  checkAppleCollision();
  drawApple();
  drawSnake();

  drawScore();

  if (score > 5) {
    speed = 9;
  }
  if (score > 10) {
    speed = 11;
  }

  setTimeout(drawGame, 1000 / speed);
}

function isGameOver() {
  let gameOver = false;

  if (yVelocity === 0 && xVelocity === 0) {
    return false;
  }

  //walls
  if (headX < 0) {
    gameOver = true;
  } else if (headX === tileCount) {
    gameOver = true;
  } else if (headY < 0) {
    gameOver = true;
  } else if (headY === tileCount) {
    gameOver = true;
  }

  for (let i = 0; i < snakeParts.length; i++) {
    let part = snakeParts[i];
    if (part.x === headX && part.y === headY) {
      gameOver = true;
      break;
    }
  }

  if (gameOver) {
    ctx.fillStyle = "white";
    ctx.font = "50px Verdana";

    if (gameOver) {
      ctx.fillStyle = "white";
      ctx.font = "50px Verdana";

      var gradient = ctx.createLinearGradient(0, 0, canvas.width, 0);
      gradient.addColorStop("0", " magenta");
      gradient.addColorStop("0.5", "blue");
      gradient.addColorStop("1.0", "red");
      // Fill with gradient
      ctx.fillStyle = gradient;

      ctx.fillText("Game Over!", canvas.width / 6.5, canvas.height / 2);
    }

    ctx.fillText("Game Over!", canvas.width / 6.5, canvas.height / 2);
  }

  return gameOver;
}

function drawScore() {
  ctx.fillStyle = "white";
  ctx.font = "10px Verdana";
  ctx.fillText("Score " + score, canvas.width - 50, 10);
}

function clearScreen() {
  ctx.fillStyle = "black";
  ctx.fillRect(0, 0, canvas.width, canvas.height);
}

function drawSnake() {
  ctx.fillStyle = "green";
  for (let i = 0; i < snakeParts.length; i++) {
    let part = snakeParts[i];
    ctx.fillRect(part.x * tileCount, part.y * tileCount, tileSize, tileSize);
  }

  snakeParts.push(new SnakePart(headX, headY)); //put an item at the end of the list next to the head
  while (snakeParts.length > tailLength) {
    snakeParts.shift(); // remove the furthet item from the snake parts if have more than our tail size.
  }

  ctx.fillStyle = "orange";
  ctx.fillRect(headX * tileCount, headY * tileCount, tileSize, tileSize);
}

function changeSnakePosition() {
  headX = headX + xVelocity;
  headY = headY + yVelocity;
}

function drawApple() {
  ctx.fillStyle = "red";
  ctx.fillRect(appleX * tileCount, appleY * tileCount, tileSize, tileSize);
}

function checkAppleCollision() {
  if (appleX === headX && appleY == headY) {
    appleX = Math.floor(Math.random() * tileCount);
    appleY = Math.floor(Math.random() * tileCount);
    tailLength++;
    score++;
    gulpSound.play();
  }
}

document.body.addEventListener("keydown", keyDown);

function keyDown(event) {
  //up
  if (event.keyCode == 38 || event.keyCode == 87) {
    //87 is w
    if (inputsYVelocity == 1) return;
    inputsYVelocity = -1;
    inputsXVelocity = 0;
  }

  //down
  if (event.keyCode == 40 || event.keyCode == 83) {
    // 83 is s
    if (inputsYVelocity == -1) return;
    inputsYVelocity = 1;
    inputsXVelocity = 0;
  }

  //left
  if (event.keyCode == 37 || event.keyCode == 65) {
    // 65 is a
    if (inputsXVelocity == 1) return;
    inputsYVelocity = 0;
    inputsXVelocity = -1;
  }

  //right
  if (event.keyCode == 39 || event.keyCode == 68) {
    //68 is d
    if (inputsXVelocity == -1) return;
    inputsYVelocity = 0;
    inputsXVelocity = 1;
  }
}

drawGame();

