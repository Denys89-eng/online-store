export function productsScript() {
    let btns = document.querySelectorAll('.product__btn')
    btns.forEach(function (elem) {
        elem.addEventListener('click', function (e) {
            e.preventDefault()


        })
    })
}