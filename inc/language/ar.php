<?php

    function value_of($key){
        // global $key ; 
        $rslt = array(
            // Main key words
            "blog" => "مدونة",


            // users Key words
            'ali' => 'علي',
            'anas' => 'انس',





            // navs words
            'welcome' => 'مرحبا',
            'linkedin' => 'لينكدان',
            'github' => 'جيت هب',
            'cv'    => 'السيرة الذاتية',
            'UserName' => 'اسم المستخدم',
            'most_rated' => 'الاعلي تقييما',
            'my_populer' => 'المفضلة',
            'profile' => 'حسابي',
            'my_posts' => 'مقالاتي',
            'login' => 'دخول',
            'logout' => 'خروج',
            'admin' => 'المستخدم الرئيسي',

            // main page
            'crosl_itm_1' => 'كن متفائل',
            'crosl_prgf_1' =>'عندما تذهب الاشياء في التجاه الخاطئ, لا تذهب معها.' ,
            'crosl_itm_2' => 'طلوع الشمس',
            'crosl_prgf_2' =>'اجعل وجهك ف اتجاه الشمس دائما,حينها ستتساقط الظلومات امامك.' ,
            'crosl_itm_3' => 'كن قويا دائما',
            'crosl_prgf_3' => 'لا يوجد شيئ مستحيل,نحن نفعل ما نريده دائما',
            'publisher' => 'الناشر',
            // login page
            'username' => 'اسم المستخدم',
            'username_note' => '.اسم المستخدم يجب ان بكون فريد.',
            'password' => 'الرقم السري' ,
            'signup' => 'تسجيل',
            'signup_note' => 'هل لديك حساب من قبل؟',
            'signin' => 'دخول',
            'signin_note' => 'لديك حساب بالفعل؟',
            //register page
            'email' => 'الايميل',
            'name' => 'الاسم الكامل'
            

        ); 
        $rslt[$key] = empty($rslt[$key])?"غير معروف":$rslt[$key];
        return $rslt[$key] ; 
    }

?>