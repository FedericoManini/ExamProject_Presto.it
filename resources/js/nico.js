// DETTAGLIO CARD 

const previewsDiv = document.getElementById("previews")
const bigPictureDiv = document.getElementById("bigPicture")
const littlePic = document.querySelectorAll(".preview")

function setImage(event) {
    const previewSrc = event.target.src
    bigPictureDiv.src = previewSrc
    console.log(event.target.src)
}

if (littlePic) {
    littlePic.forEach((pic)=>{
        pic.addEventListener("mouseover", setImage)
    })
}


// let imgs = [
//     "https://picsum.photos/500",
//     "https://picsum.photos/500/700",
//     "https://picsum.photos/500/300",
//     "https://picsum.photos/200/300",
// ];

// if (previewsDiv){
// imgs.forEach((image, index)=> {
//     let img = document.createElement('img');
//     img.src = image
//     // console.log(img)
//     img.classList.add('preview')
//     previewsDiv.appendChild(img)
//     if (index === 0) {
//         bigPictureDiv.src = image
//     }
//     img.addEventListener("mouseover", setImage)
// });}
