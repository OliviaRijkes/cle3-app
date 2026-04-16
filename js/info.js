const infoButton = document.querySelector('.infoButton')
const header = document.querySelector('.header')
let infoSection
let infoSectionTitle
let infoSectionParagraph
let infoButtonStatus = false

window.addEventListener('load', init)
infoButton.addEventListener('click', infoButtonClickHandler)

function init() {
    infoSection = document.createElement("div")
    infoSectionTitle = document.createElement('h2')
    infoSectionParagraph = document.createElement('p')
}


function infoButtonClickHandler() {

    if (infoButtonStatus) {
        infoSectionTitle.textContent = ''
        infoSectionParagraph.textContent = ''


        infoButton.innerText = 'Ontdek meer!'
        infoButtonStatus = false
        return
    }


    infoSectionTitle.innerText = 'Onze drijfveer'
    infoSectionParagraph.innerText = 'Uit ons onderzoek is gebleken dat veel auditief beperkten nog erg veel last en moeite ervaren met het behalen van hun boodschappen. Met name in het bijzonder de communicatie. Wij hadden' +
        ' om dit op te lossen twee keuzes; de communicatie verbeteren of verminderen. Wij hebben dus gekozen om de communicatie te verminderen door middel van een webdienst te creëren.' +
        ' Ons doel was om ervoor te zorgen dat mensen met een auditieve beperking veel zelfstandiger boodschappen kunnen doen en zo veel minder afhankelijk zijn van communicatie.' +
        ' Zo zorgen we ervoor dat de winkelervaring prettiger wordt.  ' +
        ''

    infoSection.append(infoSectionTitle)
    infoSection.append(infoSectionParagraph)
    header.append(infoSection)
    infoButtonStatus = true
    infoButton.innerText = 'Sluiten'

}



