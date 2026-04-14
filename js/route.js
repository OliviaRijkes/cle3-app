// The coords at the entrance as beginning point for drawing the full route
const start = {x: 4, y: 1}

// The translateMap translates the basic coords of the route
// to the real placement of the routeElements in the map
// at drawstep()
const translateMap = {
    xRoute: {
        x: [65, 140, 216, 292],
        y: [70, 170]
    },
    yRoute: [135, 135, 286, 286]
}
// catGoal translates the category of the products to the location in the basic coords of the map
// at productClickhandler: route-code. It is given to loadRoute to give to calcRoute to be used finally
const catGoal = [
    {
        name: "pastaRijst",
        end: {x: 4, y: 1}
    }, {
        name: "Snacks",
        end: {x: 4, y: 1},
    }, {
        name: "Drinken",
        end: {x: 0, y: 0},
    }, {
        name: "VisKip",
        end: {x: 0, y: 0},
    }, {
        name: "GroenteFruit",
        end: {x: 0, y: 1},
    }, {
        name: "Medicijnen",
        end: {x: 2, y: 1},
    }, {
        name: "MelkYoghurt",
        end: {x: 2, y: 1},
    }, {
        name: "Vlees",
        end: {x: 0, y: 1},
    }, {
        name: "Ijs",
        end: {x: 2, y: 1},
    }, {
        name: "Pizza",
        end: {x: 2, y: 1},
    }, {
        name: "Verzorging",
        end: {x: 2, y: 0},
    }, {
        name: "Dierenvoeding",
        end: {x: 2, y: 0},
    }, {
        name: "Brood",
        end: {x: 4, y: 1},
    }, {
        name: "Alcohol",
        end: {x: 0, y: 0},
    }, {
        name: "Sanitair",
        end: {x: 2, y: 0},
    }, {
        name: "Koeling",
        end: {x: 2, y: 1}
    }
]
//walker walks the route. It is a position object, like start and end
let walker
//the differences in the position of the start and end
let xDif
let yDif
let map


//for each step the walker gets pushed to route
let route = []

function calcRoute(end) {
    //setting the walker at the start to reset to the start position
    walker = start
    //the differences gives the direction by it being positive or negative
    xDif = {...end}.x - start.x
    yDif = {...end}.y - start.y
    //the first step is the beginning
    route.push({...start})
    //determining the amount of steps need to be made
    let stepAmount = Math.abs(xDif) + Math.abs(yDif)
    for (let i = 0; i < stepAmount; i++) {
        //if the walker is at a position it can go possibly up or down
        //it will go up/down if there is a y difference, otherwise it shouldn't go.
        //else it will go left or right if there is an x difference
        if (walker.x === 1 && yDif !== 0 || walker.x === 3 && yDif !== 0) {
            if (yDif > 0) { //positive yDif means go down
                yDif--
                walker.y++
            } else if (yDif < 0) { //negative yDif means go up
                yDif++
                walker.y--
            }
        } else {
            if (xDif > 0) { //positive xDif means go right
                xDif--
                walker.x++
            } else if (xDif < 0) { //negative xDif means go left
                xDif++
                walker.x--
            }
        }
        route.push({...walker})
    }
}
//drawStep  uses the begin and finish position to draw the right routeElement
function drawStep(begin, finish) {
    const routeElement = document.createElement('div')
    //if it goes up or down and use the basic coords to get the real positions
    //else if it goes left or right
    if (begin.y !== finish.y && begin.x === finish.x) {
        //up or down
        routeElement.classList.add('yRoute')
        routeElement.style.top = '75px' //there is only one y position for a yRoute
        routeElement.style.left = `${translateMap.yRoute[begin.x]}px`
    } else {
        if (begin.y === finish.y && begin.x !== finish.x) {
            //left or right
            let direction = finish.x - begin.x
            routeElement.classList.add('xRoute')
            //it should draw from the left coords to get the right position
            if (direction === 1) { //positive means towards the right, negative the left
                //right
                routeElement.style.top = `${translateMap.xRoute.y[begin.y]}px`
                routeElement.style.left = `${translateMap.xRoute.x[begin.x]}px`
            } else if (direction === -1) {
                //left
                routeElement.style.top = `${translateMap.xRoute.y[finish.y]}px`
                routeElement.style.left = `${translateMap.xRoute.x[finish.x]}px`
            }
        }
    }
    map.appendChild(routeElement)
}
