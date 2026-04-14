window.addEventListener('load', init)
const start = {x: 4, y:1 }
const end = {x: 0, y: 0}
const translateMap = {
    xRoute: {
        x: [65, 140, 216, 292],
        y: [70, 170]
    },
    yRoute: [135, 135, 286, 286]
}
const catGoal = {
    pastaRijst:{},
    Snacks:{},
    Drinken:{},
    VisKip:{},
    GroenteFruit:{},
    Medicijnen:{},
    MelkYoghurt:{},
    Vlees:{},
    Ijs:{}



}
let walker = start
let xDif = end.x - start.x
let yDif = end.y - start.y
let map


//for each step the walker makes gets pushed to route
let route = []


function init() {
    calcRoute()
    map = document.getElementById('map')
    for (let i = 0; i < route.length-1; i++) {
        drawStep(route[i],route[i+1])

    }
}

function calcRoute() {
    route.push({...start})
    let stepAmount = Math.abs(xDif) + Math.abs(yDif)
    for (let i = 0; i < stepAmount; i++) {
        if (walker.x === 1 && yDif !== 0 || walker.x === 3 && yDif !== 0) {
            // difference = goal - start
            if (yDif > 0) { //go down
                yDif--
                walker.y++
            } else if (yDif < 0) { //go up
                yDif++
                walker.y--
            }
        } else {
            if (xDif > 0) { //right
                xDif--
                walker.x++
            } else if (xDif < 0) { //left
                xDif++
                walker.x--
            }
        }
        route.push({...walker})
    }
    console.log(route)
}

function drawStep(begin, finish) {
    const routeElement = document.createElement('div')
    if (begin.y !== finish.y && begin.x === finish.x) {
        //up or down
        let direction = finish.y - begin.y
        routeElement.classList.add('yRoute')
        routeElement.style.top = '75px'
        routeElement.style.left = `${translateMap.yRoute[begin.x]}px`
    } else {
        if (begin.y === finish.y && begin.x !== finish.x) {
            //left or right
            let direction = finish.x - begin.x
            routeElement.classList.add('xRoute')
            if (direction === 1) {
                //right
                routeElement.style.top = `${translateMap.xRoute.y[begin.y]}px`
                routeElement.style.left = `${translateMap.xRoute.x[begin.x]}px`
            } else if(direction === -1){
                //left
                routeElement.style.top = `${translateMap.xRoute.y[finish.y]}px`
                routeElement.style.left = `${translateMap.xRoute.x[finish.x]}px`
            }
        }
    }
    console.log(translateMap.xRoute.x[begin.x])
    map.appendChild(routeElement)
}

function loadRoute() {
    calcRoute()
    map = document.getElementById('map')
    for (let i = 0; i < route.length-1; i++) {
        drawStep(route[i],route[i+1])

    }
}
