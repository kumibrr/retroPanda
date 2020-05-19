
function main(){
    let pupil_R = $('.pupil-r');
    let pupil_L = $('.pupil-l');
    let head = $('.p-head');
    let inputValue = 0;

    document.querySelectorAll('.form-control').forEach(item=>{
        item.addEventListener('focus',()=>{
            pupil_L.animate({
                left: '151px',
                top: '74px'
            },200);

            pupil_R.animate({
                left: '61px',
                top: '89px'
            },200);

            head.addClass('animateheadIn');
            setTimeout(()=>{
                head.addClass('pauseanimation');
            },200)
            
        });

        item.addEventListener('blur',()=>{
            head.removeClass('pauseanimation');
            setTimeout(()=>{
                head.removeClass('animateheadIn');
            },300)

            pupil_L.animate({
                left: '155px',
                top: '67px'
            },200);

            pupil_R.animate({
                left: '65px',
                top: '76px'
            },200);
            
        });

        item.addEventListener('input',(e)=>{
            let length = e.target.value.length;
            if (length > inputValue && length < 8){
                pupil_R.animate({
                    left: '+=' + 1 + 'px',
                    top: '+=' + 0.2 + 'px'
                },100);

                pupil_L.animate({
                    left: '+=' + 0.2 + 'px',
                    top: '+=' + 1 + 'px'
                },100);

            } else if(length > inputValue && length >= 4 && length < 24){
                pupil_L.animate({
                    left: '+=' + 1 + 'px'
                },100);
            } else if(length > inputValue){

            } else{
                pupil_R.animate({
                    left: '-=' + 1 + 'px',
                    top: '-=' + 0.2 + 'px'
                },100);
                pupil_L.animate({
                    left: '-=' + 1 + 'px',
                    top: '-=' + 0.2 + 'px'
                },100);
            }
            inputValue = length;
        });

    });

    document.querySelector('.modebtn').addEventListener('click',(e)=>{
        if($('.modebtn').hasClass('signupbtn')){
            $('.login-c').addClass('signup-c').removeClass('login-c');
            $('.login-form').addClass('signup-form').removeClass('login-form');
            $('.loginsubmitbtn').addClass('signupsubmitbtn').removeClass('loginbtn');
            $('.signupbtn').text('Log-in').addClass('loginbtn').removeClass('signupbtn');
            
            document.querySelectorAll('.retype').forEach(item=>{
                item.removeAttribute('hidden');
            });
        } else{
            $('.signup-c').addClass('login-c').removeClass('signup-c');
            $('.signup-form').addClass('login-form').removeClass('signup-form');
            $('.signupsubmitbtn').addClass('loginsubmitbtn').removeClass('signupsubmitbtn');
            $('.loginbtn').text('Sign-Up').addClass('signupbtn').removeClass('loginbtn');
            
            document.querySelectorAll('.retype').forEach(item=>{
                item.setAttribute('hidden',null);
            });
        }

        e.preventDefault();
    });

}

window.addEventListener('load',main);