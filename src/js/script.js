const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
const imgContainer = document.querySelector('.aspect-ratio-169')
const dotItem = document.querySelectorAll(".dot")
let imgNumber = imgPosition.length;
let index = 0
imgPosition.forEach(function(image,index){
    image.style.left = index*100 + "%"
    dotItem[index].addEventListener("click", function() {
        slider(index)
    })
})
function imgSlide () {
    index++;
    if (index >= imgNumber) {
       index = 0
    }
    slider(index)
    
}
setInterval(imgSlide, 4000)
function slider (index) {
    imgContainer.style.left = "-" + index*100+ "%"
    const dotActive = document.querySelector('.active')
    dotActive.classList.remove("active")
    dotItem[index].classList.add("active")
}

const header = document.querySelector("header")
window.addEventListener("scroll", function(){
    x = window.pageYOffset
    if(x > 0) {
        header.classList.add("stick")
    } else {
        header.classList.remove("stick")
    }
})

//-------------------------------------------MenuClick--------------
const itemSlider = document.querySelectorAll(".category-left-li")
itemSlider.forEach(function(menu,index){
    menu.addEventListener("click", function() {
        menu.classList.toggle("block")
    })
})
//----------------------------------change image--------------------
const bigImg = document.querySelector(".product-content-left-main-img img")
const smallImg = document.querySelectorAll(".product-content-left-side-img img")
smallImg.forEach(function(imgItem, x){
   imgItem.addEventListener("click", function(){
    bigImg.src = imgItem.src
   })
})


//------------------------------------------detailbox------------
const detail = document.querySelector(".detail")
const shipping = document.querySelector(".shipping")
if(detail){
    detail.addEventListener("click", function(){
        document.querySelector(".product-table-shipping").style.display = "none"
        document.querySelector(".product-table-detail").style.display = "block"
    })
}
if(shipping){
    shipping.addEventListener("click", function(){
        document.querySelector(".product-table-shipping").style.display = "block"
        document.querySelector(".product-table-detail").style.display = "none"
    })
}
//slide
const button = document.querySelector(".product-content-right-bottom-top")
if(button) {
    button.addEventListener("click", function(){
        document.querySelector(".product-content-right-bottom-table").classList.toggle("activeArrow")
    })
}

