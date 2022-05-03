const navHidden = document.querySelector('#burger');
const burger = document.querySelector('#mobileButton');
const body = document.querySelector('body');

const OpenMenuMobile = () => {
    console.log("open");
    burger.classList.add('canClose');
    //Show element
    navHidden.style.display = 'flex'
    body.style.position = 'fixed'

};
// export default OpenMenuMobile;

const CloseMenuMobile = () => {
    console.log("close");
    burger.classList.remove('canClose');
    //Delete flex
    navHidden.style.display = ''
    body.style.position = ''

};
// export default CloseMenuMobile;


const isOpen = () => {
    if (burger.classList.contains('canClose')) {
        CloseMenuMobile();
    } else {
        OpenMenuMobile();
    }
};

export default isOpen;