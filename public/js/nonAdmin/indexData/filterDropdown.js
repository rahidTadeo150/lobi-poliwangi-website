const tblDropdown = document.querySelector('.tblFilter');
const areaDropdown = document.querySelector('.filterDropdown');
const dropdownOpsi = document.querySelectorAll('.dropdownOpsi');
const valueForm = document.querySelector('.opsiDropdown');
const formFilter = document.querySelector('.formDropdown');

tblDropdown.addEventListener('click', () => {
    areaDropdown.classList.toggle('active');
});
dropdownOpsi.forEach (dropdownOpsi => {
    dropdownOpsi.addEventListener('click', () => {
        valueForm.value = dropdownOpsi.innerText;
        console.log(valueForm.value);
        formFilter.submit;
    });
});


