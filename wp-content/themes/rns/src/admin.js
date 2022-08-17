import "./sass/admin/style.scss"



//Unlock xforwoo
setTimeout(() => {
    const lock_el = document.querySelector('#xforwoocommerce-page .svx-license')
    lock_el.classList.remove('locked')
}, 1500)
