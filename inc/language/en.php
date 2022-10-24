<?php

    function value_of($key){
        // global $key ; 
        $rslt = array(
            // Main key words
            "blog" => "blog",
            


            // users Key words
            'ali' => 'ali',
            'anas' => 'anas',




            //navs words
            'welcome' => 'welcome',
            'linkedin' => 'linkedin',
            'github' => 'github',
            'cv'    => 'cv',
            'UserName' => 'user name',
            'most_rated' => 'most rated',
            'my_populer' => 'favourites',
            'profile' => 'profile',
            'my_posts' => 'my posts',
            'login' => 'login',
            'logout' => 'logout',
            'admin' => 'admin',

            //main page
            'crosl_itm_1' => 'Be hopeful',
            'crosl_prgf_1' =>'When things go wrong, don\'t go with them.' ,
            'crosl_itm_2' => 'Sunshine',
            'crosl_prgf_2' =>'Keep your face always toward the sunshine, and shadows will fall behind you' ,
            'crosl_itm_3' => 'Always be strong',
            'crosl_prgf_3' => 'Nothing is impossible, we can do what ever we want.',
            'publisher' => 'publisher',

            // login page
            'username' => 'username',
            'username_note' => 'Your user name should be unique one.',
            'password' => 'password' ,
            'signup' => 'signup',
            'signup_note' => 'do not have an account?',
            'signin' => 'signin',
            'signin_note' => 'you already have an account?',
            'passlognwrong' =>'<strong>password</strong> is Wrong',
            'usrlognwrong' =>'<strong>username</strong> is Wrong',
            'usremptywrong' =>'<strong>username</strong> is Empty',
            //register page
            'email' => 'email',
            'name' => 'full name'



        ); 
        $rslt[$key] = empty($rslt[$key])?'not defined':$rslt[$key];
        return $rslt[$key] ; 
    }

?>