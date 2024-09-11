const UserLoginBtn = document.querySelector(".js-log-menu-btn");
const navToggleBtn = document.querySelector(".js-nav-toggle");
const deletePopUpBtn = document.querySelectorAll('.js-item-delete-btn');
const deleteYesBtn = document.querySelector('.js-yes-btn');
const deleteNoBtn = document.querySelector('.js-no-btn');



const loginMenu = document.querySelector(".js-login-menu");
const navMenu = document.querySelector(".js-mobile-nav");
const deletePopUp = document.querySelector('.js-delete-pop-up');
const popUpMessage = document.querySelector('.js-pop-up-message');



UserLoginBtn.addEventListener("click", () => {
  menuOpenCloser("display-off",loginMenu);
});

navToggleBtn.addEventListener("click", ()=>{
    menuOpenCloser("display-off",navMenu);
});





// delete pop using class
deletePopUpBtn.forEach((item)=>{
  item.addEventListener('click',(e)=>{
    e.preventDefault();
    const itemId = item.dataset.itemId;
    if(deletePopUp.classList.contains('display-off')){
      deletePopUp.classList.remove('display-off');
      popUpMessage.innerText =`Are you want to delete this item(${itemId}) ?`;

      deleteYesBtn.addEventListener('click',()=>{
        window.location.href = `../pages/delete-item.php?delete=${itemId}`;
      })

      deleteNoBtn.addEventListener('click',()=>{
        deletePopUp.classList.add('display-off');
      })

    }
    

  })
})


// toggle function
function menuOpenCloser(className, menuItem) {
  if (menuItem.classList.contains(className)) {
    menuItem.classList.remove(className);
  } else {
    menuItem.classList.add(className);
  }
}


//navbar-scroll-effect
let prevScrollpos = window.pageYOffset;
window.onscroll = function() {
let currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-80px";
  }
  prevScrollpos = currentScrollPos;
}



const newPw = document.getElementById("newPassword");
const comPw = document.getElementById("confirmPassword");
const signUpBtn = document.querySelector('.js-sing-up-btn');




//sign up password matching
signUpBtn.addEventListener('click',(e)=>{
  if(!(newPw.value == comPw.value) ){
    console.log('hknw')
    comPw.classList.add('error-outline')
    e.preventDefault();
  }
})


function openPaymentCard(){
  document.querySelector('.js-payment-card').style.display = 'block';
}



