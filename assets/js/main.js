
    var wheight = $(window).outerHeight() ,
    nav_height = $(".first_nav").innerHeight()?$(".first_nav").innerHeight():0,
    header_height = $(".navbar").innerHeight() ; 
    $(".slider, .carousel-inner, .carousel-item").height( wheight - ( nav_height + header_height ) ) ; 
    console.log(nav_height) ; 


function re_size_page(){
    // Justify Slider Height
    var wheight = $(window).outerHeight() ,
        nav_height = $(".first_nav").innerHeight()?$(".first_nav").innerHeight():0,
        header_height = $(".navbar").innerHeight() ; 
    $(".slider, .carousel-inner, .carousel-item").height( wheight - ( nav_height + header_height ) ) ; 
}

$(".love_icon").on('click', function(){
    user_id = $(this).data('user_id') ; 
    post_id = $(this).data('post_id') ;
    mood = 'add' ; 
    if($(this).hasClass('favoruit')){
        mood = 'remove' ; 
    }
    $.ajax({
        url:"./handle_files/add_to_favoruits.php",
        method:"POST",
        data:{mood:mood, user_id:user_id, post_id:post_id}
    })
    
    $(this).toggleClass("favoruit") ; 

})

