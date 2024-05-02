const select_image = document.querySelector('.select_image')
const inputImage = document.querySelector('#dataImage')
const previewField = document.querySelector('#previewImage')

inputImage.addEventListener('change', function () 
{
    const foto = this.files[0]
    console.log(foto);
    const readImage = new FileReader();
    readImage.onload = () => {
        const imageUrl = readImage.result;
        previewImage.src = imageUrl;
    }
    readImage.readAsDataURL(foto);
})