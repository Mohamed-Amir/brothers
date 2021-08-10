<?php
/**
 * @return string
 */
function getLogo(){
    return '/Fronted/img/logo.jpg';
}

/**
 * @param $image
 * @return mixed|string
 */
function getAdminImage($image){
    if($image)
        return getImageUrl('Admin',$image);
    return defaultImages(2);
}


function getNameInIndexPage(){
    return 'مؤسسة صالح بن حمزة صيرفي الخيرية';
}

function getCounts($model){
    return $model->count();
}

/**
 * @param $admin
 * @return array
 */
function adminsRoleArray($admin){
    if($admin->id != 1) {
        $array = [];
        foreach ($admin->roles as $row) {
            $array[] = $row->id;
        }
    }else{
        $array=[1,2,3,4,5,6,7,8,9,10,11,12,13];
    }
    return $array;
}

/**
 * @return array
 */
function slidersMainLinks(){
    return [
        ['icon-File-TextImage','صور السليدر','Slider.index',7],
        ['ti-layout-media-right-alt','القيم والاهداف','Values.index',8],
        [' icon-Add-UserStar','فريق العمل','Team.index',10],
        ['icon-info','عن الجمعيه ','About_us.index',11],
//        ['icon-info','روابط التواصل الاجتماعي ','Socail.index',12],
        ['icon-action-redo','انشطتنا','Activities.index',14],
    ];
}


function CustomDateFormat($date){
    return date('m/d/Y', strtotime($date));
}



