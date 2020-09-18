<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>VIK TU</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css2?family=Karla:wght@700&display=swap" rel="stylesheet">
<!--font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
<div id="container">
<div id="logo"><img src="pics/vic.png" alt="VIK Media" longdesc="index.html" /></div>
<div id="content">
<h2>Home of the latest news and happenings</h2>
<h1>You have successfully subscribed</h1> 
<h3>We will contact you as soon as we begin</h3>
<h3><a href="index1.html">Click here to return to homepage</a></h3>

</div>

</div>

<canvas></canvas>

<!--email -->
<?php 
$email = $_POST["email"];

mail("subscribe@vikmedia.co.ke","New Subscriber",$email);
?>

<!--Javascript -->

<script>
const canvas = document.querySelector('canvas')
const ctx = canvas.getContext('2d')

canvas.width = window.innerWidth
canvas.height = window.innerHeight

let mouse = { x: 0, y: 0 }

function clearCanvas () {
  ctx.fillStyle = 'rgb(0, 0, 0)'
  ctx.fillRect(0, 0, canvas.width, canvas.height)
}

document.addEventListener('click', clearCanvas)

document.addEventListener('mousemove', e => {
  mouse = { x: e.clientX, y: e.clientY }
})

class Star {
  constructor (color = 'orange', radius = 5) {
    this.pos = mouse
    this.radius = radius
    this.color = color
    this.drag = Math.floor(Math.random() * 15 + 1) * 0.01
    this.lastMouse = this.pos
  }
  
  update () {
    this.lastMouse = this.pos
    this.pos = {
      x: this.lastMouse.x + (mouse.x - this.lastMouse.x) * this.drag,
      y: this.lastMouse.y + (mouse.y - this.lastMouse.y) * this.drag
    }
    
    this.draw()
  }
  
  draw () {
    ctx.strokeStyle = this.color
    ctx.lineWidth = this.radius
    ctx.lineCap = 'round'
    
    ctx.beginPath()
    ctx.moveTo(this.lastMouse.x, this.lastMouse.y)
    ctx.lineTo(this.pos.x, this.pos.y)
    ctx.stroke()
  }
}

const stars = [...Array(5)].map(star => new Star())

function run () {
  ctx.fillStyle = 'rgba(0, 0, 0, 0.1)'
  ctx.fillRect(0, 0, canvas.width, canvas.height)
  
  stars.forEach(star => star.update())
  
  requestAnimationFrame(run)
}

run(mouse)

</script>
</body>
</html>
