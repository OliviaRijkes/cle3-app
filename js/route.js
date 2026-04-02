const start = {x: 0, y: 0}
let goal = {x: 3, y: 6}
let walker = start
let xDif = goal.x - start.x
let yDif = goal.y - start.y
let step


//for each step the walker makes gets pushed to route
let route = []
calcRoute()

function calcRoute() {
    //first go y before x
    let stepAmount = Math.abs(xDif) + Math.abs(yDif)
    for (let i = 0; i < stepAmount; i++) {
        if (xDif > 0) {
            step = 'left'
        } else if (xDif < 0) {
            step = 'right'
        }
        if (yDif > 0) {
            step = 'up'
        } else if (yDif < 0) {
            step = 'down'
        }
        //step one forward and push position to route
        switch (step) {
            case 'up':
                walker.y++
                yDif--
                // route.push({...walker})
                break
            case 'down':
                walker.y--
                yDif++
                // route.push({...walker})
                break
            case 'left':
                walker.x++
                xDif--
                // route.push(walker)
                break
            case 'right':
                walker.x--
                xDif++
                // route.push(walker)
                break
            default:
                console.log('something happened in the route.js')
        }
        route.push({...walker})
    }
    console.log(route)
}
