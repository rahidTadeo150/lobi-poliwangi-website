const tombolDropdown = document.querySelector('#avatarProfil');
const tombolClose = document.querySelector('#closeButton');
const dropdownCard = document.querySelector('#dropdownOpsi');

tombolDropdown.addEventListener('click', () => {
    dropdownCard.classList.remove('hidden');
    dropdownCard.classList.toggle('block');
})
tombolClose.addEventListener('click', () => {
    dropdownCard.classList.toggle('hidden');
    dropdownCard.classList.remove('block');
})