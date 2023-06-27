
export function categoriesScript() {
    const categoryLinks = document.querySelectorAll('.category__item');
    const subcategoryList = document.querySelectorAll('.subcategory__list');
    categoryLinks.forEach(function (elem) {
        elem.addEventListener('mouseenter', function () {
        let childList =   elem.childNodes[3]
            childList.style.top = '10vh'
            childList.style.zIndex = '10'
        })
        elem.addEventListener('mouseleave', function () {
            let childList =   elem.childNodes[3]
            childList.style.top = '0'
            childList.style.zIndex = '-1'
        })

    })



}