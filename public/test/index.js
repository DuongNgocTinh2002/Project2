const canvas = document.querySelector('canvas')

const context = canvas.getContext('2d')

canvas.width = 900
canvas.height = 680

class Ball {
    constructor(x, y, radius) {
        this.position = {x: x, y: y}
        this.radius = radius
        this.GRAVITY = 1.0
        this.velocity = {x: 0, y: 0}
        this.friction = 0.99
    }

    update() {
        if(this.position.y + this.radius + this.velocity.y <= canvas.height) {
            this.position.y += this.velocity.y

        }
        else {
            this.velocity.y *= -1 * this.friction
        }
        
        this.velocity.y += this.GRAVITY

        this.render()
    }

    render() {
        context.fillStyle ='red'
        context.beginPath()
        context.arc(this.position.x, this.position.y, this.radius, 0, 2 * Math.PI, false)
        context.stroke()
        context.fill()
        context.closePath()
    }
}

const ball = new Ball(100, 100, 50)
function animate() {
    context.clearRect(0, 0, canvas.width, canvas.height)

    ball.update()
    requestAnimationFrame(animate)
}

animate()