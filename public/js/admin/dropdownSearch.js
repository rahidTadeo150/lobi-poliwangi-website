const openDropdown = document.querySelector('#searchDropdown');
const optionCard = document.querySelector('#dropdownCard');
const typeSearch = document.querySelectorAll('#typeSearch');
const inputType = document.querySelector('#typeSearching');
console.log(openDropdown);

openDropdown.addEventListener('click', () => {
    optionCard.classList.remove('hidden');
    optionCard.classList.toggle('block');
})

typeSearch.forEach (typeSearch => {
    typeSearch.addEventListener('click', () => {
        optionCard.classList.remove('block');
        optionCard.classList.toggle('hidden');
        inputType.value = typeSearch.innerText;
        console.log(inputType.value);
    })
})