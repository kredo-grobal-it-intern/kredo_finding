<?php

use App\Constants\UserType;
    
function profileImageInProfile($image){
    if($image){
        echo '<img src="'.$image.'">';
    }elseif(Auth::user()->user_type == UserType::Worker){
        echo '<i class="fa-solid fa-circle-user profile-icon d-block text-center mt-4"></i>';
    }else{
        echo '<i class="fas fa-building fa-2x profile-icon d-block text-center mt-4"></i>';
    }
}

function profileImageInLike($image){
    if($image){
        echo '<img src="'.$image.'">';
    }elseif(Auth::user()->user_type == UserType::Worker){
        echo '<i class="fa-solid fa-building pl-2"></i>';
    }else{
        echo '<i class="fa-solid fa-circle-user me-5"></i>';
    }
}

function profileImageInMessage($image){
    if($image){
        echo '<img src="'.$image.'">';
    }elseif(Auth::user()->user_type == UserType::Worker){
        echo '<i class="fa-solid fa-building index-icon"></i>';
    }else{
        echo '<i class="fa-solid fa-user index-icon"></i>';
    }
}

function workerProfileImage($image){
    if($image){
        echo '<img src="'.$image.'" class="profile-image">';
    }else{
        echo '<i class="fa-solid fa-user profile-icon d-block text-center"></i>';
    }
}

function companyProfileImage($image){
    if($image){
        echo '<img src="'.$image.'" class="profile-image">';
    }else{
        echo '<i class="fa-solid fa-building mr-3"></i>';
    }
}

function profileImageInNav($image){
    if($image){
        echo '<img src="'.$image.'" class="profile-image-navbar">';
    }elseif(Auth::user()->user_type == UserType::Worker){
        echo '<i class="fa-solid fa-circle-user"></i>';
    }else{
        echo '<i class="fas fa-building fa-2x"></i>';
    }
}
