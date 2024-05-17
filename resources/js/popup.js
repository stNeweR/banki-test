const links = document.querySelectorAll('#open-popup')
const popup = document.getElementById('popup')
const image = document.getElementById('image')

links.forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault()
        const imagePath = event.target.getAttribute('data-path')
        image.src = imagePath;
        popup.style.display = 'flex';
        console.log(imagePath)
    })

});
popup.addEventListener('click', (event) => {
    popup.style.display = 'none'
})
