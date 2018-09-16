window.onload = function() {

quantity = 40;
gravx = 0;
gravy = 0.3;
class Ball {
  constructor(r,posx,posy,velx,vely,accx,accy) {
    this.r = r;
    this.posx = posx;
    this.posy = posy;
    this.velx = velx;
    this.vely = vely;
    this.accx = accx;
    this.accy = accy;
    this.b = document.createElement('div');
    this.b.style.width = (this.r*2) + 'px';
    this.b.style.height = (this.r*2) + 'px';
    this.b.style.position = 'absolute';
    this.b.style.background = 'rgb('+(Math.random()*180+75)+','+(Math.random()*180+75)+','+(Math.random()*180+75)+')';
    this.b.style.borderRadius = '50%';
    document.body.appendChild(this.b);
  }
  addForce(fx,fy) {
    this.accx += fx;
    this.accy += fy;
  }
  update() {
    this.posx += this.velx;
    this.posy += this.vely;
    this.velx += this.accx;
    this.vely += this.accy;
    this.accx = 0;
    this.accy = 0;
    this.addForce(gravx,gravy);
    if (this.posx - this.r <= 250) {
      this.velx = Math.abs(this.velx)*0.983;
    } else if (this.posx + this.r >= 1100) {
		  this.velx = -Math.abs(this.velx)*0.983;
    }
    if (this.posy + this.r >= 550) {
      this.vely *= -0.983;
    }
  }
  draw() {
    this.b.style.left = this.posx + 'px';
    this.b.style.top = this.posy + 'px';
  }
}
var balls = {};
for (i=0;i<quantity;i++) {
  balls[i] = new Ball(20,Math.random()*200+500,Math.random()*50+100,Math.random()*20-10,Math.random()*10-5,0,0);
}
function updateBalls() {
  for (var i in balls) {
    balls[i].update();
    balls[i].draw();
  }
}
setInterval(updateBalls,30);

}