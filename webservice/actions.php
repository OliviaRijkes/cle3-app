<?php
$intersectionLocationsRaw = [
    "leftToRight" => [
        1, 2, 3
    ],
    "upToDown" => [
        1, 2, 3, 4, 5
    ]
];

$superMarketLocations = [];
foreach ($intersectionLocationsRaw["leftToRight"] as $xDirection) {
    $superMarketLocations["$xDirection"] = $intersectionLocationsRaw["upToDown"];
}
// location as: [x,y]

//these change when you enter (into the radius of) the intersectionPosition (changelocation)
//$lookDirection = "up";
//$location = [3,5];

//these change by changes on the app (changeGoal)
//$goal = [1,5];

//these happen when there is changelocation or changeGoal
//first go up than go left, afterward it gives left or right for the product position
//$goUp = $location[1]-$goal[1];
//$goLeft = $location[0]-$goal[0];

//if $goUp = negative -> go up in (left,right,forward) based of $lookDirection
//                      else down in (left,right,forward) based of $lookDirection
//if $goLeft = negative -> go right in (left,right,forward) based of $lookDirection
//                      else left in (left,right,forward) based of $lookDirection


$products = [
    [
        "id" => 1,
        "name" => "AH Penne Rigate",
        "size => 500g",
        "category" => "Pasta & Rijst",
        "price" => "1.25",
        "stock" => 12,
        "delivery" => "18-3-2026",
        "ingredients" => "• Energie: 268 kcal<br>• Vet: 8.5g <br>• Verzadigd Vet: 4.9g  <br>• Eiwitten: 56g",
        "image" => "AH Penne Rigate.jpg"
    ],
    [
        "id" => 2,
        "name" => "Lassie Toverrijst",
        "size => 750g",
        "category" => "Pasta & Rijst",
        "price" => "2.10",
        "stock" => 0,
        "delivery" => "17-3-2026",
        "ingredients" => "• Energie: 152 kcal<br>• Vet: 10.5g <br>• Verzadigd Vet: 6.9g  <br>• Eiwitten: 42g",
        "image" => "Lassie Toverrijst.jpg"
    ],

    // Snacks
    [
        "id" => 3,
        "name" => "Lay's Naturel Chips",
        "category" => "Snacks",
        "size => 200g",
        "price" => "1.89",
        "stock" => 20,
        "delivery" => "17-3-2026",
        "ingredients" => "• Energie: 212 kcal<br>• Vet: 10.5g <br>• Verzadigd Vet: 6.9g  <br>• Eiwitten: 22g <br> • Aardappelen<br>• Plantaardige oliën<br>• Zout",
        "image" => "Lays Naturel Chips.jpg"
    ],
    [
        "id" => 4,
        "name" => "AH Borrelnootjes",
        "size => 500g",
        "category" => "Snacks",
        "price" => "1.45",
        "stock" => 15,
        "delivery" => "19-3-2026",
        "ingredients" => "• Energie: 212 kcal<br>• Vet: 10.5g <br>• Verzadigd Vet: 6.9g  <br>• Eiwitten: 22g <br> • Pinda's<br>• Zetmeel<br>• Kruidenmix",
        "image" => "AH Borrelnootjes.jpg"
    ],

    // Drinken
    [
        "id" => 5,
        "name" => "Coca-Cola Original",
        "category" => "Drinken",
        "size => 1L",
        "price" => "2.49",
        "stock" => 50,
        "delivery" => "17-3-2026",
        "ingredients" => "•  Vet: 3.9g  <br>• Suiker: 80g <br>• Cafeïne",
        "image" => "Coca-Cola Original.jpg"
    ],
    [
        "id" => 6,
        "name" => "AH Appelsap",
        "size => 1L",
        "category" => "Drinken",
        "price" => "1.69",
        "stock" => 30,
        "delivery" => "17-3-2026",
        "ingredients" => "• 100% Appelsap uit concentraat <br>•  Vet: 2.9g  <br>• Suiker: 60g",
        "image" => "AH Appelsap 1L.jpg"
    ],

    // Vis & Kip
    [
        "id" => 7,
        "name" => "AH Kipfilet",
        "size => 600g",
        "category" => "Vis & Kip",
        "price" => "8.99",
        "stock" => 6,
        "delivery" => "17-3-2026",
        "ingredients" => "• Energie: 212 kcal<br>• Vet: 10.5g <br>• Verzadigd Vet: 6.9g  <br>• Eiwitten: 22g",
        "image" => "AH kipfilet 600g.jpg"
    ],
    [
        "id" => 8,
        "name" => "AH Wilde Zalmfilets",
        "size => 675g",
        "category" => "Vis & Kip",
        "price" => "7.49",
        "stock" => 4,
        "delivery" => "18-3-2026",
        "ingredients" => "• Energie: 100 kcal<br>• Vet: 1.5g <br>• Verzadigd Vet: 1g  <br>• Eiwitten: 30.5g",
        "image" => "AH Wilde Zalmfilets.jpg"
    ],

    // Fruit & Groente
    [
        "id" => 9,
        "name" => "Bananen",
        "size => 1 tros",
        "category" => "Fruit & Groente",
        "price" => "1.45",
        "stock" => 25,
        "delivery" => "17-3-2026",
        "ingredients" => "• Energie: 47 kcal<br>• Vet: 1.5g <br>• Eiwitten: 30.5g",
        "image" => "Bananen tros.jpg"
    ],
    [
        "id" => 10,
        "name" => "Komkommer",
        "size => 1 stuk",
        "category" => "Fruit & Groente",
        "price" => "0.85",
        "stock" => 40,
        "delivery" => "17-3-2026",
        "ingredients" => "• Energie: 47 kcal<br>• Vet: 1.5g <br>• Eiwitten: 30.5g",
        "image" => "Komkommer.jpg"
    ],

    [
        "id" => 11,
        "name" => "AH Paracetamol 500mg",
        "size => 50 tabletten",
        "category" => "Medicijnen",
        "price" => "1.59",
        "stock" => 10,
        "delivery" => "17-3-2026",
        "ingredients" => "• Nicotine: 200mg",
        "image" => "AH Paracetamol 500mg.jpg"
    ],
    [
        "id" => 12,
        "name" => "AH Ibuprofen 400mg",
        "size => 20 tabletten",
        "category" => "Medicijnen",
        "price" => "2.49",
        "stock" => 8,
        "delivery" => "20-3-2026",
        "ingredients" => "• Nicotine: 200mg ",
        "image" => "AH Ibuprofen 400mg.jpg"
    ],

    [
        "id" => 13,
        "name" => "AH Halfvolle melk",
        "size => 1,5L",
        "category" => "Melk & Yoghurt",
        "price" => "1.69",
        "stock" => 5,
        "delivery" => "17-3-2026",
        "ingredients" => "• Energie: 47 kcal<br>• Vet: 1.5g",
        "image" => "AH Halfvolle melk.jpg"
    ],
    [
        "id" => 14,
        "name" => "Griekse Yoghurt",
        "size => 1kg",
        "category" => "Melk & Yoghurt",
        "price" => "2.15",
        "stock" => 12,
        "delivery" => "• 17-3-2026",
        "ingredients" => "• Energie: 47 kcal<br>• Vet: 1.5g",
        "image" => "Griekse Yoghurt.jpg"
    ],
    [
        "id" => 15,
        "name" => "AH Rundergehakt",
        "size => 500g",
        "category" => "Vlees",
        "price" => "5.87",
        "stock" => 10,
        "delivery" => "17-3-2026",
        "ingredients" => "• 100% Rundvlees",
        "image" => "AH Rundergehakt 500g.jpg"
    ],
    [
        "id" => 16,
        "name" => "AH Spekreepjes gerookt",
        "size => 250g",
        "category" => "Vlees",
        "price" => "4.99",
        "stock" => 14,
        "delivery" => "18-3-2026",
        "ingredients" => "• Varkensvlees <br>• Zout",
        "image" => "AH Spekreepjes gerookt.jpg"
    ],
    [
        "id" => 17,
        "name" => "AH Roomijs vanille",
        "size => 1L",
        "category" => "Ijs",
        "price" => "2.79",
        "stock" => 15,
        "delivery" => "17-3-2026",
        "ingredients" => "• Slagroom<br>• Melk<br>• Vanille-aroma",
        "image" => "AH Roomijs vanille.jpg"
    ],
    [
        "id" => 18,
        "name" => "Magnum Almond",
        "size => 6 stuks",
        "category" => "Ijs",
        "price" => "6.99",
        "stock" => 8,
        "delivery" => "18-3-2026",
        "ingredients" => "• Melkchocolade<br>• Amandelen<br>• Vanille-ijs",
        "image" => "Magnum Almond.jpg"
    ]
];
/**
 * @return array
 */
function getProducts(): array
{
    global $products;
    return $products;

}

/**
 * @param $id
 * @return array|false
 */

//function getProductDetails($id): array|false
//{
//    global $products;
//
////    filter array
//
//    $product =
//    return $product;
//}

function getProductDetails($id): array|false
{
    global $products;

    foreach ($products as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }

    return false;
}







