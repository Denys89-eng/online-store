export function cartScript() {
    let btnCart = document.querySelector('.btn-cart');
    let blockCart = document.querySelector('.block-cart');
    let closeCart = document.querySelector('.close-cart');


    btnCart.addEventListener('click', function () {
        blockCart.style.transition = '.2s'
        blockCart.style.transform = 'translateX(0)';
    })
    closeCart.addEventListener('click', function () {
        blockCart.style.transition = '.2s'
        blockCart.style.transform = 'translateX(100%)';
    })

}