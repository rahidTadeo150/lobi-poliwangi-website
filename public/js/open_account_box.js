const account_box_btn = document.querySelector('.account_box');
const opsi_account = document.querySelector('.opsi_account');

account_box_btn.addEventListener('click', function () 
{
    opsi_account.classList.toggle('active');
});