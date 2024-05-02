const areaDropdown = document.querySelector('.dropdownFilter');
const opsiDropdown = document.querySelectorAll('.opsiDropdown');
const typeFilter = document.querySelector('#typeFilter');
opsiDropdown[0].classList.toggle('active');
let currentDropdown = opsiDropdown[0];

tblDropdown.addEventListener('click', () => {
    areaDropdown.classList.toggle('active');
})
opsiDropdown.forEach (opsiDropdown => {
    opsiDropdown.addEventListener('click', () => {
        currentDropdown.classList.remove('active');
        opsiDropdown.classList.toggle('active');
        currentDropdown = opsiDropdown;
        typeFilter.value = opsiDropdown.innerText;
        console.log(typeFilter.value);
        areaDropdown.classList.remove('active');
    })
})