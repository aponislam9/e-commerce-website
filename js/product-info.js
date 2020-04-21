
product_list = [
    {
        id: "1A",
        name: "Amalgam Fleece+Snyth",
        price: "$174.99",
        description: "An amalgamation of different materials stiched together to form the pertect hoodie.",
        src: "assets/Product-1-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        id: "2R",
        name: "Retro Walkers",
        price: "$89.99",
        description: "Comfortable yet stylish sneakers that take inspiration from the NES generation.",
        src: "assets/Product-2-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        id: "3D",
        name: "Deathlyhallow #3",
        price: "$49.99",
        description: "Cargo camo jogger for a all occasions, like a nice walk in the park or executing a stealth operation.",
        src: "assets/Product-3-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        id: "4F",
        name: "Featuring Teddy Roosevelt",
        price: "$19.99",
        description: "This hat has been constructed from recycled materials sourced from US national parks.",
        src: "assets/Product-4-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        id: "5G",
        name: "Graphic Design Is My Passion",
        price: "$74.99",
        description: "If you love graphic design then this is the shoe for you. It may look an Adidas shoe, but I promise you it's not :)",
        src: "assets/Product-5-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        id: "6P",
        name: "P.A.N.T.S.",
        price: "$79.99",
        description: "Plants, Animals and Nature are Transcendent Soldiers. What does that mean? Thats for us to know and you to find out!",
        src: "assets/Product-6-v0.png",
        image_href: "#",
        alt: ""
    },
    {
        id: "7S",
        name: "Subtle Arachnid",
        price: "$39.99",
        description: "The perfect accessory if you are looking to complete the perfect goth look. Also nice for Halloween.",
        src: "assets/Product-7-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        id: "8T",
        name: "Tactical Cubeta",
        price: "$29.99",
        description: "Trying to jump on the bucket hat trend? Are you going on a long sunny hike? Operating in a foreign country where you are banned due to you're connection to the Mafia? If you answer yes to any of these questions this hat is for you.",
        src: "assets/Product-8-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        id: "9T",
        name: "The Vest",
        price: "$54.99",
        description: "If you need more info on this product, then this isn't the vest for you. If you know you know.",
        src: "assets/Product-9-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        id: "10S",
        name: "Samurai",
        price: "$59.99",
        description: "Want to look cool while going out into the country to protect your feudal lord's land? Don't forget to wear this jacket.",
        src: "assets/Product-10-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        id: "11D",
        name: "Drifter",
        price: "$64.99",
        description: "Keep the sliding happen when you step out of the car with these shoes.",
        src: "assets/Product-11-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        id: "12G",
        name: "Godzilla",
        price: "$24.99",
        description: "What better way to represent the best generation of cars than to wear it on your shirt?",
        src: "assets/Product-12-v0.jpg",
        image_href: "#",
        alt: ""
    },
]

//Retrives local storage
var product = localStorage.getItem("textvalue")




var name = ""
var price = ""
var description = ""
var src = ""

window.onload = function() {
    updateVariables();
    // logInfo();
    updatePage();


  };


function updateVariables(){
//intializes the information
    for(var i=0;i<product_list.length; i++) {

        if (product === product_list[i].name){
            this.name = product_list[i].name;
            this.price = product_list[i].price;
            this.description = product_list[i].description;
            this.src = product_list[i].src;
        }
    }
}


function logInfo(){
    console.log(this.name)
    console.log(this.price)
    console.log(this.description)
}

function updatePage(){
    var name = document.getElementById("name");
    var description = document.getElementById("description");
    var price = document.getElementById("price");
    var img = document.getElementById("img")

    
    name.textContent = this.name;
    description.textContent = this.description;
    price.textContent = this.price;
    img.src = this.src


}



