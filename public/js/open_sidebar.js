    let btn_menu_dashboard = document.querySelector('.sidebar_icon');
    let dashboard_field = document.querySelector('.sidebar_admin');
    let btn_close = document.querySelector('#close_sidebar');

    btn_menu_dashboard.onclick = function()
    {
        dashboard_field.classList.toggle('active')
    }

    btn_close.onclick = function()
    {
        dashboard_field.classList.remove('active')
    }