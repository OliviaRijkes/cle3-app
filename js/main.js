let lookDirection
let position
let goal = {x: 0, y: 0}

let products
// let productSearch

window.addEventListener('load', init)

function init() {
    fetchStuff('http://cle3-app.test/webservice/', loadProducts)
    products = document.getElementById('products')
    products.addEventListener('click', productClickHandler)

}

function fetchStuff(url, callback) {
    fetch(url)
        .then((response) => {
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            return response.json();
        })
        .then(callback)
        .catch(fetchErrorHandler);
}

function fetchErrorHandler(data) {
    console.error(data);
}


function productClickHandler(e) {
    if (e.target.nodeName !== 'BUTTON') {
        return;
    }
    if (e.target.id === 'details') {
        fetchStuff(`http://cle3-app.test/webservice/?id=${e.target.dataset.id}`, loadDetails)
    }
    if (e.target.id === 'goal') {
        goal = [e.target.dataset.x, e.target.dataset.y]
        //turn the cpx locator on
    }
}

function loadProducts(data) {
    for (const product of data) {
        console.log(product)


        //fill the products
        const article = document.createElement('article')
        const img = document.createElement('img')
        const namePrice = document.createElement('div')
        const infoRoute = document.createElement('div')
        namePrice.id = "name-price"
        infoRoute.id = "info-route"
        const name = document.createElement('h2')
        const price = document.createElement('strong')
        const info = document.createElement('button')
        const route = document.createElement('button')
        info.id = "info"
        info.textContent = "info"
        route.id = "route"
        route.textContent = "route"

        img.src = `images/${product.image}`
        name.textContent = product.name
        price.textContent = product.price
        info.dataset.id = product.id
        route.dataset.category = product.category

        products.appendChild(article)
        article.appendChild(img)
        article.appendChild(namePrice)
        article.appendChild(infoRoute)
        namePrice.appendChild(name)
        namePrice.appendChild(price)
        infoRoute.appendChild(info)
        infoRoute.appendChild(route)
    }
}

function loadDetails(product) {
    //details pop-up
    //open the map
    //show location on map
}

//if the user hits an intersection
function showNewDirection() {
    //first go up||down


}

