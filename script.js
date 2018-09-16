var movers;
var amount;
var gravity;
function setup() {
  let canvas = createCanvas(800, 800);
  canvas.parent('sketch-holder');
  noStroke();
  movers = [];
  amount = 50;
  gravity = createVector(0, 0.1);
  for (let i = 0; i < amount; i++) {
    movers[i] = new Mover(createVector(width/2, height/2), createVector(random(-4, 4), random(-4, 4)), 20, color(random(255), random(255), random(255)));
  }
}
function draw() {
  background(0);
  for (let i = 0; i < amount; i++) {
    movers[i].addForce(gravity);
    movers[i].update();
    movers[i].display();
  }
}
class Mover {
  constructor(pos, vel, rad, col) {
    this.pos = pos;
    this.vel = vel;
    this.acc = createVector(0, 0);
    this.rad = rad;
    this.col = col;
  }
  addForce(force) {
    this.acc.add(force);
  }
  update() {
    this.vel.add(this.acc);
    this.pos.add(this.vel);
    this.acc.mult(0);
    if (this.pos.x <= this.rad) {
      this.vel.x = Math.abs(this.vel.x);
    } else if (this.pos.x >= width - this.rad) {
      this.vel.x = -Math.abs(this.vel.x);
    }
    if (this.pos.y >= height - this.rad) {
      this.vel.y = -Math.abs(this.vel.y);
    }
  }
  display() {
    fill(this.col);
    ellipse(this.pos.x, this.pos.y, this.rad*2, this.rad*2);
  }
}
