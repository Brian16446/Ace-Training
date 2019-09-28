function show(){
    document.getElementById('sideNav').classList.add('active');
}

function hide(){
    document.getElementById('sideNav').classList.remove('active');
}

function showUserMenu(){
    if(document.getElementById('userMenu').style.display != 'block'){
        $("#userMenu").show();
    }else{
        $("#userMenu").hide();
    }
}